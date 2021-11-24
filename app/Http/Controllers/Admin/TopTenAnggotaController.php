<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTopTenAnggotumRequest;
use App\Http\Requests\StoreTopTenAnggotumRequest;
use App\Http\Requests\UpdateTopTenAnggotumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopTenAnggotaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('top_ten_anggotum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenAnggota.index');
    }

    public function create()
    {
        abort_if(Gate::denies('top_ten_anggotum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenAnggota.create');
    }

    public function store(StoreTopTenAnggotumRequest $request)
    {
        $topTenAnggotum = TopTenAnggotum::create($request->all());

        return redirect()->route('admin.top-ten-anggota.index');
    }

    public function edit(TopTenAnggotum $topTenAnggotum)
    {
        abort_if(Gate::denies('top_ten_anggotum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenAnggota.edit', compact('topTenAnggotum'));
    }

    public function update(UpdateTopTenAnggotumRequest $request, TopTenAnggotum $topTenAnggotum)
    {
        $topTenAnggotum->update($request->all());

        return redirect()->route('admin.top-ten-anggota.index');
    }

    public function show(TopTenAnggotum $topTenAnggotum)
    {
        abort_if(Gate::denies('top_ten_anggotum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenAnggota.show', compact('topTenAnggotum'));
    }

    public function destroy(TopTenAnggotum $topTenAnggotum)
    {
        abort_if(Gate::denies('top_ten_anggotum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topTenAnggotum->delete();

        return back();
    }

    public function massDestroy(MassDestroyTopTenAnggotumRequest $request)
    {
        TopTenAnggotum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
