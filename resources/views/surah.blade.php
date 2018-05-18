@extends("template.umum")

@section("judul", "Surah")

@section("tambah-css")
<style type="text/css">
		.table tbody {
			height: calc(100vh - 201px);
		}
	</style>
@endsection()

@section("field")
<section class="resume" id="beranda">
					<h2>Daftar Surah</h2>

					<div class="table-responsive">
						<table class="table table-hover" id="table-1">
							<thead>
								<th>Nomor</th>
								<th>Nama (Indonesia)</th>
								<th>Nama (Arabic)</th>
								<th>Arti</th>
								<th>Jumlah Ayat</th>
								<th>Urutan Pewahyuan</th>
								<th>Tempat Turun</th>
							</thead>
							<tbody>
								@foreach($surah_s as $surah)

									<tr class="link" onclick="window.location='{{ URL('surah/'.$surah->id) }}'">
										<td class="text-center">{{ $loop->iteration }}.</td>
										<td>{{ $surah->nama_indonesia }}</td>
										<td class="arabic">{{ $surah->nama_arabic }}</td>
										<td>{{ $surah->arti }}</td>
										<td class="text-center">{{ $surah->jumlahayat }}</td>
										<td class="text-center">{{ $surah->urutanpewahyuan }}</td>
										<td>{{ $surah->nama }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<table class="table" id="header-fixed"></table>
					</div>
				</section>
@endsection()