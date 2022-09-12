<?php include "inc/header.php"; ?>



  	<!-- All Books Section Start -->
  	<section class="all-books">
  		<div class="container">
  			<div class="row">
  				<!-- Books Cntent Start -->
  				<div class="col-lg-9">

  					<!-- Slider -->
  					<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/im1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/im2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/im3.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/im4.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  					<!-- Slider -->

  					<h2 class="collection-home">Our All Home Collection</h2>
  					<div class="row">

  						<?php 

  							$sql = "SELECT * FROM book WHERE status = 1 ORDER BY title ASC";
  							$allBooks = mysqli_query($db, $sql);
  							$totalBooks = mysqli_num_rows($allBooks);

  							if ( $totalBooks <= 0 )
  							{ ?>

  								<div class="alert alert-info">Oopss!!! No Book Found Yet.....</div>

  							<?php }
  							else {
  								while ( $row = mysqli_fetch_assoc($allBooks) ) 
  								{
  									$id 						= $row['id'];
						  			$title 						= $row['title'];
						  			$sub_title 					= $row['sub_title'];
						  			$description 				= $row['description'];
						  			$cat_id 					= $row['cat_id'];
						  			$author_name 				= $row['author_name'];
						  			$quantity 					= $row['quantity'];
						  			$image 						= $row['image'];
						  			$status 					= $row['status'];
						  			?>

						  				<div class="col-lg-4 book-item">
						  					<div class="book-thumbnail">
						  						<?php  
										      		if ( !empty($image) ) 
										      		{
										      			?>

										      			<img src="admin/dist/img/books/<?php echo $image; ?>" class="img-fluid">

										      			<?php
										      			
										      		}
										      		else
										      		{
										      			?>

										      			<img src="admin/dist/img/books/default.jpg" class="img-fluid">

										      			<?php
										      		}
										      	?>
										      	<div class="author-info">
										      		<h4><?php echo $author_name; ?></h4>
										      	</div>
						  					</div>

						  					<div class="book-info">
						  						<h4><?php echo $title; ?></h4>
						  						<p class="sub_title"><?php echo $sub_title; ?></p>
						  						<p class="quantity">Qunatity: <span><?php echo $quantity; ?></span></p>
						  						<p><?php echo substr($description, 0, 50); ?>... <a href=" details.php?b=<?php echo $id; ?>">Read More</a></p>

						  						<?php  
							  						if ( empty($_SESSION['email']) ) 
							  							{ ?>
							  							<a href="login.php" class="book-btn">Login to Reserve your Book</a>
							  						<?php }
							  						else { ?>
							  							<a href="booking.php?id=<?php echo $id; ?>" class="book-btn">Book Now</a>
							  						<?php }
							  					?>  							  						
						  					</div>

						  				</div>

						  			<?php
  								}
  							}

  						?>
  						<div class="col-lg-4">
  							
  						</div>
  					</div>
  					
  				</div>
  				<!-- Books Cntent End -->

  				<!-- Sidebar Start -->
  				<?php include "inc/sidebar.php"; ?>
  				<!-- Sidebar End -->
  			</div>
  		</div>
  	</section>
  	<!-- All Books Section End -->

<?php include "inc/footer.php"; ?>  	