<?php
use \Gumlet\ImageResize;
$_HeaderTitle = 'Guest List Edit';  
include '../admin/config/header.php'; 
include '../admin/config/crud.php';
include '../admin/config/helper.php';
include '../admin/vendor/ImageResize/ImageResize.php';

if (isset($_GET['id'])) {
    //== GET EMPLOYEE LIST ==    
    $guestlist = _getAllDataByParam('guestslist','id=' . $_GET['id'] . " AND twds_ci_id = '$WebClientID'");
    
    //var_dump($guestlist);
    $guestlistlist = array(); // empty array
    if ($guestlist != null && $guestlist['count'] != 0){       
        $guestlistlist = $guestlist['data'][0];
    }
    else{
        $guestlistlist = null;
    }
}
else{
    echo (popUp("warning","No Data Found", "No Record Found!","guestlist.php"));
}    

?>
<!-- Main content -->

<!-- Page Content -->

<form method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">
                <b><i class="fa fa-list"></i>Guest Information</b>
                <div class="btn-group pull-right">
                    <button class="btn btn-success btn-xs" id="btnUpdate" name="btnUpdate" type="submit"><i class="fa fa-save"></i>&nbsp;Update</button>
                    <a href="guestlist.php" class="btn btn-xs btn-default float-right" style="color: black;"><i class="fa fa-undo"></i>&nbsp;Back</a>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <?php

            echo '
                <div class="form-group">
                <label for="pictre">Uploaded Picture:</label>
                <img class="img-responsive" src="'. ($guestlistlist["filename"] == NULL ? "../admin/img/blank_pic.jpg" : $guestlistlist["photo"]) .'" style="width:100px;height:100px" />
                </div>';


            echo '
                <input type="hidden" id="_id" name="_id" value="'. $guestlistlist["id"] .'"/>
                <div class="form-group">
                <label for="username">Select File:</label><div id="DimensionWarningMsg"></div>
                <input type="file" id="fileupload" name="fileupload" onchange="ValidateSize(this);" class="form-control" accept="image/*"/>
                <p class="text-left" style="font-size: small"><b>* HD Photo must be 4000px by 4000px and Maximum of 5MB file size.</b></p>
                </div></br><div id="frames"></div>';

            echo '
                <div class="form-group">
                <b>Guest Name: </b>
                <input type="text" id="guestname" name="guestname" value="'. $guestlistlist["guestname"] .'" class="form-control" placeholder="Guest Name" required />
                </div>';

            echo '
                <div class="form-group">
                <b>Guest Full Name: </b>
                <input type="text" id="guestfullname" name="guestfullname" value="'. $guestlistlist["guestfullname"] .'" class="form-control" placeholder="Guest Full Name" />
                </div>';

            echo '
                <div class="form-group">
                <b>Role: </b>
                   <select class="dropdown form-control" id="role" name="role">
                        <option value="">[Select Role]</option>
                        <option value="Bride" '. ($guestlistlist["role"] == 'Bride' ? "selected" : "") .'>Bride</option>
                        <option value="Groom" '. ($guestlistlist["role"] == 'Groom' ? "selected" : "") .'>Groom</option>
                        <option value="Mother (Bride)" '. ($guestlistlist["role"] == 'Mother (Bride)' ? "selected" : "") .'>Mother (Bride)</option>
                        <option value="Father (Bride)" '. ($guestlistlist["role"] == 'Father (Bride)' ? "selected" : "") .'>Father (Bride)</option>
                        <option value="Mother (Groom)" '. ($guestlistlist["role"] == 'Mother (Groom)' ? "selected" : "") .'>Mother (Groom)</option>
                        <option value="Father (Groom)" '. ($guestlistlist["role"] == 'Father (Groom)' ? "selected" : "") .'>Father (Groom)</option>
                        <option value="BestMan" '. ($guestlistlist["role"] == 'BestMan' ? "selected" : "") .'>Best Man</option>
                        <option value="MaidOfHonor" '. ($guestlistlist["role"] == 'MaidOfHonor' ? "selected" : "") .'>Maid Of Honor</option>
                        <option value="Groomsmen" '. ($guestlistlist["role"] == 'Groomsmen' ? "selected" : "") .'>Groomsmen</option>
                        <option value="Bridesmaid" '. ($guestlistlist["role"] == 'Bridesmaid' ? "selected" : "") .'>Bridesmaid</option>
                        <option value="JuniorBridesmaid" '. ($guestlistlist["role"] == 'JuniorBridesmaid' ? "selected" : "") .'>Junior Bridesmaid</option>

                        <option value="FlowerGirl" '. ($guestlistlist["role"] == 'FlowerGirl' ? "selected" : "") .'>FlowerGirl</option>
                        <option value="Bearer" '. ($guestlistlist["role"] == 'Bearer' ? "selected" : "") .'>Bearer</option>

                        <option value="CoinBearer" '. ($guestlistlist["role"] == 'CoinBearer' ? "selected" : "") .'>Coin Bearer</option>
                        <option value="RingBearer" '. ($guestlistlist["role"] == 'RingBearer' ? "selected" : "") .'>Ring Bearer</option>
                        <option value="BibleBearer" '. ($guestlistlist["role"] == 'BibleBearer' ? "selected" : "") .'>Bible Bearer</option>
                        <option value="SignageBearer" '. ($guestlistlist["role"] == 'SignageBearer' ? "selected" : "") .'>Signage Bearer</option>
                        <option value="Candle" '. ($guestlistlist["role"] == 'Candle' ? "selected" : "") .'>Candle</option>
                        <option value="Veil" '. ($guestlistlist["role"] == 'Veil' ? "selected" : "") .'>Veil</option>
                        <option value="Cord" '. ($guestlistlist["role"] == 'Cord' ? "selected" : "") .'>Cord</option>

                        <option value="SwordSponsor" '. ($guestlistlist["role"] == 'SwordSponsor' ? "selected" : "") .'>Sword Sponsor</option>
                        <option value="Principal Sponsors" '. ($guestlistlist["role"] == 'Principal Sponsors' ? "selected" : "") .'>Principal Sponsor (Default)</option>
                        <option value="Principal Sponsor (Male)" '. ($guestlistlist["role"] == 'Principal Sponsor (Male)' ? "selected" : "") .'>Principal Sponsor (Male)</option>
                        <option value="Principal Sponsor (Female)" '. ($guestlistlist["role"] == 'Principal Sponsor (Female)' ? "selected" : "") .'>Principal Sponsor (Female)</option>
                        <option value="Guests" '. ($guestlistlist["role"] == 'Guests' ? "selected" : "") .'>Guests</option>
                    </select>
                </div>';

            echo '
                <div class="form-group">
                    <label for="isattending">Partner Group:</label>
                    <select class="dropdown form-control" id="partnergroup" name="partnergroup">
                        <option value="">[Select Group]</option>
                        <option value="1" '. ($guestlistlist["partnergroup"] == '1' ? "selected" : "") .'>1</option>
                        <option value="2" '. ($guestlistlist["partnergroup"] == '2' ? "selected" : "") .'>2</option>
                        <option value="3" '. ($guestlistlist["partnergroup"] == '3' ? "selected" : "") .'>3</option>
                        <option value="4" '. ($guestlistlist["partnergroup"] == '4' ? "selected" : "") .'>4</option>
                        <option value="5" '. ($guestlistlist["partnergroup"] == '5' ? "selected" : "") .'>5</option>
                        <option value="6" '. ($guestlistlist["partnergroup"] == '6' ? "selected" : "") .'>6</option>
                        <option value="7" '. ($guestlistlist["partnergroup"] == '7' ? "selected" : "") .'>7</option>
                        <option value="8" '. ($guestlistlist["partnergroup"] == '8' ? "selected" : "") .'>8</option>
                        <option value="9" '. ($guestlistlist["partnergroup"] == '9' ? "selected" : "") .'>9</option>
                        <option value="10" '. ($guestlistlist["partnergroup"] == '10' ? "selected" : "") .'>10</option>
                        <option value="11" '. ($guestlistlist["partnergroup"] == '11' ? "selected" : "") .'>11</option>
                        <option value="12" '. ($guestlistlist["partnergroup"] == '12' ? "selected" : "") .'>12</option>
                        <option value="13" '. ($guestlistlist["partnergroup"] == '13' ? "selected" : "") .'>13</option>
                        <option value="14" '. ($guestlistlist["partnergroup"] == '14' ? "selected" : "") .'>14</option>
                        <option value="15" '. ($guestlistlist["partnergroup"] == '15' ? "selected" : "") .'>15</option>
                    </select>
                </div>';

            echo '
                <div class="form-group">
                <b>Is Attending: </b>
                    <select class="dropdown form-control" id="isattending" name="isattending" >
                            <option value="">[Select]</option>
                            <option value="0"  '. ($guestlistlist["isattending"] == '0' ? "selected" : "") .'>Pending</option>
                            <option value="1"  '. ($guestlistlist["isattending"] == '1' ? "selected" : "") .'>Yes</option>
                            <option value="2"  '. ($guestlistlist["isattending"] == '2' ? "selected" : "") .'>No</option>
                        </select>
                </div>';

            echo '
                <div class="form-group">
                <b>Contact#: </b>
                <input type="text" id="contactnumber" name="contactnumber" value="'. $guestlistlist["contactnumber"] .'" class="form-control" placeholder="Contact#" />
                </div>';

            echo '
                <div class="form-group">
                <b>Guest Head Count: </b>
                <input type="number" id="extraguestcount" name="extraguestcount" value="'. $guestlistlist["extraguestcount"] .'" class="form-control" placeholder="Guest Head Count" />
                </div>';

            echo '
                <div class="form-group">
                <b>Questions/Comment:  (max 1000 characters): </b>
                <textarea id="questioncomment" name="questioncomment" class="form-control" placeholder="Question / Comment" cols="10" rows="10" >'. $guestlistlist["questioncomment"] .'</textarea>
                </div>';
           
            echo '
                <div class="form-group">
                <b>Is Active: </b>
                    <select class="dropdown form-control" id="isactive" name="isactive">
                        <option value="">[Select]</option>
                        <option value="1" '. ($guestlistlist["isactive"] == '1' ? "selected" : "") .'>Active</option>
                        <option value="0" '. ($guestlistlist["isactive"] == '0' ? "selected" : "") .'>Inactive</option>
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

        var img_recommended_width = 4000;
        var img_recommended_height = 4000;
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
                        msg_warning += "<p class='text-left' style='font-size: small; font-weight: bold'>'" + document.getElementById('fileupload').files[counter].name + " (" + this.width + "px X " + this.height + "px)' Warning: Selected Image is more than " + img_recommended_width + "px by " + img_recommended_height + "px. Oversize Image may affect page rendering.</p>";
                    }
                    else if (this.width < img_min_width || this.height < img_min_height) {
                        msg_warning += "<p class='text-left' style='font-size: small; font-weight: bold'>'" + document.getElementById('fileupload').files[counter].name + " (" + this.width + "px X " + this.height + "px)' Warning: Selected Image is less than the minimum recommended image size (" + img_min_width + "px by " + img_min_height + "px). It may pixelized/distort when displayed on page.</p>";
                    }
                    counter++;

                    $(this).attr('style', 'width:300px;height:auto;padding-right:3px;');
                    $("#frames").append(this).addClass('text-center img-responsive');

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
    $guestname=$_POST['guestname'];
    $guestfullname=$_POST['guestfullname'];
    $isattending=$_POST['isattending'];
    $extraguestcount = $_POST['extraguestcount'];
    $role=$_POST['role'];
    $questioncomment=$_POST['questioncomment'];
    $contactnumber=$_POST['contactnumber'];
    $modifiedby= $_SESSION["isLogin"]['name'];
    $modifieddate= date("Y-m-d H:i:s");   
    $isactive=$_POST['isactive'];
    $partnergroup = $_POST['partnergroup'];




    if($_FILES['fileupload']['size'] != 0) {
        $errors     = array();
        $maxsize    = 2000000; //2MB 
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );

        //if(($_FILES['fileupload']['size'] >= $maxsize) || ($_FILES["fileupload"]["size"] == 0)) {
        //    $errors[] = 'File too large. File must be less than 5 MB.';
        //}

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

                //SMALL SIZE
                $imageresizer = ImageResize::createFromString(file_get_contents($_FILES['fileupload']['tmp_name']));
                $imageresizer->scale(20);
                $imageresizer->getImageAsString();
                $image_base64 = base64_encode($imageresizer);
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                //FULL SIZE
                $image_base64full = base64_encode(file_get_contents($_FILES['fileupload']['tmp_name']));
                $imagefullsize = 'data:image/'.$imageFileType.';base64,'.$image_base64full;
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



    $tablename = 'guestslist';

    if ($_FILES['fileupload']['name'] !== "")
    {
        $columvalues =  "guestname='$guestname',
                   guestfullname='$guestfullname',
                   isattending='$isattending',
                   contactnumber='$contactnumber',
                   role='$role',
                   extraguestcount = '$extraguestcount',
                   partnergroup='$partnergroup',
                   questioncomment='$questioncomment',
                   photo='$image',
                   filestring='$imagefullsize',
                   filename='$name',
                   modifiedby='$modifiedby',
                   modifieddate='$modifieddate',
                   isactive='$isactive',
                   twds_ci_id = '$WebClientID'";
    }
    else{
        $columvalues =  "guestname='$guestname',
                   guestfullname='$guestfullname',
                   isattending='$isattending',
                   contactnumber='$contactnumber',
                   role='$role',
                   extraguestcount = '$extraguestcount',
                   partnergroup='$partnergroup',
                   questioncomment='$questioncomment',
                   modifiedby='$modifiedby',
                   modifieddate='$modifieddate',
                   isactive='$isactive',
                   twds_ci_id = '$WebClientID'";
    }

    
    $filter= "id='$_id'";

    $result = _updateData($tablename,$columvalues,$filter);
    if($result['data']) { 
        echo (popUp("success","Updated!", "(" . $result['count'] . ") Record Updated!","guestlist.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}
?>