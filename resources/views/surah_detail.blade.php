@extends("template.umum")

@section("judul", "Detail Surah")

@section("field")
<section class="resume" id="beranda">
					<h2>{{ $surah_s[0]->nama_indonesia }} (<span class="arabic">{{ $surah_s[0]->nama_arabic }}</span>)</h2>
					<br>
					<table>
						<tr>
							<td>
								<span class="tab">Arti</span>
							</td>
							<td>: {{ $surah_s[0]->arti }}</td>
						</tr>
						<tr>
							<td>
								<span class="tab">Urutan surah</span>
							</td>
							<td>: {{ $surah_s[0]->surah }}</td>
						</tr>
						<tr>
							<td>
								<span class="tab">Urutan pewahyuan</span>
							</td>
							<td>: {{ $surah_s[0]->urutanpewahyuan }}</td>
						</tr>
						<tr>
							<td>
								<span class="tab">Jumlah ayat</span>
							</td>
							<td>: {{ $surah_s[0]->jumlahayat }}</td>
						</tr>
						<tr>
							<td>
								<span class="tab">Tempat turun</span>
							</td>
							<td>: {{ $surah_s[0]->nama }}</td>
						</tr>
					</table>
					<br>
					<p class="text-indent">{{ $surah_s[0]->keterangan }}</p>
					@foreach($surah_s as $surah)

						<div class="tafsir">
							<a href="{{ URL('tafsir/'.$surah->surah.'/'.$surah->ayat) }}">
								<h3>{{ $loop->iteration }}</h3>
								<p class="arabic">{{ $surah->arabic }}</p>
								<div class="menjorok-kanan">
									<audio controls style="width: 100%;">
										<source src="{{ asset('audio/'.$surah->namafile.'.mp3') }}" type="audio/mpeg">Your browser does not support the audio element.
									</audio>
								</div>
								<br>
								<p class="indonesia">{{ $surah->indonesia }}</p>
							</a>
						</div>
					@endforeach
					<br>
				</section>
@endsection()