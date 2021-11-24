<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTopTenUpaRequest;
use App\Http\Requests\StoreTopTenUpaRequest;
use App\Http\Requests\UpdateTopTenUpaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopTenUpaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('top_ten_upa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenUpas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('top_ten_upa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenUpas.create');
    }

    public function store(StoreTopTenUpaRequest $request)
    {
        $topTenUpa = TopTenUpa::create($request->all());

        return redirect()->route('admin.top-ten-upas.index');
    }

    public function edit(TopTenUpa $topTenUpa)
    {
        abort_if(Gate::denies('top_ten_upa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenUpas.edit', compact('topTenUpa'));
    }

    public function update(UpdateTopTenUpaRequest $request, TopTenUpa $topTenUpa)
    {
        $topTenUpa->update($request->all());

        return redirect()->route('admin.top-ten-upas.index');
    }

    public function show(TopTenUpa $topTenUpa)
    {
        abort_if(Gate::denies('top_ten_upa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topTenUpas.show', compact('topTenUpa'));
    }

    public function destroy(TopTenUpa $topTenUpa)
    {
        abort_if(Gate::denies('top_ten_upa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topTenUpa->delete();

        return back();
    }

    public function massDestroy(MassDestroyTopTenUpaRequest $request)
    {
        TopTenUpa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
