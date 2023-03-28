<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Lelang</title>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
		<link
				href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
				rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">

		<!-- Styles -->
		<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

		<!-- Favicon -->
		<link href="{{ asset('img/palu.png') }}" rel="icon" type="image/png">

		<!-- Styles -->
		<style>
				html,
				body {
						background-color: #fff;
						color: #636b6f;
						font-family: 'Nunito', sans-serif;
						font-weight: 200;
						height: 100vh;
						margin: 0;
				}

				.full-height {
						height: 100vh;
				}

				.flex-center {
						align-items: center;
						display: flex;
						justify-content: center;
				}

				.position-ref {
						position: relative;
				}

				.top-right {
						position: absolute;
						right: 10px;
						top: 18px;
				}

				.content {
						text-align: center;
				}

				.title {
						font-size: 84px;
				}

				.links>a {
						color: #636b6f;
						padding: 0 25px;
						font-size: 13px;
						font-weight: 600;
						letter-spacing: .1rem;
						text-decoration: none;
						text-transform: uppercase;
				}

				.m-b-md {
						margin-bottom: 30px;
				}
		</style>
</head>

<body>
		<div class="flex-center position-ref">
				@if (Route::has('login'))
						<div class="top-right links">
								@auth
										<a href="{{ url('/home') }}">Home</a>
								@else
										<a href="{{ route('login') }}">Login</a>

										@if (Route::has('register'))
												<a href="{{ route('register') }}">Register</a>
										@endif
								@endauth
						</div>
				@endif
		</div>

		<div class="content mt-5">
				<div class="brosur rounded-4 container mb-3">
						<div class="row justify-content-center">
								@foreach ($barangs as $barang)
										<div class="col-md-3 d-flex justify-content-center mt-3 mb-3" data-aos="fade-up" data-aos-delay="100">
												<div class="card border-0 shadow" style="max-width: 18rem;">
														<img src="{{ asset('storage/' . $barang->gambar_barang) }}" class="card-img-top"
																style="max-width: 250px; max-height: 150px" alt="...">
														<div class="card-body bg-light text-dark">
																<h3 class="card-subtitle text-primary fs-5 fs-3 mb-2 mt-1" style="font-weight: bold">
																		{{ $barang->nama_barang }}</h3>
																<div class="d-flex justify-content-between">
																		<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1" style="font-weight: bold">
																				{{ $barang->harga_barang }}</h6>
																		<h6 class="card-subtitle text-dark fw-bold fs-5 mb-2 mt-2 mb-1">Harga Awal</h6>
																</div>
																<div class="d-flex justify-content-between">
																		<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1" style="font-weight: bold">
																				{{ $barang->harga_barang }}</h6>
																		<h6 class="card-subtitle text-dark fw-bold fs-5 mb-2 mt-2 mb-1">Bid Tertinggi</h6>
																</div>
																<div class="d-flex justify-content-between">
																		<h6 class="card-subtitle text-primary fw-bold fs-5 mb-2 mt-2 mb-1">Kenthung</h6>
																		<h6 class="card-subtitle text-primary fw-bold fs-5 mb-2 mt-2 mb-1">Top #1</h6>
																</div>




																<div class="mt-2 text-right">
																		<a href="#" class="btn btn-primary text-right">Lelang</a>
																		<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1 text-right">
																				{{ $barang->tanggal_barang }}
																		</h6>
																</div>
														</div>
												</div>
										</div>
								@endforeach
						</div>
				</div>
		</div>
		{{-- <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
		</div>

		</div>
		<footer class="mb-5 text-center">Putra Pratama 2023</footer>
</body>

</html>
