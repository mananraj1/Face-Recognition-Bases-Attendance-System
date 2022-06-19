<?php
session_start();
error_reporting(0);
include ('../includes/config.php');
if($_SESSION['id']=='')
{
    echo "<script>window.location.href='index.php'</script>";
}

if(isset($_POST['submit']))
{
    $id=$_POST['sub_id'];
    
    $sem=$_POST['sem'];
    $branch=$_POST['branch'];
    $sub=$_POST['sub_name'];
    
    $sql="UPDATE teach_subj SET `branch`='$branch',`subject`='$sub',`sem`='$sem' WHERE id=$id";
    mysqli_query($conn,$sql);
   
}


if(isset($_POST['sub_id']))
{
    $sub=$_POST['sub_id'];
    $sql="SELECT * FROM teach_subj WHERE id=$sub";
    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
   
}
else
{
     echo "<script>window.location.href='all-subject.php'</script>";
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="SmartCrc">
	<link rel="icon" href="assets/img/favicon.png">

	<title>Easy Attendance | Edit Subject </title>

	<!-- PICK ONE OF THE STYLES BELOW -->
	<link href="assets/css/modern.css" rel="stylesheet"> 
	 <link href="assets/css/modal.css" rel="stylesheet">
	
	<script src="assets/js/settings.js"></script>
</head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
	    <?php include 'includes/sidebar.php'; ?>
		<div class="main">
			<?php include 'includes/navbar.php'; ?>
			<main class="content">
				<div class="container-fluid">
				    
				    
                    <!-- Modal FORM FROM TOP -->
                    <!-- MODAL FORM OVER !-->
					<div class="header">
						<h1 class="header-title">
							Edit Subject 
						</h1>
						
					</div>
					<div class="row">
					    <div class="col-md-3 col-xl-2">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Toggle</h5>
								</div>

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
									Edit Subject
									</a>
									
								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="account" role="tabpanel">

								

									<div class="card">
										<div class="card-header">
											
											<h5 class="card-title mb-0">Edit Subject You Teach </h5>
										</div>
										<div class="card-body">
									<form method="post">
									        
									        
									        <div class="mb-3">
									            <label>Select branch</label>
    										    <select class="form-control" name="branch">
    										        <option selected><?php echo $row['branch'];?></option>
    										        <option>ISE</option>
    										        <option>CSE</option>
    										        <option>MECH</option>
    										        <option>CIVIL</option>
    										        <option>ECE</option>
    										        <option>ETE</option>
    										        <option>IEM</option>
                                                </select>
			    							</div>
			    							
			    							
									        <div class="mb-3">
									            <label>Select Semester</label>
    										    <select class="form-control" name="sem">
    										        <option selected><?php echo $row['sem'];?></option>
    										        <option value="1">1</option>
    										        <option value="2">2</option>
    										        <option value="3">3</option>
    										        <option value="4">4</option>
    										        <option value="5">5</option>
    										        <option value="6">6</option>
    										        <option value="7">7</option>
    										        <option value="8">8</option>
                                                </select>
			    							</div>
				    						<div class="mb-3">
				    						    <label for="inputUsername">Subject name</label>
						    					<input type="text" name="sub_name" class="form-control" placeholder="Enter subject's Name" value="<?php echo $row['subject'];?>">
							    			</div>
									        	<input type="hidden" name="sub_id" class="form-control" placeholder="Enter subject's Name" value="<?php echo $sub;?>">
											<div class="text-center mt-3">
											    <button type="submit" class="btn btn-lg btn-primary" name="submit">Update Subject</button>
										    </div>
										
			    						
										
									
									</form>

										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="password" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Password</h5>

											<form method="POST">
												<div class="mb-3">
													<label for="inputPasswordCurrent">Current password</label>
													<input type="password" class="form-control" id="inputPasswordCurrent">
													
												</div>
												<div class="mb-3">
													<label for="inputPasswordNew">New password</label>
													<input type="password" name="pass" class="form-control" id="inputPasswordNew">
												</div>
												<button type="submit" name="update_password" class="btn btn-primary">Save changes</button>
											</form>

										</div>
									</div>
								</div>
								
								
							</div>
						</div>
					</div>
				</div>
			</main>
			<?php include 'includes/footer.php';?>
		</div>

	</div>

	<svg width="0" height="0" style="position:absolute">
		<defs>
			<symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
				<path
					d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
				</path>
			</symbol>
		</defs>
	</svg>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/modal.js"></script>
	    

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables basic
			$('#datatables-basic').DataTable();
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});
		
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables basic
			$('#datatables-basic-1').DataTable();
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});
	</script>
</body>

</html>
