@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.verifikasiPerolehan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.verifikasi-perolehans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.verifikasiPerolehan.fields.id') }}
                        </th>
                        <td>
                            {{ $verifikasiPerolehan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verifikasiPerolehan.fields.verificator') }}
                        </th>
                        <td>
                            {{ $verifikasiPerolehan->verificator->namadonatur ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.verifikasi-perolehans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection