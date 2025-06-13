<?php
$_HeaderTitle = 'User Edit';  
include '../admin/config/header.php'; 
include '../admin/config/crud.php';
include '../admin/config/helper.php';


if (isset($_GET['id'])) {
    //== GET EMPLOYEE LIST ==
    $users = _getAllDataByParam('users','id=' . $_GET['id'] . " AND twds_ci_id = '$WebClientID'");
    //var_dump($users);
    $userslist = array(); // empty array
    if ($users != null && $users['count'] != 0){       
        $userslist = $users['data'][0];
    }
    else{
        $userslist = null;
    }
}
else{
    echo (popUp("warning","No Data Found", "No Record Found!","users.php"));
}    

?>
<!-- Main content -->

<!-- Page Content -->

<form method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">
                <b><i class="fa fa-user"></i>User Information</b>
                <div class="btn-group pull-right">
                    <button class="btn btn-success btn-xs" id="btnUpdate" name="btnUpdate" type="submit"><i class="fa fa-save"></i>&nbsp;Update</button>
                    <a href="users.php" class="btn btn-xs btn-default float-right" style="color: black;"><i class="fa fa-undo"></i>&nbsp;Back</a>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <?php

            echo '
                <div class="form-group">
                <label for="pictre">Uploaded Picture:</label>
                <input type="hidden" id="_imagestring" name="_imagestring" value="'. $userslist["photo"] .'"/>
                <img class="img-responsive" src="'. ($userslist["photo"] == NULL ? "../admin/img/blank_pic.jpg" : $userslist["photo"]) .'" style="width:100px;height:100px" />
                </div>';


            echo '
                <div class="form-group">
                <label for="username">Select File:</label><div id="DimensionWarningMsg"></div>
                <input type="file" id="fileupload" name="fileupload" onchange="ValidateSize(this);" class="form-control" accept="image/*"/>
                <p class="text-left" style="font-size: xx-small"><b>* Photo must be 1000px by 1000px and Maximum of 2MB file size.</b></p>
                </div></br><div id="frames"></div>';

            echo '
                <input type="hidden" id="_id" name="_id" value="'. $userslist["id"] .'"/>
                <input type="hidden" id="username" name="username" value="'. $userslist["username"] .'"/>
                <div class="form-group">
                <b>Username: </b>
                <input type="text" id="user" name="user" value="'. $userslist["username"] .'" class="form-control" placeholder="Username" disabled />
                </div>';

            echo '
                <div class="form-group">
                <b>Fullname: </b>
                <input type="text" id="fullname" name="fullname" value="'. $userslist["name"] .'" class="form-control" placeholder="Full Name" required />
                </div>';

            echo '
                <div class="form-group">
                <b>Email: </b>
                <input type="text" id="email" name="email" value="'. $userslist["email"] .'" class="form-control" placeholder="Email" required />
                </div>';

            echo '
                <div class="form-group">
                <b>Contact#: </b>
                <input type="text" id="mobile" name="mobile" value="'. $userslist["mobile"] .'" class="form-control" placeholder="Contact#" required />
                </div>';

            echo '
                <div class="form-group">
                <b>Is Active: </b>
                    <select class="dropdown form-control" id="isactive" name="isactive">
                        <option value="">[Select]</option>
                        <option value="1" '. ($userslist["isactive"] == '1' ? "selected" : "") .'>Active</option>
                        <option value="0" '. ($userslist["isactive"] == '0' ? "selected" : "") .'>Inactive</option>
                    </select>
                </div>';
            ?>

        </div>
    </div>
</form>

<?php include '../admin/config/footer.php' ?>

<script>
    var _URL = window.URL || window.webkitURL;

    $("#fileupload").change(function (e) {

        var img_recommended_width = 1000;
        var img_recommended_height = 1000;
        var img_min_width = 150;
        var img_min_height = 150;

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

if (ISSET($_POST["btnUpdate"])){

    $_id=$_POST['_id'];
    $username=$_POST['username'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $modifiedby= $_SESSION["isLogin"]['name'];
    $modifieddate= date("Y-m-d H:i:s");   
    $isactive=$_POST['isactive'];
    $image = ($_POST["_imagestring"] === "" ? '../admin/img/blank_pic.jpg' : $_POST["_imagestring"]);




    if ($_FILES['fileupload']['name'] !== ""){
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

            }	

        } else {
            foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
            }

            die(); //Ensure no more processing is done
        }
    }



    $tablename = 'users';

    if ($_FILES['fileupload']['name'] !== "")
    {
        $columvalues =  "username='$username',
                   name='$fullname',
                   email='$email',
                   mobile='$mobile',
                   photo='$image',
                   modifiedby='$modifiedby',
                   modifieddate='$modifieddate',
                   isactive='$isactive',
                   twds_ci_id = '$WebClientID'";
    }
    else{
        $columvalues =  "username='$username',
                   name='$fullname',
                   email='$email',
                   mobile='$mobile',
                   modifiedby='$modifiedby',
                   modifieddate='$modifieddate',
                   isactive='$isactive',
                   twds_ci_id = '$WebClientID'";
    }

    
    $filter= "id='$_id'";

    $result = _updateData($tablename,$columvalues,$filter);
    if($result['data']) { 
        echo (popUp("success","Updated!", "(" . $result['count'] . ") Record Updated!","users.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}
?>