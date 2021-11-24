<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerolehanSemuaDpcRequest;
use App\Http\Requests\StorePerolehanSemuaDpcRequest;
use App\Http\Requests\UpdatePerolehanSemuaDpcRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerolehanSemuaDpcController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perolehan_semua_dpc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanSemuaDpcs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('perolehan_semua_dpc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanSemuaDpcs.create');
    }

    public function store(StorePerolehanSemuaDpcRequest $request)
    {
        $perolehanSemuaDpc = PerolehanSemuaDpc::create($request->all());

        return redirect()->route('admin.perolehan-semua-dpcs.index');
    }

    public function edit(PerolehanSemuaDpc $perolehanSemuaDpc)
    {
        abort_if(Gate::denies('perolehan_semua_dpc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanSemuaDpcs.edit', compact('perolehanSemuaDpc'));
    }

    public function update(UpdatePerolehanSemuaDpcRequest $request, PerolehanSemuaDpc $perolehanSemuaDpc)
    {
        $perolehanSemuaDpc->update($request->all());

        return redirect()->route('admin.perolehan-semua-dpcs.index');
    }

    public function show(PerolehanSemuaDpc $perolehanSemuaDpc)
    {
        abort_if(Gate::denies('perolehan_semua_dpc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanSemuaDpcs.show', compact('perolehanSemuaDpc'));
    }

    public function destroy(PerolehanSemuaDpc $perolehanSemuaDpc)
    {
        abort_if(Gate::denies('perolehan_semua_dpc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perolehanSemuaDpc->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerolehanSemuaDpcRequest $request)
    {
        PerolehanSemuaDpc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
