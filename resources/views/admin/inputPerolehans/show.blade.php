@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inputPerolehan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.input-perolehans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.id') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.namadonatur') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->namadonatur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.nomorhp') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->nomorhp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.zakatprofesi') }}
                        </th>
                        <td>
                            {{ number_format($inputPerolehan->zakatprofesi,0,",",".") }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.zakatmaal') }}
                        </th>
                        <td>
                            {{ number_format($inputPerolehan->zakatmaal,0,",",".") }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.infaq') }}
                        </th>
                        <td>
                            {{ number_format($inputPerolehan->infaq,0,",",".") }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.sedekah') }}
                        </th>
                        <td>
                            {{ number_format($inputPerolehan->sedekah,0,",",".") }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.wakafpendidikan') }}
                        </th>
                        <td>
                            {{ number_format($inputPerolehan->wakafpendidikan,0,",",".") }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.wakafproduktif') }}
                        </th>
                        <td>
                            {{ number_format($inputPerolehan->wakafproduktif,0,",",".") }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.infaqkesehatan') }}
                        </th>
                        <td>
                            {{ number_format($inputPerolehan->infaqkesehatan,0,",",".") }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.namabank') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->namabank->namabank ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.buktitransfer') }}
                        </th>
                        <td>
                            @if($inputPerolehan->buktitransfer)
                                <a href="{{ $inputPerolehan->buktitransfer->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $inputPerolehan->buktitransfer->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.verifiedstatus') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->verifiedstatus->status ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.input-perolehans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
