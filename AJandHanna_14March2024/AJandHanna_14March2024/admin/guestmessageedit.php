<?php
    $_HeaderTitle = 'Guest Message - Edit';  
    include '../admin/config/header.php'; 
    include '../admin/config/crud.php';
    include '../admin/config/helper.php';


    if (isset($_GET['id'])) {
        //== GET EMPLOYEE LIST ==        
        $guestmessageinfo = _getAllDataByParam('guestmessage','id=' . $_GET['id'] . " AND twds_ci_id = '$WebClientID'");
        
        //var_dump($guestmessageinfo);
        $guestmessageinfolist = array(); // empty array
        if ($guestmessageinfo != null && $guestmessageinfo['count'] != 0){       
            $guestmessageinfolist = $guestmessageinfo['data'][0];
        }
        else{
            $guestmessageinfolist = null;
        }
    }
    else{
        echo (popUp("warning","No Data Found", "No Record Found!","guestmessage.php"));
    }    

?>
<!-- Main content -->

    <!-- Page Content -->

<form method="post">
<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="panel-title">
    <b><i class="fa fa-weixin"></i> Guest Message Information</b>
    <div class="btn-group pull-right">
        <button class="btn btn-success btn-xs" id="btnUpdate"  type="submit" name="btnUpdate"><i class="fa fa-save"></i>&nbsp;Update</button>
        <a href="guestmessage.php" class="btn btn-xs btn-default float-right" style="color: black;"><i class="fa fa-undo"></i>&nbsp;Back</a>
    </div>
  </div>
  </div>
  <div class="panel-body">

 <?php 
                echo '
                <input type="hidden" id="_id" name="_id" value="'. $guestmessageinfolist["id"] .'"/>
                <div class="form-group">
                <b>Guest Name: </b>
                <input type="text" id="guestmessagetitle" name="guestmessagetitle" value="'. $guestmessageinfolist["guestname"] .'" class="form-control" placeholder="Guest Name" required />
                </div>';

                echo '
                <div class="form-group">
                <b>Message (max 500 characters): </b>
                <textarea id="guestmessageanswer" name="guestmessageanswer" class="form-control" placeholder="Message" cols="10" rows="10" required>'. $guestmessageinfolist["message"] .'</textarea>
                </div>';

                echo '
                <div class="form-group">
                <b>Is Active: </b>
                    <select class="dropdown form-control" id="isactive" name="isactive">
                        <option value="">[Select]</option>
                        <option value="1" '. ($guestmessageinfolist["isactive"] == '1' ? "selected" : "") .'>Active</option>
                        <option value="0" '. ($guestmessageinfolist["isactive"] == '0' ? "selected" : "") .'>Inactive</option>
                    </select>
                </div>';
                ?>

  </div>
</div>
</form>
   
   <?php include '../admin/config/footer.php' ?>

 <?php

  if (ISSET($_POST["btnUpdate"])){
    $_id=$_POST['_id'];
    $guestmessagetitle=$_POST['guestmessagetitle'];
    $guestmessageanswer=$_POST['guestmessageanswer'];
    $modifiedby= $_SESSION["isLogin"]['name'];
    $modifieddate= date("Y-m-d H:i:s");   
    $isactive=$_POST['isactive'];

    $tablename = 'guestmessage';
    $columvalues =  "guestname='$guestmessagetitle',
                   message='$guestmessageanswer',
                   modifiedby='$modifiedby',
                   modifieddate='$modifieddate',
                   isactive='$isactive',
                   twds_ci_id = '$WebClientID'";
    $filter= "id='$_id'";

    $result = _updateData($tablename,$columvalues,$filter);
    if($result['data']) { 
        echo (popUp("success","Updated!", "(" . $result['count'] . ") Record Updated!","guestmessage.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}
?>