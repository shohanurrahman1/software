<?php 
	ob_start();
	session_start();
	include "admin/inc/db.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library Management System</title>

    <!-- Bootstrap CDN CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Cdn -->
    <script src="https://kit.fontawesome.com/0c66e46c25.js" crossorigin="anonymous"></script>
    <!-- JQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- Theme CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>
  	<!-- Header Section Start -->
  	<header>
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-12">
  					<!-- Nav Menu Start -->
  					<nav class="navbar navbar-expand-lg navbar-light">
					  <div class="container-fluid">
					    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="" class="logo"></a>

					    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					      <span class="navbar-toggler-icon"></span>
					    </button>

					    <!-- Menu Item Start -->
					    <div class="collapse navbar-collapse" id="navbarSupportedContent">
					      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					        <li class="nav-item">
					          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
					        </li>

					        <li class="nav-item">
					          <a class="nav-link active" aria-current="page" href="#foot">Contact</a>
					        </li>

					        <?php  
					        		if ( empty($_SESSION['user_id']) || empty($_SESSION['email']) )
					        		{ ?>
					        			<li class="nav-item">
								          <a class="nav-link active" aria-current="page" href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i>  Login</a>
								        </li>

								        <li class="nav-item">
								          <a class="nav-link active" aria-current="page" href="register.php">Register</a>
								        </li>
					        	<?php	}
					        	else{ ?>

					        			<li class="nav-item dropdown">
								          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								            <?php  
								                $user_id = $_SESSION['user_id'];
								                $query = "SELECT * FROM users WHERE user_id = '$user_id'";
								                $userData = mysqli_query($db, $query);
								                while ( $row = mysqli_fetch_assoc($userData) )
								                {
								                  $fullname = $row['fullname'];
								                  $image 		= $row['image'];
								                  
								                  	if ( !empty( $image ) )
									                  { ?>
									                    <img src="admin/dist/img/users/<?php echo $image; ?>" class="img-circle elevation-2" alt="User Image"> 
									                  <?php echo $fullname; }

									                  else
									                  { ?>
									                    <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
									                  <?php echo $fullname; }
								                 }
								            ?>
								          </a>
								          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								            <li><a class="dropdown-item" href="order-history.php">Booking Item List</a></li>
								            <li><a class="dropdown-item" href="#">Manage Profile</a></li>
								            <li><hr class="dropdown-divider"></li>
								            <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
								          </ul>
								        </li>

					        	<?php }
					        ?>
					        

					      </ul>					      
					    </div>
					    <!-- Menu Item End -->
					  </div>
					</nav>
					<!-- Nav Menu End -->
  				</div>
  			</div>
  		</div>
  	</header>
  	<!-- Header Section End -->