<?php
    $_HeaderTitle = 'Groom Information';  
    include '../admin/config/header.php';
    include '../admin/config/crud.php';
    include '../admin/config/helper.php';

    use \Gumlet\ImageResize;
    include '../admin/vendor/ImageResize/ImageResize.php';
?>

<?php

    $groominfo_query= _getAllDataByParam('groominformation', "twds_ci_id='$WebClientID'");
    $groominfo = array();

    if($groominfo_query!= null && $groominfo_query['count']>0)
    {
        $groominfo = $groominfo_query['data'];
    }
    else
    {
        
        $groominfo = null;
    }

    


?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            
            <div class="row">
                <div class="col-md-6">
                    <b><i class="fa fa-male"></i>&nbsp;Groom Information</b>
                </div>
                <div class="col-md-6">
                    <button form="groomForm" type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-sm btn-default pull-right"><i class="fa fa-save"></i>&nbsp;Save</button>  
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <form id="groomForm" method="post" enctype="multipart/form-data">

            <div class="form-group" style="display:flex">
                <img id="image" src="<?php echo $groominfo[0]['image']!= '' ? 'data:image/jpg;charset=utf8;base64,'.base64_encode($groominfo[0]['image']) : 'img/profile-icon.png' ?>" style="width:150px;height:150px;border:1px solid gray">
                <input onchange="imageChange(this)"  class="form-control" type="file" style="margin:auto; margin-bottom:0; margin-left:5px" name="imageInput" id="imageInput" accept="image/*"/>
            </div>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input  type="hidden" name="id" id="id" value = "<?php echo ($groominfo== null) ? "" : ($groominfo[0]['id'] != "" ? $groominfo[0]['id'] :  "")?>"/>
                <input class="form-control" type="text" name="fname" id="fname" placeholder="Firstname" 
                value = "<?php echo ($groominfo== null) ? "" : ($groominfo[0]['fname'] != "" ? $groominfo[0]['fname'] :  "")?>"/>
            </div>

            <div class="form-group">
                <label for="mname">Middle Name:</label>
                <input class="form-control" type="text" name="mname" id="mname" placeholder="Middle Name" 
                value = "<?php echo ($groominfo== null) ? "" : ($groominfo[0]['mname'] != "" ? $groominfo[0]['mname'] :  "")?>"/>
            </div>

            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name"
                value = "<?php echo ($groominfo== null) ? "" : ($groominfo[0]['lname'] != "" ? $groominfo[0]['lname'] :  "")?>"/>
            </div>

            <div class="form-group">
                <label for="prefix">Prefix (Optional)</label>
                <input class="form-control" type="text" name="prefix" id="prefix" placeholder="Prefix"
                value = "<?php echo ($groominfo== null) ? "" : ($groominfo[0]['prefix'] != "" ? $groominfo[0]['prefix'] :  "")?>"/>
            </div>

            <div class="form-group">
                <label for="contactnumber">Contact Number</label>
                <input class="form-control" type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number"
                value = "<?php echo ($groominfo== null) ? "" : ($groominfo[0]['contactnumber'] != "" ? $groominfo[0]['contactnumber'] :  "")?>"/>
            </div>

            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input class="form-control" type="text" name="nickname" id="nickname" placeholder="Nickname"
                value = "<?php echo ($groominfo== null) ? "" : ($groominfo[0]['nickname'] != "" ? $groominfo[0]['nickname'] :  "")?>"/>
            </div>

            <div class="form-group">
                <label for="favquote">Favorite Quote About Life</label>
                <textarea class="form-control" name="favquote" id="favquote" placeholder="Favorite Quote About Life"><?php echo ($groominfo== null) ? "" : ($groominfo[0]['favquote'] != "" ? $groominfo[0]['favquote'] :  "")?></textarea>
            </div>

            <div class="form-group">
                <label for="description">Description About Yourself </label>
                <textarea class="form-control" name="description" id="description" placeholder="Favorite Quote About Life"><?php echo ($groominfo== null) ? "" : ($groominfo[0]['description'] != "" ? $groominfo[0]['description'] :  "")?></textarea>
            </div>

            <div class="modal-footer">
                <div class="btn-group">
                    <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>&nbsp;Save</button>
                    
                </div>
            </div>
            
        </form>

       
    </div>
</div>


<?php include '../admin/config/footer.php' ?>

<?php



    if(ISSET($_POST['btnSubmit']))
    {
        $ClientID = $WebClientID;
        $id = $_POST['id'];
        $fname = mysql_real_escape_string($_POST['fname']);
        $mname = mysql_real_escape_string($_POST['mname']);
        $lname = mysql_real_escape_string($_POST['lname']);
        $prefix = mysql_real_escape_string($_POST['prefix']);
        $contactnumber= mysql_real_escape_string($_POST['contactnumber']);
        $nickname = mysql_real_escape_string($_POST['nickname']);
        $favquote = mysql_real_escape_string($_POST['favquote']);
        $description = mysql_real_escape_string($_POST['description']);
        $imgContent = "";

        if(!empty($_FILES["imageInput"]["name"])) { 
            // Get file info 

            //If File More Than 2MB, RESIZE IT
            if(intval($_FILES['imageInput']['size']) > 2000000)
            {
                $imageresizer = ImageResize::createFromString(file_get_contents($_FILES['imageInput']['tmp_name']));
                $imageresizer->scale(20);
                $imageresizer->save($_FILES['imageInput']['tmp_name']);
            }

            $fileName = basename($_FILES["imageInput"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
             
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['imageInput']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
            }
        }
        
        if($groominfo == null)
        {
            $tablename = 'groominformation';
            $tablecolumns = 'twds_ci_id,fname,mname,lname,prefix,contactnumber,nickname,favquote,description,image';
            $columnvalues = "'$ClientID','$fname','$mname','$lname','$prefix','$contactnumber','$nickname','$favquote','$description','$imgContent'";

            $result = _saveData($tablename,$tablecolumns,$columnvalues);

            if($result['data']) { 
                echo (popUp("success","Saved", "(" . $result['count'] . ") Record Saved!","groominformation.php"));
            } else {  
                echo (popUp("error","", "Problem in Adding New Record.",""));
            }
    
        }
        else
        {
            
            $tablename = 'groominformation';
            $tablecolumns = 'twds_ci_id,fname,mname,lname,prefix,contactnumber,nickname,favquote,description,image';
            $columnvalues =
            "twds_ci_id = '$ClientID',
            fname = '$fname',
            mname = '$mname',
            lname = '$lname',
            prefix = '$prefix',
            contactnumber = '$contactnumber',
            nickname = '$nickname',
            favquote = '$favquote',
            description = '$description',
            image = '$imgContent'";

            if($imgContent == "")
            {
                $columnvalues =
                "twds_ci_id = '$ClientID',
                fname = '$fname',
                mname = '$mname',
                lname = '$lname',
                prefix = '$prefix',
                contactnumber = '$contactnumber',
                nickname = '$nickname',
                favquote = '$favquote',
                description = '$description'";
            }

            $params = "id = $id";

            $result = _updateData($tablename,$columnvalues,$params);
            if($result['data']) { 
                echo (popUp("success","Updated", "(" . $result['count'] . ") Record Updated!","groominformation.php"));
            } else {  
                echo (popUp("error","", "Problem in Updating Record.",""));
            }
            
        }

    }

?>


<script>

    

    function imageChange(element)
    {
        ValidateSize(element);
        for(var file of imageInput.files)
        {
            image.src = URL.createObjectURL(file);
        }
        
    }
</script>