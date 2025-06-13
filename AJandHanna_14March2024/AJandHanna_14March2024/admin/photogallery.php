<?php
    $_HeaderTitle = 'Bride Information';  
    include '../admin/config/header.php';
    include '../admin/config/crud.php';
    include '../admin/config/helper.php';

    use \Gumlet\ImageResize;
    include '../admin/vendor/ImageResize/ImageResize.php';
?>

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
</style>


<?php
    
    $photogallery_query = _getAllDataByParam('photogallery',"twds_ci_id = '$WebClientID'");    
    $galleryinformation = array();

    if($photogallery_query != null || $photogallery_query['count'] >0)
    {
        $galleryinformation = $photogallery_query['data'];
    }
    else
    {
        $galleryinformation = null;
    }
    

    function getAlbumByAlbumName($galleryinformation,$albumname)
    {
        if($galleryinformation != null)
        {
            foreach($galleryinformation as $album)
            {
                if($album['albumname'] == $albumname)
                {
                    return $album;
                }
            }
        }
    }
    function getAlbumByID($galleryinformation,$id)
    {
        if($galleryinformation != null)
        {
            foreach($galleryinformation as $album)
            {
                if($album['id'] == $id)
                {
                    return $album;
                }
            }
        }
    }
    function getImageCountFromImagePaths($imagepaths)
    {
        if($imagepaths != ""){
            if(strpos($imagepaths,','))
            {
                return count(explode(',',$imagepaths));
            }
            else
            {
                return 1;
            }
            
        }
        else
        {
            return 0;
        }
    }


?>


<div id="image_modal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <img id="imageshown" src="" class="img-responsive"/>
        </div>
    </div>
</div>


<div class="panel panel-primary" >
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                <div class="panel-title">
                    <b><i class="fa fa-folder"></i>&nbsp;Photo Gallery</b>
                </div>
            </div>
            <div class="col-md-6">
                
                <button type="submit" form="addForm" id="btnSubmit" name="btnSubmit" class="btn btn-sm btn-default pull-right"><i class="fa fa-save"></i>&nbsp;Add</button>
            </div>
        </div>
        
    </div>
    
    <div class="panel-body">
        <form id="addForm" method="post" enctype="multipart/form-data">
            <div>
                <!-- Modal content-->
                <div class="form-group">
                    <label for="albumname">Album Name:</label>
                    <input type="text" id="albumname" name="albumname" class="form-control" placeholder="Album Name"  required />
                </div>
                
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" class="form-control" placeholder="Location" required />
                </div>

                <div class="form-group">
                    <label for="description">Description:</label> 
                    <input type="text" id="description" name="description" class="form-control" placeholder="Description" required />
                </div>
                <div class="form-group">
                    <label for="imageFile">Add Image(s):</label>
                    <input type="file" id="imageFile" name="imageFile[]" class="form-control" onchange="editImageChange(this,'add')"  accept="image/*" multiple />
                </div>
                <div class="row" id="add_imageRow">

                </div>
            </div>
        </form>
    </div>

    <form id="deleteForm" method="post">
        
    </form>

    <?php
        if($galleryinformation == null)
        {
            echo '<h2 style="margin-left:20px; margin-bottom:30px;">No Albums</h2>';
        } 
        else
        {
            foreach($galleryinformation as $album)
            {?>

                <div class="panel panel-default" style="margin-left:20px; margin-right:20px">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel-title">
                                    <?php echo $album['albumname'];?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button form="deleteForm" class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this?\n\nSelect OK to continue.');" name="deleteAlbumBtn" value="<?php echo $album['id']?>"><i class="fa fa-trash"></i>&nbsp; Delete</button>
                                    <button type="submit" form="<?php echo $album['id']?>_editForm" id="editBtn" name="editBtn" class="btn btn-sm btn-primary" value="<?php echo $album['id']?>"><i class="fa fa-save"></i>&nbsp; Save</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" >
                        <form method="post" id="<?php echo $album['id']?>_editForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="<?php echo $album['id']?>_albumname">Album Name:</label>
                                <input type="text" id="<?php echo $album['id']?>_albumname" name="albumname" class="form-control" placeholder="Album Name"  
                                value="<?php echo $album['albumname']?>"
                                required />
                            </div>
                            
                            <div class="form-group">
                                <label for="<?php echo $album['id']?>_location">Location:</label>
                                <input type="text" id="<?php echo $album['id']?>_location" name="location" class="form-control" placeholder="Location" 
                                value="<?php echo $album['location']?>"
                                required />
                            </div>

                            <div class="form-group">
                                <label for="<?php echo $album['id']?>_description">Description:</label> 
                                <input type="text" id="<?php echo $album['id']?>_description" name="description" class="form-control" placeholder="Description" 
                                value="<?php echo $album['description']?>"
                                required />
                            </div>
                            <div class="form-group">
                                <label for="<?php echo $album['id']?>_imageFile">Add Image(s):</label>
                                <input type="file" id="<?php echo $album['id']?>_imageFile" name="edit_imageFile[]" class="form-control" onchange="editImageChange(this,<?php echo $album['id']?>)" accept="image/*" multiple />
                            </div>
                            <input type="hidden" name="existingimagepaths" value="<?php echo $album['imagepaths']?>"/>
                        </form>


                        <div class="row" id="<?php echo $album['id'];?>_imageRow">
                            <?php
                            if($album['imagepaths'] != null && $album['imagepaths'] != '')
                            {
                                foreach(explode(',',$album['imagepaths']) as $image)
                                {?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-top:20px">
                                        <img class="img-responsive" style="width: 100%; height:200px; object-fit: cover; cursor:zoom-in" src="albumimages/<?php echo $image?>" data-pic-title="<?php echo $image ?>" data-pic-description="<?php echo $image ?>" data-pic="albumimages/<?php echo $image?>"/>                                
                                        <button form="deleteForm" class="btn btn-danger form-control" type="submit" onclick="return confirm('Are you sure you want to delete this?\n\nSelect OK to continue.');" name="deletePhotoBtn" value="<?php echo $album['id'].','.$image?>"><i class="fa fa-trash"></i>&nbsp; Delete</button>
                                    </div>
                                <?php }
                            }?>
                        </div>
                     
                        

                    </div>
                </div> 
                
            <?php }
    
        }
    ?>
    
    
</div>


<?php include '../admin/config/footer.php' ?>


<?php

    function cleanString($string)
    {   
        if(strlen($string)>0)
        {
            $outputString = $string;
            if($string[0] == ',')
            {
                $outputString = substr($outputString,1);
            }
            if($string[strlen($string)-1] == ',')
            {
                $outputString = substr($outputString,0,strlen($string));
            }
            return $outputString;
        }
        
    }

    if(ISSET($_POST['btnSubmit']))
    {
        $albumname = $_POST['albumname'];
        $location = mysql_real_escape_string($_POST['location']);
        $description = mysql_real_escape_string($_POST['description']);

        $folderto = "./albumimages/";
        $imagepaths = "";

        if(!empty($_FILES["imageFile"]["name"])) { 
            if($_FILES["imageFile"]["name"][0] != "")
            {
                foreach ($_FILES['imageFile']['tmp_name'] as $key => $file)
                {
                //If File More Than 2MB, RESIZE IT
                    if(intval($_FILES['imageFile']['size'][$key]) > 2000000)
                    {
                        $imageresizer = ImageResize::createFromString(file_get_contents($_FILES['imageFile']['tmp_name'][$key]));
                        $imageresizer->scale(20);
                        $imageresizer->save($_FILES['imageFile']['tmp_name'][$key]);
                    }
                    // Get file info 
                    
                    $fileName = $WebClientID . "_" . $_FILES['imageFile']['name'][$key];
                    $fileType = $_FILES['imageFile']['type'][$key];
                    $fileError  = $_FILES["imageFile"]["error"][$key];
                    
                    $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif'); 
                    if(in_array($fileType, $allowTypes)){ 
                        
                        if($fileError == UPLOAD_ERR_OK)
                        {
                        
                            $destination = $folderto.$fileName;
                            $imagepaths = $imagepaths == "" ? $fileName: $imagepaths.",".$fileName;
                            if(!move_uploaded_file($_FILES['imageFile']['tmp_name'][$key],$destination)){
                                echo("<script>alert('error moving file: $fileName')</script>");
                            }
                        }
                        else
                        {
                            echo("<script>alert('$fileError')</script>");
                        }
                    }
                    else
                    {
                        echo("<script>alert('error: $fileType not included')</script>");
                    }
                    
                }
            }
           
        }

        $tablename ='photogallery';
        $tablecolumns = 'albumname,description,location,imagepaths,twds_ci_id';
        $columnvalues = "'$albumname','$description','$location','$imagepaths','$WebClientID'";
        $result = _saveData($tablename,$tablecolumns,$columnvalues);

        if($result['data']) { 
            echo (popUp("success","Saved", "(" . $result['count'] . ") Record Saved!","photogallery.php"));
        } else {  
            echo (popUp("error","", "Problem in Adding New Record.",""));
        }

    }


    if(ISSET($_POST['editBtn']))
    {
        $id = $_POST['editBtn'];
        $albumname = mysql_real_escape_string($_POST['albumname']);
        $location = mysql_real_escape_string($_POST['location']);
        $description = mysql_real_escape_string($_POST['description']);
        $existingimagepaths = $_POST['existingimagepaths'];

        $folderto = "./albumimages/";
        $imagepaths = $existingimagepaths;

        if(!empty($_FILES["edit_imageFile"]["name"])) { 
            if($_FILES["edit_imageFile"]["name"][0] != "")
            {
                foreach ($_FILES['edit_imageFile']['tmp_name'] as $key => $file)
                {
                    
                    //If File More Than 2MB, RESIZE IT
                    if(intval($_FILES['edit_imageFile']['size'][$key]) > 2000000)
                    {
                        $imageresizer = ImageResize::createFromString(file_get_contents($_FILES['edit_imageFile']['tmp_name'][$key]));
                        $imageresizer->scale(20);
                        $imageresizer->save($_FILES['edit_imageFile']['tmp_name'][$key]);
                    }
                    
                    // Get file info 
                    $fileName = $WebClientID . "_" . $_FILES['edit_imageFile']['name'][$key];
                    $fileType = $_FILES['edit_imageFile']['type'][$key];
                    $fileError  = $_FILES["edit_imageFile"]["error"][$key];

                   
                    
                    $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif'); 
                    if(in_array($fileType, $allowTypes)){ 
                        
                        if($fileError == UPLOAD_ERR_OK)
                        {
                            
                            $destination = $folderto.$fileName;
                            $imagepaths = $imagepaths == "" ? $fileName: $imagepaths.",".$fileName;
                            
    
                            if(!move_uploaded_file($_FILES['edit_imageFile']['tmp_name'][$key],$destination)){
                                echo("<script>alert('error moving file: $fileName')</script>");
                            }
                        }
                        else
                        {
                            echo("<script>alert('$fileError')</script>");
                        }
                    }
                    else
                    {
                        echo("<script>alert('error: $fileType not included')</script>");
                    }
                    
                }
            }
           
        }

        $tablename ='photogallery';
        $columnvalues = "albumname = '$albumname',
        description = '$description',
        location = '$location',
        imagepaths = '$imagepaths',
        twds_ci_id = '$WebClientID'";

        $params = "id = $id";
        
        $result = _updateData($tablename,$columnvalues,$params);

        if($result['data']) { 
            echo (popUp("success","Updated", "(" . $result['count'] . ") Record Updated!","photogallery.php"));
        } else {  
            echo (popUp("error","", "Problem in Updating Record.",""));
        }

    }


    if(ISSET($_POST['deletePhotoBtn']))
    {
        $id = explode(',',$_POST['deletePhotoBtn'])[0];
        $imageName = explode(',',$_POST['deletePhotoBtn'])[1];

        $album = getAlbumByID($galleryinformation,$id);
        
        $newImagePath = "";
        foreach(explode(',',$album['imagepaths']) as $img)
        {
            if($img != $imageName)
            {
                $newImagePath = $newImagePath.($newImagePath == ''?$img:",$img");
                
            }
            else
            {
                $path = "./albumimages/".$img;
                unlink($path);
            }
            
        }

        $tablename = 'photogallery';

        $imagePathValue = cleanString($newImagePath);
        $columnvalues ="imagepaths = '$imagePathValue'";
        $params = "id = '$id' AND twds_ci_id = '$WebClientID'";

        $result = _updateData($tablename,$columnvalues,$params);
        if($result['data']) { 
            echo (popUp("success","Deleted", "(" . $result['count'] . ") Record Deleted!","photogallery.php"));
        } else {  
            echo (popUp("error","", "Problem in Deleting Record.",""));
        }
    }

    if(ISSET($_POST['deleteAlbumBtn']))
    {
        
        $id = $_POST['deleteAlbumBtn'];
        $tablename = 'photogallery';
        $params = "id = $id AND twds_ci_id = '$WebClientID'";

        

        foreach(explode(',',getAlbumByID($galleryinformation,$id)['imagepaths']) as $img)
        {
           
            $path = "./albumimages/".$img;
            unlink($path);
            
        }

        $result = _removeData($tablename,$params);
        if($result['data']) { 
            echo (popUp("success","Deleted", "(" . $result['count'] . ") Record Deleted!","photogallery.php"));
        } else {  
            echo (popUp("error","", "Problem in Deleting Record.",""));
        }
    }

?>

<script>

    var galleryinformation = <?php echo json_encode($galleryinformation);?>

    function getAlbumByID(id)
    {
        if(galleryinformation != null)
        {
            var returnValue;
            galleryinformation.forEach((album,index)=>{
                if(album['id'] == id)
                {
                    returnValue = album;
                }
            })

            return returnValue;
        }
    }

    function emptyTable()
    {
        imageFilesTable.classList.add("invisible");
        imageFilesTable.classList.remove("visible");
        noImagesPrompt.classList.add("visible");
        noImagesPrompt.classList.remove("invisible");
    }

    function nonEmptyTable()
    {
        imageFilesTable.classList.add("visible");
        imageFilesTable.classList.remove("invisible");
        noImagesPrompt.classList.add("invisible");
        noImagesPrompt.classList.remove("visible");
    }


    function viewImage(imagename)
    {
        imageshown.src = './albumimages'+"/"+imagename;
    }


    var defaultHTMLs = [];

    function editImageChange(element, id)
    {
        var elementID = id+"_imageRow";
        var row = document.getElementById(elementID);

        if(!rowChanged(elementID))
        {
            defaultHTMLs[defaultHTMLs.length] = {id:elementID,defaultHTML:row.innerHTML};
        }

        var appendHTML ="";
        for(var file of element.files)
        {
            appendHTML += `
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-top:20px">
                    <img class="img-responsive" style="width: 100%; height:234px; object-fit: cover; cursor:zoom-in" src="${URL.createObjectURL(file)}" data-pic-title="${file.name}" data-pic-description="${file.name}" data-pic="${URL.createObjectURL(file)}"/>                                
                </div>
            `;
        }

        row.innerHTML =  getRowFromID(elementID) + appendHTML;
       
    }

    function rowChanged(id)
    {
        var returnVal = false;
        defaultHTMLs.forEach((item,index)=>{
            if(item['id'] == id)
            {
                returnVal = true;
                
            }
        })
        return returnVal;
    }

    function getRowFromID(id)
    {
        var defaultHTML = "";
        defaultHTMLs.forEach((item,index)=>{
            if(item['id'] == id)
            {
                defaultHTML = item['defaultHTML'];
            }
        })

        return defaultHTML;
    }
</script>