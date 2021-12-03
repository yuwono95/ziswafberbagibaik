@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.kecamatan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kecamatans.update", [$kecamatan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="namakecamatan">{{ trans('cruds.kecamatan.fields.namakecamatan') }}</label>
                <input class="form-control {{ $errors->has('namakecamatan') ? 'is-invalid' : '' }}" type="text" name="namakecamatan" id="namakecamatan" value="{{ old('namakecamatan', $kecamatan->namakecamatan) }}">
                @if($errors->has('namakecamatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('namakecamatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kecamatan.fields.namakecamatan_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection