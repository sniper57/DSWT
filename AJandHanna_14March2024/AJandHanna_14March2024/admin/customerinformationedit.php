<?php
$_HeaderTitle = 'Customer Information Edit';  
include '../admin/config/header.php'; 
include '../admin/config/crud.php';
include '../admin/config/helper.php';


if (isset($_GET['id'])) {
    //== GET EMPLOYEE LIST ==
    $customerinformation = _getAllDataByParam('twds_customerinformation','id=' . $_GET['id']);
    
    //var_dump($customerinformation);
    $customerinformationlist = array(); // empty array
    if ($customerinformation != null && $customerinformation['count'] != 0){       
        $customerinformationlist = $customerinformation['data'][0];
    }
    else{
        $customerinformationlist = null;
    }


    //== GET PACKAGE LIST ==
    $package_info = _getAllDataByParam('twds_packagelist','IsActive = "1"');
    $packagelist = array(); // empty array
    if ($package_info != null && $package_info['count'] != 0){       
        $packagelist = $package_info['data'];
    }
    else{
        $packagelist = null;
    }
    //  var_dump ($package_info);

}
else{
    echo (popUp("warning","No Data Found", "No Record Found!","customerinformation.php"));
}




?>
<!-- Main content -->

<!-- Page Content -->

<form method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">
                <b><i class="fa fa-user"></i>Customer Information</b>
                <div class="btn-group pull-right">
                    <button class="btn btn-success btn-xs" id="btnUpdate" name="btnUpdate" type="submit"><i class="fa fa-save"></i>&nbsp;Update</button>
                    <a href="customerinformation.php" class="btn btn-xs btn-default float-right" style="color: black;"><i class="fa fa-undo"></i>&nbsp;Back</a>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <?php

            echo '
                <div class="form-group">
                <b>Web ID: </b>
                <input type="text" id="ClientWebID" name="ClientWebID" value="'. $customerinformationlist["ClientWebID"] .'" class="form-control" placeholder="ClientWebID" required />
                </div>';

            echo '
                <input type="hidden" id="_id" name="_id" value="'. $customerinformationlist["ID"] .'"/>                
                <div class="form-group">
                <b>ClientName: </b>
                <input type="text" id="ClientName" name="ClientName" value="'. $customerinformationlist["ClientName"] .'" class="form-control" placeholder="ClientName"/>
                </div>';

            echo '
                <div class="form-group">
                <b>ContactNumber: </b>
                <input type="text" id="ContactNumber" name="ContactNumber" value="'. $customerinformationlist["ContactNumber"] .'" class="form-control" placeholder="ContactNumber" required />
                </div>';

            echo '
                <div class="form-group">
                <b>EmailAddress: </b>
                <input type="text" id="EmailAddress" name="EmailAddress" value="'. $customerinformationlist["EmailAddress"] .'" class="form-control" placeholder="EmailAddress" required />
                </div>';

            echo '
                <div class="form-group">
                <b>Address: </b>
                <textarea rows="3" cols="5" id="Address" name="Address" class="form-control">'. $customerinformationlist["Address"] .'</textarea>
                </div>';

            echo '
                <div class="form-group">
                <b>Package: </b>
                    <select class="dropdown form-control" id="Package" name="Package">
                        <option value="">[Select]</option>';

                            foreach ($packagelist as $row){
                                echo '<option value="'. $row["PackageName"] .'" '. ($row["PackageName"] == $customerinformationlist["Package"] ? "selected" : "") .'>'. $row["PackageName"] . '=='. strip_tags(substr($row["Description"],0,50)) .'</option>';
                            }                            

            echo'    </select>
                </div>';

            echo '
                <div class="form-group">
                <b>ActivationDateStart: </b>
                <input type="date" id="ActivationDateStart" name="ActivationDateStart" value="'. $customerinformationlist["ActivationDateStart"] .'" class="form-control" required />
                </div>';

            echo '
                <div class="form-group">
                <b>ActivationDateEnd: </b>
                <input type="date" id="ActivationDateEnd" name="ActivationDateEnd" value="'. $customerinformationlist["ActivationDateEnd"] .'" class="form-control" required />
                </div>';

           

            echo '
                <div class="form-group">
                <b>Is Active: </b>
                    <select class="dropdown form-control" id="isActive" name="isActive">
                        <option value="">[Select]</option>
                        <option value="1" '. ($customerinformationlist["isActive"] == '1' ? "selected" : "") .'>Active</option>
                        <option value="0" '. ($customerinformationlist["isActive"] == '0' ? "selected" : "") .'>Inactive</option>
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
    $ClientWebID=$_POST['ClientWebID'];
    $ClientName=$_POST['ClientName'];
    $ContactNumber=$_POST['ContactNumber'];
    $EmailAddress=$_POST['EmailAddress'];
    $Address=$_POST['Address'];
    $Package=$_POST['Package'];
    $ActivationDateStart=$_POST['ActivationDateStart'];
    $ActivationDateEnd=$_POST['ActivationDateEnd'];
    $Address=$_POST['Address'];
    $ModifiedBy= $_SESSION["isLogin"]['name'];
    $ModifiedDate= date("Y-m-d H:i:s");   
    $isactive=$_POST['isActive'];    


    $tablename = 'twds_customerinformation';
    $columvalues = "ClientWebID='$ClientWebID', ClientName='$ClientName', ContactNumber='$ContactNumber', EmailAddress='$EmailAddress', Address='$Address', Package='$Package', ActivationDateStart='$ActivationDateStart', ActivationDateEnd='$ActivationDateEnd', ModifiedBy = '$ModifiedBy', ModifiedDate='$ModifiedDate', isActive='$isactive'";    
    $filter= "id='$_id'";

    $result = _updateData($tablename,$columvalues,$filter);
    if($result['data']) { 
        echo (popUp("success","Updated!", "(" . $result['count'] . ") Record Updated!","customerinformation.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}
?>