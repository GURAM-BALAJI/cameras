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
  $camOwner=$_POST['camOwner'];
$cameratitle=$_POST['cameratitle'];
$brand=$_POST['brandname'];
$cameraoverview=$_POST['cameraorcview'];
$priceperday=$_POST['priceperday'];
$NBattery=$_POST['NBattery'];
$priceperHour=$_POST['priceperHour'];
$Lens=$_POST['Lens'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
$CameraBag=$_POST['CameraBag'];
$SDCard=$_POST['SDCard'];
$SmallLens=$_POST['SmallLens'];
$BigLens=$_POST['BigLens'];
$Battery=$_POST['Battery'];
$ChargingWire=$_POST['ChargingWire'];
$OTGC=$_POST['OTGC'];
$OTGMicro=$_POST['OTGMicro'];
$stand=$_POST['stand'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/cameraimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/cameraimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/cameraimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/cameraimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"img/cameraimages/".$_FILES["img5"]["name"]);
$sql="INSERT INTO cameras(Stand,CameraTitle,CameraBrand,CameraOverview,camOwner,PricePerDay,priceperHour,NBattery,Lens,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,CameraBag,SDCard,SmallLens,BigLens,Battery,ChargingWire,OTGC,OTGMicro) VALUES(:stand,:cameratitle,:brand,:cameraoverview,:camOwner,:priceperday,:priceperHour,:NBattery,:Lens,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:CameraBag,:SDCard,:SmallLens,:BigLens,:Battery,:ChargingWire,:OTGC,:OTGMicro)";
$query = $dbh->prepare($sql);
$query->bindParam(':stand',$stand,PDO::PARAM_STR);
$query->bindParam(':cameratitle',$cameratitle,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':camOwner',$camOwner,PDO::PARAM_STR);
$query->bindParam(':cameraoverview',$cameraoverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':priceperHour',$priceperHour,PDO::PARAM_STR);
$query->bindParam(':NBattery',$NBattery,PDO::PARAM_STR);
$query->bindParam(':Lens',$Lens,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
$query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR);
$query->bindParam(':CameraBag',$CameraBag,PDO::PARAM_STR);
$query->bindParam(':SDCard',$SDCard,PDO::PARAM_STR);
$query->bindParam(':SmallLens',$SmallLens,PDO::PARAM_STR);
$query->bindParam(':BigLens',$BigLens,PDO::PARAM_STR);
$query->bindParam(':Battery',$Battery,PDO::PARAM_STR);
$query->bindParam(':ChargingWire',$ChargingWire,PDO::PARAM_STR);
$query->bindParam(':OTGC',$OTGC,PDO::PARAM_STR);
$query->bindParam(':OTGMicro',$OTGMicro,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="camera posted successfully";
}
else
{
$error="Something went wrong. Please try again";
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
						<h2 class="page-title">Post A camera</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default" style="overflow-x:auto;">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Select Owner<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="camOwner" >
<?php $ret="select * from admin where adelete=0";
$query= $dbh -> prepare($ret);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->UserName);?></option>
<?php }} ?>

</select>
</div>
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" >
<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->BrandName);?></option>
<?php }} ?>

</select>
</div>

</div>
<div class="form-group">
<label class="col-sm-2 control-label">camera Title<span style="color:red">*</span></label>
<div class="col-sm-10">
<input type="text" name="cameratitle" class="form-control" >
</div>
</div>


<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">camera Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="cameraorcview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Hour<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperHour" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Price Per Day<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Number Of Lens<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="Lens" required>
<option value=""> Select </option>
<option value="1">1 Lens</option>
<option value="2">2 Lens</option>
<option value="3">3 Lens</option>
<option value="4">4 Lens</option>
</select>
</div>
<label class="col-sm-2 control-label">Select Number Of Battery<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="NBattery" required>
<option value=""> Select </option>
<option value="1">1 Battery</option>
<option value="2">2 Battery</option>
<option value="3">3 Battery</option>
</select>
</div>
</div>
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-4">
Image 4<span style="color:red">*</span><input type="file" name="img4" required>
</div>
<div class="col-sm-4">
Image 5<input type="file" name="img5">
</div>
</div>
<div class="hr-dashed"></div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default" style="overflow-x:auto;">
<div class="panel-heading">Accessories</div>
<div class="panel-body">
<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="CameraBag" name="CameraBag" value="1">
<label for="CameraBag"> Camera Bag</label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="SDCard" name="SDCard" value="1">
<label for="SDCard">SD Card</label>
</div>
</div></div><br>
<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="SmallLens" name="SmallLens" value="1">
<label for="SmallLens">Small Lens</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox h checkbox-inline">
<input type="checkbox" id="BigLens" name="BigLens" value="1">
<label for="BigLens">Big Lens</label>
</div></div></div><br>
<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="Battery" name="Battery" value="1">
<label for="Battery">Battery</label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ChargingWire" name="ChargingWire" value="1">
<label for="ChargingWire">Charging Wire</label>
</div>
</div></div><br>
<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="OTGC" name="OTGC" value="1">
<label for="OTGC">OTG C-Type</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="OTGMicro" name="OTGMicro" value="1">
<label for="OTGMicro">OTG Micro</label>
</div>
</div></div>
<br>
<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="stand" name="stand" value="1">
<label for="stand">Stand</label>
</div></div></div>

<br><br>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>
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
