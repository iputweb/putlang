@extends('layouts.admin')

@section('main-content')
		<!-- Page Heading -->



		<div class="brosur rounded-4 container mb-3">
				<div class="row justify-content-center">
						<div class="col-md-6">
								{{-- @foreach ($lelangs as $lelang) --}}
								<div class="d-flex justify-content-center mt-3 mb-3" data-aos="fade-up" data-aos-delay="100">
										<div class="card w-75 border-0 shadow">
												<img src="{{ asset('storage/' . $lelang->barang->gambar_barang) }}" class="card-img-top w-100"
														style="max-height: 250px" alt="...">
												<div class="card-body bg-light text-dark">
														<h3 class="card-subtitle text-primary fs-5 fs-3 mb-2 mt-1" style="font-weight: bold">
																{{ $lelang->barang->nama_barang }}</h3>
														<div class="d-flex">
																<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1" style="font-weight: bold">
																		{{ $lelang->barang->deskripsi_barang }}</h6>
														</div>





														<div class="">

																<h6 class="card-subtitle text-secondary fw-bold fs-5 mb-2 mt-2 mb-1 text-right">
																		{{ $lelang->barang->tanggal_barang }}
																</h6>
														</div>
												</div>
										</div>
								</div>
								{{-- @endforeach --}}
						</div>
						<div class="col-md-6 mt-3">
								<div class="d-flex justify-content-center mt-3 mb-3" data-aos="fade-up" data-aos-delay="100">
										<div class="card w-75 border-0 shadow">

												<div class="card-body bg-light text-dark">
														<h3 class="card-subtitle text-primary fs-5 fs-3 mb-2 mt-1" style="font-weight: bold">
																Lelang {{ $lelang->barang->nama_barang }}</h3>
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
																		<h6 class="card-subtitle text-primary fw-bold fs-5 mt-2">{{ $top_price->user->name }}</h6>
																		<h6 class="card-subtitle text-primary fw-bold fs-5 mt-2">Top #1</h6>
																</div>
														@endif




														<div class="">
																<form action="{{ route('bid', $lelang->id) }}" method="post" enctype="multipart/form-data">
																		@csrf
																		<div class="form-group mb-2">
																				<label for="bid"></label>
																				<input type="text" class="form-control @error('bid') is-invalid @enderror" name="tawar_harga"
																						id="tawar_harga" placeholder="Masukkan nominal" autocomplete="off">
																				@error('bid')
																						<span class="text-danger">{{ $message }}</span>
																				@enderror
																		</div>
																		<div class="mb-3 text-right">
																				<button type="submit" class="btn btn-primary col-12">Bid</button>

																		</div>
																</form>

														</div>
												</div>
										</div>

								</div>
								<div class="row justify-content-center">

										<div class="col-9">
												<table class="table shadow">
														<thead class="thead bg-primary text-white text-center">
																<tr>
																		<th scope="col">#</th>
																		<th scope="col">Nama</th>
																		<th scope="col">Bid</th>
																		<th scope="col">Tanggal</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($histori as $detail)
																		<tr class="text-center">
																				<td scope="row">{{ $loop->iteration }}</td>
																				<td>{{ $detail->user->name }}</td>
																				<td>{{ $detail->tawar_harga }}</td>
																				<td>{{ $detail->created_at }}</td>


																		</tr>
																@endforeach

														</tbody>
												</table>
										</div>

										{{-- <table class="table-bordered table-stripped table">
				<thead class="bg-primary text-light">
						<tr class="fw-bold text-center">
								<th>No</th>
								<th>Nama</th>
								<th>Harga Awal</th>
								<th>Harga Akhir</th>
								<th>Status</th>
								<th>Tanggal</th>
						</tr>
				</thead>
				<tbody>
						@foreach ($lelang as $item)
								<tr class="text-center">
										<td scope="row">{{ $loop->iteration }}</td>
										<td>{{ $item->barang->nama_barang }}</td>
										<td>{{ $item->barang->harga_barang }}</td>
										<td>{{ $item->harga_akhir }}</td>
										<td>{{ $item->status }}</td>
										<td>{{ $item->tanggal_lelang }}</td>

										
								</tr>
						@endforeach
				</tbody>
		</table> --}}
								</div>
						</div>

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

@push('notif')
		@if (session('message'))
				<div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
						{{ session('message') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div>
		@endif

		@if (session('success'))
				<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div>
		@endif

		@if (session('status'))
				<div class="alert alert-success border-left-success" role="alert">
						{{ session('status') }}
				</div>
		@endif
@endpush
