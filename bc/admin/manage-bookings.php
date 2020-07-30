<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['post']=="admin" || $_SESSION['post']=="delivery"){
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}else{
if(isset($_GET['status'])){
$st=$_GET['status'];
$today=date("m/d/Y");
 }?>

<!doctype html>
<html lang="en" class="no-js">

<head>
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

						<h2 class="page-title">Manage Bookings</h2>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default" style="overflow-x:auto;">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
<thead>
	<tr>
                                    										<th>#</th>
                                                                               	<th>Delivery Time</th>
                                                                                <th>Recive Time</th>
                                    											<th>Owner Name</th>
                                    											<th>Owner Phone</th>
                                    											<th>camera</th>
                                    											<th>User Name</th>
                                                                               <th>User Phone</th>
                                                                               <th>Status</th>
                                    										</tr>
                                    									</thead>
									<tfoot>
												<tr>
                         <th>#</th>
                              	<th>Delivery Time</th>
                               <th>Recive Time</th>
                         	<th>Owner Name</th>
                         	<th>Owner Phone</th>
                         	<th>camera</th>
                         	<th>User Name</th>
                              <th>User Phone</th>
                              <th>Status</th>
                         </tr>
									</tfoot>
									<tbody>
<?php
 $sql = "SELECT tblbrands.BrandName,cameras.camOwner,tblbooking.ToTime,tblbooking.FromTime,tblbooking.ToDate,tblbooking.FromDate,tblbooking.UserPhone,tblbooking.UserName,cameras.CameraTitle,tblbooking.bodelete,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.cameraId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id  from tblbooking join cameras on cameras.id=tblbooking.cameraId join tblbrands on cameras.CameraBrand=tblbrands.id  ORDER BY tblbooking.id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
 $sqla="SELECT * from admin Where id=:id";
 $querya=$dbh->prepare($sqla);
      $querya->bindParam(':id',$result->camOwner, PDO::PARAM_STR);
    $querya->execute();
    $resultsa=$querya->fetchAll(PDO::FETCH_OBJ);
    foreach($resultsa as $resulta){
	?>
										<tr>
										<td><?php echo htmlentities($cnt);?></td>
										<?php
                                             $FromTime=$result->FromTime;
                                            $FromTime="$FromTime:00";?>
                                        	<td><a href="add-delivery.php?status=<?php echo $st; ?>&book=<?php echo $result->id;?>"> <?php echo htmlentities($result->FromDate);?> - <?php echo date('h:i a',strtotime($FromTime));?></a>
                                        	  </td>
                                        	<?php
                                        	$ToTime=$result->ToTime;
                                        	$ToTime="$ToTime:00";?>
                                             <td><a href="add-delivery.php?status=<?php echo $st; ?>&book=<?php echo $result->id;?>"><?php echo htmlentities($result->ToDate);?> - <?php echo date('h:i a',strtotime($ToTime));?></a></td>
											<td><?php echo htmlentities($resulta->UserName);?></td>
											<td><a href="tel:<?php echo htmlentities($resulta->camPhone);?>"><?php echo htmlentities($resulta->camPhone);?></a></td>
											<td><a href="../camera-details.php?brndid=<?php echo htmlentities($result->id);?>&vhid=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->CameraTitle);?></td>
											<td><?php echo htmlentities($result->UserName);?></td>
											<td><a href="tel:<?php echo htmlentities($result->UserPhone);?>"><?php echo htmlentities($result->UserPhone);?></a></td>
										<td><?php
										if($result->bodelete==0){
										if($result->Status==0)
										echo "<p style='color:darkgreen'>Not Sent</p>";
										elseif($result->Status==1)
										echo "<p style='color:Black'>Sent</p>";
										elseif($result->Status==2)
                                        echo "<p style='color:darkorange'>Recived</p>";
										}else
										echo "<p style='color:red'>Deleted</p>";
										?>
										</td>
										</tr>
										<?php $cnt=$cnt+1; } } } ?>

									</tbody>
								</table>



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
