<div class="auth-wrapper">
	<div class="form-wrapper">
		<h1 class="big-title">Sign In</h1>
		<?= $this->session->flashdata('message'); ?>
		<form action="<?= base_url('action/login') ?>" method="POST">
			<div class="input-group">
				<input type="text" name="username" placeholder="Masukkan Username" v-model="username" v-bind:autocomplete="'off'" class="form-control">
			</div>
			<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
			<!-- <small>{{ message(username) }}</small> -->
			<div class="input-group">
				<input type="password" name="password" placeholder="Masukkan password" v-model="password" class="form-control">
			</div>
			<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
			<!-- <small>{{ message(password) }}</small> -->
			<button v-bind:type="'submit'">Sign In</button>
		</form>
		<a href="<?= base_url('pages/forgot_password') ?>" style="float: left">Forgot password?</a>
		<a href="<?= base_url('register') ?>" style="float: right">Register</a>
	</div>
</div>