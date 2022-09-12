<?php include "inc/header.php"; ?>

	<section class="login-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-md-3">
					<h2>Member Registration</h2>
					<form action="" method="POST">
						<div class="mb-3">
							<label>Full Name</label>
							<input type="text" name="name" class="form-control" placeholder="Full Name" required="required" autocomplete="off">
						</div>

						<div class="mb-3">
							<label>Email Address</label>
							<input type="email" name="email" class="form-control" placeholder="Email Address" required="required" autocomplete="off">
						</div>

						<div class="mb-3">
							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Your Password" required="required">
						</div>

						<div class="mb-3">
							<label>Re-Type Password</label>
							<input type="password" name="repassword" class="form-control" placeholder="Re-Type Your Password" required="required">
						</div>

						<div class="mb-3">
							<input type="submit" name="register" value="Signup" class="btn btn-success btn-block">
						</div>
					</form>

					<?php  
						if ( isset($_POST['register']) )
						{
							$name 		= $_POST['name'];
							$email 		= $_POST['email'];
							$password 	= $_POST['password'];
							$repass 	= $_POST['repassword'];

							if ( $password == $repass )
							{
								$hassedPass = sha1($password);
								$sql = "INSERT INTO users (fullname, email, password, join_date) VALUES ( '$name', '$email', '$hassedPass', now() )";
								$registerUser = mysqli_query($db, $sql);

								if ( $registerUser ) 
								{
									header("Location: login.php");
								}
								else
								{
									die("Database Error. " . mysqli_error($db));
								}
							}
						}
					?>

					<div class="login-option">
						<ul>
							<li>Already a Member? <a href="login.php">Signin Here</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include "inc/footer.php"; ?>