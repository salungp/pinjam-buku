<div class="auth-wrapper">
	<div class="form-wrapper">
		<h1 class="big-title">Register</h1>
		<?= $this->session->flashdata('message'); ?>
		<form action="<?= base_url('action/register') ?>" method="POST">
			<div class="row">
				<div class="col-6">
					<div class="input-group">
						<input type="text" name="name" placeholder="Masukkan Nama" v-bind:autocomplete="'off'" class="form-control">
					</div>
					<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="text" name="email" placeholder="Masukkan Email" v-bind:autocomplete="'off'" class="form-control">
					</div>
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="input-group">
				<input type="text" name="username" placeholder="Masukkan Username" v-bind:autocomplete="'off'" class="form-control">
			</div>
			<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
			<!-- <small>{{ message(username) }}</small> -->
			<div class="input-group">
				<input type="password" name="password" placeholder="Masukkan Password" class="form-control">
			</div>
			<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
			<!-- <small>{{ message(password) }}</small> -->
			<button type="submit">Register</button>
		</form>
		Sudah punya akun <a href="<?= base_url('login') ?>">Sign In</a>
	</div>
</div>