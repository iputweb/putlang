@extends('layouts.auth')

@section('main-content')
		<div class="container">
				<div class="row justify-content-center">
						<div class="col-xl-10 col-lg-12">
								<div class="card o-hidden my-5 border-0 shadow-dark">
										<div class="card-body p-0">
												<div class="row justify-content-center">
														<div class="col-lg-6">
																<div class="p-5">
																		<div class="text-center">
																				<h1 class="h4 mb-4 text-gray-900">
                                                                                    {{ __('Login Putlang') }}</h1>
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

																		<form method="POST" action="{{ route('login') }}" class="user">
																				<input type="hidden" name="_token" value="{{ csrf_token() }}">

																				<div class="form-group">
																						<input type="email" class="form-control form-control-user" name="email"
																								placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
																				</div>

																				<div class="form-group">
																						<input type="password" class="form-control form-control-user" name="password"
																								placeholder="{{ __('Password') }}" required>
																				</div>

																				<div class="form-group">
																						<div class="custom-control custom-checkbox small">
																								<input type="checkbox" class="custom-control-input" name="remember" id="remember"
																										{{ old('remember') ? 'checked' : '' }}>
																								<label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
																						</div>
																				</div>

																				<div class="form-group">
																						<button type="submit" class="btn btn-primary btn-user btn-block">
																								{{ __('Login') }}
																						</button>
																				</div>

																				<hr>


																		</form>

																		<hr>

																		@if (Route::has('password.request'))
																				<div class="text-center">
																						<a class="small" href="{{ route('password.request') }}">
																								{{ __('Lupa sandi?') }}
																						</a>
																				</div>
																		@endif

																		@if (Route::has('register'))
																				<div class="text-center">
																						<a class="small" href="{{ route('register') }}">{{ __('Buat akun baru!') }}</a>
																				</div>
																		@endif
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
