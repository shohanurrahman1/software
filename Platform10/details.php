<?php include "inc/header.php"; ?>

	<!-- Book Details Section Start -->
  	<section class="all-books">
  		<div class="container">
  			<div class="row">
  				<!-- Books Details Start -->
  				<div class="col-lg-4">
  					<?php  
  						if ( isset( $_GET['b'] ) )
  						{
  							$bid = $_GET['b'];
  							$sql = "SELECT * FROM book WHERE id='$bid'";
  							$details = mysqli_query($db, $sql);
  							while ( $row = mysqli_fetch_assoc($details) )
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
				  					</div>

					  			<?php
  							}

  						}
  					?>
  				</div>
  				<div class="col-lg-5 book-details">
  					<h4><?php echo $title; ?></h4>
  					<p class="sub_title"><?php echo $sub_title; ?></p>
  					<h5 class="auther_name">Owner - <?php echo $author_name; ?></h5>
  					<p class="quantity">Qunatity: <span><?php echo $quantity; ?></span></p>
  					<p><?php echo $description; ?></p>

  					<?php  
  						if ( empty($_SESSION['email']) ) 
  							{ ?>
  							<a href="login.php" class="book-btn">Login to Reserve your Book</a>
  						<?php }
  						else { ?>
  							<a href="" class="book-btn">Book Now</a>
  						<?php }
  					?>  					
  				</div>
  				<!-- Books Details End -->

  				<!-- Sidebar Start -->
  				<?php include "inc/sidebar.php"; ?>
  				<!-- Sidebar End -->
  			</div>
  		</div>
  	</section>

<?php include "inc/footer.php"; ?>  