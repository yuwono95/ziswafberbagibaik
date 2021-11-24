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
                            {{ $inputPerolehan->zakatprofesi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.zakatmaal') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->zakatmaal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.infaq') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->infaq }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.sedekah') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->sedekah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.wakafpendidikan') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->wakafpendidikan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.wakafproduktif') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->wakafproduktif }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputPerolehan.fields.infaqkesehatan') }}
                        </th>
                        <td>
                            {{ $inputPerolehan->infaqkesehatan }}
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