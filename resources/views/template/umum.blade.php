<!DOCTYPE html>
<html>
<head>
	@include("template.parsial.kepala")


	@yield("tambah-css")
</head>
<body>
	<div class="wrapper">
		<!-- Sidebar Holder -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<a href="{{ URL('/') }}">
					<h3>Ensiklopedia Alquran</h3>
					<strong>EA</strong>
				</a>
			</div>

			<ul class="sidebar-list list-unstyled components">
				<li class="js-btn active">
					<a href="{{ URL('#beranda') }}">
						<i class="glyphicon glyphicon-home"></i>
						Beranda
					</a>
				</li>
				<li class="js-btn">
					<a href="{{ URL('#tentang') }}">
						<i class="glyphicon glyphicon-briefcase"></i>
						Tentang
					</a>
				</li>
				<li class="js-btn">
					<a href="{{ URL('#kontak') }}">
						<i class="glyphicon glyphicon-send"></i>
						Kontak
					</a>
				</li>
			</ul>

			<ul class="list-unstyled">
				<li>
					<a href="#surah" data-toggle="collapse" aria-expanded="false">
						<i class="glyphicon glyphicon-duplicate"></i>
						Surah
					</a>
					<ul class="collapse list-unstyled" id="surah"><?php
						$surah_s = DB::table("surah")
												->select("id", "nama_indonesia")
												->get(); ?>
						@foreach ($surah_s as $surah)

							<li><a href="{{ URL('surah/'.$surah->id) }}">{{ $surah->nama_indonesia }}</a></li>
						@endforeach
					</ul>
				</li>
			</ul>
		</nav>

		<!-- Page Content Holder -->
		<div id="content">

			<nav class="navbar navbar-default">
				<div class="container-fluid">

					<div class="navbar-header">
						<button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
							<i class="glyphicon glyphicon-align-left"></i>
						</button>

						<div class="pencarian">
							<form method="POST" action="{{ URL::to('cari') }}">
								{{ csrf_field() }}
								<div class="input-group">
									<span class="input-group-btn">
										<input type="submit" class="submit">
									</span>
									<input type="text" name="katakunci" class="input" placeholder="Cari..." value="<?php
										if(isset($katakunci)) {
											if(!empty($katakunci))
												echo($katakunci);
										} ?>" required>
								</div>
							</form>
						</div>
					</div>

					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="{{ URL('surah') }}">Surah</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="field scroll">
				@yield("field")

				<section class="resume" id="tentang">
					<h2>Tentang</h2>
					<p>Ensiklopedia Al-Quran menceritakan perjalanan sebuah kitab Agung yang diturunkan untuk umat akhir zaman. Sebuah wahyu yang mula diturunkan di Gua Hira' kepada seorang Rasul yang tidak tahu membaca dan menulis, kemudian perlu disampaikan kepada kaumnya yang juga buta huruf.</p>
					<p>Namun kebesaran wahyu Allah SWT ini, ia dapat berkembang dari sebuah kota ke sebuah negara dan seterusnya tersebar ke seluruh dunia dan bertahan lebih 1400 tahun. Tintanya hanya dakwat dari cairan warna-warni. Lembarannya hanya kertas daripada tumbuh-tumbuhan kenaf yang melata di bumi. Ia adalah nur petunjuk jalan bagi insan yang punya mata hati. Teksnya adalah wahyu yang boleh diterima oleh insan pilihan dan suci (Nabi dan Rasul). Wahyu yang merupakan himpunan firman Allah SWT, Tuhan yang esa. Dialah Tuhan langit dan bumi. Apakah yang lebih tinggi dan suci daripada semua itu?</p>
				</section>

				<section class="resume" id="kontak">
					<div class="wrap-contact100">
						<form class="contact100-form validate-form" method="POST" action="{{ URL::to('kontak') }}">
							<span class="contact100-form-title">
								Kirimi Kami Pesan
							</span>

							<label class="label-input100" for="name">Beritahu kami nama Anda *</label>
							<div class="wrap-input100 validate-input" data-validate="Ketik nama lengkap">
								<input id="nama" class="input100" name="nama" placeholder="Nama lengkap" type="text">
								<span class="focus-input100"></span>
							</div>

							<label class="label-input100" for="email">Masukkan alamat surel Anda *</label>
							<div class="wrap-input100 validate-input" data-validate="Surel yang valid diperlukan: contoh@abc.xyz">
								<input id="email" class="input100" name="email" placeholder="Contoh: fy-1337@tersakiti.org" type="text">
								<span class="focus-input100"></span>
							</div>

							<label class="label-input100" for="phone">Masukkan nomor telepon</label>
							<div class="wrap-input100">
								<input id="phone" class="input100" name="telepon" placeholder="Contoh: +62 212 1337" type="text">
								<span class="focus-input100"></span>
							</div>

							<label class="label-input100" for="message">Pesan *</label>
							<div class="wrap-input100 validate-input" data-validate="Pesan diperlukan">
								<textarea id="message" class="input100" name="pesan" placeholder="Tulis pesan untuk kami"></textarea>
								<span class="focus-input100"></span>
							</div>

							<div class="container-contact100-form-btn">
								<button class="contact100-form-btn">
									Kirim Pesan
								</button>
							</div>
						</form>

						<div class="contact100-more flex-col-c-m" style="background-image: url('/assets/gambar/bg-kontak.jpg');">
							<div class="dis-flex size1 p-b-47">
							</div>
							<div class="dis-flex size1 p-b-47">
								<div class="txt1 p-r-25">
									<span class="glyphicon glyphicon-education"></span>
								</div>

								<div class="flex-col size2">
									<span class="txt1 p-b-20">
										Alamat
									</span>

									<span class="txt3">
										Universitas Islam Negeri Sunan Kalijaga
										<br>Fakultas Sains dan Teknologi
										<br>Teknik Informatika
									</span>
								</div>
							</div>

							<div class="dis-flex size1 p-b-47">
								<div class="txt1 p-r-25">
									<span class="glyphicon glyphicon-user"></span>
								</div>

								<div class="flex-col size2">
									<span class="txt1 p-b-20">
										Team
									</span>

									<span class="txt3">
										Ulfa Mulya
										<br>Azis ALvriyanto
										<br>Aditya Pratama Nugraha
										<br>Ya'kin Arif Prabowo
										<br>Khamdan Nahari
									</span>
								</div>
							</div>

							<div class="dis-flex size1 p-b-47">
								<div class="txt1 p-r-25">
									<span class="lnr lnr-envelope"></span>
								</div>

								<div class="flex-col size2">
									<span class="txt1 p-b-20">
										Dukungan Umum
									</span>

									<span class="txt3">
										16650028@student.uin-suka.ac.id
										<br>16650036@student.uin-suka.ac.id
										<br>16650037@student.uin-suka.ac.id
										<br>16650047@student.uin-suka.ac.id
										<br>16650068@student.uin-suka.ac.id
									</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	@include("template.parsial.kaki")


	@yield("tambah-js")
</body>
</html>