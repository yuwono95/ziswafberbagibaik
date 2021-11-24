@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.inputPerolehan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.input-perolehans.update", [$inputPerolehan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="namadonatur">{{ trans('cruds.inputPerolehan.fields.namadonatur') }}</label>
                <input class="form-control {{ $errors->has('namadonatur') ? 'is-invalid' : '' }}" type="text" name="namadonatur" id="namadonatur" value="{{ old('namadonatur', $inputPerolehan->namadonatur) }}">
                @if($errors->has('namadonatur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('namadonatur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.namadonatur_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomorhp">{{ trans('cruds.inputPerolehan.fields.nomorhp') }}</label>
                <input class="form-control {{ $errors->has('nomorhp') ? 'is-invalid' : '' }}" type="text" name="nomorhp" id="nomorhp" value="{{ old('nomorhp', $inputPerolehan->nomorhp) }}">
                @if($errors->has('nomorhp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomorhp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.nomorhp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zakatprofesi">{{ trans('cruds.inputPerolehan.fields.zakatprofesi') }}</label>
                <input class="form-control {{ $errors->has('zakatprofesi') ? 'is-invalid' : '' }}" type="number" name="zakatprofesi" id="zakatprofesi" value="{{ old('zakatprofesi', $inputPerolehan->zakatprofesi) }}" step="0.01">
                @if($errors->has('zakatprofesi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zakatprofesi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.zakatprofesi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zakatmaal">{{ trans('cruds.inputPerolehan.fields.zakatmaal') }}</label>
                <input class="form-control {{ $errors->has('zakatmaal') ? 'is-invalid' : '' }}" type="number" name="zakatmaal" id="zakatmaal" value="{{ old('zakatmaal', $inputPerolehan->zakatmaal) }}" step="0.01">
                @if($errors->has('zakatmaal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zakatmaal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.zakatmaal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="infaq">{{ trans('cruds.inputPerolehan.fields.infaq') }}</label>
                <input class="form-control {{ $errors->has('infaq') ? 'is-invalid' : '' }}" type="number" name="infaq" id="infaq" value="{{ old('infaq', $inputPerolehan->infaq) }}" step="0.01">
                @if($errors->has('infaq'))
                    <div class="invalid-feedback">
                        {{ $errors->first('infaq') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.infaq_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sedekah">{{ trans('cruds.inputPerolehan.fields.sedekah') }}</label>
                <input class="form-control {{ $errors->has('sedekah') ? 'is-invalid' : '' }}" type="number" name="sedekah" id="sedekah" value="{{ old('sedekah', $inputPerolehan->sedekah) }}" step="0.01">
                @if($errors->has('sedekah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sedekah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.sedekah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wakafpendidikan">{{ trans('cruds.inputPerolehan.fields.wakafpendidikan') }}</label>
                <input class="form-control {{ $errors->has('wakafpendidikan') ? 'is-invalid' : '' }}" type="number" name="wakafpendidikan" id="wakafpendidikan" value="{{ old('wakafpendidikan', $inputPerolehan->wakafpendidikan) }}" step="0.01">
                @if($errors->has('wakafpendidikan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wakafpendidikan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.wakafpendidikan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wakafproduktif">{{ trans('cruds.inputPerolehan.fields.wakafproduktif') }}</label>
                <input class="form-control {{ $errors->has('wakafproduktif') ? 'is-invalid' : '' }}" type="number" name="wakafproduktif" id="wakafproduktif" value="{{ old('wakafproduktif', $inputPerolehan->wakafproduktif) }}" step="0.01">
                @if($errors->has('wakafproduktif'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wakafproduktif') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.wakafproduktif_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="infaqkesehatan">{{ trans('cruds.inputPerolehan.fields.infaqkesehatan') }}</label>
                <input class="form-control {{ $errors->has('infaqkesehatan') ? 'is-invalid' : '' }}" type="number" name="infaqkesehatan" id="infaqkesehatan" value="{{ old('infaqkesehatan', $inputPerolehan->infaqkesehatan) }}" step="0.01">
                @if($errors->has('infaqkesehatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('infaqkesehatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.infaqkesehatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="namabank_id">{{ trans('cruds.inputPerolehan.fields.namabank') }}</label>
                <select class="form-control select2 {{ $errors->has('namabank') ? 'is-invalid' : '' }}" name="namabank_id" id="namabank_id" required>
                    @foreach($namabanks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('namabank_id') ? old('namabank_id') : $inputPerolehan->namabank->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('namabank'))
                    <div class="invalid-feedback">
                        {{ $errors->first('namabank') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.namabank_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="buktitransfer">{{ trans('cruds.inputPerolehan.fields.buktitransfer') }}</label>
                <div class="needsclick dropzone {{ $errors->has('buktitransfer') ? 'is-invalid' : '' }}" id="buktitransfer-dropzone">
                </div>
                @if($errors->has('buktitransfer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('buktitransfer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputPerolehan.fields.buktitransfer_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.buktitransferDropzone = {
    url: '{{ route('admin.input-perolehans.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="buktitransfer"]').remove()
      $('form').append('<input type="hidden" name="buktitransfer" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="buktitransfer"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($inputPerolehan) && $inputPerolehan->buktitransfer)
      var file = {!! json_encode($inputPerolehan->buktitransfer) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="buktitransfer" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection