<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['post']=="delivery"){
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
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
						<h2 class="page-title">Delivery</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default" style="overflow-x:auto;">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
										<div class="col-md-3">
                                  <div class="panel panel-default">
                                  	<div class="panel-body bk-success text-light">
                                   <div class="stat-panel text-center">
                                            <?php
                                            date_default_timezone_set('Asia/Kolkata');
                                            $date=date("m/d/Y");
                                            $sql2 ="SELECT id from tblbooking Where FromDate=:date  AND status=0 AND bodelete!=1";
                                            $query2= $dbh -> prepare($sql2);
                                            $query2-> bindParam(':date', $date, PDO::PARAM_STR);
                                            $query2->execute();
                                            $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                            $bookings=$query2->rowCount();
                                            ?>
                                    	<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
                                    	<div class="stat-panel-title text-uppercase">Send Today</div>
                                   	</div>
                                   </div>
                                  	<a href="manage-bookings-delivery.php?status=0" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                  </div>
                                 </div>

	<div class="col-md-3">
                                  <div class="panel panel-default">
                                  	<div class="panel-body bk-info text-light">
                                   <div class="stat-panel text-center">
                                            <?php
                                            date_default_timezone_set('Asia/Kolkata');
                                            $date=date("m/d/Y");
                                            $sql2 ="SELECT id from tblbooking Where ToDate=:date AND status=1 AND bodelete!=1";
                                            $query2= $dbh -> prepare($sql2);
                                            $query2-> bindParam(':date', $date, PDO::PARAM_STR);
                                            $query2->execute();
                                            $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                            $bookings=$query2->rowCount();
                                            ?>
                                    	<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
                                    	<div class="stat-panel-title text-uppercase">Recive Today</div>
                                   	</div>
                                   </div>
                                  	<a href="manage-bookings-delivery.php?status=1" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                  </div></div>
                                  	<div class="col-md-3">
               <div class="panel panel-default">
               	<div class="panel-body bk-primary text-light">
                <div class="stat-panel text-center">
                         <?php
                         date_default_timezone_set('Asia/Kolkata');
                         $date=date("m/d/Y");
                         $sql2 ="SELECT id from tblbooking Where ToDate=:date AND bodelete=1";
                         $query2= $dbh -> prepare($sql2);
                         $query2-> bindParam(':date', $date, PDO::PARAM_STR);
                         $query2->execute();
                         $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                         $bookings=$query2->rowCount();
                         ?>
                 	<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
                 	<div class="stat-panel-title text-uppercase">Canceled Orders Today</div>
                	</div>
                </div>
               	<a href="manage-bookings-delivery.php?bodelete=1" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
               </div>

                                  	</div>
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
