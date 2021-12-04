<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Kecamatan;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    use CsvImportTrait;
    
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roleid = \App\Traits\MultiTenantModelTrait::getRoleId();
        if ($request->ajax()) {
            $query = User::with(['kecamatan', 'roles', 'team'])->select(sprintf('%s.*', (new User())->table));
            if($roleid > 2) {
                $query = $query->join('role_user','users.id','=','role_user.user_id')->where('role_user.role_id', '>=', $roleid)->where('users.kecamatan_id', '=', auth()->user()->kecamatan_id);
            }
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $roleid = \App\Traits\MultiTenantModelTrait::getRoleId();
                $viewGate = 'user_show';
                $editGate = 'user_edit';
                $deleteGate = 'user_delete';
                $crudRoutePart = 'users';
                
                $roleExists = False;
                foreach ($row->roles as $role) {
                    if($role->id <= $roleid) {
                        $roleExists = True;
                        break;
                    }
                }

                if($roleExists) {
                    $editGate = '';
                    $deleteGate = '';
                }
                
                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
			
            $table->editColumn('approved', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->approved ? 'checked' : null) . '>';
            });
            $table->editColumn('verified', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->verified ? 'checked' : null) . '>';
            });
            $table->editColumn('team_admin', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->team_admin ? 'checked' : null) . '>';
            });
            $table->addColumn('kecamatan_namakecamatan', function ($row) {
                return $row->kecamatan ? $row->kecamatan->namakecamatan : '';
            });

            $table->editColumn('roles', function ($row) {
                $labels = [];
                foreach ($row->roles as $role) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $role->title);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'approved', 'verified', 'team_admin', 'kecamatan', 'roles']);

            return $table->make(true);
        }

        $kecamatans = Kecamatan::get();
        $roles      = Role::where('id', '>=', $roleid)->get();
        $teams      = Team::get();

        return view('admin.users.index', compact('kecamatans', 'roles', 'teams', 'roleid'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatans = Kecamatan::pluck('namakecamatan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::pluck('title', 'id');
        $index = array_search(['System Admin','1'], $roles->toArray());
        if($index !== false){
          unset($roles[$index]);
        }
        $roleid = \App\Traits\MultiTenantModelTrait::getRoleId();
        
        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('kecamatans', 'roles', 'teams', 'roleid'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatans = Kecamatan::pluck('namakecamatan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::pluck('title', 'id');
        $index = array_search(['System Admin','1'], $roles->toArray());
        if($index !== false){
          unset($roles[$index]);
        }
        
        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('kecamatan', 'roles', 'team');

        return view('admin.users.edit', compact('kecamatans', 'roles', 'teams', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('kecamatan', 'roles', 'team', 'userUserAlerts');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($user->id != '1') {
            $user->delete();
        }
        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        $ids = request('ids');
        $index = array_search('1', $ids);
        if($index !== false){
          unset($ids[$index]);
        }
        User::whereIn('id', $ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
