<!DOCTYPE html>
<?php
include('includes/config.php');
$cameraId=$_GET['vid'];
$sql="SELECT * from tblbooking Where status!=2 AND book=1 AND bodelete=0 AND cameraId = :cameraId";
$query = $dbh -> prepare($sql);
$query->bindParam(':cameraId',$cameraId,PDO::PARAM_STR);
$query->execute();
$booked_date="";
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0){
foreach($results as $result){
if($result->FromDate != $result->ToDate){
$fromdate=$result->FromDate;
$date_from = strtotime($fromdate);
$date_from+=86400;
$todate=$result->ToDate;
$date_to = strtotime($todate);
for ($i=$date_from; $i<$date_to; $i+=86400) {
    $date=date('j/n/Y',$i);
    $booked_date.='"'.$date.'",';
}}}}
$booked_date=substr($booked_date, 0, -1);
$booked_date='['.$booked_date.']';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Bootstrap Datepicker Disable Specific Dates Example - ItSolutionStuff.com</title>
<script src="js1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">
<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript">
  $(document).ready(function(){
       $('#FromDate').on('change',function(){
           var FromDateID = $(this).val();
           var cameraId = $('#cameraId').val();
           if(FromDateID){
               $.ajax({
                   type:'POST',
                   url:'ajaxData.php',
                   data:'FromDate_id='+FromDateID+'&cameraId='+cameraId,
                   success:function(html){
                       $('#FromTime').html(html);
                   }
               });
           }else{
               $('#FromTime').html('<option value="">Select FromDate first</option>');
           }
       });
         });
           $(document).ready(function(){
       $('#ToDate').on('change',function(){
                  var ToDateID = $(this).val();
                  var cameraId = $('#cameraId').val();
                  if(ToDateID){
                      $.ajax({
                          type:'POST',
                          url:'ajaxData.php',
                          data:'ToDate_id='+ToDateID+'&cameraId='+cameraId,
                          success:function(html){
                              $('#ToTime').html(html);
                          }
                      });
                  }else{
                      $('#ToTime').html('<option value="">Select FromDate 1</option>');
                  }
              });
   });
   </script> 	
    	<style>
    body {
      background:url(css/bg.jpg);
    }
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 155px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #45a049;
}
    .content {
    background-color:#64FFF1 ;
      max-width: 400px;
      margin: auto;
      padding: 10px;
    }
    .form-label{
    color:black;
    }
    	</style>
    	</head>
    	<body>
    	<br>
<div class="content">
						<form>
						<br>
						<input type="hidden" value="<?php echo $cameraId; ?>" name="cameraId" id="cameraId">
						<center><span style="color:black;font-style:Comic Sans;">Booking Details</span></center>
										<span class="form-label">Name</span><br>
										<input class="form-control" type="text" placeholder="Name"><br>
										<span class="form-label">Phone</span><br>
										<input class="form-control" type="text" placeholder="Phone"><br>
										<span class="form-label">From Date</span><br>
			<input type="text" name="FromDate" id="FromDate"  class="form-control datepicker" onfocus="this.blur()" placeholder="mm/dd/yy" required><br>
										<span class="form-label">From Time</span><br>
										<select class="form-control select" name="FromTime" id="FromTime">
										<option value="">Select Date first</option>
										</select>
										<span class="select-arrow"></span><br>
										<span class="form-label">Returning Date</span><br>
			<input type="text" name="ToDate" class="form-control datepicker" id="ToDate" onfocus="this.blur()" placeholder="mm/dd/yy" required><br>
										<span class="form-label">Returning Time</span><br>
										<select class="form-control select" id="ToTime" name="ToTime">
										<option value="">Select Date first</option>
										</select>
										<span class="select-arrow"></span><br>
										<span class="form-label">Delivery To:</span><br>
										<select class="form-control select" name="place">
										<option selected disabled>Select place where to delivery camera.</option>
											<option value="Kanaka Durgamma Temple">Kanaka Durgamma Temple</option>
											<option value="Royal Circle">Royal Circle</option>
											<option value="Moti Circle">Moti Circle</option>
											<option value="MG Circle">MG Circle</option>
											<option value="S.P Circle">S.P Circle</option>
											<option value="Sangam Circle">Sangam Circle</option>
										</select>
<br>									<input type="submit" name="submit" value="Book Now">
</div>
</body>
<script type="text/javascript">
var disableDates=<?php echo $booked_date; ?>;
$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    beforeShowDay: function(date){
        dmy = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
        if(disableDates.indexOf(dmy) != -1){
            return false;
        }else{
        return true;
        }}});
</script>
</html>