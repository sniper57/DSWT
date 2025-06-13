<?php
$_HeaderTitle = 'Package List';  
include '../admin/config/header.php'; 
include '../admin/config/crud.php';
include '../admin/config/helper.php';

//== GET EMPLOYEE LIST ==
$package_info = _getAllData('twds_packagelist');
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


<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <b><i class="fa fa-file"></i>&nbsp;Package List</b>
            <button type="button" class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Add</button>
        </div>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed  <?php echo ($packagelist == null ? "" : "jqdatatable") ?>">
            <thead>
                <tr>
                    <th scope="col" style="width: 100px;">Action
                    </th>
                    <th scope="col">Package Name
                    </th>
                    <th scope="col">Price
                    </th>
                    <th scope="col">Description
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
                if ($packagelist == null){
                    echo '<tr><td colspan="6" class="text-center">-- No Records Found! --</td></tr>';
                }
                else{
                    foreach ($packagelist as $row){
                        echo '<tr>';
                        echo ('<td><form method="post"><div class="btn-group-vertical" role="group" width="100%"><a href="packagelistedit.php?id='. $row["ID"] .'" class="btn btn-sm btn-primary" style="width:100%"><i class="fa fa-edit"></i>&nbsp;Edit</a><button type="submit" onclick="return confirm(\'Are you sure you want to delete this?\');" class="btn btn-sm btn-danger" name="btnDelete" id="btnDelete" title="Delete" value="'. $row["ID"].'"><i class="fa fa-trash"></i>&nbsp;Delete</button></div></form></td>');
                        echo '<td>'. $row["PackageName"] .'</td>';
                        echo '<td>'. $row["Price"] .'</td>';
                        echo '<td>'. strip_tags(substr($row["Description"],0,50)) .'</td>';
                        echo '<td>'. $row['ModifiedBy'] .'</td>';
                        echo '<td>'. $row['ModifiedDate'] .'</td>';
                        echo '<td>'.($row['IsActive'] == "1" ? "<span class='badge' style='background-color:green'>Active</span>" : "<span class='badge' style='background-color:red'>Inactive</span>") .'</td>';
                        echo '</tr>';
                    }
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
                    <label class="modal-title">Add Packge</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="PackageName">PackageName:</label>
                        <input type="text" id="PackageName" name="PackageName" class="form-control" placeholder="PackageName" required />
                    </div>

                    <div class="form-group">
                        <label for="Price">Price:</label>
                        <input type="text" id="Price" name="Price" class="form-control" placeholder="Price" required />
                    </div>

                    <div class="form-group">
                        <label for="Description">Description (max 200 characters):</label>
                        <textarea maxlength="200" id="Description" name="Description" class="form-control" rows="10" cols="10" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i>&nbsp;Save</button>
                        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php include '../admin/config/footer.php' ?>

<?php 
//===SAVE NEW EMPLOYEE=====
if (ISSET($_POST["btnSubmit"])){
    $PackageName= $_POST['PackageName'];
    $Description= $_POST['Description'];
    $Price= $_POST['Price'];
    $createdby= $_SESSION["isLogin"]['name'];
    $createddate= date("Y-m-d H:i:s");
    $modifiedby= $_SESSION["isLogin"]['name'];
    $modifieddate= date("Y-m-d H:i:s");
    $isactive = 1;

    $tablename = 'twds_packagelist';
    $tablecolumns = 'PackageName, 
                  Description,
                  Price,
                  createdby, 
                  createddate, 
                  modifiedby, 
                  modifieddate, 
                  isactive';
    $columvalues =  "'$PackageName',
                  '$Description',
                  '$Price',
                  '$createdby',
                  '$createddate',
                  '$modifiedby',
                  '$modifieddate',
                  '1'";

    $result = _saveData($tablename,$tablecolumns,$columvalues);
    if($result['data']) { 
        echo (popUp("success","Saved", "(" . $result['count'] . ") Record Saved!","packagelist.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}

//===DELETE EMPLOYEE=====
else if (ISSET($_POST["btnDelete"])) {
    $rowID = $_POST["btnDelete"];
    //echo("<script>alert('". $rowID ."')</script>");
    $result = _removeData('twds_packagelist','ID=' . $rowID);
    //var_dump($result);
    if ($result != null && $result['count'] != 0){       
        echo (popUp("success","Deleted!","(" . $result['count'] . ") Item Deleted!!","packagelist.php"));
    }
    else{
        echo (popUp("error","", "Problem in Deleting Record.",""));
    }

}

?>