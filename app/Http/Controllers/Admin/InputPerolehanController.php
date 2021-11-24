<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInputPerolehanRequest;
use App\Http\Requests\StoreInputPerolehanRequest;
use App\Http\Requests\UpdateInputPerolehanRequest;
use App\Models\InputPerolehan;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InputPerolehanController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('input_perolehan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InputPerolehan::with(['team'])->select(sprintf('%s.*', (new InputPerolehan())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'input_perolehan_show';
                $editGate = 'input_perolehan_edit';
                $deleteGate = 'input_perolehan_delete';
                $crudRoutePart = 'input-perolehans';

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
            $table->editColumn('zakatprofesi', function ($row) {
                return $row->zakatprofesi ? $row->zakatprofesi : '';
            });
            $table->editColumn('zakatmaal', function ($row) {
                return $row->zakatmaal ? $row->zakatmaal : '';
            });
            $table->editColumn('infaq', function ($row) {
                return $row->infaq ? $row->infaq : '';
            });
            $table->editColumn('sedekah', function ($row) {
                return $row->sedekah ? $row->sedekah : '';
            });
            $table->editColumn('wakafpendidikan', function ($row) {
                return $row->wakafpendidikan ? $row->wakafpendidikan : '';
            });
            $table->editColumn('wakafproduktif', function ($row) {
                return $row->wakafproduktif ? $row->wakafproduktif : '';
            });
            $table->editColumn('infaqkesehatan', function ($row) {
                return $row->infaqkesehatan ? $row->infaqkesehatan : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $teams = Team::get();

        return view('admin.inputPerolehans.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('input_perolehan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inputPerolehans.create');
    }

    public function store(StoreInputPerolehanRequest $request)
    {
        $inputPerolehan = InputPerolehan::create($request->all());

        return redirect()->route('admin.input-perolehans.index');
    }

    public function edit(InputPerolehan $inputPerolehan)
    {
        abort_if(Gate::denies('input_perolehan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputPerolehan->load('team');

        return view('admin.inputPerolehans.edit', compact('inputPerolehan'));
    }

    public function update(UpdateInputPerolehanRequest $request, InputPerolehan $inputPerolehan)
    {
        $inputPerolehan->update($request->all());

        return redirect()->route('admin.input-perolehans.index');
    }

    public function show(InputPerolehan $inputPerolehan)
    {
        abort_if(Gate::denies('input_perolehan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputPerolehan->load('team');

        return view('admin.inputPerolehans.show', compact('inputPerolehan'));
    }

    public function destroy(InputPerolehan $inputPerolehan)
    {
        abort_if(Gate::denies('input_perolehan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputPerolehan->delete();

        return back();
    }

    public function massDestroy(MassDestroyInputPerolehanRequest $request)
    {
        InputPerolehan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
