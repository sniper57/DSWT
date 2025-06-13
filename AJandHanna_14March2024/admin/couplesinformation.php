<?php
    $_HeaderTitle = "Couple's Information";  
    include '../admin/config/header.php';
    include '../admin/config/crud.php';
    include '../admin/config/helper.php';

    use \Gumlet\ImageResize;
    include '../admin/vendor/ImageResize/ImageResize.php';
?>

<?php

    $couples_query= _getAllDataByParam('couplesinformation', "twds_ci_id='$WebClientID'");
    $couples_info = array();
    $couples_info_noImage = array();

    if($couples_query!= null && $couples_query['count']>0)
    {
        $couples_info = $couples_query['data'];
    }
    else
    {
        
        $couples_info = null;
    }

    $tablecolumns = 'id,title,location,description,date';
    $couples_query = _getAllDataSpecColumns("couplesinformation WHERE twds_ci_id='$WebClientID'",$tablecolumns);
    $couples_info_noImage = array();

    if($couples_query!= null && $couples_query['count']>0)
    {
        $couples_info_noImage = $couples_query['data'];
    }
    else
    {
        
        $couples_info_noImage = null;
    }



?>



<div id="modalImage" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <img id="imageshown" src="" class="img-responsive"/>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <label class="modal-title" id="albumTitle">Bridesmaid Attire</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="editTitle">Title:</label>
                        <input class="form-control" type="text" name="editTitle" id="editTitle" placeholder="Title" 
                        value = ""/>
                    </div>
                    <div class="form-group">
                        <label for="editLocation">Location:</label>
                        <input class="form-control" type="text" name="editLocation" id="editLocation" placeholder="Location" 
                        value = ""/>
                    </div>

                    <div class="form-group">
                        <label for="editDescription">Description:</label>
                        <textarea class="form-control" type="text" name="editDescription" id="editDescription" placeholder="Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="editDate">Date:</label>
                        <input class="form-control" type="date" name="editDate" id="editDate"
                        value = ""/>
                    </div>

                    <div class="form-group">
                        <label for="editImage">Image:</label>
                        <input class="form-control" type="file" name="editImage" id="editImage" accept="image/*" onchange="imgChange(this,'editImageShown')"
                        value = ""/>
                    </div>

                    <img class="img-responsive" id="editImageShown" src=""> 

                    <div class="modal-footer" style="border-top:none;">
                        <div class="btn-group">
                            <input type="hidden" id="editID" name="editID"/>
                            <button type="submit" id="btnEdit" name="btnEdit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>&nbsp;Save</button>
                                
                        </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</div>


<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <b><i class="fa fa-heart"></i>&nbsp;Couple's Information</b>
        </div>
    </div>

    <div class="panel-body">
        <form method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Title" 
                value = ""/>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input class="form-control" type="text" name="location" id="location" placeholder="Location" 
                value = ""/>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" type="text" name="description" id="description" placeholder="Description"></textarea>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input class="form-control" type="date" name="date" id="date"
                value = ""/>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="imgChange(this,'addImageShown');"
                value = ""/>
            </div>

            <img class="img-responsive" id="addImageShown" src=""/>

            <div class="modal-footer" style="border-top:none;">
                <div class="btn-group">
                    <button type="submit" id="btnAdd" name="btnAdd" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>&nbsp;Add</button>
                        
                </div>
            </div>
            
        </form>
    </div>

   
</div>





<div class="panel panel-primary">

    <?php
                
        if($couples_info != null)
        {
            echo '<table class="table" >
                <thead class="bg-primary">
                    <tr>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>';
        
                foreach($couples_info as $c)
                {
                    $imageURL = 'data:image/png;base64,' .base64_encode($c['image']);
                    echo '<tr>';
                    echo'<td style="white-space: nowrap;">'.$c['title'].'</td>';
                    echo'<td>'.$c['location'].'</td>';
                    echo'<td style="white-space: nowrap;">'.$c['date'].'</td>';
                    echo'<td style="width: 50%;">'; 
                    echo'<p>'.$c['description'].'</p>';
                    echo'</td>';
                    echo'<td><img data-toggle="modal" class="btn" style="width:120px;height:100px;" src="'.$imageURL.'" data-target="#modalImage" onclick="viewImage(event)"></img></td>';
                    echo'<td>';
                    echo'<div class="btn-group-vertical">';
                    echo'<button class="btn btn-sm btn-primary" value="'.$c['id'].'" data-toggle="modal" data-target="#editModal" onclick="editClick('.$c['id'].',\''.$imageURL.'\')">Edit</button>';
                    echo'<button class="btn btn-sm btn-danger" type="submit" onclick="return confirm(\'Are you sure you want to delete this?\n\nSelect OK to continue.\');" name="editDelete" value="'.$c['id'].'" form="editForm">Delete</button>';
                    echo'</div>';
                    echo'</td>';
                    echo '</tr>';
                }
                
            echo  '</tbody> 
            </table>';
           
        }
        else
        {
            echo '<h3 style="margin-left:10px;">No Data</h3>';
        }


    ?>
   
</div>

<?php include '../admin/config/footer.php' ?>

<?php

    if(ISSET($_POST['btnAdd']))
    {
        $title = mysql_real_escape_string($_POST['title']);
        $location = mysql_real_escape_string($_POST['location']);
        $description = mysql_real_escape_string($_POST['description']);
        $date = $_POST['date'];
        $imageContent = '';

        if(!empty($_FILES["image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
             
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                if(intval($_FILES['editImage']['size']) > 5000000)
                {
                    $imageresizer = ImageResize::createFromString(file_get_contents($_FILES['editImage']['tmp_name']));
                    $imageresizer->scale(20);
                    $imageresizer->save($_FILES['editImage']['tmp_name']);
                }
                $image = $_FILES['image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
            }
        }

        
        $tablename = 'couplesinformation';
        $tablecolumns = 'twds_ci_id,title,location,description,date,image';
        $columnvalues = "'$WebClientID','$title','$location','$description',str_to_date('$date','%Y-%m-%d'),'$imgContent'";
       
        $result = _saveData($tablename,$tablecolumns,$columnvalues);

        if($result['data']) { 
            echo (popUp("success","Saved", "(" . $result['count'] . ") Record Saved!","couplesinformation.php"));
        } else {  
            echo (popUp("error","", "Problem in Adding New Record.",""));
        }
    }

    if(ISSET($_POST['btnEdit']))
    {
        $editID = $_POST['editID'];
        $editTitle = mysql_real_escape_string($_POST['editTitle']);
        $editLocation = mysql_real_escape_string($_POST['editLocation']);
        $editDescription = mysql_real_escape_string($_POST['editDescription']);
        $editDate = $_POST['editDate'];
        $imageContent = '';

        if(!empty($_FILES["editImage"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["editImage"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
             
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                if(intval($_FILES['editImage']['size']) > 5000000)
                {
                    $imageresizer = ImageResize::createFromString(file_get_contents($_FILES['editImage']['tmp_name']));
                    $imageresizer->scale(20);
                    $imageresizer->save($_FILES['editImage']['tmp_name']);
                }
                $image = $_FILES['editImage']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
            }

            $tablename = 'couplesinformation';
            $columnvalues = "title = '$editTitle',
            location = '$editLocation',
            description = '$editDescription',
            date = str_to_date('$editDate','%Y-%m-%d'),
            image = '$imgContent',
            twds_ci_id = '$WebClientID'";

            $params = "id = $editID AND twds_ci_id = '$WebClientID'";

            $result = _updateData($tablename,$columnvalues,$params);

            if($result['data']) { 
                echo (popUp("success","Updated", "(" . $result['count'] . ") Record Updated!","couplesinformation.php"));
            } else {  
                echo (popUp("error","", "Problem in Updating a Record.",""));
            }
        }
        else
        {
            $tablename = 'couplesinformation';
            $columnvalues = "title = '$editTitle',
            location = '$editLocation',
            description = '$editDescription',
            date = str_to_date('$editDate','%Y-%m-%d'),
            twds_ci_id = '$WebClientID'";

            $params = "id = $editID AND twds_ci_id='$WebClientID'";

            $result = _updateData($tablename,$columnvalues,$params);

            if($result['data']) { 
                echo (popUp("success","Updated", "(" . $result['count'] . ") Record Updated!","couplesinformation.php"));
            } else {  
                echo (popUp("error","", "Problem in Updating a Record.",""));
            }   


        
        }
    }

    if(ISSET($_POST['editDelete']))
    {
        $id = $_POST['editDelete'];
        $tablename = 'couplesinformation';
        $params = "id=$id AND twds_ci_id = '$WebClientID'";
        
        $result =  _removeData($tablename,$params);

        if($result['data']) { 
            echo (popUp("success","Deleted", "(" . $result['count'] . ") Record Deleted!","couplesinformation.php"));
        } else {  
            echo (popUp("error","", "Problem in Deleting a Record.",""));
        }   
    }

?>

<script>

    var couples_info_noImage = <?php echo json_encode($couples_info_noImage)?>;

    function editClick(id,imgSrc)
    {
        editTitle.value = getCouplesInfoFromID(id)['title'];
        editLocation.value = getCouplesInfoFromID(id)['location'];
        editDescription.value = getCouplesInfoFromID(id)['description'];
        editDate.value = getCouplesInfoFromID(id)['date'];
        editImageShown.src = imgSrc;
        editID.value = id;
    }

    function getCouplesInfoFromID(id)
    {
        var returnValue;
        couples_info_noImage.forEach((item,index)=>{
            
            if(item['id'] == id)
            {
                returnValue =  item;
            }
        })
        return returnValue;
    }

    function viewImage(event)
    {
        imageshown.src = event.target.src;
    }


    function imgChange(element,imgElement)
    {
        var img = document.getElementById(imgElement);
        for(var file of element.files)
        {
            img.src = URL.createObjectURL(file);
        }
    }
</script>



