@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.verifiedStatus.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.verified-statuses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.verifiedStatus.fields.id') }}
                        </th>
                        <td>
                            {{ $verifiedStatus->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verifiedStatus.fields.status') }}
                        </th>
                        <td>
                            {{ $verifiedStatus->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.verified-statuses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection