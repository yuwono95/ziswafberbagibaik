<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVerifiedStatusRequest;
use App\Http\Requests\StoreVerifiedStatusRequest;
use App\Http\Requests\UpdateVerifiedStatusRequest;
use App\Models\VerifiedStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifiedStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('verified_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verifiedStatuses = VerifiedStatus::all();

        return view('admin.verifiedStatuses.index', compact('verifiedStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('verified_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verifiedStatuses.create');
    }

    public function store(StoreVerifiedStatusRequest $request)
    {
        $verifiedStatus = VerifiedStatus::create($request->all());

        return redirect()->route('admin.verified-statuses.index');
    }

    public function edit(VerifiedStatus $verifiedStatus)
    {
        abort_if(Gate::denies('verified_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verifiedStatuses.edit', compact('verifiedStatus'));
    }

    public function update(UpdateVerifiedStatusRequest $request, VerifiedStatus $verifiedStatus)
    {
        $verifiedStatus->update($request->all());

        return redirect()->route('admin.verified-statuses.index');
    }

    public function show(VerifiedStatus $verifiedStatus)
    {
        abort_if(Gate::denies('verified_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verifiedStatuses.show', compact('verifiedStatus'));
    }

    public function destroy(VerifiedStatus $verifiedStatus)
    {
        abort_if(Gate::denies('verified_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verifiedStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyVerifiedStatusRequest $request)
    {
        VerifiedStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
