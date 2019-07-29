<div class="container">
	<div class="kontak">
		<?= $this->session->flashdata('message'); ?>
		<h1 class="med-title">Halaman Kontak</h1>
		<p>Silahkan tinggalkan pesan jika ada hal yang ingin disampaikan.</p>
		<div class="alert alert-danger">Mohon dengan bijak dalam menggunakan aplikasi ini.</div>
		<form action="<?= base_url('action/kontak'); ?>" method="POST">
			<div class="row">
				<div class="col-12">
					<label for="subjek">Subjek</label>
					<input type="text" name="subjek" placeholder="Masukkan subjek" class="form-control">
					<?= form_error('subjek', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col-12">
					<label for="message">Pesan</label>
					<textarea class="form-control" id="message" name="message" placeholder="Masukkan pesan"></textarea>
					<?= form_error('message', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col-12">
					<button class="btn btn-primary">Kirim</button>
				</div>
			</div>
		</form>
	</div>
</div>