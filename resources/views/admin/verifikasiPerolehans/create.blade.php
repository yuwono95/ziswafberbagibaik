@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.verifikasiPerolehan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.verifikasi-perolehans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="verificator_id">{{ trans('cruds.verifikasiPerolehan.fields.verificator') }}</label>
                <select class="form-control select2 {{ $errors->has('verificator') ? 'is-invalid' : '' }}" name="verificator_id" id="verificator_id" required>
                    @foreach($verificators as $id => $entry)
                        <option value="{{ $id }}" {{ old('verificator_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('verificator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('verificator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verifikasiPerolehan.fields.verificator_helper') }}</span>
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