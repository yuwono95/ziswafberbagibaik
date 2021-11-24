@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.inputPerolehan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.input-perolehans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="zakatprofesi">{{ trans('cruds.inputPerolehan.fields.zakatprofesi') }}</label>
                <input class="form-control {{ $errors->has('zakatprofesi') ? 'is-invalid' : '' }}" type="number" name="zakatprofesi" id="zakatprofesi" value="{{ old('zakatprofesi', '0') }}" step="0.01">
                @if($errors->has('zakatprofesi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zakatprofesi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.zakatprofesi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zakatmaal">{{ trans('cruds.inputPerolehan.fields.zakatmaal') }}</label>
                <input class="form-control {{ $errors->has('zakatmaal') ? 'is-invalid' : '' }}" type="number" name="zakatmaal" id="zakatmaal" value="{{ old('zakatmaal', '0') }}" step="0.01">
                @if($errors->has('zakatmaal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zakatmaal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.zakatmaal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="infaq">{{ trans('cruds.inputPerolehan.fields.infaq') }}</label>
                <input class="form-control {{ $errors->has('infaq') ? 'is-invalid' : '' }}" type="number" name="infaq" id="infaq" value="{{ old('infaq', '0') }}" step="0.01">
                @if($errors->has('infaq'))
                    <div class="invalid-feedback">
                        {{ $errors->first('infaq') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.infaq_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sedekah">{{ trans('cruds.inputPerolehan.fields.sedekah') }}</label>
                <input class="form-control {{ $errors->has('sedekah') ? 'is-invalid' : '' }}" type="number" name="sedekah" id="sedekah" value="{{ old('sedekah', '0') }}" step="0.01">
                @if($errors->has('sedekah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sedekah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.sedekah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wakafpendidikan">{{ trans('cruds.inputPerolehan.fields.wakafpendidikan') }}</label>
                <input class="form-control {{ $errors->has('wakafpendidikan') ? 'is-invalid' : '' }}" type="number" name="wakafpendidikan" id="wakafpendidikan" value="{{ old('wakafpendidikan', '0') }}" step="0.01">
                @if($errors->has('wakafpendidikan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wakafpendidikan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.wakafpendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wakafproduktif">{{ trans('cruds.inputPerolehan.fields.wakafproduktif') }}</label>
                <input class="form-control {{ $errors->has('wakafproduktif') ? 'is-invalid' : '' }}" type="number" name="wakafproduktif" id="wakafproduktif" value="{{ old('wakafproduktif', '0') }}" step="0.01">
                @if($errors->has('wakafproduktif'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wakafproduktif') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.wakafproduktif_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="infaqkesehatan">{{ trans('cruds.inputPerolehan.fields.infaqkesehatan') }}</label>
                <input class="form-control {{ $errors->has('infaqkesehatan') ? 'is-invalid' : '' }}" type="number" name="infaqkesehatan" id="infaqkesehatan" value="{{ old('infaqkesehatan', '0') }}" step="0.01">
                @if($errors->has('infaqkesehatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('infaqkesehatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.infaqkesehatan_helper') }}</span>
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