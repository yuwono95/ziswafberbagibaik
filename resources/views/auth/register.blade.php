@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card mx-4">
            <div class="card-body p-4">

                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    @if(request()->has('team'))
                        <input type="hidden" name="team" id="team" value="{{ request()->query('team') }}">
                    @endif
                    <h1>{{ trans('panel.site_title') }}</h1>
                    <p class="text-muted">{{ trans('global.register') }}</p>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user fa-fw"></i>
                            </span>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope fa-fw"></i>
                            </span>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-phone fa-fw"></i>
                            </span>
                        </div>
						<input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" required placeholder="{{ trans('cruds.user.fields.phone') }}" value="{{ old('phone', null) }}" required>
						@if($errors->has('phone'))
							<div class="invalid-feedback">
								{{ $errors->first('phone') }}
							</div>
						@endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-users fa-fw"></i>
                            </span>
                        </div>
						<select class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}" name="kecamatan_id" id="kecamatan_id" required placeholder="{{ trans('cruds.user.fields.kecamatan') }}">
							<option value="" selected>Select Kecamatan</option>
							@foreach($kecamatans as $id => $kecamatan)
								<option value="{{ $kecamatan->id }}">{{ $kecamatan->namakecamatan }}</option>
							@endforeach
						</select>
						@if($errors->has('kecamatan'))
							<div class="invalid-feedback">
								{{ $errors->first('kecamatan') }}
							</div>
						@endif
                    </div>
					
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-users fa-fw"></i>
                            </span>
                        </div>
						<select class="form-control {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required placeholder="{{ trans('cruds.user.fields.team') }}">
							<option value="" selected>Select Team (Group)</option>
						</select>
						@if($errors->has('team'))
							<div class="invalid-feedback">
								{{ $errors->first('team') }}
							</div>
						@endif
                    </div>

                    <button class="btn btn-block btn-primary">
                        {{ trans('global.register') }}
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
let groups = [
@foreach($kecamatans as $kecamatanid => $kecamatan)
	@foreach($teams as $teamid => $team)
		@if($kecamatanid == $team->kecamatan_id)
			[ {{ $kecamatanid }}, {{ $teamid }}, "{{ $team->name }}" ],
		@endif
	@endforeach
@endforeach
];

document.getElementById('kecamatan_id').onchange = function(evt) {
	var value = evt.target.value;
	selectTeams = document.getElementById('team_id');
	selectTeams.length = 0;
	
	var opt = document.createElement('option');
	opt.id = "";
	opt.innerHTML = "Select Team (Group)";
	selectTeams.appendChild(opt);
	
	for (let i = 0; i < groups.length; i++) {
		if(groups[i][0] == value) {
			opt = document.createElement('option');
			opt.value = groups[i][1];
			opt.innerHTML = groups[i][2];
			selectTeams.appendChild(opt);
		}
	}
}
</script>
@endsection
