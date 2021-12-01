<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInputPerolehanRequest;
use App\Http\Requests\StoreInputPerolehanRequest;
use App\Http\Requests\UpdateInputPerolehanRequest;
use App\Models\Bank;
use App\Models\InputPerolehan;
use App\Models\Team;
use App\Models\VerifiedStatus;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InputPerolehanController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('input_perolehan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InputPerolehan::with(['namabank', 'verifiedstatus', 'team'])->select(sprintf('%s.*', (new InputPerolehan())->table));
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
            $table->editColumn('namadonatur', function ($row) {
                return $row->namadonatur ? $row->namadonatur : '';
            });
            $table->editColumn('nomorhp', function ($row) {
                return $row->nomorhp ? $row->nomorhp : '';
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
            $table->addColumn('namabank_namabank', function ($row) {
                return $row->namabank ? $row->namabank->namabank : '';
            });

            $table->editColumn('buktitransfer', function ($row) {
                if ($photo = $row->buktitransfer) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->addColumn('verifiedstatus_status', function ($row) {
                return $row->verifiedstatus ? $row->verifiedstatus->status : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'namabank', 'buktitransfer', 'verifiedstatus']);

            return $table->make(true);
        }

        $banks             = Bank::get();
        $verified_statuses = VerifiedStatus::get();
        $teams             = Team::get();

        return view('admin.inputPerolehans.index', compact('banks', 'verified_statuses', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('input_perolehan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $namabanks = Bank::pluck('namabank', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inputPerolehans.create', compact('namabanks'));
    }

    public function store(StoreInputPerolehanRequest $request)
    {
        $inputPerolehan = InputPerolehan::create($request->all());

        if ($request->input('buktitransfer', false)) {
            $inputPerolehan->addMedia(storage_path('tmp/uploads/' . basename($request->input('buktitransfer'))))->toMediaCollection('buktitransfer');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $inputPerolehan->id]);
        }

        return redirect()->route('admin.input-perolehans.index');
    }

    public function edit(InputPerolehan $inputPerolehan)
    {
        abort_if(Gate::denies('input_perolehan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $namabanks = Bank::pluck('namabank', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verifiedstatuses = VerifiedStatus::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inputPerolehan->load('namabank', 'verifiedstatus', 'team');

        return view('admin.inputPerolehans.edit', compact('namabanks', 'verifiedstatuses', 'inputPerolehan'));
    }

    public function update(UpdateInputPerolehanRequest $request, InputPerolehan $inputPerolehan)
    {
        $inputPerolehan->update($request->all());

        if ($request->input('buktitransfer', false)) {
            if (!$inputPerolehan->buktitransfer || $request->input('buktitransfer') !== $inputPerolehan->buktitransfer->file_name) {
                if ($inputPerolehan->buktitransfer) {
                    $inputPerolehan->buktitransfer->delete();
                }
                $inputPerolehan->addMedia(storage_path('tmp/uploads/' . basename($request->input('buktitransfer'))))->toMediaCollection('buktitransfer');
            }
        } elseif ($inputPerolehan->buktitransfer) {
            $inputPerolehan->buktitransfer->delete();
        }

        return redirect()->route('admin.input-perolehans.index');
    }

    public function show(InputPerolehan $inputPerolehan)
    {
        abort_if(Gate::denies('input_perolehan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputPerolehan->load('namabank', 'verifiedstatus', 'team');

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

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('input_perolehan_create') && Gate::denies('input_perolehan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new InputPerolehan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
