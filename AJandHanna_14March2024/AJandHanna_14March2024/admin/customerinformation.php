<?php
$_HeaderTitle = 'Customer Information';  
include '../admin/config/header.php'; 
include '../admin/config/crud.php';
include '../admin/config/helper.php';

//== GET CUSTOMER INFORMATION LIST ==
$customerinformation_info = _getAllData('twds_customerinformation');
$customerinformationlist = array(); // empty array
if ($customerinformation_info != null && $customerinformation_info['count'] != 0){       
    $customerinformationlist = $customerinformation_info['data'];
}
else{
    $customerinformationlist = null;
}
//  var_dump ($customerinformation_info);


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
?>
<!-- Main content -->

<!-- Page Content -->

<style>
    .title {
        font-size: 18px;
        margin: 15px 0;
        position: relative;
        padding-left: 10px;
    }

        .title:before {
            content: '';
            width: 4px;
            height: 12px;
            display: block;
            background-color: #5995F1;
            position: absolute;
            top: 50%;
            left: 0;
            margin-top: -6px;
        }



    .plugin-desc {
        margin-top: 20px;
    }


    .img-preview-mask {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9998;
        background-color: rgba(0,0,0,.8);
    }

    .img-preview-popover {
        position: fixed;
        z-index: 9999;
    }

    .img-preview-foot {
        width: 100%;
        padding: 0 2%;
        position: absolute;
        bottom: 0;
        background-color: rgba(0,0,0,.5);
        font-family: 'Roboto';
    }

    .img-foot-title {
        font-size: 16px;
        color: #fff;
        margin-top: 5px;
    }

    .img-foot-desc {
        font-size: 12px;
        color: #fff;
        margin-top: 5px;
        line-height: 24px;
    }
</style>

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <b><i class="fa fa-users"></i>&nbsp;Customer Information List</b>
            <button type="button" class="btn btn-xs btn-default pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Add</button>
        </div>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed  <?php echo ($customerinformationlist == null ? "" : "jqdatatable") ?>">
            <thead>
                <tr>
                    <th scope="col" style="width: 100px;">Action
                    </th>
                    <th scope="col">Web ID 
                    </th>
                    <th scope="col">Client Name 
                    </th>
                    <th scope="col">Contact#
                    </th>
                    <th scope="col">Email
                    </th>
                    <th scope="col">Address
                    </th>
                    <th scope="col">Package
                    </th>
                    <th scope="col">Activation StartDate
                    </th>
                    <th scope="col">Activation EndDate
                    </th>                   
                    <th scope="col">Modified By
                    </th>
                    <th scope="col">Modified Date
                    </th>
                    <th scope="col">Active
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //DO LOOP HERE
                //var_dump($empdataList);
                if ($customerinformationlist == null){
                    echo '<tr><td colspan="14" class="text-center">-- No Records Found! --</td></tr>';
                }
                else{
                    foreach ($customerinformationlist as $row){                        
                        echo '<tr>';
                        echo '<td><form method="post"><div class="btn-group-vertical" role="group" width="100%"><a href="customerinformationedit.php?id='. $row["ID"] .'" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i>&nbsp;Edit</a><button type="submit" onclick="return confirm(\'Are you sure you want to delete this?\');" class="btn btn-sm btn-danger" name="btnDelete" id="btnDelete" title="Delete" value="'. $row["ID"].'"><i class="fa fa-trash"></i>&nbsp;Delete</button></div></form></td>';                                              
                        echo '<td>'. $row["ClientWebID"] .'</td>';
                        echo '<td>'. $row["ClientName"] .'</td>';
                        echo '<td>'. $row["ContactNumber"] .'</td>';
                        echo '<td>'. $row["EmailAddress"] .'</td>';
                        echo '<td>'. $row["Address"] .'</td>';
                        echo '<td>'. $row["Package"] .'</td>';
                        echo '<td>'. $row["ActivationDateStart"] .'</td>';
                        echo '<td>'. $row["ActivationDateEnd"] .'</td>';                       
                        echo '<td>'. $row['ModifiedBy'] .'</td>';
                        echo '<td>'. $row['ModifiedDate'] .'</td>';
                        echo '<td>'.($row['isActive'] == "1" ? "<span class='badge' style='background-color:green'>Active</span>" : "<span class='badge' style='background-color:red'>Inactive</span>") .'</td>';
                        echo '</tr>';                        
                    };
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="post">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <label class="modal-title">Add Customer Information</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="username">ClientName:</label>
                        <input type="text" id="ClientName" name="ClientName" class="form-control" placeholder="ClientName" required />
                    </div>

                     <div class="form-group">
                        <label for="ClientWebID">Web ID:</label>
                        <input type="text" id="ClientWebID" name="ClientWebID" class="form-control" placeholder="ClientWebID" required />
                    </div>

                   <div class="form-group">
                        <label for="username">ContactNumber:</label>
                        <input type="text" id="ContactNumber" name="ContactNumber" class="form-control" placeholder="ContactNumber" required />
                    </div>

                    <div class="form-group">
                        <label for="username">EmailAddress:</label>
                        <input type="text" id="EmailAddress" name="EmailAddress" class="form-control" placeholder="EmailAddress" required />
                    </div>

                    <div class="form-group">
                        <label for="username">Address:</label>
                        <textarea id="Address" name="Address" cols="5" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="username">Package:</label>
                        <select class="form-control dropdown" id="Package" name="Package" required>
                            <option value="">[Select]</option>
                            <?php                
                            foreach ($packagelist as $row){
                                echo '<option value="'. $row["PackageName"] .'">'. $row["PackageName"] . '=='. $row["Description"] .'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fullname">ActivationDateStart:</label>
                        <input type="date" id="ActivationDateStart" name="ActivationDateStart" class="form-control" required>
                    </div>

                     <div class="form-group">
                        <label for="fullname">ActivationDateEnd:</label>
                        <input type="date" id="ActivationDateEnd" name="ActivationDateEnd" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>&nbsp;Save</button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php include '../admin/config/footer.php' ?>

<?php 
//===SAVE NEW customerinformation=====
if (ISSET($_POST["btnSubmit"])){

    $ClientWebID= $_POST['ClientWebID'];   
    $ClientName= $_POST['ClientName'];   
    $ContactNumber=$_POST['ContactNumber'];
    $EmailAddress=$_POST['EmailAddress'];    
    $Address=mysql_real_escape_string($_POST['Address']);
    $Package=$_POST['Package'];
    $ActivationDateStart=$_POST['ActivationDateStart'];
    $ActivationDateEnd=$_POST['ActivationDateEnd'];

    $CreatedBy= $_SESSION["isLogin"]['name'];
    $CreatedDate= date("Y-m-d H:i:s");
    $ModifiedBy= $_SESSION["isLogin"]['name'];
    $ModifiedDate= date("Y-m-d H:i:s");
    $isActive = 1;
       

    $tablename = 'twds_customerinformation';
    $tablecolumns = 'ClientWebID, ClientName, ContactNumber, EmailAddress, Address, Package, ActivationDateStart, ActivationDateEnd, CreatedBy, CreatedDate, ModifiedBy, ModifiedDate, isActive';
    $columvalues =  "'$ClientWebID','$ClientName', '$ContactNumber', '$EmailAddress', '$Address', '$Package', '$ActivationDateStart', '$ActivationDateEnd', '$CreatedBy', '$CreatedDate', '$ModifiedBy', '$ModifiedDate', '$isActive'";

    $result = _saveData($tablename,$tablecolumns,$columvalues);
    if($result['data']) { 
        echo (popUp("success","Saved", "(" . $result['count'] . ") Record Saved!","customerinformation.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}

//===EDIT EMPLOYEE=====

//===DELETE EMPLOYEE=====
else if (ISSET($_POST["btnDelete"])) {
    $rowID = $_POST["btnDelete"];
    //echo("<script>alert('". $rowID ."')</script>");
    $result = _removeData('twds_customerinformation','id=' . $rowID);
    //var_dump($result);
    if ($result != null && $result['count'] != 0){       
        echo (popUp("success","Deleted!","(" . $result['count'] . ") Item Deleted!!","customerinformation.php"));
    }
    else{
        echo (popUp("error","", "Problem in Deleting Record.",""));
    }

}

?>