<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerolehanDpcRequest;
use App\Http\Requests\StorePerolehanDpcRequest;
use App\Http\Requests\UpdatePerolehanDpcRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerolehanDpcController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perolehan_dpc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanDpcs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('perolehan_dpc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanDpcs.create');
    }

    public function store(StorePerolehanDpcRequest $request)
    {
        $perolehanDpc = PerolehanDpc::create($request->all());

        return redirect()->route('admin.perolehan-dpcs.index');
    }

    public function edit(PerolehanDpc $perolehanDpc)
    {
        abort_if(Gate::denies('perolehan_dpc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanDpcs.edit', compact('perolehanDpc'));
    }

    public function update(UpdatePerolehanDpcRequest $request, PerolehanDpc $perolehanDpc)
    {
        $perolehanDpc->update($request->all());

        return redirect()->route('admin.perolehan-dpcs.index');
    }

    public function show(PerolehanDpc $perolehanDpc)
    {
        abort_if(Gate::denies('perolehan_dpc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanDpcs.show', compact('perolehanDpc'));
    }

    public function destroy(PerolehanDpc $perolehanDpc)
    {
        abort_if(Gate::denies('perolehan_dpc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perolehanDpc->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerolehanDpcRequest $request)
    {
        PerolehanDpc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
