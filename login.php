<?php include "header.php";
// $hash = password_hash('Rajat@321', PASSWORD_DEFAULT);
// echo $hash;

if (!empty($_SESSION['userId'])) {
    echo '<script type="text/javascript">window.location.replace("index.php");</script>';
    // header('Location: /index.php');
}

$username = '';
$password = '';
if (isset($_POST['submit_login'])) {
    $username = secureSuperGlobal($_POST['username']);
    $password = secureSuperGlobal($_POST['password']);
    $save = true;
    // if (!is_valid_email($email)) {
    //     echo '<script type="text/javascript">alert("Please enter valid Email");</script>';
    //     $save = false;
    // }
    if ($password == '') {
        echo '<script type="text/javascript">alert("Please Enter Password");</script>';
        $save = false;
    }
    if ($username == '') {
        echo '<script type="text/javascript">alert("Please Enter Username");</script>';
        $save = false;
    }

    if ($save == true) {
        $stmt = $pdo->prepare("SELECT * FROM tbl_users WHERE user_login = ?");
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch();

        // echo '<script type="text/javascript">console.log(' . $user . ');</script>';
        if ($user && password_verify($password, $user['user_pass'])) {
            echo '<script type="text/javascript">alert("Valid");</script>';
            echo '<script type="text/javascript">window.location.replace("index.php");</script>';
        } else {
            echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
        }
    }
}
?>

<body class="login">
	<!-- Logo -->
	<div class="logo">
		<img src="assets/img/logo.png" alt="logo" />
		<strong>ME</strong>LON
	</div>
	<!-- /Logo -->

	<!-- Login Box -->
	<div class="box">
		<div class="content">
			<!-- Login Formular -->
			<form class="form-vertical login-form" method="post">
				<!-- Title -->
				<h3 class="form-title">Sign In to your Account</h3>

				<!-- Error Message -->
				<div class="alert fade in alert-danger" style="display: none;">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Enter any username and password.
				</div>

				<!-- Input Fields -->
				<div class="form-group">
					<!--<label for="username">Username:</label>-->
					<div class="input-icon">
						<i class="icon-user"></i>
						<input id="username" type="text" name="username" class="form-control" placeholder="Username"
							value="<?php echo $username; ?>" autofocus="autofocus" data-rule-required="true"
							data-msg-required="Please enter your username." />
					</div>
				</div>
				<div class="form-group">
					<!--<label for="password">Password:</label>-->
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input id="password" type="password" name="password" class="form-control" placeholder="Password"
						value="<?php echo $password; ?>" data-rule-required="true" data-msg-required="Please enter your password." />
					</div>
				</div>
				<!-- /Input Fields -->

				<!-- Form Actions -->
				<div class="form-actions">
					<label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Remember
						me</label>
					<button type="submit" name="submit_login" class="submit btn btn-primary pull-right">
						Sign In <i class="icon-angle-right"></i>
					</button>
				</div>
			</form>
			<!-- /Login Formular -->

			<!-- Register Formular (hidden by default) -->
			<form class="form-vertical register-form" action="index.html" method="post" style="display: none;">
				<!-- Title -->
				<h3 class="form-title">Sign Up for Free</h3>

				<!-- Input Fields -->
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-user"></i>
						<input type="text" name="username" class="form-control" placeholder="Username"
							autofocus="autofocus" data-rule-required="true" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input type="password" name="password" class="form-control" placeholder="Password"
							id="register_password" data-rule-required="true" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-ok"></i>
						<input type="password" name="password_confirm" class="form-control"
							placeholder="Confirm Password" data-rule-required="true"
							data-rule-equalTo="#register_password" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-envelope"></i>
						<input type="text" name="Email" class="form-control" placeholder="Email address"
							data-rule-required="true" data-rule-email="true" />
					</div>
				</div>
				<div class="form-group spacing-top">
					<label class="checkbox"><input type="checkbox" class="uniform" name="remember"
							data-rule-required="true" data-msg-required="Please accept ToS first."> I agree to the <a
							href="javascript:void(0);">Terms of Service</a></label>
					<label for="remember" class="has-error help-block" generated="true" style="display:none;"></label>
				</div>
				<!-- /Input Fields -->

				<!-- Form Actions -->
				<div class="form-actions">
					<button type="button" class="back btn btn-default pull-left">
						<i class="icon-angle-left"></i> Back</i>
					</button>
					<button type="submit" class="submit btn btn-primary pull-right">
						Sign Up <i class="icon-angle-right"></i>
					</button>
				</div>
			</form>
			<!-- /Register Formular -->
		</div> <!-- /.content -->

		<!-- Forgot Password Form -->
		<div class="inner-box">
			<div class="content">
				<!-- Close Button -->
				<i class="icon-remove close hide-default"></i>

				<!-- Link as Toggle Button -->
				<a href="#" class="forgot-password-link">Forgot Password?</a>

				<!-- Forgot Password Formular -->
				<form class="form-vertical forgot-password-form hide-default" action="login.html" method="post">
					<!-- Input Fields -->
					<div class="form-group">
						<!--<label for="email">Email:</label>-->
						<div class="input-icon">
							<i class="icon-envelope"></i>
							<input type="text" name="email" class="form-control" placeholder="Enter email address"
								data-rule-required="true" data-rule-email="true"
								data-msg-required="Please enter your email." />
						</div>
					</div>
					<!-- /Input Fields -->

					<button type="submit" class="submit btn btn-default btn-block">
						Reset your Password
					</button>
				</form>
				<!-- /Forgot Password Formular -->

				<!-- Shows up if reset-button was clicked -->
				<div class="forgot-password-done hide-default">
					<i class="icon-ok success-icon"></i>
					<!-- Error-Alternative: <i class="icon-remove danger-icon"></i> -->
					<span>Great. We have sent you an email.</span>
				</div>
			</div> <!-- /.content -->
		</div>
		<!-- /Forgot Password Form -->
	</div>
	<!-- /Login Box -->

	<!-- Single-Sign-On (SSO) -->
	<!-- <div class="single-sign-on">
		<span>or</span>

		<button class="btn btn-facebook btn-block">
			<i class="icon-facebook"></i> Sign in with Facebook
		</button>

		<button class="btn btn-twitter btn-block">
			<i class="icon-twitter"></i> Sign in with Twitter
		</button>

		<button class="btn btn-google-plus btn-block">
			<i class="icon-google-plus"></i> Sign in with Google
		</button>
	</div> -->
	<!-- /Single-Sign-On (SSO) -->

	<!-- Footer -->
	<!-- <div class="footer">
		<a href="#" class="sign-up">Don't have an account yet? <strong>Sign Up</strong></a>
	</div> -->
	<!-- /Footer -->
</body>

</html>
