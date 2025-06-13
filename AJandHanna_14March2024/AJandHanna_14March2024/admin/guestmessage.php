<?php
$_HeaderTitle = 'Guest Message List';  
include '../admin/config/header.php'; 
include '../admin/config/crud.php';
include '../admin/config/helper.php';

//== GET EMPLOYEE LIST ==
$guestmessage_info = _getAllDataByParam('guestmessage',"twds_ci_id = '$WebClientID'");
$guestmessagelist = array(); // empty array
if ($guestmessage_info != null && $guestmessage_info['count'] != 0){       
    $guestmessagelist = $guestmessage_info['data'];
}
else{
    $guestmessagelist = null;
}
//  var_dump ($guestmessage_info);
?>

<!-- Main content -->

<!-- Page Content -->


<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <b><i class="fa fa-weixin"></i>&nbsp;Guest Message List</b>
            <button type="button" class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Add</button>
        </div>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed  <?php ($guestmessagelist == null ? "" : "jqdatatable") ?>">
            <thead>
                <tr>
                    <th scope="col" style="width: 100px;">Action
                    </th>
                    <th scope="col">Guest Name
                    </th>
                    <th scope="col">Message
                    </th>
                    <th scope="col">Modified By
                    </th>
                    <th scope="col">Modified Date
                    </th>
                     <th scope="col">Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //DO LOOP HERE
                //var_dump($empdataList);
                if ($guestmessagelist == null){
                    echo '<tr><td colspan="6" class="text-center">-- No Records Found! --</td></tr>';
                }
                else{
                    foreach ($guestmessagelist as $row){
                        echo '<tr>';
                        echo ('<td><form method="post"><div class="btn-group-vertical" role="group" width="100%"><a href="guestmessageedit.php?id='. $row["id"] .'" class="btn btn-sm btn-primary" style="width:100%"><i class="fa fa-edit"></i>&nbsp;Edit</a><button type="submit" onclick="return confirm(\'Are you sure you want to delete this?\');" class="btn btn-sm btn-danger" name="btnDelete" id="btnDelete" title="Delete" value="'. $row["id"].'"><i class="fa fa-trash"></i>&nbsp;Delete</button></div></form></td>');
                        echo '<td>'. $row["guestname"] .'</td>';
                        echo '<td>'. strip_tags(substr($row["message"],0,50)) .'</td>';
                        echo '<td>'. $row['modifiedby'] .'</td>';
                        echo '<td>'. $row['modifieddate'] .'</td>';
                        echo '<td>'.($row['isactive'] == "1" ? "<span class='badge' style='background-color:green'>Active</span>" : "<span class='badge' style='background-color:red'>Inactive</span>") .'</td>';
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
                    <label class="modal-title">Add A Message</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="guestmessagetitle">Guest Name:</label>
                        <input type="text" id="guestmessagetitle" name="guestmessagetitle" class="form-control" placeholder="Guest Name" required />
                    </div>

                    <div class="form-group">
                        <label for="guestmessageanswer">Message (max 500 characters):</label>
                        <textarea id="guestmessageanswer" name="guestmessageanswer" class="form-control" rows="10" cols="10" required></textarea>
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
    $guestmessagetitle= $_POST['guestmessagetitle'];
    $guestmessageanswer= $_POST['guestmessageanswer'];
    $createdby= $_SESSION["isLogin"]['name'];
    $createddate= date("Y-m-d H:i:s");
    $isactive = 1;

    $tablename = 'guestmessage';
    $tablecolumns = 'guestname, 
                  message, 
                  createdby, 
                  createddate, 
                  modifiedby, 
                  modifieddate, 
                  isactive,
                  twds_ci_id';
    $columvalues =  "'$guestmessagetitle',
                  '$guestmessageanswer',
                  '$createdby',
                  '$createddate',
                  '$createdby',
                  '$createddate',
                  '1',
                  '$WebClientID'";

    $result = _saveData($tablename,$tablecolumns,$columvalues);
    if($result['data']) { 
        echo (popUp("success","Saved", "(" . $result['count'] . ") Record Saved!","guestmessage.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}

//===DELETE EMPLOYEE=====
else if (ISSET($_POST["btnDelete"])) {
    $rowID = $_POST["btnDelete"];
    //echo("<script>alert('". $rowID ."')</script>");
    $result = _removeData('guestmessage','id=' . $rowID . " AND twds_ci_id = '$WebClientID'");
    //var_dump($result);
    if ($result != null && $result['count'] != 0){       
        echo (popUp("success","Deleted!","(" . $result['count'] . ") Item Deleted!!","guestmessage.php"));
    }
    else{
        echo (popUp("error","", "Problem in Deleting Record.",""));
    }

}

?>