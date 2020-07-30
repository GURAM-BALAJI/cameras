<head>
    <link href="src/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script language="javascript">
        $(document).ready(function () {

            $("#txtdate").datepicker({
                minDate: 0
            });
             $("#txtdate2").datepicker({
                            minDate: 0
                        });
        });
    </script>
    <style>
    input[type=text],input[type=time], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }
    </style>
</head>
<body>
<form action="index.php" method="POST">
<center><b>Check Availability</b>
   <br><br> From Date :<br>
    <input id="txtdate" name="fromdate" type="text" onfocus="this.blur()" placeholder="mm/dd/yy" required>
    <br> From Time :<br>
        <select name="fromtime" required>
        <option value="00">12-AM(Night)</option>
        <option value="01">1-AM (Night)</option>
        <option value="02">2-AM (Night)</option>
        <option value="03">3-AM (Night)</option>
        <option value="04">4-AM (Night)</option>
        <option value="05">5-AM (Night)</option>
        <option value="06">6-AM</option>
        <option value="07">7-AM</option>
        <option value="08">8-AM</option>
        <option value="09">9-AM</option>
        <option value="10">10-AM</option>
        <option value="11">11-AM</option>
        <option value="12">12-PM</option>
        <option value="13">1-PM</option>
        <option value="14">2-PM</option>
        <option value="15">3-PM</option>
        <option value="16">4-PM</option>
        <option value="17">5-PM</option>
        <option value="18">6-PM</option>
        <option value="19">7-PM (Night)</option>
        <option value="20">8-PM (Night)</option>
        <option value="21">9-PM (Night)</option>
        <option value="22">10-PM (Night)</option>
        <option value="23">11-PM (Night)</option>
                    </select>
      To Date :<br>
        <input id="txtdate2" name="todate" type="text" onfocus="this.blur()"  placeholder="mm/dd/yy" required>
        <br> To Time :<br>
 <select name="totime" required>
              <option value="00">12-AM (Night)</option>
               <option value="01">1-AM (Night)</option>
               <option value="02">2-AM (Night)</option>
               <option value="03">3-AM (Night)</option>
               <option value="04">4-AM (Night)</option>
               <option value="05">5-AM (Night)</option>
               <option value="06">6-AM</option>
               <option value="07">7-AM</option>
               <option value="08">8-AM</option>
               <option value="09">9-AM</option>
               <option value="10">10-AM</option>
               <option value="11">11-AM</option>
               <option value="12">12-PM</option>
               <option value="13">1-PM</option>
               <option value="14">2-PM</option>
               <option value="15">3-PM</option>
               <option value="16">4-PM</option>
               <option value="17">5-PM</option>
               <option value="18">6-PM</option>
               <option value="19">7-PM (Night)</option>
               <option value="20">8-PM (Night)</option>
               <option value="21">9-PM (Night)</option>
               <option value="22">10-PM (Night)</option>
               <option value="23">11-PM (Night)</option>
            </select>
      <input type="submit" value="Search">
</center>
</form>
</body>