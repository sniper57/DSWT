<?php
    $_HeaderTitle = 'FAQ Edit';  
    include '../admin/config/header.php'; 
    include '../admin/config/crud.php';
    include '../admin/config/helper.php';


    if (isset($_GET['id'])) {
        //== GET EMPLOYEE LIST ==
        $faqinfo = _getAllDataByParam('faq','id=' . $_GET['id'] . " AND twds_ci_id = '$WebClientID'");
        
        //var_dump($faqinfo);
        $faqinfolist = array(); // empty array
        if ($faqinfo != null && $faqinfo['count'] != 0){       
            $faqinfolist = $faqinfo['data'][0];
        }
        else{
            $faqinfolist = null;
        }
    }
    else{
        echo (popUp("warning","No Data Found", "No Record Found!","faq.php"));
    }    

?>
<!-- Main content -->

    <!-- Page Content -->

<form method="post">
<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="panel-title">
    <b><i class="fa fa-info-circle"></i> FAQ Information</b>
    <div class="btn-group pull-right">
        <button class="btn btn-success btn-xs" id="btnUpdate"  type="submit" name="btnUpdate"><i class="fa fa-save"></i>&nbsp;Update</button>
        <a href="faq.php" class="btn btn-xs btn-default float-right" style="color: black;"><i class="fa fa-undo"></i>&nbsp;Back</a>
    </div>
  </div>
  </div>
  <div class="panel-body">

 <?php 
                echo '
                <input type="hidden" id="_id" name="_id" value="'. $faqinfolist["Id"] .'"/>
                <div class="form-group">
                <b>FAQ Title: </b>
                <input type="text" id="faqtitle" name="faqtitle" value="'. $faqinfolist["FAQTitle"] .'" class="form-control" placeholder="FAQ Title" required />
                </div>';

                echo '
                <div class="form-group">
                <b>FAQ Answer (max 2000 characters): </b>
                <textarea id="faqanswer" name="faqanswer" class="form-control" placeholder="FAQ Answer" cols="10" rows="10" required>'. $faqinfolist["FAQAnswer"] .'</textarea>
                </div>';

                echo '
                <div class="form-group">
                <b>Is Active: </b>
                    <select class="dropdown form-control" id="isactive" name="isactive">
                        <option value="">[Select]</option>
                        <option value="1" '. ($faqinfolist["isactive"] == '1' ? "selected" : "") .'>Active</option>
                        <option value="0" '. ($faqinfolist["isactive"] == '0' ? "selected" : "") .'>Inactive</option>
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
    $faqtitle=$_POST['faqtitle'];
    $faqanswer=$_POST['faqanswer'];
    $modifiedby= $_SESSION["isLogin"]['name'];
    $modifieddate= date("Y-m-d H:i:s");   
    $isactive=$_POST['isactive'];

    $tablename = 'faq';
    $columvalues =  "FAQTitle='$faqtitle',
                   FAQAnswer='$faqanswer',
                   ModifiedBy='$modifiedby',
                   ModifiedDate='$modifieddate',
                   isactive='$isactive',
                   twds_ci_id = '$WebClientID'";
    $filter= "id='$_id'";

    $result = _updateData($tablename,$columvalues,$filter);
    if($result['data']) { 
        echo (popUp("success","Updated!", "(" . $result['count'] . ") Record Updated!","faq.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}
?>