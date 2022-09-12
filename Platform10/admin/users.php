<?php include "inc/header.php"; ?>

	<!-- Content Wrapper Start -->
  	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">User Management</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	              <li class="breadcrumb-item active">User Management</li>
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
					            <h3 class="card-title">All users Manage page</h3>

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
								      <th scope="col">Picture</th>
								      <th scope="col">Full Name</th>
								      <th scope="col">Email</th>
								      <th scope="col">Phone No.</th>
								      <th scope="col">User Role</th>
								      <th scope="col">Status</th>
								      <th scope="col">Action</th>
								    </tr>
								  </thead>

								  <tbody>

								  	<?php  

								  		$sql = "SELECT * FROM users ORDER BY fullname ASC";
								  		$userData = mysqli_query( $db, $sql );
								  		$i = 0;

								  		while ( $row = mysqli_fetch_assoc( $userData ) )
								  		{
								  			$user_id		= $row['user_id'];
								  			$fullname 		= $row['fullname'];
								  			$email 			= $row['email'];
								  			$password 		= $row['password'];
								  			$phone 			= $row['phone'];
								  			$address 		= $row['address'];
								  			$image 			= $row['image'];
								  			$role 			= $row['role'];
								  			$status 		= $row['status'];
								  			$join_date 		= $row['join_date'];
								  			$i++;
								  			?>

								  			<tr>
										      <th scope="row"><?php echo $i; ?></th>
										      <td>
										      	
										      	<?php  
										      		if ( !empty($image) ) 
										      		{
										      			?>

										      			<img src="dist/img/users/<?php echo $image; ?>" width="35">

										      			<?php
										      			
										      		}
										      		else
										      		{
										      			?>

										      			<img src="dist/img/avatar5.png" width="35">

										      			<?php
										      		}
										      	?>

										      </td>
										      <td><?php echo $fullname; ?></td>
										      <td><?php echo $email; ?></td>
										      <td><?php echo $phone; ?></td>
										      <td>
										      	<?php  
											      	if ( $role == 1 )
											      	{
											      	?>
											      		<span class="badge badge-success">Admin</span>

											      	<?php

											      	}
											      	else if( $role == 2 )
											      	{
											      	?>
											      	<span class="badge badge-primary">User</span>

											      	<?php

											      	}
											    ?>
										      </td>
										      <td>
										      	<?php  
											      	if ( $status == 0 )
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
		    <li><a href="users.php?do=Edit&uid=<?php echo $user_id; ?>"><i class="fa fa-edit"></i></a></li>

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
								  	?>
								    

								
								  </tbody>
								</table>

					        </div>
					    </div>

		          		<?php

		          		}


		          		// This is Create new users HTML page
		          		else if ( $do == "Add" )
		          		{
		          			
		          			?>

		          			<div class="card">
							    <div class="card-header">
							        <h3 class="card-title">Add New User</h3>

							        <div class="card-tools">
							            <button type="button" class="btn btn-tool" data-card-widget="collapse">
							            <i class="fas fa-minus"></i>
							            </button>
							        </div>
							    </div>

							    <div class="card-body">

							    	<form action="users.php?do=Store" method="POST" enctype="multipart/form-data">
							    		<div class="row">
							    			<div class="col-lg-6">
							    				<div class="form-group">
									    			<label>Full Name</label>
									    			<input type="text" name="fullname" class="form-control" placeholder="Your full Name..." required="required" autocomplete="off">
									    		</div>

									    		<div class="form-group">
									    			<label>Email Address</label>
									    			<input type="email" name="email" class="form-control" placeholder="Email Address..." required="required" autocomplete="off">
									    		</div>

									    		<div class="form-group">
									    			<label>Password</label>
									    			<input type="password" name="password" class="form-control" placeholder="Your Password..." required="required" autocomplete="off">
									    		</div>

									    		<div class="form-group">
									    			<label>Re-Type Password</label>
									    			<input type="password" name="re_password" class="form-control" placeholder="Re-Type Password..." required="required" autocomplete="off">
									    		</div>

									    		<div class="form-group">
									    			<label>Phone No.</label>
									    			<input type="tel" name="phone" class="form-control" placeholder="Phone No...">
									    		</div>
							    			</div>

							    			<div class="col-lg-6">
							    				<div class="form-group">
									    			<label>Address</label>
									    			<input type="text" name="address" class="form-control" placeholder="Address...">
									    		</div>

									    		<div class="form-group">
									    			<label>User Role</label>
									    			<select class="form-control" name="role">
									    				<option value="2">Please Select User Role</option>
									    				<option value="1">Admin</option>
									    				<option value="2">User</option>
									    			</select>
									    		</div>

									    		<div class="form-group">
									    			<label>Status</label>
									    			<select class="form-control" name="status">
									    				<option value="0">Please Select User Status</option>
									    				<option value="1">Active</option>
									    				<option value="0">InActive</option>
									    			</select>
									    		</div>

									    		<div class="form-group">
									    			<label>Profile Picture</label>
									    			<input type="file" name="image" class="form-control-file">
									    		</div>

									    		<div class="form-group">
									    			<input type="submit" name="addUser" class="btn btn-success">
									    		</div>
							    			</div>
							    		</div>
							    	</form>

								</div>
							</div>

		          			<?php

		          		}


		          		// This Store page will Store the new users data into the database
		          		else if ( $do == "Store" )
		          		{
		          			if (isset( $_POST['addUser'] )) 
		          			{
		          				$fullname 		= $_POST['fullname'];
		          				$email 			= $_POST['email'];
		          				$password 		= $_POST['password'];
		          				$re_password 	= $_POST['re_password'];
		          				$phone 			= $_POST['phone'];
		          				$address 		= $_POST['address'];
		          				$role 			= $_POST['role'];
		          				$status 		= $_POST['status'];
		          				
		          				$image 			= $_FILES['image']['name']; //HTML form (image)(file name)
		          				$image_temp		= $_FILES['image']['tmp_name'];
		          				

		          				if ( $password == $re_password )
		          				{
		          					$hassedPass = sha1($password);

		          					if ( !empty($image) )
		          					{
				          				$image_name		= rand(1, 999999) . '_' . $image;
				          				move_uploaded_file($image_temp, "dist/img/users/$image_name");

				          				$sql = "INSERT INTO users ( fullname, email, password, phone, address, image, role, status, join_date ) VALUES ( '$fullname', '$email', '$hassedPass', '$phone', '$address', '$image_name', '$role', '$status', now() ) ";
				          				$addUsers = mysqli_query( $db, $sql );

				          				if ( $addUsers )
				          				{
				          					header( "Location: users.php?do=Manage" );
				          				}
				          				else
				          				{
				          					die( "MySQL Query Failed" . mysqli_error() );
				          				}
		          					}

		          					else
		          					{
		          						$sql = "INSERT INTO users ( fullname, email, password, phone, address, role, status, join_date ) VALUES ( '$fullname', '$email', '$hassedPass', '$phone', '$address', '$role', '$status', now() ) ";  
		          						$addUsers = mysqli_query( $db, $sql );

		          						if ( $addUsers )
				          				{
				          					header( "Location: users.php?do=Manage" );
				          				}
				          				else
				          				{
				          					die( "MySQL Query Failed" . mysqli_error($db) );
				          				}
		          					}

		          											
		          				}
		          				else
		          				{
		          					echo "Password Doesn't Match";
		          				}

		    
		          			}
		          		}


		          		// This Edit page will show the update users info in a HTML page
		          		else if ( $do == "Edit" )
		          		{
		          			if ( isset($_GET['uid']) )
		          			{
		          				$updateID = $_GET['uid'];

		          				$sql = "SELECT * FROM users WHERE user_id = '$updateID'";

		          				$userData = mysqli_query($db, $sql);

		          				while ( $row = mysqli_fetch_assoc($userData) )
		          				{
		          					$user_id		= $row['user_id'];
						  			$fullname 		= $row['fullname'];
						  			$email 			= $row['email'];
						  			$password 		= $row['password'];
						  			$phone 			= $row['phone'];
						  			$address 		= $row['address'];
						  			$image 			= $row['image'];
						  			$role 			= $row['role'];
						  			$status 		= $row['status'];
						  			$join_date 		= $row['join_date'];

						  			?>

						  				<!-- Html form Start -->
						  				<div class="card">
										    <div class="card-header">
										        <h3 class="card-title">Update user information</h3>

										        <div class="card-tools">
										            <button type="button" class="btn btn-tool" data-card-widget="collapse">
										            <i class="fas fa-minus"></i>
										            </button>
										        </div>
										    </div>

										    <div class="card-body">

										    	<form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
										    		<div class="row">
										    			<div class="col-lg-6">
										    				<div class="form-group">
												    			<label>Full Name</label>
												    			<input type="text" name="fullname" class="form-control" placeholder="Your full Name..." value="<?php echo $fullname; ?>" required="required" autocomplete="off">
												    		</div>

												    		<div class="form-group">
												    			<label>Email Address</label>
												    			<input type="email" name="email" class="form-control" placeholder="Email Address..." value="<?php echo $email; ?>"  required="required" autocomplete="off">
												    		</div>

												    		<div class="form-group">
												    			<label>Password</label>
												    			<input type="password" name="password" class="form-control" placeholder="xxxxxx">
												    		</div>

												    		<div class="form-group">
												    			<label>Re-Type Password</label>
												    			<input type="password" name="re_password" class="form-control" placeholder="xxxxxx">
												    		</div>

												    		<div class="form-group">
												    			<label>Phone No.</label>
												    			<input type="tel" name="phone" class="form-control" placeholder="Phone No..." value="<?php echo $phone; ?>">
												    		</div>
										    			</div>

										    			<div class="col-lg-6">
										    				<div class="form-group">
												    			<label>Address</label>
												    			<input type="text" name="address" class="form-control" placeholder="Address..." value="<?php echo $address; ?>">
												    		</div>

											    		<div class="form-group">
											    			<label>User Role</label>
											    			<select class="form-control" name="role">
											    				<option value="2">Please Select User Role</option>
											    				<option value="1" <?php if ( $role == 1 ){ echo 'selected'; } ?> >Admin</option>
											    				<option value="2" <?php if ( $role == 2 ){ echo 'selected'; } ?> >User</option>
											    			</select>
											    		</div>

											    		<div class="form-group">
											    			<label>Status</label>
											    			<select class="form-control" name="status">
											    				<option value="0">Please Select User Status</option>
											    				<option value="1" <?php if ( $status == 1 ){ echo 'selected'; } ?> >Active</option>
											    				<option value="0" <?php if ( $status == 0 ){ echo 'selected'; } ?> >InActive</option>
											    			</select>
											    		</div>

											    		<div class="form-group">
											    			<label>Profile Picture</label>
											    			<br>
											    			<?php  
													      		if ( !empty($image) ) 
													      		{
													      			?>

													      			<img src="dist/img/users/<?php echo $image; ?>" width="35">

													      			<?php
													      			
													      		}
													      		else
													      		{
													      			?>

													      			<p>No Picture Uploaded</p>

													      			<?php
													      		}
													      	?>
													      	<br><br>
											    			<input type="file" name="image" class="form-control-file">
											    		</div>

												    		<div class="form-group">
												    			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
												    			<input type="submit" name="updateUser" class="btn btn-success" value="Save Changes">
												    		</div>
										    			</div>
										    		</div>
										    	</form>

											</div>
										</div>
						  				<!-- Html form End -->

						  			<?php
		          				}
		          			}
		          		}


		          		// This Update page will Update the users existing data info into the database
		          		else if ( $do == "Update" )
		          		{
		          			if ( isset($_POST['updateUser']) )
		          			{
		          				$user_id  		= $_POST['user_id'];
		          				$fullname 		= $_POST['fullname'];
		          				$email 			= $_POST['email'];
		          				$password 		= $_POST['password'];
		          				$re_password 	= $_POST['re_password'];
		          				$phone 			= $_POST['phone'];
		          				$address 		= $_POST['address'];
		          				$role 			= $_POST['role'];
		          				$status 		= $_POST['status'];
		          				
		          				$image 			= $_FILES['image']['name']; //HTML form (image)(file name)
		          				$image_temp		= $_FILES['image']['tmp_name'];

		          				// This Four way can update data
		          				// Both for Password and Picture with all data
		          				if ( !empty($password) && !empty($image) )
		          				{

		          					// New password check and Encrypted
		          					if ( $password == $re_password )
		          					{
		          						$hassedPass = sha1($password);
		          					}

		          					// Delete if already image exists
		          					$query = "SELECT * FROM users WHERE user_id = '$user_id'";
		          					$oldImage = mysqli_query($db, $query);
		          					while ( $row = mysqli_fetch_assoc($oldImage) )
		          					{
		          						$existingImage = $row['image'];
		          						unlink("dist/img/users/" . $existingImage);
		          					}

		          					// Upload new image
		          					$image_name		= rand(1, 999999) . '_' . $image;
				          			move_uploaded_file($image_temp, "dist/img/users/$image_name");

									$sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', image='$image_name', role='$role', status='$status' WHERE user_id = '$user_id'";

				          			$updateUser = mysqli_query($db, $sql);

				          			if ( $updateUser ) 
				          			{
				          				header("Location: users.php?do=Manage");
				          			}
				          			else {
				          				die( "MySQL Error" . mysqli_error($db) );
				          			}

		          				}

		          				// Only Password with all data Change
		          				else if ( !empty($password) && empty($image) )
		          				{
		          					// New password check and Encrypted
		          					if ( $password == $re_password )
		          					{
		          						$hassedPass = sha1($password);
		          					}

				          			$sql = "UPDATE users SET fullname='$fullname', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status' WHERE user_id = '$user_id'";

				          			$updateUser = mysqli_query($db, $sql);

				          			if ( $updateUser ) 
				          			{
				          				header("Location: users.php?do=Manage");
				          			}
				          			else {
				          				die( "MySQL Error" . mysqli_error($db) );
				          			}
		          				}

		          				// Only Picture with all data Change
		          				else if ( empty($password) && !empty($image) )
		          				{
		          				
		          					// Delete if already image exists
		          					$query = "SELECT * FROM users WHERE user_id = '$user_id'";
		          					$oldImage = mysqli_query($db, $query);
		          					while ( $row = mysqli_fetch_assoc($oldImage) )
		          					{
		          						$existingImage = $row['image'];
		          						unlink("dist/img/users/" . $existingImage);
		          					}

		          					// Upload new image
		          					$image_name		= rand(1, 999999) . '_' . $image;
				          			move_uploaded_file($image_temp, "dist/img/users/$image_name");

									$sql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address', image='$image_name', role='$role', status='$status' WHERE user_id = '$user_id'";

				          			$updateUser = mysqli_query($db, $sql);

				          			if ( $updateUser ) 
				          			{
				          				header("Location: users.php?do=Manage");
				          			}
				          			else {
				          				die( "MySQL Error" . mysqli_error($db) );
				          			}
		          				}

		          				// Only change the Data
		          				else if ( empty($password) && empty($image) ) 
		          				{
									$sql = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone', address='$address', role='$role', status='$status' WHERE user_id = '$user_id'";

				          			$updateUser = mysqli_query($db, $sql);

				          			if ( $updateUser ) 
				          			{
				          				header("Location: users.php?do=Manage");
				          			}
				          			else {
				          				die( "MySQL Error" . mysqli_error($db) );
				          			}
		          				}
		          			}
		          		}


		          		// We will Delete the users from database
		          		else if ( $do == "Delete" )
		          		{
		          			if ( isset( $_GET['user_id'] ) )
						      {
						        $deleteId = $_GET['user_id'];

						        $query = "DELETE FROM users WHERE user_id = '$deleteId' ";
						        $deleteData = mysqli_query( $db, $query );

						        if ( $deleteData )
          						{
          							header("Location: users.php?do=Manage");
          						}
          						else
          						{
          							die( "MySQLi Error. " . mysqli_error($db) );
          						}
						      }
		          		}
		          	?>

		          </div>
		      	</div>
	  		</div>
		</section>

	</div>
	<!-- Content Wrapper End -->

<?php include "inc/footer.php"; ?>