@extends('layouts.auth')

@section('main-content')
		<div class="container">
				<div class="row justify-content-center">
						<div class="col-xl-10 col-lg-12 col-md-9">
								<div class="card o-hidden my-5 border-0 shadow-lg">
										<div class="card-body p-0">
												<div class="row justify-content-center">
														<div class="col-lg-6">
																<div class="p-5">
																		<div class="text-center">
																				<h1 class="h4 mb-4 text-gray-900">{{ __('Register Putlang') }}</h1>
																		</div>

																		@if ($errors->any())
																				<div class="alert alert-danger border-left-danger" role="alert">
																						<ul class="my-2 pl-4">
																								@foreach ($errors->all() as $error)
																										<li>{{ $error }}</li>
																								@endforeach
																						</ul>
																				</div>
																		@endif

																		<form method="POST" action="{{ route('register') }}" class="user">
																				<input type="hidden" name="_token" value="{{ csrf_token() }}">

																				<div class="form-group">
																						<input type="text" class="form-control form-control-user" name="name"
																								placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
																				</div>

																				<div class="form-group">
																						<input type="text" class="form-control form-control-user" name="last_name"
																								placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required>
																				</div>

																				<div class="form-group">
																						<input type="email" class="form-control form-control-user" name="email"
																								placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
																				</div>

																				<div class="form-group">
																						<input type="password" class="form-control form-control-user" name="password"
																								placeholder="{{ __('Password') }}" required>
																				</div>

																				<div class="form-group">
																						<input type="password" class="form-control form-control-user" name="password_confirmation"
																								placeholder="{{ __('Confirm Password') }}" required>
																				</div>

																				<div class="form-group">
																						<button type="submit" class="btn btn-primary btn-user btn-block">
																								{{ __('Daftar') }}
																						</button>
																				</div>
																		</form>

																		<hr>

																		<div class="text-center">
																				<a class="small" href="{{ route('login') }}">
																						{{ __('Sudah punya akun? Login!') }}
																				</a>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
