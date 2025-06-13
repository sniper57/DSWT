<?php
$_HeaderTitle = 'Users';  
include '../admin/config/header.php'; 
include '../admin/config/crud.php';
include '../admin/config/helper.php';

//== GET CLIENT LIST ==
$user_info = _getAllDataByParam('users',"twds_ci_id = '$WebClientID'");
$userlist = array(); // empty array
if ($user_info != null && $user_info['count'] != 0){       
    $userlist = $user_info['data'];
}
else{
    $userlist = null;
}
//  var_dump ($user_info);
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
            <b><i class="fa fa-user"></i>&nbsp;User Information List</b>
            <button type="button" class="btn btn-xs btn-default pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Add</button>
        </div>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed  <?php echo ($userlist == null ? "" : "jqdatatable") ?>">
            <thead>
                <tr>
                    <th scope="col" style="width: 100px;">Action
                    </th>
                    <th scope="col">Image
                    </th>
                    <th scope="col">Fullname
                    </th>
                    <th scope="col">Username
                    </th>
                    <th scope="col">Email
                    </th>
                    <th scope="col">Contact#
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
                if ($userlist == null){
                    echo '<tr><td colspan="9" class="text-center">-- No Records Found! --</td></tr>';
                }
                else{
                    foreach ($userlist as $row){
                        if($row["username"] != "administrator")
                        {
                            echo '<tr>';
                            if (strtoupper($_SESSION["isLogin"]["username"]) == strtoupper($row["username"]))
                            {
                                echo '<td>-</td>';	
                            }
                            else{
                                echo '<td><form method="post"><div class="btn-group-vertical" role="group" width="100%"><a href="usersedit.php?id='. $row["id"] .'" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i>&nbsp;Edit</a><button type="submit" onclick="return confirm(\'Are you sure you want to delete this?\');" class="btn btn-sm btn-danger" name="btnDelete" id="btnDelete" title="Delete" value="'. $row["id"].'"><i class="fa fa-trash"></i>&nbsp;Delete</button></div></form></td>';
                            }
                            
                            echo '<td><img class="img-responsive" src="'. ($row["photo"] === NULL ? "../admin/img/blank_pic.jpg" : $row["photo"]) .'" data-pic-title="'. ($row["username"] === NULL ? "Blank. Please Upload an Image!" : $row["username"]) .'" data-pic-description="'. ($row["username"] === NULL ? "Blank. Please Upload an Image!" : $row["username"]) .'" data-pic="'. ($row["photo"] === NULL ? "../admin/img/blank_pic.jpg" : $row["photo"]) .'" style="width:50px;height:50px; cursor:zoom-in" /></td>';
                            echo '<td>'. $row["name"] .'</td>';
                            echo '<td>'. $row["username"] .'</td>';
                            echo '<td>'. $row["email"] .'</td>';
                            echo '<td>'. $row["mobile"] .'</td>';
                            echo '<td>'. $row['modifiedby'] .'</td>';
                            echo '<td>'. $row['modifieddate'] .'</td>';
                            echo '<td>'.($row['isactive'] == "1" ? "<span class='badge' style='background-color:green'>Active</span>" : "<span class='badge' style='background-color:red'>Inactive</span>") .'</td>';
                            echo '</tr>';
                        }
                    };
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <label class="modal-title">Add User</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div id="frames"></div>
                        <label for="fileupload">Select File:</label><div id="DimensionWarningMsg"></div>
                        <input type="file" id="fileupload" name="fileupload" onchange="ValidateSize(this);" class="form-control" accept="image/*" />
                        <p class="text-left" style="font-size: xx-small"><b>* Photo must be 1000px by 1000px and Maximum of 2MB file size.</b></p>
                    </div>

                    <div class="form-group">
                      <label for="username">Username:</label>
                      <input type="text" id="username" name="username" class="form-control" placeholder="username" required />
                  </div>

                  <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" id="password" name="password" class="form-control" placeholder="password" required />
                  </div>

                  <div class="form-group">
                      <label for="fullname">Full Name:</label>
                      <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name">
                  </div>

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                  </div>

                    <div class="form-group">
                      <label for="contactno">Contact#:</label>
                      <input type="text" id="contactno" name="contactno" class="form-control" placeholder="Contact #">
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

<script>
    var _URL = window.URL || window.webkitURL;

    $("#fileupload").change(function (e) {

        var img_recommended_width = 1000;
        var img_recommended_height = 1000;

        var img_min_width = 250;
        var img_min_height = 250;

        var msg_warning = "";
        var counter = 0;
        var this_image = $(this);
        var img = document.getElementById('fileupload').files;
        var img_len = img.length;

        //validation first here
        //if (img_len > 4) {
        //    alert("Please select atleast 1 image. Max of 4");
        //    this.value = '';
        //    return;
        //}

        //clear frames
        $("#frames").html('');

        for (var i = 0; i < img_len; i++) {
            var this_img = document.getElementById('fileupload').files[i];

            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(document.getElementById('fileupload').files[i]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;

                //Validate the File Height and Width.
                image.onload = function () {
                    //Do Validation
                    if (this.width > img_recommended_width || this.height > img_recommended_height) {
                        msg_warning += "<p class='text-left' style='font-size: x-small; font-weight: bold'>'" + document.getElementById('fileupload').files[counter].name + " (" + this.width + "px X " + this.height + "px)' Warning: Selected Image is more than " + img_recommended_width + "px by " + img_recommended_height + "px. Oversize Image may affect page rendering.</p>";
                    }
                    else if (this.width < img_min_width || this.height < img_min_height) {
                        msg_warning += "<p class='text-left' style='font-size: x-small; font-weight: bold'>'" + document.getElementById('fileupload').files[counter].name + " (" + this.width + "px X " + this.height + "px)' Warning: Selected Image is less than the minimum recommended image size (" + img_min_width + "px by " + img_min_height + "px). It may pixelized/distort when displayed on page.</p>";
                    }
                    counter++;

                    $(this).attr('style', 'width:100px;height:100px;padding-right:3px;');
                    $("#frames").append(this);

                    if (counter == img_len) {
                        if (msg_warning != "") {
                            $("#DimensionWarningMsg").html(msg_warning);
                            document.getElementById('fileupload').value = '';
                            $("#frames").html('');
                        }
                        else {
                            //Data are valid
                            $("#DimensionWarningMsg").html('');
                        }
                    }
                };
            }
        }
    });
</script>

<?php 
//===SAVE NEW EMPLOYEE=====
if (ISSET($_POST["btnSubmit"])){

    $username= $_POST['username'];
    $password= md5(md5(md5($_POST['password'])));
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $createdby= $_SESSION["isLogin"]['name'];
    $createddate= date("Y-m-d H:i:s");
    $modifiedby= $_SESSION["isLogin"]['name'];
    $modifieddate= date("Y-m-d H:i:s");
    $isactive = 1;
    $image = '../admin/img/blank_pic.jpg';

    if($_FILES['fileupload']['size'] != 0) {
        $errors     = array();
        $maxsize    = 2097152;
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );

        if(($_FILES['fileupload']['size'] >= $maxsize) || ($_FILES["fileupload"]["size"] == 0)) {
            $errors[] = 'File too large. File must be less than 2 MB.';
        }

        if((!in_array($_FILES['fileupload']['type'], $acceptable)) && (!empty($_FILES["fileupload"]["type"]))) {
            $errors[] = 'Invalid file type. Only JPG and PNG types are accepted.';
        }

        if(count($errors) === 0) {
            //PROCEED UPLOAD
            //move_uploaded_file($_FILES['fileupload']['tmpname'], '/store/to/location.file');

            $name = mysql_real_escape_string($_FILES['fileupload']['name']);
            //var_dump($name); 
            $target_dir = "../admin/uploads/";
            $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png");
            

            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
                // Convert to base64 
                $image_base64 = base64_encode(file_get_contents($_FILES['fileupload']['tmp_name']) );
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                // Upload file
                //move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
            }	

        } else {
            foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
            }

            die(); //Ensure no more processing is done
        }
    }

    

    $tablename = 'users';
    $tablecolumns = 'username, 
                  password, 
                  name,
                  email,
                  mobile,
                  photo,
                  createdby, 
                  createddate, 
                  modifiedby, 
                  modifieddate, 
                  isactive,
                  twds_ci_id';
    $columvalues =  "'$username',
                  '$password',
                  '$fullname',
                  '$email',
                  '$contactno',
                  '$image',
                  '$createdby',
                  '$createddate',
                  '$modifiedby',
                  '$modifieddate',
                  '1',
                  '$WebClientID'";

    $result = _saveData($tablename,$tablecolumns,$columvalues);
    if($result['data']) { 
        echo (popUp("success","Saved", "(" . $result['count'] . ") Record Saved!","users.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}

//===EDIT EMPLOYEE=====

//===DELETE EMPLOYEE=====
else if (ISSET($_POST["btnDelete"])) {
    $rowID = $_POST["btnDelete"];
    //echo("<script>alert('". $rowID ."')</script>");
    $result = _removeData('users','id=' . $rowID . " AND twds_ci_id = '$WebClientID'");
    //var_dump($result);
    if ($result != null && $result['count'] != 0){       
        echo (popUp("success","Deleted!","(" . $result['count'] . ") Item Deleted!!","users.php"));
    }
    else{
        echo (popUp("error","", "Problem in Deleting Record.",""));
    }

}

?>