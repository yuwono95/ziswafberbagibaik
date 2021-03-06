<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Kecamatan;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::with(['kecamatan', 'owner'])->get();
		
		$kecamatanid = auth()->user()->kecamatan_id;
		
		$roleid = \App\Traits\MultiTenantModelTrait::getRoleId();

        return view('admin.teams.index', compact('teams', 'kecamatanid', 'roleid'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatans = Kecamatan::pluck('namakecamatan', 'id')->prepend(trans('global.pleaseSelect'), '');
		$kecamatanid = auth()->user()->kecamatan_id;
		$roleid = \App\Traits\MultiTenantModelTrait::getRoleId();

        return view('admin.teams.create', compact('kecamatans', 'kecamatanid', 'roleid'));
    }

    public function store(StoreTeamRequest $request)
    {
        $data             = $request->all();
        $data['owner_id'] = auth()->user()->id;
        $team             = Team::create($data);

        return redirect()->route('admin.teams.index');
    }

    public function edit(Team $team)
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatans = Kecamatan::pluck('namakecamatan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $team->load('kecamatan', 'owner');
		
		$kecamatanid = auth()->user()->kecamatan_id;
		
		$roleid = \App\Traits\MultiTenantModelTrait::getRoleId();

        return view('admin.teams.edit', compact('kecamatans', 'team', 'kecamatanid', 'roleid'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->all());

        return redirect()->route('admin.teams.index');
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->load('kecamatan', 'owner');

        return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request)
    {
        Team::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
