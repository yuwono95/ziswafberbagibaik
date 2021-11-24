<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerolehanUpaRequest;
use App\Http\Requests\StorePerolehanUpaRequest;
use App\Http\Requests\UpdatePerolehanUpaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerolehanUpaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perolehan_upa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanUpas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('perolehan_upa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanUpas.create');
    }

    public function store(StorePerolehanUpaRequest $request)
    {
        $perolehanUpa = PerolehanUpa::create($request->all());

        return redirect()->route('admin.perolehan-upas.index');
    }

    public function edit(PerolehanUpa $perolehanUpa)
    {
        abort_if(Gate::denies('perolehan_upa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanUpas.edit', compact('perolehanUpa'));
    }

    public function update(UpdatePerolehanUpaRequest $request, PerolehanUpa $perolehanUpa)
    {
        $perolehanUpa->update($request->all());

        return redirect()->route('admin.perolehan-upas.index');
    }

    public function show(PerolehanUpa $perolehanUpa)
    {
        abort_if(Gate::denies('perolehan_upa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanUpas.show', compact('perolehanUpa'));
    }

    public function destroy(PerolehanUpa $perolehanUpa)
    {
        abort_if(Gate::denies('perolehan_upa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perolehanUpa->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerolehanUpaRequest $request)
    {
        PerolehanUpa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
