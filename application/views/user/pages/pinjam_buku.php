<div class="container">
	<div class="pinjam">
		<h1 class="med-title">Halaman Pinjam Buku</h1>
		<p>Silahkan masukkan sesuai data pada buku.</p>
		<div class="alert alert-warning">Maksimal 7 hari peminjaman.</div>
		<form action="<?= base_url('action/pinjam'); ?>" method="POST">
			<div class="row">	
				<div class="col-6">					
					<label for="judul">Judul Buku</label>
					<input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul buku">
					<?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col-6">					
					<label for="code">Kode Buku</label>
					<input type="text" name="code" class="form-control" id="code" placeholder="Masukkan kode buku">
					<?= form_error('code', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col-12">
					<label for="batas">Batas Waktu Pengembalian</label>
					<input type="date" name="batas" class="form-control" id="batas">
					<?= form_error('batas', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col-12">
					<button class="btn btn-primary" type="submit">Pinjam</button>
				</div>
			</div>
		</form>
	</div>
</div>