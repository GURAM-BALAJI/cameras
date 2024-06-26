<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['post']=="admin"){
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
if(isset($_POST['submit']))
	{
$password=md5($_POST['password']);
$confirmpassword=md5($_POST['confirmpassword']);
$username=$_POST['Name'];
$phone=$_POST['Phone'];
$email=$_POST['Email'];
$post=$_POST['Post'];
$sql ="SELECT * FROM admin WHERE UserName=:username";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
$error="UserName Already Taken";
else {
if($password!=$confirmpassword)
$error="password doesn't match.";
else{
$sql="INSERT INTO admin(UserName,password,post,camPhone,camEmail) VALUES(:UserName,:password,:post,:camPhone,:camEmail)";
$query = $dbh->prepare($sql);
$query->bindParam(':UserName',$username,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':post',$post,PDO::PARAM_STR);
$query->bindParam(':camPhone',$phone,PDO::PARAM_STR);
$query->bindParam(':camEmail',$email,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="User Added successfully";
}
else
{
$error="Something went wrong. Please try again";
}
}
}
}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Bike Rental Portal | Admin Post camera</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Add Users</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default" style="overflow-x:auto;">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
<label class="col-sm-2 control-label">UserName<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Name" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Phone<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Phone" class="form-control" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Email" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Type Of User<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="Post" required>
<option value=""> Select </option>
<option value="admin">Admin</option>
<option value="delivery">Delivery</option>
<option value="camOwner">camera Owner</option>
</select>
</div>
</div>
<div class="form-group">
		<label class="col-sm-2 control-label">Password<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="password" class="form-control" name="password" id="password" required>
</div>

<label class="col-sm-2 control-label">Confirm Password<span style="color:red">*</span></label>
<div class="col-sm-4">
	<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
</div></div>

<div class="hr-dashed"></div>
<div class="form-group">	<div class="col-sm-8 col-sm-offset-2">
	<button class="btn btn-default" type="reset">Cancel</button>
	<button class="btn btn-primary" name="submit" type="submit">Add User</button>
</div></div></form>
									</div>
								</div>
							</div>
						</div>



					</div>
				</div>



			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php }} ?>
