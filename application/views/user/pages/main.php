<div class="container">
	<div class="main">
		<?= $this->session->flashdata('message'); ?>
		<h1 class="med-title">Welcome <b class="med-title"><?= user['name']; ?></b></h1>
		<p class="title-text">
			Selamat datang di aplikasi pinjam buku. Aplikasi ini dibuat untuk mengatasi masalah saat pinjam buku yang masih menggunakan kertas.
		</p>
		<div class="alert alert-warning">
			Peringatan jika telat dalam pengembalian buku akan dikenakan <b>denda</b>.
		</div>
		<h1 class="med-title">Daftar buku yang dipinjam</h1>
		<a class="btn btn-primary" href="<?= base_url('pinjam') ?>">Pinjam Buku</a>
		<div class="box-table">
			<table cellspacing="0">
				<tr class="tr-header">
					<th>No</th>
					<th>Judul Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Aksi</th>
				</tr>
				<tr v-for="item in buku" v-bind:key="item.id">
					<td>{{ item.id }}</td>
					<td>{{ item.judul }}</td>
					<td>{{ item.createdAt }}</td>
					<td>{{ item.updatedAt }}</td>
					<td>
						<a v-bind:href="'<?= base_url('kembalikan/') ?>'+item.id" class="btn btn-primary">Kembalikan</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script>
	new Vue({
		el: '.main',
		data: {
			buku: [
				<?php foreach ($buku as $item) : ?>
					{ id: '<?= $item['id']; ?>', judul: '<?= $item['judul'];  ?>', createdAt: '<?= date('d M Y', strtotime($item['created_at'])); ?>', updatedAt: '<?= date('d M Y', strtotime($item['updated_at'])); ?>' },
				<?php endforeach; ?>
			]
		}
	})
</script>