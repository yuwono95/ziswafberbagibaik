<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerolehanSendiriRequest;
use App\Http\Requests\StorePerolehanSendiriRequest;
use App\Http\Requests\UpdatePerolehanSendiriRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerolehanSendiriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perolehan_sendiri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanSendiris.index');
    }

    public function create()
    {
        abort_if(Gate::denies('perolehan_sendiri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanSendiris.create');
    }

    public function store(StorePerolehanSendiriRequest $request)
    {
        $perolehanSendiri = PerolehanSendiri::create($request->all());

        return redirect()->route('admin.perolehan-sendiris.index');
    }

    public function edit(PerolehanSendiri $perolehanSendiri)
    {
        abort_if(Gate::denies('perolehan_sendiri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanSendiris.edit', compact('perolehanSendiri'));
    }

    public function update(UpdatePerolehanSendiriRequest $request, PerolehanSendiri $perolehanSendiri)
    {
        $perolehanSendiri->update($request->all());

        return redirect()->route('admin.perolehan-sendiris.index');
    }

    public function show(PerolehanSendiri $perolehanSendiri)
    {
        abort_if(Gate::denies('perolehan_sendiri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perolehanSendiris.show', compact('perolehanSendiri'));
    }

    public function destroy(PerolehanSendiri $perolehanSendiri)
    {
        abort_if(Gate::denies('perolehan_sendiri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perolehanSendiri->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerolehanSendiriRequest $request)
    {
        PerolehanSendiri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
