<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('/resources/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form method="POST" action="<?= base_url('Auth/login_proses') ?>" class="login100-form validate-form">
					<span class="login100-form-logo">
						<img src="/resources/logo/android-icon-144x144.png" class="shadow-lg" alt="" height="144" width="144">
					</span>

					<span class="login100-form-title p-b-34 p-t-30">
						LaporPak
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="masukkan nomor induk keluarga. . .">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="masukkan password anda. . ." required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<!--<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" required>
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>-->

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


</body>