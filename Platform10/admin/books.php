<?php include "inc/header.php"; ?>

	<!-- Content Wrapper Start -->
  	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Book's Management</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	              <li class="breadcrumb-item active">Book's Management</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      	<div class="container-fluid">
		        <div class="row">
		          <div class="col-12 col-sm-12 col-md-12">

		          	<?php  

		          		// Ternary Condition [ Condition ? True : False ]
		          		$do = isset( $_GET['do'] ) ? $_GET['do'] : "Manage"; 

		          		
		          		// All users Manage page
		          		if ( $do == "Manage" )
		          		{
		          			?>

		          		<div class="card">
					        <div class="card-header">
					            <h3 class="card-title">Manage All Books</h3>

					            <div class="card-tools">
					                <button type="button" class="btn btn-tool" data-card-widget="collapse">
					                <i class="fas fa-minus"></i>
					                </button>
					            </div>
					        </div>

					        <div class="card-body">

					        	<table class="table table-dark table-striped table-hover table-bordered">
								  <thead>
								    <tr>
								      <th scope="col">#Sl.</th>
								      <th scope="col">Thumbnail</th>
								      <th scope="col">Title</th>
								      <th scope="col">Sub Title</th>
								      <th scope="col">Author Name</th>
								      <th scope="col">Category Name</th>
								      <th scope="col">Quantity</th>
								      <th scope="col">Status</th>
								      <th scope="col">Action</th>
								    </tr>
								  </thead>

								  <tbody>

								  	<?php  

								  		$sql = "SELECT * FROM book ORDER BY title ASC";
								  		$allData = mysqli_query( $db, $sql );

								  		$numofBooks = mysqli_num_rows($allData);

								  		if ( $numofBooks == 0 )
								  		{ ?>

								  			<div class="alert alert-info">
								  				Oopps!!! No Book Found in our Library. Please Add a Book First.
								  			</div>

								  		<?php }
								  		else
								  		{

								  			$i = 0;

								  		while ( $row = mysqli_fetch_assoc( $allData ) )
								  		{
								  			$id 								= $row['id'];
								  			$title 							= $row['title'];
								  			$sub_title 					= $row['sub_title'];
								  			$description 				= $row['description'];
								  			$cat_id 						= $row['cat_id'];
								  			$author_name 				= $row['author_name'];
								  			$quantity 					= $row['quantity'];
								  			$image 							= $row['image'];
								  			$status 						= $row['status'];
								  			$i++;
								  			?>

								  			<tr>
										      <th scope="row"><?php echo $i; ?></th>
										      <td>
										      	
										      	<?php  
										      		if ( !empty($image) ) 
										      		{
										      			?>

										      			<img src="dist/img/books/<?php echo $image; ?>" width="35">

										      			<?php
										      			
										      		}
										      		else
										      		{
										      			?>

										      			<img src="dist/img/books/default.jpg" width="35">

										      			<?php
										      		}
										      	?>

										      </td>
										      <td><?php echo $title; ?></td>
										      <td><?php echo $sub_title; ?></td>
										      <td><?php echo $author_name; ?></td>
										      <td>
										      	<?php
										      	 		$sql = "SELECT * FROM category WHERE cat_id='$cat_id'";
										      	 		$categoryName = mysqli_query($db, $sql);

										      	 		while ( $row = mysqli_fetch_assoc($categoryName) ) 
										      	 		{
										      	 			$cat_id 		= $row['cat_id'];
										      	 			$cat_name 	= $row['cat_name'];
										      	 			?>
										      	 			<span class="badge badge-info"><?php echo $cat_name; ?></span>
										      	 		<?php }
										      	 ?>										      		
										      	</td>
										      <td><?php echo $quantity; ?></td>										      
										      <td>
										      	<?php  
											      	if ( $status == 2 )
											      	{
											      	?>
											      		<span class="badge badge-danger">InActive</span>

											      	<?php

											      	}
											      	else if( $status == 1 )
											      	{
											      	?>
											      	<span class="badge badge-success">Active</span>

											      	<?php

											      	}
											    ?>
										      </td>
										      <td>
		<div class="table-action">
		<ul>
		    <li><a href="books.php?do=Edit&uid=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></li>

		    <li><a href="" data-toggle="modal" data-target="#deluser<?php echo $user_id; ?>"><i class="fa fa-trash"></i></a></li>
		</ul>

		<div class="modal fade" id="deluser<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do You Confirm This Patent Category?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-buttons">
        	<ul>
        		<li>
        			<a href="users.php?do=Delete&user_id=<?php echo $user_id; ?>" class="btn btn-danger">Confirm</a>
        		</li>
        		<li>
        			<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        		</li>
        	</ul>
        </div>
      </div>
    </div>
  </div>
</div>
	</div>
										      </td>
										    </tr>

								  			<?php
								  		}

								  		}

								  		
								  	?>
								    

								
								  </tbody>
								</table>

					        </div>
					    </div>

		          		<?php
		          		}


		          		// This is Create new users HTML page
		          		else if ( $do == "Add" )
		          		{ ?>

		          			<div class="card">
							    <div class="card-header">
							        <h3 class="card-title">Register a New Book</h3>
							    </div>

							    <div class="card-body">

							    	<form action="books.php?do=Store" method="POST" enctype="multipart/form-data">
							    		<div class="row">
							    			<div class="col-lg-6">
							    				<div class="form-group">
									    			<label>Title</label>
									    			<input type="text" name="title" class="form-control" placeholder="Title of the Book..." required="required" autocomplete="off">
									    		</div>

									    		<div class="form-group">
									    			<label>Sub Title</label>
									    			<input type="text" name="sub_title" class="form-control" placeholder="Sub Title..." required="required" autocomplete="off">
									    		</div>

									    		<div class="form-group">
									    			<label>Author Name</label>
									    			<input type="text" name="author" class="form-control" placeholder="Name of the Author..." required="required" autocomplete="off">
									    		</div>

									    		<div class="form-group">
									    			<label>Quantity</label>
									    			<input type="text" name="quantity" class="form-control" placeholder="Quantity..." required="required" autocomplete="off">
									    		</div>

									    		<div class="form-group">
									    			<label>Category Name</label>
									    			<select class="form-control" name="cat_id">
									    				<option>Please select the Category or Sub Category Name</option>

									    				<?php  
									    						$sql = "SELECT * FROM category WHERE is_parent = 0 ORDER BY cat_name ASC";
									    						$parentCat = mysqli_query($db, $sql);

									    						while ( $row = mysqli_fetch_assoc($parentCat) ) {
									    							$p_cat_id  			= $row['cat_id'];
			  														$p_cat_name  		= $row['cat_name'];
			  														?>
			  														<option value="<?php echo $p_cat_id; ?>"><?php echo $p_cat_name; ?></option>
									    					
									    					<?php 

									    						$query = "SELECT * FROM category WHERE is_parent = '$p_cat_id' ORDER BY cat_name ASC";
									    						$childCat = mysqli_query($db, $query);

									    						while ( $row = mysqli_fetch_assoc($childCat) ) 
									    						{
									    							$c_cat_id  			= $row['cat_id'];
			  														$c_cat_name  		= $row['cat_name'];
			  														?>

			  														<option value="<?php echo $c_cat_id; ?>"> -- <?php echo $c_cat_name; ?></option>

									    						<?php }

									    					}
									    				?>

									    			</select>
									    		</div>

									    		<div class="form-group">
									    			<label>Status</label>
									    			<select class="form-control" name="status">
									    				<option value="1">Please Select User Status</option>
									    				<option value="1">Active</option>
									    				<option value="2">InActive</option>
									    			</select>
									    		</div>
									
							    			</div>

							    			<div class="col-lg-6">
							    				<div class="form-group">
									    			<label>Description</label>
									    			<textarea id="description" name="description" class="form-control" rows="5"></textarea>
									    		</div>

									    		

									    		<div class="form-group">
									    			<label>Thumbnail Picture</label>
									    			<input type="file" name="image" class="form-control-file">
									    		</div>

									    		<div class="form-group">
									    			<input type="submit" name="addBook" class="btn btn-success" value="Register the Book">
									    		</div>
							    			</div>
							    		</div>
							    	</form>

								</div>
							</div>
		          			
		          			
		          		<?php }


		          		// This Store page will Store the new users data into the database
		          		else if ( $do == "Store" )
		          		{
		          			if ( isset($_POST['addBook']) )
		          			{
		          				$title 							= mysqli_real_escape_string($db, $_POST['title']);
		          				$sub_title 					= mysqli_real_escape_string($db, $_POST['sub_title']);
		          				$author 						= $_POST['author'];
		          				$quantity 					= $_POST['quantity'];
		          				$cat_id 						= $_POST['cat_id'];
		          				$description 				= mysqli_real_escape_string($db, $_POST['description']);
		          				$status 						= $_POST['status'];

		          				$image 							= $_FILES['image']['name']; //HTML form (image)(file name)
		          				$image_temp					= $_FILES['image']['tmp_name'];

		          				if ( !empty($image) )
		          					{
				          				$image_name		= rand(1, 999999) . '_' . $image;
				          				move_uploaded_file($image_temp, "dist/img/books/$image_name");

				          				$sql = "INSERT INTO book (title,	sub_title,	description,	cat_id,	author_name,	quantity,	image,	status) VALUES ('$title', '$sub_title', '$description', '$cat_id', '$author', '$quantity', '$image_name', '$status')";

				          				$registerBook = mysqli_query($db, $sql);

				          				if ( $registerBook )
				          				{
				          					header("Location: books.php?do=Manage");
				          				}
				          				else
				          				{
				          					die("MySQLi Error." . mysqli_error());
				          				}
		          					}
		          					else
		          					{
		          							$sql = "INSERT INTO book (title,	sub_title,	description,	cat_id,	author_name,	quantity,	status) VALUES ('$title', '$sub_title', '$description', '$cat_id', '$author', '$quantity', '$status')";

				          				$registerBook = mysqli_query($db, $sql);

				          				if ( $registerBook )
				          				{
				          					header("Location: books.php?do=Manage");
				          				}
				          				else
				          				{
				          					die("MySQLi Error." . mysqli_error());
				          				}
		          					}
		          				}
		          		}

		          		// This Edit page will show the update users info in a HTML page
		          		else if ( $do == "Edit" )
		          		{
		          			
		          		}


		          		// This Update page will Update the users existing data info into the database
		          		else if ( $do == "Update" )
		          		{
		          			
		          		}


		          		// We will Delete the users from database
		          		else if ( $do == "Delete" )
		          		{
		          			
		          		}
		          	?>

		          </div>
		      	</div>
	  		</div>
		</section>

	</div>
	<!-- Content Wrapper End -->

<?php include "inc/footer.php"; ?>