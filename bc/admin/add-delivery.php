<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['post']=="admin" || $_SESSION['post']=="delivery"){
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}else{
if(isset($_GET['status']))
$status=$_GET['status'];
if(isset($_GET['book']))
$book=$_GET['book'];
if(isset($_POST['submit']))
  {
$vimage1=$_FILES["img"]["name"];
$vimage1=$book.$vimage1;
$CameraBag=$_POST['CameraBag'];
$SDCard=$_POST['SDCard'];
$SmallLens=$_POST['SmallLens'];
$BigLens=$_POST['BigLens'];
$Battery=$_POST['Battery'];
$ChargingWire=$_POST['ChargingWire'];
$OTGC=$_POST['OTGC'];
$OTGMicro=$_POST['OTGMicro'];
$stand=$_POST['stand'];
move_uploaded_file($_FILES["img"]["tmp_name"],"img/cameraimages/".$book.$_FILES["img"]["name"]);
$sql="update tblbooking set BStand=:stand,image=:vimage1,BCameraBag=:CameraBag,BSDCard=:SDCard,BSmallLens=:SmallLens,BBigLens=:BigLens,BBattery=:Battery,BChargingWire=:ChargingWire,BOTGC=:OTGC,BOTGMicro=:OTGMicro,Status=1 where id=:book ";
$query = $dbh->prepare($sql);
$query->bindParam(':stand',$stand,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':CameraBag',$CameraBag,PDO::PARAM_STR);
$query->bindParam(':SDCard',$SDCard,PDO::PARAM_STR);
$query->bindParam(':SmallLens',$SmallLens,PDO::PARAM_STR);
$query->bindParam(':BigLens',$BigLens,PDO::PARAM_STR);
$query->bindParam(':Battery',$Battery,PDO::PARAM_STR);
$query->bindParam(':ChargingWire',$ChargingWire,PDO::PARAM_STR);
$query->bindParam(':OTGC',$OTGC,PDO::PARAM_STR);
$query->bindParam(':OTGMicro',$OTGMicro,PDO::PARAM_STR);
$query->bindParam(':book',$book,PDO::PARAM_STR);
$query->execute();
$msg="Data updated successfully";
}
if(isset($_POST['return'])){
$message=$_POST['message'];
$sql="update tblbooking set Status=2,Message=:message where id=:book ";
$query = $dbh->prepare($sql);
$query->bindParam(':book',$book,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$msg="Data updated successfully";
}
 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>1
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Bike Rental Portal |Admin Manage testimonials   </title>

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

						<h2 class="page-title">Manage Bookings Delivery</h2>
						<a href="delivery.php"><button class="btn btn-default">Back</button></a>
						<br><br>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default"">
						<?php
$sql ="SELECT * from tblbooking where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $book, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{?>
<?php if($_GET['status']==0){ ?>
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<h4>Uplode Photo Of person</h4>
<input type="file" id="img" name="img" required>

<br><br></div></div>
<?php } ?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default" style="overflow-x:auto;">
<div class="panel-heading">Accessories</div>
<div class="panel-body">
<div class="form-group">
<div class="col-sm-3">
<?php if($result->BCameraBag==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="CameraBag" name="CameraBag" checked value="1">
<label for="CameraBag"> Camera Bag </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="CameraBag" name="CameraBag" value="1">
<label for="CameraBag"> Camera Bag </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->BSDCard!="")
{?>
<div class="checkbox checkbox-inline">
<select name="sdcard">
<option value=""><?php echo "$result->BSDCard Card"; ?></option>
</select>
</div>
<?php } else {?>
<div class="checkbox checkbox-success checkbox-inline">
<select name="SDCard">
<option value="">No SD Card</option>
<option value="4gb">4gb</option>
<option value="8gb">8gb</option>
<option value="16gb">16gb</option>
<option value="32gb">32gb</option>
<option value="64gb">64gb</option>
<option value="128gb">128gb</option>
</select>
</div>
<?php }?>
</div>
<div class="col-sm-3">
<?php if($result->BSmallLens==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="SmallLens" name="SmallLens" checked value="1">
<label for="SmallLens"> Small Lens </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="SmallLens" name="SmallLens" value="1">
<label for="SmallLens"> Small Lens </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->BBigLens==1)
{
	?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="BigLens" name="BigLens" checked value="1">
<label for="BigLens"> Big Lens </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="BigLens" name="BigLens" value="1">
<label  for="BigLens"> Big Lens </label>
</div>
<?php } ?>
</div>
<div class="form-group">
<?php if($result->BBattery!="")
{
	?>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<select name="Battery">
<option value=""><?php echo "$result->BBattery Battery"; ?></option>
</select>
</div>
<?php } else {?>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<select name="Battery">
<option value="">No Battery</option>
<option value="1">1 Battery</option>
<option value="2">2 Battery</option>
<option value="3">3 Battery</option>
<option value="4">4 Battery</option>
</select>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->BChargingWire==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ChargingWire" name="ChargingWire" checked value="1">
<label for="ChargingWire">Charging Wire</label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ChargingWire" name="ChargingWire" value="1">
<label for="ChargingWire">Charging Wire</label>
<?php } ?>
</div></div>
<div class="col-sm-3">
<?php if($result->BOTGC==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="OTGC" name="OTGC" checked value="1">
<label for="OTGC">OTG C-Type </label>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="OTGC" name="OTGC" value="1">
<label for="OTGC">OTG C-Type </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->BOTGMicro==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="OTGMicro" name="OTGMicro" checked value="1">
<label for="OTGMicro"> OTG Micro </label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="OTGMicro" name="OTGMicro" value="1">
<label for="OTGMicro"> OTG Micro </label>
</div>
<?php } ?>
</div></div>
<div class="form-group">
<div class="col-sm-3"><?php if($result->BStand==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="stand" name="stand" checked value="1">
<label for="stand">Stand</label>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="stand" name="stand" value="1">
<label for="stand">Stand </label>
</div>
				<?php } ?>				</div></div></div></div></div>
</div>
<?php }} ?>
<?php if($_GET['status']==0){ ?>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save</button>
												</div>
											</div>
<?php } ?>
										</form>
<?php if($_GET['status']==1){ ?>
<div class="panel-heading">Remarks </div>
							<div class="panel-body">
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<div class="col-sm-12">
<textarea class="form-control" name="message" rows="3" placeholder="Enter Remarks"></textarea>
</div>
</div>
<div class="form-group">
		<div class="col-sm-8 col-sm-offset-2">
			<button class="btn btn-primary" name="return" type="submit">Save</button>
		</div>
	</div>
	</form>
<?php } ?>
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
