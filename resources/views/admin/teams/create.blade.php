@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.team.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kecamatan_id">{{ trans('cruds.team.fields.kecamatan') }}</label>
                <select class="form-control select2 {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}" name="kecamatan_id" id="kecamatan_id">
                    @foreach($kecamatans as $id => $entry)
                        <option value="{{ $id }}" {{ old('kecamatan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kecamatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kecamatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.kecamatan_helper') }}</span>
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