<?php
use \Gumlet\ImageResize;
include '../admin/vendor/ImageResize/ImageResize.php';
?>

<form method="post" enctype="multipart/form-data">
    Select File:
    <input type="file" id="fileupload" name="fileupload" class="form-control" accept="image/*" />
    <button type="submit" id="btnSubmitxxx" name="btnSubmitxxx" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>&nbsp;resize</button>
</form>

<?php 
if (ISSET($_POST["btnSubmitxxx"])){
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
                $imageresizer->scale(10);
                $imageresizer->getImageAsString();
                $image_base64 = base64_encode($imageresizer);
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                echo 'base64 data (resized):<br><img src="'. $image .'" alt="resized_'. $name .'" title="'. $name .'" />';

            }	

        } else {
            foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
            }

            die(); //Ensure no more processing is done
        }
    }
}

?>


