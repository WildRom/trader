<?php

require_once 'inc/config.php';
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.js"></script>
	<title>Register form</title>
</head>

<body>
	<div class="container-fluid">
		<!-- row -->
		<div class="row">

			<!-- image container -->
			<div class="col-lg-6 col-md-6 d-none d-md-block image-container">
			</div>
			<!-- end image container -->


			<!-- form container -->
			<div class="col-lg-6 col-md-6 form-container">


				<!-- form box -->
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mb-3">
						<img src="img/ship2.png" alt="logo" width="300">
					</div>
					<div class="heading mb-4">
						<h4 class="ltu">Sukurkite akauntą</h4>
						<h4 class="eng">Create your an account</h4>
					</div>
					<!-- forma -->
					<form action="game.php" method="post">
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input type="text" name="user_nick" placeholder="Enter nick..." required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" placeholder="Email address..." required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Password..." required>
						</div>
						<div class="row mb-3">
							<div class="col-12 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" id="cb1" name="cb1">
									<label for="cb1" class="cutom-control-label text-white ltu">Sutinku su sąlygomis</label>
									<label for="cb1" class="cutom-control-label text-white eng">I agree with terms & conditions</label>
								</div>
							</div>
						</div>
						<div class="text-left mb-3">
							<input type="hidden" name="new_game" value="true">
							<button type="submit" name="register" value="register" class="btn ltu">Kurti personažą</button>
							<button type="submit" name="register" value="register" class="btn eng">Create account</button>
						</div>
						<div style="color: #777" class="ltu">Jau prisiregistravęs?
							<a href="index.php" class="login-link">Junkis</a>
						</div>
						<div style="color: #777" class="eng">Already have an account?
							<a href="index.php" class="login-link">Login here</a>
						</div>
					</form><!-- end  forma -->
				</div><!-- end form box -->
			</div><!-- end form container -->
		</div><!-- .row end -->
	</div><!-- container -->

	<script src=" js/main.js"></script>
</body>

</html>