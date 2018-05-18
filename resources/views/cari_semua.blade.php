@extends("template.umum")

@section("judul", "Cari")

@section("field")
<section class="resume" id="beranda">
					<h2>Yang anda cari "<i>{{ $katakunci }}</i> ".</h2>
					<br>
					@if (count($ayat_s) != 0)
						@foreach($ayat_s as $ayat)

							<div class="tafsir">
								<a href="{{ URL('tafsir/'.$ayat->surah.'/'.$ayat->ayat) }}">
									<h4>
										<b>{{ $loop->iteration }}. {{ $ayat->nama_indonesia }} ayat {{ $ayat->ayat}}</b>
									</h4>
									<p class="arabic">
										<?php echo preg_replace("/($katakunci)/i", "<span class=\"highlight\">$1</span>", $ayat->arabic); ?>
									</p>
									<div class="menjorok-kanan">
										<audio controls style="width: 100%;">
											<source src="{{ asset('audio/'.$ayat->namafile.'.mp3') }}" type="audio/mpeg">Your browser does not support the audio element.
										</audio>
									</div>
									<br>
									<p class="indonesia">
										<?php echo preg_replace("/($katakunci)/i", "<span class=\"highlight\">$1</span>", $ayat->indonesia); ?>
									</p>
								</a>
							</div>
						@endforeach
					@else
						<p class="text-center">Tidak ditemukan</p>
						<br>
					@endif
					<br>
				</section>
@endsection()