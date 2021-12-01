<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVerifikasiPerolehanRequest;
use App\Http\Requests\StoreVerifikasiPerolehanRequest;
use App\Http\Requests\UpdateVerifikasiPerolehanRequest;
use App\Models\InputPerolehan;
use App\Models\VerifikasiPerolehan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifikasiPerolehanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('verifikasi_perolehan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verifikasiPerolehans = VerifikasiPerolehan::with(['verificator'])->get();

        $input_perolehans = InputPerolehan::get();

        return view('admin.verifikasiPerolehans.index', compact('verifikasiPerolehans', 'input_perolehans'));
    }

    public function create()
    {
        abort_if(Gate::denies('verifikasi_perolehan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verificators = InputPerolehan::pluck('namadonatur', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.verifikasiPerolehans.create', compact('verificators'));
    }

    public function store(StoreVerifikasiPerolehanRequest $request)
    {
        $verifikasiPerolehan = VerifikasiPerolehan::create($request->all());

        return redirect()->route('admin.verifikasi-perolehans.index');
    }

    public function edit(VerifikasiPerolehan $verifikasiPerolehan)
    {
        abort_if(Gate::denies('verifikasi_perolehan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verificators = InputPerolehan::pluck('namadonatur', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verifikasiPerolehan->load('verificator');

        return view('admin.verifikasiPerolehans.edit', compact('verificators', 'verifikasiPerolehan'));
    }

    public function update(UpdateVerifikasiPerolehanRequest $request, VerifikasiPerolehan $verifikasiPerolehan)
    {
        $verifikasiPerolehan->update($request->all());

        return redirect()->route('admin.verifikasi-perolehans.index');
    }

    public function show(VerifikasiPerolehan $verifikasiPerolehan)
    {
        abort_if(Gate::denies('verifikasi_perolehan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verifikasiPerolehan->load('verificator');

        return view('admin.verifikasiPerolehans.show', compact('verifikasiPerolehan'));
    }

    public function destroy(VerifikasiPerolehan $verifikasiPerolehan)
    {
        abort_if(Gate::denies('verifikasi_perolehan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verifikasiPerolehan->delete();

        return back();
    }

    public function massDestroy(MassDestroyVerifikasiPerolehanRequest $request)
    {
        VerifikasiPerolehan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
