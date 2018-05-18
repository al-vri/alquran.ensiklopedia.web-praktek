@extends("template.umum")

@section("judul", "Tafsir")

@section("field")
<section class="resume" id="beranda">
					<a class="link" href="{{ URL('surah/'.$tafsir->surah) }}">
						<h2>{{ $tafsir->nama_indonesia }} (<span class="arabic">{{ $tafsir->nama_arabic }}</span>)</h2>
					</a>
					<br>
					<h3>{{ $tafsir->ayat }}</h3>
					<p class="arabic">{{ $tafsir->arabic }}</p>
					<div class="menjorok-kanan">
						<audio controls style="width: 100%;">
							<source src="{{ asset('audio/'.$tafsir->namafile.'.mp3') }}" type="audio/mpeg">Your browser does not support the audio element.
						</audio>
					</div>
					<br>
					<p class="indonesia">{{ $tafsir->indonesia }}</p>
					<br>
					<h3>Tafsir</h3>
					@if ($tafsir->text != "")

						<p class="menjorok-kanan">{{ $tafsir->text }}</p>
					@else

						<p class="text-center">Tafsir tidak ditemukan</p>
					@endif
				</section>
@endsection()