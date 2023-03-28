@extends('layouts.admin')

@section('main-content')
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Lelang Barang</h1>

		<!-- Main Content goes here -->

		<a href="{{ route('lelang.create') }}" class="btn btn-primary mb-3">+ Lelang</a>

		@if (session('message'))
				<div class="alert alert-success">
						{{ session('message') }}
				</div>
		@endif

		<table class="table-bordered table-stripped table">
				<thead>
						<tr class="fw-bold text-center">
								<th>No</th>
								<th>Nama</th>
								<th>Harga Awal</th>
								<th>Harga Akhir</th>
								<th>Status</th>
								<th>Tanggal</th>
								<th>Aksi</th>
						</tr>
				</thead>
				<tbody>
						@foreach ($lelangs as $lelang)
								<tr class="text-center">
										<td scope="row">{{ $loop->iteration }}</td>
										<td>{{ $lelang->barang->nama_barang }}</td>
										<td>{{ $lelang->barang->harga_barang }}</td>
										<td>{{ $lelang->harga_akhir }}</td>
										<td>{{ $lelang->status }}</td>
										<td>{{ $lelang->tanggal_lelang }}</td>

										<td class="text-center">
												<div class="d-flex">
														<a href="{{ route('lelang.edit', $lelang->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
														<form action="{{ route('lelang.destroy', $lelang->id) }}" method="post">
																@csrf
																@method('delete')
																<button type="submit" class="btn btn-sm btn-danger"
																		onclick="return confirm('Apakah anda yakin ini dihapus?')">Delete</button>
														</form>
												</div>
										</td>
								</tr>
						@endforeach
				</tbody>
		</table>

		{{-- {{ $lelangs->links() }} --}}

		<!-- End of Main Content -->
@endsection

@push('notif')
		@if (session('success'))
				<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div>
		@endif

		@if (session('warning'))
				<div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
						{{ session('warning') }}
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
