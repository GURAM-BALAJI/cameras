<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['post']=="admin" || $_SESSION['post']=="camOwner"){
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
$priceperhour=$_POST['priceperhour'];
$priceperday=$_POST['priceperday'];
$NBattery=$_POST['NBattery'];
$Lens=$_POST['Lens'];
$stand=$_POST['stand'];
$CameraBag=$_POST['CameraBag'];
$SDCard=$_POST['SDCard'];
$SmallLens=$_POST['SmallLens'];
$BigLens=$_POST['BigLens'];
$Battery=$_POST['Battery'];
$ChargingWire=$_POST['ChargingWire'];
$OTGC=$_POST['OTGC'];
$OTGMicro=$_POST['OTGMicro'];
$id=intval($_GET['id']);
$sql="update cameras set Stand=:stand,CameraTitle=:cameratitle,camOwner=:camOwner,CameraBrand=:brand,CameraOverview=:cameraoverview,PricePerHour=:priceperhour,PricePerDay=:priceperday,NBattery=:NBattery,Lens=:Lens,CameraBag=:CameraBag,SDCard=:SDCard,SmallLens=:SmallLens,BigLens=:BigLens,Battery=:Battery,ChargingWire=:ChargingWire,OTGC=:OTGC,OTGMicro=:OTGMicro where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':stand',$stand,PDO::PARAM_STR);
$query->bindParam(':cameratitle',$cameratitle,PDO::PARAM_STR);
$query->bindParam(':camOwner',$camOwner,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':cameraoverview',$cameraoverview,PDO::PARAM_STR);
$query->bindParam(':priceperhour',$priceperhour,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':NBattery',$NBattery,PDO::PARAM_STR);
$query->bindParam(':Lens',$Lens,PDO::PARAM_STR);
$query->bindParam(':CameraBag',$CameraBag,PDO::PARAM_STR);
$query->bindParam(':SDCard',$SDCard,PDO::PARAM_STR);
$query->bindParam(':SmallLens',$SmallLens,PDO::PARAM_STR);
$query->bindParam(':BigLens',$BigLens,PDO::PARAM_STR);
$query->bindParam(':Battery',$Battery,PDO::PARAM_STR);
$query->bindParam(':ChargingWire',$ChargingWire,PDO::PARAM_STR);
$query->bindParam(':OTGC',$OTGC,PDO::PARAM_STR);
$query->bindParam(':OTGMicro',$OTGMicro,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


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

	<title>Bike Rental Portal | Admin Edit camera Info</title>

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

						<h2 class="page-title">Edit camera</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default" style="overflow-x:auto;">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php
$id=intval($_GET['id']);
$sql ="SELECT cameras.*,tblbrands.BrandName,tblbrands.id as bid from cameras join tblbrands on tblbrands.id=cameras.CameraBrand where cameras.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{?>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Select Owner<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="camOwner" >
 <?php if($_SESSION['post']=="camOwner"){
 $name=$_SESSION['alogin'];
  $ret="select * from admin where UserName=:name";
 $query= $dbh -> prepare($ret);
 $query -> bindParam(':name',$name, PDO::PARAM_STR);
 }else{
 $ret="select * from admin where adelete=0";
$query= $dbh -> prepare($ret);
}
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($result->camOwner==$results->id)
{?>
 <option selected value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->UserName);?></option>
 <?php
}else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->UserName);?></option>
<?php }}} ?>

</select>
</div>
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" >
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->BrandName); ?> </option>
<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->BrandName==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->BrandName);?></option>
<?php }}} ?>

</select>
</div>

</div>
<div class="form-group">
<label class="col-sm-2 control-label">camera Title<span style="color:red">*</span></label>
<div class="col-sm-10">
<input type="text" name="cameratitle" class="form-control" value="<?php echo htmlentities($result->CameraTitle)?>" >
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">camera Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="cameraorcview" rows="3" ><?php echo htmlentities($result->CameraOverview);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Hour<span style="color:red">*</span></label>
<div class="col-sm-4">
<?php if($_SESSION['post']=="camOwner"){?>
<input type="text" name="priceperhour" class="form-control" value="<?php echo htmlentities($result->PricePerHour);?>" onfocus="this.blur()">
<?php }else{?>
<input type="text" name="priceperhour" class="form-control" value="<?php echo htmlentities($result->PricePerHour);?>" >
<?php }?>
</div>
<label class="col-sm-2 control-label">Price Per Day<span style="color:red">*</span></label>
<div class="col-sm-4">
<?php if($_SESSION['post']=="camOwner"){?>
<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay);?>" onfocus="this.blur()">
<?php }else{?>
<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay);?>" >
<?php }?>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Select Number Of Lens<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="Lens" >
<option value="<?php echo htmlentities($result->Lens);?>"> <?php echo htmlentities($result->Lens);?> Lens </option>
<option value="1">1 Lens</option>
<option value="2">2 Lens</option>
<option value="3">3 Lens</option>
<option value="4">4 Lens</option>
</select>
</div>
<label class="col-sm-2 control-label">Select Number Of Battery<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="NBattery" >
<option value="<?php echo htmlentities($result->NBattery);?>"> <?php echo htmlentities($result->NBattery);?> Battery </option>
<option value="1">1 Battery</option>
<option value="2">2 Battery</option>
<option value="3">3 Battery</option>
</select>

</div>
</div>
<div class="hr-dashed"></div>
<div class="form-group">
<div class="col-sm-12">
<h4><b>camera Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <img src="img/cameraimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 1</a>
</div>
<div class="col-sm-4">
Image 2<img src="img/cameraimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 2</a>
</div>
<div class="col-sm-4">
Image 3<img src="img/cameraimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 3</a>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 4<img src="img/cameraimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 4</a>
</div>
<div class="col-sm-4">
Image 5
<?php if($result->Vimage5=="")
{
echo htmlentities("File not available");
} else {?>
<img src="img/cameraimages/<?php echo htmlentities($result->Vimage5);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id)?>">Change Image 5</a>
<?php } ?>
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
<?php if($result->CameraBag==1)
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
<?php if($result->SDCard==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="SDCard" name="SDCard" checked value="1">
<label for="SDCard"> SD Card </label>
</div>
<?php } else {?>
<div class="checkbox checkbox-success checkbox-inline">
<input type="checkbox" id="SDCard" name="SDCard" value="1">
<label for="SDCard"> SD Card </label>
</div>
<?php }?>
</div><br><br><br>
<div class="col-sm-3">
<?php if($result->SmallLens==1)
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
<?php if($result->BigLens==1)
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
<br><br><br>
<div class="form-group">
<?php if($result->Battery==1)
{
	?>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="Battery" name="Battery" checked value="1">
<label for="Battery"> Battery </label>
</div>
<?php } else {?>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="Battery" name="Battery" value="1">
<label for="Battery"> Battery </label>
</div>
<?php } ?>
</div>
<div class="col-sm-3">
<?php if($result->ChargingWire==1)
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
</div></div><br><br><br>
<div class="col-sm-3">
<?php if($result->OTGC==1)
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
<?php if($result->OTGMicro==1)
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
<div class="form-group">
<div class="col-sm-3"><?php if($result->Stand==1)
{
?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="stand" name="stand" checked value="1">
<label for="stand">Stand</label>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="stand" name="stand" value="1">
<label for="stand"> Stand </label>
</div>
				<?php } ?>				</div></div></div>
</div>

<?php }} ?>
<br><br>
<br><br>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >

													<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
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
<?php } }?>
