@extends('layouts.admin')

@section('main-content')
		<!-- Page Heading -->



		<h1 class="h3 mb-4 text-gray-800">Histori Lelang</h1>
		<button href="cetak.php" target="_BLANK" class="btn btn-primary mb-3 text-right">Cetak</button>

		<!-- Main Content goes here -->



		<table class="table-bordered table-stripped table">
				<thead class="bg-primary text-light">
						<tr class="fw-bold text-center">
								<th>No</th>
								<th>User</th>
								<th>ID</th>
								<th>Tawar Harga</th>
								<th>Tanggal</th>
						</tr>
				</thead>
				<tbody>
						@foreach ($historis as $histori)
								<tr class="text-center">
										<td scope="row">{{ $loop->iteration }}</td>
										<td>{{ $histori->user->name }}</td>
										<td>{{ $histori->barang->nama_barang }}</td>
										<td>{{ $histori->tawar_harga }}</td>
										<td>{{ $histori->created_at }}</td>


								</tr>
						@endforeach
				</tbody>
		</table>




		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>
				AOS.init();
		</script>
		<script src="/script/navbar-scroll.js"></script>
@endsection
