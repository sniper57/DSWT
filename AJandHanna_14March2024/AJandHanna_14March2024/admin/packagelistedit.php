<?php
    $_HeaderTitle = 'Package Edit';  
    include '../admin/config/header.php'; 
    include '../admin/config/crud.php';
    include '../admin/config/helper.php';


    if (isset($_GET['id'])) {
        //== GET EMPLOYEE LIST ==
        $packageinfo = _getAllDataByParam('twds_packagelist','ID=' . $_GET['id']);
        
        //var_dump($packageinfo);
        $packageinfolist = array(); // empty array
        if ($packageinfo != null && $packageinfo['count'] != 0){       
            $packageinfolist = $packageinfo['data'][0];
        }
        else{
            $packageinfolist = null;
        }
    }
    else{
        echo (popUp("warning","No Data Found", "No Record Found!","packagelist.php"));
    }    

?>
<!-- Main content -->

    <!-- Page Content -->

<form method="post">
<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="panel-title">
    <b><i class="fa fa-file"></i> Package List</b>
    <div class="btn-group pull-right">
        <button class="btn btn-success btn-xs" id="btnUpdate"  type="submit" name="btnUpdate"><i class="fa fa-save"></i>&nbsp;Update</button>
        <a href="packagelist.php" class="btn btn-xs btn-default float-right" style="color: black;"><i class="fa fa-undo"></i>&nbsp;Back</a>
    </div>
  </div>
  </div>
  <div class="panel-body">

 <?php 
                echo '
                <input type="hidden" id="_id" name="_id" value="'. $packageinfolist["ID"] .'"/>
                <div class="form-group">
                <b>FAQ Title: </b>
                <input type="text" id="PackageName" name="PackageName" value="'. $packageinfolist["PackageName"] .'" class="form-control" placeholder="PackageName" required />
                </div>';

                echo '       
                <div class="form-group">
                <b>Price: </b>
                <input type="text" id="Price" name="Price" value="'. $packageinfolist["Price"] .'" class="form-control" placeholder="Price" required />
                </div>';

                echo '
                <div class="form-group">
                <b>Description (max 200 characters): </b>
                <textarea maxlength="200" id="Description" name="Description" class="form-control" placeholder="Description" cols="10" rows="10" required>'. $packageinfolist["Description"] .'</textarea>
                </div>';

                echo '
                <div class="form-group">
                <b>Is Active: </b>
                    <select class="dropdown form-control" id="IsActive" name="IsActive">
                        <option value="">[Select]</option>
                        <option value="1" '. ($packageinfolist["IsActive"] == '1' ? "selected" : "") .'>Active</option>
                        <option value="0" '. ($packageinfolist["IsActive"] == '0' ? "selected" : "") .'>Inactive</option>
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
    $PackageName=$_POST['PackageName'];
    $Description=$_POST['Description'];
    $Price=$_POST['Price'];
    $modifiedby= $_SESSION["isLogin"]['name'];
    $modifieddate= date("Y-m-d H:i:s");   
    $isactive=$_POST['IsActive'];

    $tablename = 'twds_packagelist';
    $columvalues =  "PackageName='$PackageName',
                   Description='$Description',
                   Price='$Price',
                   ModifiedBy='$modifiedby',
                   ModifiedDate='$modifieddate',
                   IsActive='$isactive'";
    $filter= "id='$_id'";

    $result = _updateData($tablename,$columvalues,$filter);
    if($result['data']) { 
        echo (popUp("success","Updated!", "(" . $result['count'] . ") Record Updated!","packagelist.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}
?>