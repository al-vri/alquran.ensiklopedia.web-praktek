@extends("template.umum")

@section("judul", "Beranda")

@section("field")
<script type="text/javascript">
					var pencarian_background = [
							'bg-pencarian-01.jpg',
							'bg-pencarian-02.jpg',
							'bg-pencarian-03.jpg',
							'bg-pencarian-04.jpg',
							'bg-pencarian-05.jpg',
							'bg-pencarian-06.jpg',
							'bg-pencarian-07.jpg',
							'bg-pencarian-08.jpg',
							'bg-pencarian-09.jpg',
							'bg-pencarian-10.jpg',
					];

					setInterval(function() {
						var url=pencarian_background[Math.floor(Math.random() * pencarian_background.length)];

						document.getElementById("custom-background").style.backgroundImage = "url('/assets/gambar/"+url+"')";
					}, 50000);
				</script>

				<div id="custom-background">
					<section id="beranda">
						<div class="vertical-center">
							<div class="container-fluid text-center">
								<form method="POST" action="{{URL::to('/cari')}}">
									<div class="input-group">
										{{ csrf_field() }}
										<input type="text" class="form-control input-lg" placeholder="Cari..." name="katakunci"
											style="
												height: 60px;
												background: rgba(0,0,0,.2);
												color: #FFFFFF;
												font-size: 25px;
												padding-left: 25px;
												border: none;
												border-radius: 0;
    											box-shadow: none;
											" required>
										<span class="input-group-btn">
											<input type="submit" class="btn-lg"
												style="
													height: 60px;
													width: 60px;
													background-color: rgba(0,0,0,.2);
													background-image: url('/assets/gambar/ikon-pencarian.png');
													background-size: 40px;
													background-position: 5px 10px; 
													background-repeat: no-repeat;
													border: none;
													border-radius: 0;
	    											box-shadow: none;
												" value="">
										</span>
									</div>
								</form>
								<h5>Temukan hal menarik di sini.</h5>
							</div>
						</div>
					</section>
				</div>
@endsection()