@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bank.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.banks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="namabank">{{ trans('cruds.bank.fields.namabank') }}</label>
                <input class="form-control {{ $errors->has('namabank') ? 'is-invalid' : '' }}" type="text" name="namabank" id="namabank" value="{{ old('namabank', '') }}" required>
                @if($errors->has('namabank'))
                    <div class="invalid-feedback">
                        {{ $errors->first('namabank') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bank.fields.namabank_helper') }}</span>
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