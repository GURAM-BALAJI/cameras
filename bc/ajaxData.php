<?php
//Include database configuration file
require_once "includes/config.php";
$cameraId=$_POST['cameraId'];
if((isset($_POST["FromDate_id"]) && !empty($_POST["FromDate_id"])) || (isset($_POST["ToDate_id"]) && !empty($_POST["ToDate_id"])) ){
if(isset($_POST["ToDate_id"]))
$FromDate_id=$_POST['ToDate_id'];
else
$FromDate_id=$_POST['FromDate_id'];
$sql ="SELECT * FROM tblbooking WHERE ( FromDate = :FromDate_id OR ToDate=:ToDate_id ) AND bodelete=0 AND status!=2 AND book=1 AND cameraId = :cameraId";
  $query = $dbh->prepare($sql);
  $query->bindParam(':FromDate_id',$FromDate_id,PDO::PARAM_STR);
  $query->bindParam(':ToDate_id',$FromDate_id,PDO::PARAM_STR);
  $query->bindParam(':cameraId',$cameraId,PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $st="";
 if($query->rowCount() > 0){
 foreach($results as $result){
 if($result->FromDate!=$result->ToDate){
  if($result->FromDate==$FromDate_id){
  for($i=$result->FromTime;$i<24;$i++)
  $st.=','.$i;
   }else{
  for($i=0;$i<=$result->ToTime;$i++)
  $st.=','.$i;
    }
 }else{
 for($i=$result->FromTime;$i<=$result->ToTime;$i++)
  $st.=','.$i;
 }}}
 $ary=explode(',',$st);
                   if(in_array('00',$ary))
                   echo "<option disabled >12-AM (Night)</option>";
                   else
                   echo "<option value='00'>12-AM (Night)</option>";
                   if(in_array('01',$ary))
                   echo "<option disabled >1-AM (Night)</option>";
                   else
                   echo "<option value='01'>1-AM (Night)</option>";
                   if(in_array('02',$ary))
                   echo "<option disabled >2-AM (Night)</option>";
                   else
                   echo "<option value='02'>2-AM (Night)</option>";
                   if(in_array('03',$ary))
                   echo "<option disabled >3-AM (Night)</option>";
                   else
                   echo "<option value='03'>3-AM (Night)</option>";
                   if(in_array('04',$ary))
                   echo "<option disabled >4-AM (Night)</option>";
                   else
                   echo "<option value='04'>4-AM (Night)</option>";
                   if(in_array('05',$ary))
                   echo "<option disabled >5-AM (Night)</option>";
                   else
                   echo "<option value='05'>5-AM (Night)</option>";
                   if(in_array('06',$ary))
                   echo "<option disabled >6-AM</option>";
                   else
                   echo "<option value='06'>6-AM</option>";
                   if(in_array('07',$ary))
                   echo "<option disabled >7-AM</option>";
                   else
                   echo "<option value='07'>7-AM</option>";
                   if(in_array('08',$ary))
                   echo "<option disabled >8-AM</option>";
                   else
                   echo "<option value='08'>8-AM</option>";
                   if(in_array('09',$ary))
                   echo "<option disabled >9-AM</option>";
                   else
                   echo "<option value='09'>9-AM</option>";
                   if(in_array('10',$ary))
                   echo "<option disabled >10-AM</option>";
                   else
                   echo "<option value='10'>10-AM</option>";
                   if(in_array('11',$ary))
                   echo "<option disabled >11-AM</option>";
                   else
                   echo "<option value='11'>11-AM</option>";
                   if(in_array('12',$ary))
                   echo "<option disabled >12-PM</option>";
                   else
                   echo "<option value='12'>12-PM</option>";
                   if(in_array('13',$ary))
                   echo "<option disabled >1-PM</option>";
                   else
                   echo "<option value='13'>1-PM</option>";
                   if(in_array('14',$ary))
                   echo "<option disabled >2-PM</option>";
                   else
                   echo "<option value='14'>2-PM</option>";
                   if(in_array('15',$ary))
                   echo "<option disabled >3-PM</option>";
                   else
                   echo "<option value='15'>3-PM</option>";
                   if(in_array('16',$ary))
                   echo "<option disabled >4-PM</option>";
                   else
                   echo "<option value='16'>4-PM</option>";
                   if(in_array('17',$ary))
                   echo "<option disabled >5-PM</option>";
                   else
                   echo "<option value='17'>5-PM</option>";
                   if(in_array('18',$ary))
                   echo "<option disabled >6-PM</option>";
                   else
                   echo "<option value='18'>6-PM</option>";
                   if(in_array('19',$ary))
                   echo "<option disabled >7-PM (Night)</option>";
                   else
                   echo "<option value='19'>7-PM (Night)</option>";
                   if(in_array('20',$ary))
                   echo "<option disabled >8-PM (Night)</option>";
                   else
                   echo "<option value='20'>8-PM (Night)</option>";
                   if(in_array('21',$ary))
                   echo "<option disabled >9-PM (Night)</option>";
                   else
                   echo "<option value='21'>9-PM (Night)</option>";
                   if(in_array('22',$ary))
                   echo "<option disabled >10-PM (Night)</option>";
                   else
                   echo "<option value='22'>10-PM (Night)</option>";
                   if(in_array('23',$ary))
                   echo "<option disabled >11-PM (Night)</option>";
                   else
                   echo "<option value='23'>11-PM (Night)</option>";
    }
?>