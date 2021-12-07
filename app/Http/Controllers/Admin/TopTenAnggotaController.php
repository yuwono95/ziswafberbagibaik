<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTopTenAnggotaRequest;
use App\Http\Requests\StoreTopTenAnggotaRequest;
use App\Http\Requests\UpdateTopTenAnggotaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopTenAnggotaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('top_ten_anggota_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenAnggota.index');
    }

    public function create()
    {
        abort_if(Gate::denies('top_ten_anggota_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenAnggota.create');
    }

    public function store(StoreTopTenAnggotaRequest $request)
    {
        $topTenAnggota = TopTenAnggota::create($request->all());

        return redirect()->route('admin.top-ten-anggota.index');
    }

    public function edit(TopTenAnggota $topTenAnggota)
    {
        abort_if(Gate::denies('top_ten_anggota_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenAnggota.edit', compact('topTenAnggota'));
    }

    public function update(UpdateTopTenAnggotaRequest $request, TopTenAnggota $topTenAnggota)
    {
        $topTenAnggota->update($request->all());

        return redirect()->route('admin.top-ten-anggota.index');
    }

    public function show(TopTenAnggota $topTenAnggota)
    {
        abort_if(Gate::denies('top_ten_anggota_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenAnggota.show', compact('topTenAnggota'));
    }

    public function destroy(TopTenAnggota $topTenAnggota)
    {
        abort_if(Gate::denies('top_ten_anggota_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topTenAnggota->delete();

        return back();
    }

    public function massDestroy(MassDestroyTopTenAnggotaRequest $request)
    {
        TopTenAnggota::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
