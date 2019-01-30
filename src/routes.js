import Home from './components/contents/Home.vue'

import PSekilas from './components/contents/PSekilas.vue'
import PSejarah from './components/contents/PSejarah.vue'
import PTujuan from './components/contents/PTujuan.vue'
import PJargon from './components/contents/PJargon.vue'
import PStruktur from './components/contents/PStruktur.vue'

import PEmtk from './components/contents/PEmtk.vue'
import PFpatk from './components/contents/PFpatk.vue'

import PEmtkTugas from './components/contents/PEmtkTugas.vue'
import PEmtkVisi from './components/contents/PEmtkVisi.vue'
import PEmtkStruktur from './components/contents/PEmtkStruktur.vue'
import Jajaran from './components/contents/Jajaran.vue'

import PFpatkTugas from './components/contents/PFpatkTugas.vue'
import PFpatkVisi from './components/contents/PFpatkVisi.vue'
import PFpatkStruktur from './components/contents/PFpatkStruktur.vue'

import Sekilasprodi from './components/contents/Sekilasprodi.vue'

import Blog from './components/contents/Blog.vue'
import Blogread from './components/contents/Blogread.vue'

import Pengumuman from './components/contents/Pengumuman.vue'
import Pengread from './components/contents/Pengread.vue'

import Beasiswa from './components/contents/Beasiswa.vue'
import BeasiswaRead from './components/contents/Bearead.vue'

import Tautanaktif from './components/contents/Tautanaktif.vue'

import Departemen from './components/contents/Departemen.vue'
import Nondepartemen from './components/contents/Nondepartemen.vue'
import Legislatif from './components/contents/Legislatif.vue'

import DepartProps from './departemen-props'

export default [
	{
		path: '/',
		component: Home
	},
	{
		path: '/profil/sekilas',
		component: PSekilas
	},
	{
		path: '/profil/sejarah',
		component: PSejarah
	},
	{
		path: '/profil/tujuan-fungsi',
		component: PTujuan
	},
	{
		path: '/profil/lambang-jargon',
		component: PJargon
	},
	{
		path: '/profil/struktur',
		component: PStruktur
	},
	{
		path: '/sekilas-prodi',
		component: Sekilasprodi
	},
	{
		path: '/emtk/sekilas',
		component: PEmtk
	},
	{
		path: '/emtk/tugas-wewenang',
		component: PEmtkTugas
	},
	{
		path: '/emtk/visi-misi',
		component: PEmtkVisi
	},
	{
		path: '/emtk/struktur',
		component: PEmtkStruktur
	},
	{
		path: '/emtk/jajaran',
		component: Jajaran
	},
	{
		path: '/emtk/ketua',
		component: Nondepartemen,
		props: DepartProps.ketua
	},
	{
		path: '/emtk/sekben',
		component: Nondepartemen,
		props: DepartProps.sekben
	},
	{
		path: '/emtk/adkest',
		component: Departemen,
		props: DepartProps.adkest
	},
	{
		path: '/emtk/advokesma',
		component: Departemen,
		props: DepartProps.advokesma
	},
	{
		path: '/emtk/infokom',
		component: Departemen,
		props: DepartProps.infokom
	},
	{
		path: '/emtk/kwu',
		component: Departemen,
		props: DepartProps.kwu
	},
	{
		path: '/emtk/psdm',
		component: Departemen,
		props: DepartProps.psdm
	},
	{
		path: '/emtk/sosma',
		component: Departemen,
		props: DepartProps.sosma
	},
	{
		path: '/fpatk/sekilas',
		component: PFpatk
	},
	{
		path: '/fpatk/tugas-wewenang',
		component: PFpatkTugas
	},
	{
		path: '/fpatk/visi-misi',
		component: PFpatkVisi
	},
	{
		path: '/fpatk/struktur',
		component: PFpatkStruktur
	},
	{
		path: '/fpatk/jajaran',
		component: Legislatif,
		props: DepartProps.fpatk
	},
	{
		path: '/artikel',
		component: Blog
	},
	{
		path: '/artikel/:link',
		component: Blogread,
		props: true
	},
	{
		path: '/pengumuman',
		component: Pengumuman
	},
	{
		path: '/pengumuman/:link',
		component: Pengread,
		props: true
	},
	{
		path: '/beasiswa',
		component: Beasiswa
	},
	{
		path: '/beasiswa/:link',
		component: BeasiswaRead,
		props: true
	},
	{
		path: '/tautan-aktif',
		component: Tautanaktif
	}
]