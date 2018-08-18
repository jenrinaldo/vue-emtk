<template>
	<div class="m-fnt">
		
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Sejarah</h1>
		<h6 class="staggeredAnim content-caption">Himatekkom</h6>
		<div class="nav-tabs staggeredAnim">
			<p v-for="(tab, index) in tabs" v-on:click="tabactive = index" v-bind:class="{'active' : (tabactive == index)}">{{ tab.judul }}</p>
		</div>
		<div class="nav-tabs-content">
			<div class="main-article staggeredAnim" v-html="tabs[tabactive].content">

			</div>
		</div>
		
  		<div class="back-header"></div>
	</div>
</template>

<script>

	export default {
		data () {
			return {
				tabactive : 0,
				tabs : [
					{
						judul : 'Pembentukan',
						content : '<p>HIMASISKOM (yang sekarang disebut HIMATEKKOM) dibentuk melalui Kongres Pembentukan Himpunan Sistem Komputer (KPHMSK). Resmi menjadi lembaga kedaulatan mahasiswa Sistem Komputer pada tanggal 22 Maret 2014.  HIMASISKOM dibentuk bersamaan dengan Eksekutif Mahasiswa Sistem Komputer (EMSK) dan Forum Perwakilan Angkatan Sistem Komputer (FPASK) sebagai lembaga yang dinaungi. EMSK sebagai lembaga yang memiliki fungsi eksekutif dan FPASK sebagai lembaga yang memiliki fungsi legislatif.</p>'
					},
					{
						judul : 'Periode 2014/2015',
						content : '<p>Pada awal aktifnya EMSK pemilihan ketua dilakukan musyawarah pada sidang KPHMSK dengan beberapa calon, sedangkan FPASK terdiri dari beberapa perwakilan angkatan 2011 dan 2012. Pada periode awal EMSK di pimpin oleh Rizky Budi Setiawan dari angkatan 2011 yang terpilih melalui KPHMSK, sedangkan FPASK dikoordinir oleh Mega Sukma Nur Saputra dari angkatan 2011 pada Jum’at 28 Februari 2014. Anggota EMSK merupakan hak prerogatif dari ketua EMSK itu sendiri, sedangkan anggota FPASK didapat dari pengajuan masing – masing angkatan.</p><p>Pada periode pertama, jumlah jajaran EMSK sebanyak 53 orang dalam peranan ketua umum, wakil, bendahara, ketua departemen dan staff. Anggota FPASK berjumlah 7 orang, dari angkatan 2011 4 orang dan dari angkatan 2012 3 orang. Dalam EMSK terdapat 5 departemen yaitu Administrasi, Kewirausahaan (KWU), Informasi dan Komunikasi (INFOKOM), Advokasi Kesejahteraan Mahasiswa (ADVOKESMA), dan Pengembangan Sumber Daya Mahasiswa (PSDM).</p>'
					},
					{
						judul : 'Periode 2015/2016',
						content : '<p>Pada Periode kedua, EMSK di pimpin oleh Rahmat Eko “Gopras” Prasetyo angkatan 2012 sedangkan FPASK dikoordinir oleh Muhammad Wildan “Aang” angkatan 2012. Jumlah jajaran EMSK periode kedua lebih banyak dari peride sebelumnya yaitu sebanyak 68 orang dalam peranan ketua umum, wakil, bendahara, ketua departemen dan staff. Begitu pula anggota FPASK yaitu berjumlah 13 orang sebagai perwakilan dari 3 angkatan terakhir, yakni 2012, 2013 dan 2014. Dalam EMSK periode kedua terdapat 1 departemen baru yaitu Sosial Masyarakat. Sehingga total departemen menjadi 6 yaitu departemen Administrasi, Kewirausahaan (KWU), Informasi dan Komunikasi (INFOKOM), Advokasi Kesejahteraan Mahasiswa (ADVOKESMA), Pengembangan Sumber Daya Mahasiswa (PSDM), dan Sosial Masyarakat (SOSMA).</p>'
					},
					{
						judul : 'Periode 2016/2017',
						content : '<p>Pada Periode ketiga, EMSK di pimpin oleh Ayu Samura angkatan 2013 sedangkan FPASK dikoordinir oleh Oktaviany Setiawati angkatan 2013. Jumlah jajaran EMSK periode ketiga lebih sedikit dibanding periode sebelumnya yakni sebanyak 51 orang. Begitu pula anggota FPASK yaitu berjumlah 7 orang dengan rincian 3 orang dari angkatan 2013 dan 4 orang dari angkatan 2014. Dalam EMSK periode ketiga perubahan nama serta fungsi Bendahara menjadi Bendahara &amp; Audit dan terdapat 1 departemen baru yaitu Birokrasi Instansi. Sehingga total departemen menjadi 7 yaitu departemen Administrasi, Birokrasi Instansi (BI), Kewirausahaan (KWU), Informasi dan Komunikasi (INFOKOM), Advokasi Kesejahteraan Mahasiswa (ADVOKESMA), Pengembangan Sumber Daya Mahasiswa (PSDM), dan Sosial Masyarakat (SOSMA). Pada periode ini pula, terjadi perubahan nama himpunan serta alat kelengkapan organisasinya. HIMASISKOM (Himpunan Mahasiswa Sistem Komputer) menjadi HIMATEKKOM (Himpunan Mahasiswa Teknik Komputer), MKBMSK (Musyawarah Keluarga Besar Mahasiswa Sistem Komputer) menjadi MKBMTK (Musyawarah Keluarga Besar Mahasiswa Teknik Komputer), EMSK (Eksekutif Mahasiswa Sistem Komputer) menjadi EMTK (Eksekutif Mahasiswa Teknik Komputer), FPASK (Forum Perwakilan Angkatan Sistem Komputer) menjadi FPATK (Forum Perwakilan Angkatan Teknik Komputer).</p>'
					},
					{
						judul : 'Periode 2017/2018',
						content : '<p>Pada Periode keempat, EMTK di pimpin oleh Muhammad Taufiq Firmansyah angkatan 2014 dan FPATK dikoordinir oleh Muh. Saudi angkatan 2014. Jumlah jajaran EMTK periode keempat lebih banyak dibanding periode sebelumnya yakni sebanyak 55 orang. Anggota FPATK yaitu berjumlah 7 orang dengan rincian 3 orang dari angkatan 2014 dan 4 orang dari angkatan 2016. Dalam EMTK periode keempat terdapat penghapusan 1 departemen lama yaitu Birokrasi Instansi dan perubahan nama serta fungsi departemen Administrasi menjadi Administrasi dan Kesekretariatan (ADKEST). Sehingga total departemen menjadi 6 yaitu departemen Administrasi dan Kesekretariatan (ADKEST), Kewirausahaan (KWU), Informasi dan Komunikasi (INFOKOM), Advokasi Kesejahteraan Mahasiswa (ADVOKESMA), Pengembangan Sumber Daya Mahasiswa (PSDM), dan Sosial Masyarakat (SOSMA). Pada periode ini pula terdapat implementasi fungsi "divisi" dalam naungan departemen, dengan rincian divisi Olahraga dan Kesenian (ORKES), divisi Pendidikan dan Pengembangan Inovasi Kreasi (PPIK) dalam naungan departemen PSDM dan divisi Internal, divisi Eksternal, divisi Multimedia dalam naungan departemen INFOKOM</p>'
					}
				]
			}
		},
		mounted () {
			setTimeout(function(){
				TweenMax.staggerTo('.staggeredAnim', .8, {
					x : 0,
					opacity: 1,
					ease: Power2.easeOut
				}, .1);
			},600)
		},
	    head: {
	      title: {
	        inner : 'Sejarah'
	      }
	    }
	}
</script>

<style scoped>
</style>