<?php
use \Gumlet\ImageResize;

$_HeaderTitle = 'Guest List';  
include '../admin/config/header.php'; 
include '../admin/config/crud.php';
include '../admin/config/helper.php';
include '../admin/vendor/ImageResize/ImageResize.php';

//== GET CLIENT LIST ==
$guestlist_info = _getAllDataSpecColumns('guestslist WHERE twds_ci_id = "'.$WebClientID.'" AND questioncomment <> "" AND Filename <> "" ORDER BY Filename DESC','id, guestcode, guestname, guestfullname, role, partnergroup, isattending, extraguestcount, extraguestnames, questioncomment, contactnumber, photo, filename, createdby, createddate, modifiedby, modifieddate, isactive');
$guestlistlist = array(); // empty array
if ($guestlist_info != null && $guestlist_info['count'] != 0){       
    $guestlistlist = $guestlist_info['data'];
}
else{
    $guestlistlist = null;
}
//  var_dump ($guestlist_info);

function IsAttendingElementGenerator($status){
    $result = "";

    if ($status == 0)
    {
    	$result = "<span class='badge' style='background-color:orange'>Pending</span>";
    }
    else if ($status == 1)
    {
    	$result = "<span class='badge' style='background-color:green'>Yes</span>";
    }
    else if ($status == 2)
    {
    	$result = "<span class='badge' style='background-color:red'>No</span>";
    }
    else if ($status == 3)
    {
    	$result = "<span class='badge' style='background-color:Gray'>Maybe</span>";
    }
    
    return $result;
}

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



    .tooltip {
        position: relative;
        display: inline-block;
    }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

    @media (min-width: 1200px) {
        .card-height {
            height: 400px;
        }
    }

    @media (min-width: 992px) {
        .card-height {
            height: 350px;
        }
    }
</style>

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <b><i class="fa fa-list"></i>&nbsp;Guest List</b>
            <button type="button" class="btn btn-xs btn-default pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Add</button>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <?php 
            if ($guestlistlist == null){
                echo '<center> -- No Records Found! -- </center>';
            }
            else
            {
                //foreach ($guestlistlist as $row)
                //{
                //    echo '<table class="table table-responsive">';
                //    echo '    <tr>';
                //    echo '        <td style="width:30%;height:30%">';
                //    echo'               <img class="img-responsive img-thumbnail" src="'. ($row["filename"] === NULL || $row["filename"] === "" ? "../admin/img/blank_pic.jpg" : $row["photo"]) .'" data-pic-title="'. ($row["filename"] === NULL  || $row["filename"] === "" ? "Blank. Please Upload an Image!" : $row["filename"]) .'" data-pic-description="'. ($row["filename"] === NULL ? "Blank. Please Upload an Image!" : $row["filename"]) .'" data-pic="'. ($row["filename"] === NULL  || $row["filename"] === "" ? "../admin/img/blank_pic.jpg" : $row["photo"]) .'" style="cursor:zoom-in;" />';
                //    echo'           <form method="post"><div class="btn-group-vertical btn-block" role="group" width="100%"><a href="'. ($row["filename"] === NULL || $row["filename"] === "" ? "../admin/img/blank_pic.jpg" : $row["photo"]) .'" download="'. ($row["filename"] === NULL || $row["filename"] === "" ? "blank_pic.jpg" : "original_" . $row["filename"]) .'" class="btn btn-sm btn-default" title="Download Photo" '. ($row["filename"] === NULL || $row["filename"] === "" ? "disabled" : "") .'><i class="fa fa-download"></i>&nbsp;Download Photo</a><a href="guestlistedit.php?id='. $row["id"] .'" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i>&nbsp;Edit</a><button type="submit" onclick="return confirm(\'Are you sure you want to delete this?\');" class="btn btn-sm btn-danger" name="btnDelete" id="btnDelete" title="Delete" value="'. $row["id"] .'"><i class="fa fa-trash"></i>&nbsp;Delete</button></div></form>';
                //    echo '        </td>';
                //    echo '        <td>';
                //    echo'               <div class="caption">';
                //    echo'                   <h3>'.  ($row["guestfullname"]==NULL ? $row["guestname"] : $row["guestfullname"] . '<br>('. $row["guestname"] .')') .'</h3>';
                //    echo'                   <p style="font-size:small">'. ($row["questioncomment"]==NULL ? "-- Pending Dedication --" : $row["questioncomment"]) .'</p><br>';
                //    echo'               </div>';
                //    echo '        </td>';
                //    echo '    </tr>';
                //    echo '</table>';              
                //}

               
                foreach ($guestlistlist as $row)
                {
                    echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
                    echo '    <div class="panel panel-default">';
                    echo '        <div class="panel-heading">';
                    echo '            <div class="panel-title text-center">';
                    echo '                <span>'.  ($row["guestfullname"]==NULL ? $row["guestname"] : $row["guestfullname"]) .'</span>';                            
                    echo '            </div>';
                    echo '        </div>';
                    echo '        <div class="panel-body" style="height: 250px !important;">';
                    echo '            <div class="col-md-12"><div style="height: 100px; width:100%">';
                    echo '              <center>';
                    echo '                <img class="img-thumbnail" src="'. ($row["filename"] === NULL || $row["filename"] === "" ? "../admin/img/blank_pic.jpg" : $row["photo"]) .'" data-pic-title="'. ($row["filename"] === NULL  || $row["filename"] === "" ? "Blank. Please Upload an Image!" : $row["filename"]) .'" data-pic-description="'. ($row["filename"] === NULL ? "Blank. Please Upload an Image!" : $row["filename"]) .'" data-pic="'. ($row["filename"] === NULL  || $row["filename"] === "" ? "../admin/img/blank_pic.jpg" : $row["photo"]) .'" style="cursor:zoom-in; width: 100%; height:200px; object-fit: cover;" />';
                    echo '              </center>';
                    echo '            </div></div>';
                    echo '            <hr />';                    
                    echo '        </div>';
                    echo '        <div class="panel-footer">';
                    echo '            <p style="font-size:x-small; text-align: center; height: 150px">"<i>'. ($row["questioncomment"]==NULL ? "-- Pending Dedication --" : $row["questioncomment"]) .'</i>"</p>';
                    echo '            <div class="row">';
                    echo '                <form method="post"><div class="btn-group-vertical btn-block" role="group" width="100%"><a href="'. ($row["filename"] === NULL || $row["filename"] === "" ? "../admin/img/blank_pic.jpg" : $row["photo"]) .'" download="'. ($row["filename"] === NULL || $row["filename"] === "" ? "blank_pic.jpg" : "original_" . $row["filename"]) .'" class="btn btn-sm btn-default" title="Download Photo" '. ($row["filename"] === NULL || $row["filename"] === "" ? "disabled" : "") .'><i class="fa fa-download"></i>&nbsp;Download HD Photo</a><a href="guestlistedit.php?id='. $row["id"] .'" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i>&nbsp;Edit</a><button type="submit" onclick="return confirm(\'Are you sure you want to delete this?\');" class="btn btn-sm btn-danger" name="btnDelete" id="btnDelete" title="Delete" value="'. $row["id"] .'"><i class="fa fa-trash"></i>&nbsp;Delete</button></div></form>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } 
            ?>

            


        </div>
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <label class="modal-title">Add New Guest</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="guestname">Guest Nickname:</label>
                        <input type="text" id="guestname" name="guestname" class="form-control" placeholder="Guest Nickname" required />
                    </div>

                    <div class="form-group">
                        <label for="isattending">Role:</label>
                        <select class="dropdown form-control" id="role" name="role" required>
                            <option value="">[Select Role]</option>
                            <option value="Bride">Bride</option>
                            <option value="Groom">Groom</option>
                            <option value="Mother (Bride)">Mother (Bride)</option>
                            <option value="Father (Bride)">Father (Bride)</option>
                            <option value="Mother (Groom)">Mother (Groom)</option>
                            <option value="Father (Groom)">Father (Groom)</option>
                            <option value="BestMan">Best Man</option>
                            <option value="MaidOfHonor">Maid Of Honor</option>
                            <option value="Groomsmen">Groomsmen</option>
                            <option value="Bridesmaid">Bridesmaid</option>
                            <option value="Principal Sponsor (Male)">Principal Sponsor (Male)</option>
                            <option value="Principal Sponsor (Female)">Principal Sponsor (Female)</option>
                            <option value="Guests">Guests</option>
                        </select>
                    </div>

                    <hr />


                    <div class="form-group">
                        <div id="frames"></div>
                        <label for="fileupload">Select File:</label><div id="DimensionWarningMsg"></div>
                        <input type="file" id="fileupload" name="fileupload" onchange="ValidateSize(this);" class="form-control" accept="image/*" />
                        <p class="text-left" style="font-size: xx-small"><b>* HD Photo must be 4000px by 4000px and Maximum of 5MB file size.</b></p>
                    </div>



                    <div class="form-group">
                        <label for="guestname">Guest Full Name:</label>
                        <input type="text" id="guestfullname" name="guestfullname" class="form-control" placeholder="Guest Full Name" />
                    </div>

                    <div class="form-group">
                        <label for="isattending">Partner Group:</label>
                        <select class="dropdown form-control" id="partnergroup" name="partnergroup">
                            <option value="">[Select Group]</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="isattending">Is Attending?:</label>
                        <select class="dropdown form-control" id="isattending" name="isattending">
                            <option value="">[Select Answer]</option>
                            <option value="0" selected>Pending</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contactnumber">Contact#:</label>
                        <input type="text" id="contactnumber" name="contactnumber" class="form-control" placeholder="Contact #" />
                    </div>

                    <div class="form-group">
                        <label for="questioncomment">Question/Comment:</label>
                        <textarea id="questioncomment" name="questioncomment" class="form-control" rows="10" cols="10"></textarea>
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

        var img_recommended_width = 4000;
        var img_recommended_height = 4000;

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


    function CopyClipboard(id, data) {
        navigator.clipboard.writeText(data);
        document.getElementById(id.toString()).innerText = "Copied!";
    }

    function outFunc(id) {
        document.getElementById(id.toString()).innerText = "Copy";
    }



</script>

<?php 
//===SAVE NEW EMPLOYEE=====
if (ISSET($_POST["btnSubmit"])){

    $guestcode = uniqid();
    $guestname = $_POST['guestname'];
    $guestfullname = $_POST['guestfullname'];
    $isattending = $_POST['isattending'];
    $role = $_POST['role'];
    $contactnumber = $_POST['contactnumber'];
    $questioncomment = $_POST['questioncomment'];
    $partnergroup = $_POST['partnergroup'];
    
    $createdby= $_SESSION["isLogin"]['name'];
    $createddate= date("Y-m-d H:i:s");
    $modifiedby= $_SESSION["isLogin"]['name'];
    $modifieddate= date("Y-m-d H:i:s");
    $isactive = 1;

    if($_FILES['fileupload']['size'] != 0) {
        $errors     = array();
        $maxsize    = 5242880; //5MB
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );

        if(($_FILES['fileupload']['size'] >= $maxsize) || ($_FILES["fileupload"]["size"] == 0)) {
            $errors[] = 'File too large. File must be less than 5 MB.';
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
    $tablecolumns = 'guestcode,
                  guestname,
                  guestfullname,
                  isattending,
                  role,
                  partnergroup,
                  contactnumber,
                  questioncomment,
                  photo,
                  filename,
                  photo,
                  createdby, 
                  createddate, 
                  modifiedby, 
                  modifieddate, 
                  isactive,
                  twds_ci_id';
    $columvalues =  "'$guestcode',
                  '$guestname',
                  '$guestfullname',
                  '$isattending',
                  '$role',
                  '$partnergroup',
                  '$contactnumber',
                  '$questioncomment',
                  '$image',
                  '$name',
                  '$imagefullsize',
                  '$createdby',
                  '$createddate',
                  '$modifiedby',
                  '$modifieddate',
                  '1',
                  '$WebClientID'";

    $result = _saveData($tablename,$tablecolumns,$columvalues);
    if($result['data']) { 
        echo (popUp("success","Saved", "(" . $result['count'] . ") Record Saved!","guestlist.php"));
    } else {  
        echo (popUp("error","", "Problem in Adding New Record.",""));
    }
}

//===EDIT EMPLOYEE=====

//===DELETE EMPLOYEE=====
else if (ISSET($_POST["btnDelete"])) {
    $rowID = $_POST["btnDelete"];
    //echo("<script>alert('". $rowID ."')</script>");
    $result = _removeData('guestslist','id=' . $rowID . " AND twds_ci_id = '$WebClientID'");
    //var_dump($result);
    if ($result != null && $result['count'] != 0){       
        echo (popUp("success","Deleted!","(" . $result['count'] . ") Item Deleted!!","guestlist.php"));
    }
    else{
        echo (popUp("error","", "Problem in Deleting Record.",""));
    }

}

?>