<header id="header">
	<nav>
		<div class="container">
			<a href="<?= base_url(); ?>" class="nav-logo">Pinjam Buku</a>
			<a v-for="item in items" v-bind:key="item.id" v-bind:href="item.link" v-bind:class="'nav-link'">{{ item.text }}</a>
			<div class="notif">
				<button type="button" @click="notif"><i class="fa fa-bell-o"></i></button>
				<div class="box-item">
					<a v-for="item in notifItems" :href="item.link" :key="item.id">{{ item.title }}</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="navbar">
		<div class="container">
			<a href="<?= base_url(); ?>" class="nav-logo">Pinjam Buku</a>
			<div class="right">
				<div class="notif-sm">
					<button type="button" @click="notifsm"><i class="fa fa-bell-o"></i></button>
					<div class="box-item-sm">
						<a v-for="item in notifItems" :href="item.link" :key="item.id">{{ item.title }}</a>
					</div>
				</div>
				<button v-on:click="coba" class="btn-toggle">
					<div class="line"></div>
					<div class="line"></div>
				</button>
			</div>
		</div>
	</div>
	<div class="nav">
		<a v-for="item in items" v-bind:key="item.id" v-bind:href="item.link" v-bind:class="'nav-item'">{{ item.text }}</a>
	</div>
</header>
<script>
	const baseLink = '<?= base_url(); ?>'

	var notifCon = true;

	var header = new Vue({
		el: '#header',
		data: {
			show: true,
			items: [
				{ link: baseLink+'beranda', text: 'Home' },
				{ link: baseLink+'pinjam', text: 'Pinjam' },
				{ link: baseLink+'tentang', text: 'Tentang Aplikasi' },
				{ link: baseLink+'kontak', text: 'Kontak' },
				{ link: baseLink+'logout', text: 'Logout' },
			],
			notifItems: [
				{ title: 'Buku node js tinggal 2 hari loh.', id: 0, link: baseLink+'pinjam' },
				{ title: 'Ada buku baru nieh mau pinjam nggak.', id: 1, link: baseLink+'tentang' },
				{ title: 'Ada event menarik lho untuk yang sering membaca.', id: 2, link: baseLink+'beranda' },
			]
		},
		methods: {
			coba: function () {
			this.show = !this.show;
				if (this.show) {
					document.querySelector('.nav').style.left = '-100%'
				} else {
					document.querySelector('.nav').style.left = '0%'
				}
			},
			notif: function () {
				notifCon = !notifCon;
				if (notifCon) {
					document.querySelector('.box-item').style.display = 'none';
				} else {
					document.querySelector('.box-item').style.display = 'block';
				}
			},
			notifsm: function () {
				notifCon = !notifCon;
				if (notifCon) {
					document.querySelector('.box-item-sm').style.display = 'none';
				} else {
					document.querySelector('.box-item-sm').style.display = 'block';
				}
			}
		}

	})
</script>
<div class="wrapper">