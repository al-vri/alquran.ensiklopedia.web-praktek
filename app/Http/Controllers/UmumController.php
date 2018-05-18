<?php
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use App\Http\Controllers\Controller;

	class UmumController extends Controller
	{
		public function cari(Request $request)
		{
			$katakunci = $request->input("katakunci");

			$ayat_s = DB::table("ayat")
									->join("surah", "ayat.surah", "=", "surah.id")
									->select("ayat.surah", "surah.nama_indonesia")
									->where("indonesia", "LIKE", "%".$katakunci."%")
									->orwhere("arabic", "LIKE", "%".$katakunci."%")
									->get()
									->toArray();

			$i = 0;
			foreach ($ayat_s as $ayat) {
				$surah[$i] = $ayat->surah;
				$i++;
			}

			return view("cari", [
				"katakunci" => $katakunci,
				"ayat_s" => $ayat_s,
				"jumlah_surah" => count(array_count_values($surah)),
			]);
		}

		public function cari_surah($surah_id, $katakunci)
		{
			$ayat_s = DB::table("ayat")
							->where("ayat.surah", $surah_id)
							->join("surah",
								"ayat.surah", "=", "surah.id")
							->join("audio",
								"ayat.id", "=", "audio.id")
							->select("ayat.*", "surah.nama_indonesia", "audio.namafile")
							->where("indonesia", "LIKE", "%".$katakunci."%")
							->orwhere("arabic", "LIKE", "%".$katakunci."%")
							->get()
							->toArray();

			return view("cari_surah", [
				"katakunci" => $katakunci,
				"ayat_s" => $ayat_s,
			]);
		}

		public function cari_semua($katakunci)
		{
			$ayat_s = DB::table("ayat")
									->join("surah",
										"ayat.surah", "=", "surah.id")
									->join("audio",
										"ayat.id", "=", "audio.id")
									->select("ayat.*", "surah.nama_indonesia", "audio.namafile")
									->where("indonesia", "LIKE", "%".$katakunci."%")
									->orwhere("arabic", "LIKE", "%".$katakunci."%")
									->get();


			return view("cari_semua", [
				"katakunci" => $katakunci,
				"ayat_s" => $ayat_s,
			]);
		}

		public function surah()
		{
			$surah_s = DB::table("surah")
									->join("surah_tempatturun", "surah.tempatturun", "=", "surah_tempatturun.id")
									->select("surah.*", "surah_tempatturun.nama")
									->orderBy("id", "ASC")
									->get();

			return view("surah", [
				"surah_s" => $surah_s
			]);
		}

		public function surah_surah_id($surah_id)
		{
			$surah_s = DB::table("surah")
									->join("ayat",
										"surah.id", "=", "ayat.surah")
									->join("surah_tempatturun",
										"surah.tempatturun", "=", "surah_tempatturun.id")
									->join("audio",
										"ayat.id", "=", "audio.id")
									->select("surah.*", "ayat.*","surah_tempatturun.nama", "audio.namafile")
									->where("surah.id", $surah_id)
									->get()
									->toArray();

			return view("surah_detail", [
							"surah_s" => $surah_s
			]);
		}

		public function tafsir($surah_id, $ayat)
		{

			$tafsir = DB::table("tafsir")
									->join("surah",
										"tafsir.surah", "=", "surah.id")
									->join("surah_tempatturun",
										"surah.tempatturun", "=", "surah_tempatturun.id")
									->join("ayat",
										"tafsir.id", "=", "ayat.id")
									->join("audio",
										"tafsir.id", "=", "audio.id")
									->select("tafsir.*", "surah.*", "ayat.*", "surah_tempatturun.nama", "audio.namafile")
									->where("tafsir.surah", $surah_id)
									->where("tafsir.ayat", $ayat)
									->get()
									->toArray();

			return view("tafsir", [
							"tafsir" => $tafsir["0"]
			]);
		}

		public function kontak(Request $request)
		{
			$nama		= $request->input("nama");
			$email		= $request->input("email");
			$telepon	= $request->input("telepon");
			$pesan		= $request->input("pesan");

			echo $nama;
		}
	}
?>