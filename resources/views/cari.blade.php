@extends("template.umum")

@section("judul", "Cari")

@section("field")
<section class="resume" id="beranda">
					<h2>Yang anda cari "<i>{{ $katakunci }}</i>".</h2>
					<br>
					@if(count($ayat_s) != 0)
						<p>Terdapat {{ $jumlah_surah }} surah dan {{ count($ayat_s) }} ayat yang mengandung kata "<i>{{ $katakunci }}</i>". (<a href="{{ URL('cari/semua/'.$katakunci) }}">__lihat semua</a>)</p>
						<table class="table table-hover">
							<thead>
								<th class="nomor">Nomor</th>
								<th>Surah</th>
								<th>Jumlah Ayat</th>
							</thead>
							<tbody>
								<?php
									$ayat_surah = "";
									$nomor = 1;
									$jumlahayat = array_count_values(array_column($ayat_s, "surah")); ?>
								@foreach($ayat_s as $ayat)
									@if($ayat->surah != $ayat_surah)

										<tr class="link" onclick="window.location='{{ URL('cari/'.$ayat->surah.'/'.$katakunci) }}'">
											<td class="nomor">{{ $nomor }}</td>
											<td>{{ $ayat->nama_indonesia }}</td>
											<td class="text-center">
												{{ $jumlahayat[$ayat->surah] }}
											</td>
										</tr>
										<?php $nomor++; ?>

									@endif
									<?php $ayat_surah = $ayat->surah; ?>
								@endforeach

							</tbody>
						</table>
					@else

						<p class="text-center">Tidak ditemukan</p>
						<br>
					@endif

				</section>
@endsection()