@extends('layouts.admin')

@section('main-content')
		<!-- Page Heading -->



		<div class="brosur rounded-4 container mb-3">
				<div class="row justify-content-center">
						@foreach ($lelangs as $lelang)
								<div class="col-md-3 d-flex justify-content-center mt-3 mb-3" data-aos="fade-up" data-aos-delay="100">
										<div class="card border-0 shadow" style="max-width: 18rem;">
												<img src="{{ asset('storage/' . $lelang->barang->gambar_barang) }}" class="card-img-top"
														style="max-width: 250px; max-height: 150px" alt="...">
												<div class="card-body bg-light text-dark">
														<h3 class="card-subtitle text-primary fs-5 fs-3 mb-2 mt-1" style="font-weight: bold">
																{{ $lelang->barang->nama_barang }}</h3>
														<div class="d-flex justify-content-between">
																<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1" style="font-weight: bold">
																		{{ $lelang->barang->harga_barang }}</h6>
																<h6 class="card-subtitle text-dark fw-bold fs-5 mb-2 mt-2 mb-1">Harga Awal</h6>
														</div>
														<div class="d-flex justify-content-between">
																<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1" style="font-weight: bold">
																		{{ $lelang->harga_akhir }}</h6>
																<h6 class="card-subtitle text-dark fw-bold fs-5 mb-2 mt-2 mb-1">Bid Tertinggi</h6>
														</div>
														@if ($top_price != null)
																<div class="d-flex justify-content-between">
																		<h6 class="card-subtitle text-primary fw-bold fs-5 mb-2 mt-2 mb-1">{{ $top_price->user->name }}</h6>
																		<h6 class="card-subtitle text-primary fw-bold fs-5 mb-2 mt-2 mb-1">Top #1</h6>
																</div>
														@endif




														<div class="mt-2 text-right">
																<a href="/detail/{{ $lelang->id }}" class="btn btn-primary text-right">Lelang</a>
																<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1 text-right">
																		{{ $lelang->barang->tanggal_barang }}
																</h6>
														</div>
												</div>
										</div>
								</div>
						@endforeach
				</div>
		</div>
		<div class="brosur rounded-4 container mb-3">
				<div class="row justify-content-center">
						@foreach ($lelang_pemenang as $lelang)
								<div class="col-md-3 d-flex justify-content-center mt-3 mb-3" data-aos="fade-up" data-aos-delay="100">
										<div class="card border-0 shadow" style="max-width: 18rem;">
												<img src="{{ asset('storage/' . $lelang->barang->gambar_barang) }}" class="card-img-top"
														style="max-width: 250px; max-height: 150px" alt="...">
												<div class="card-body bg-light text-dark">
														<h3 class="card-subtitle text-primary fs-5 fs-3 mb-2 mt-1" style="font-weight: bold">
																Lelang {{ $lelang->barang->nama_barang }} Ditutup</h3>
																<div class="d-flex justify-content-between">
																<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1" style="font-weight: bold">
																		Pemenang</h6>
																<h6 class="card-subtitle text-dark fw-bold fs-5 mb-2 mt-2 mb-1">{{ $lelang->user->name }}</h6>
														</div>
													
														<div class="d-flex justify-content-between">
																<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1" style="font-weight: bold">
																		Bid</h6>
																<h6 class="card-subtitle text-dark fw-bold fs-5 mb-2 mt-2 mb-1">{{ $lelang->harga_akhir }}</h6>
														</div>
														@if ($top_price != null)
																<div class="d-flex justify-content-between">
																		<h6 class="card-subtitle text-primary fw-bold fs-5 mb-2 mt-2 mb-1">{{ $top_price->user->name }}</h6>
																		<h6 class="card-subtitle text-primary fw-bold fs-5 mb-2 mt-2 mb-1">Top #1</h6>
																</div>
														@endif




											
												</div>
										</div>
								</div>
						@endforeach
				</div>
		</div>




		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>
				AOS.init();
		</script>
		<script src="/script/navbar-scroll.js"></script>
@endsection
