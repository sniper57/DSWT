<?php
$_HeaderTitle = 'Wedding Details';  
use \Gumlet\ImageResize;
include '../admin/config/header.php';
include '../admin/config/crud.php';
include '../admin/config/helper.php';
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

function formatDesignationText($designation)
{
    switch($designation)
    {
        case "Bridesmaid":
            return "bridesmaid";
            break;
        case "Groomsmen":
            return "groomsmen";
            break;
        case "Principal Sponsors (Male)":
            return "Psponsor_male";
            break;
        case "Principal Sponsors (Female)":
            return "Psponsor_female";
            break;
        case "Secondary Sponsors (Male)":
            return "Ssponsor_male";
            break;
        case "Secondary Sponsors (Female)":
            return "Ssponsor_female";
            break;
        case "Guest Wear":
            return "guestwear";
            break;
        default:
            return $designation;
    }
}

function normalizeDesignationText($formattedDesignation)
{
    switch($formattedDesignation)
    {
        case "bridesmaid":
            return "Bridesmaid";
            break;
        case "groomsmen":
            return "Groomsmen";
            break;
        case "Psponsor_male":
            return "Principal Sponsors (Male)";
            break;
        case "Psponsor_female":
            return "Principal Sponsors (Female)";
            break;
        case "Ssponsor_male":
            return "Secondary Sponsors (Male)";
            break;
        case "Ssponsor_female":
            return "Secondary Sponsors (Female)";
            break;
        case "guestwear":
            return "Guest Wear";
            break;
        default:
            return $formattedDesignation;
    }
}



$weddingdetails_query =  _getAllDataByParam('weddingdetails',"twds_ci_id = '$WebClientID'");
$weddinginfo = array();


if($weddingdetails_query!= null && $weddingdetails_query['count'] > 0)
{
    $weddinginfo = $weddingdetails_query['data'];
}
else
{
    $weddinginfo = null;
}

function getAttireInfo($WebClientID)
{        
    $attiredetails_query = _getAllDataByParam('attiredetails',"twds_ci_id = '$WebClientID'");
    $attire_info = array();
    if($attiredetails_query!= null && $attiredetails_query['count'] > 0)
    {
        $attire_info = $attiredetails_query['data'];
    }
    else
    {        
        //IF NO DATA FOUND, INSERT DATA
        $xtablename = 'attiredetails';
        $xtablecolumns = 'twds_ci_id, 
                              designation';

        _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Bridesmaid'");
        _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Groomsmen'");
        _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Principal Sponsors (Male)'");
        _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Principal Sponsors (Female)'");
        _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Secondary Sponsors (Male)'");
        _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Secondary Sponsors (Female)'");
        _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Guest Wear'");
        
        $xattiredetails_query = _getAllDataByParam('attiredetails',"twds_ci_id = '$WebClientID'");
        $attire_info = $xattiredetails_query['data'];
    }

    return $attire_info;
}

$attire_info = getAttireInfo($WebClientID);

$activeDesignation = "";

function getAttireInfoFromDesignation($attireInfo,$designation)
{
    
    if($attireInfo!=null)
    {
        foreach($attireInfo as $attire)
        {
            if($attire['designation'] == $designation)
            {
                
                return $attire;
            }
        }
        
        return null;
    }
    else
    {
        return null;
    }
    
}
?>




<div id="photo_album_modal" class="modal fade" role="dialog"  tabindex="-2">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <label class="modal-title" id="albumTitle">Bridesmaid Attire</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" class="form-control" placeholder="Description" />
                    </div>

            
                    <div class="form-group">
                        <label for="imageFile">Add Image(s):</label>
                        <input type="file" id="imageFile" name="imageFile[]" class="form-control" accept="image/*" onchange="addChange(this)" multiple/>
                    </div>

                     
                    <!-- <div class="row">
                        <div class="col-lg-10">
                        </div> 
                        <div class="col-lg-2" style="margin-top:25px;height:100%;">
                            <button id="addbutton" type="button" class="btn btn-primary" onclick="addClick()">Add</button>
                        </div>
                    </div> -->
                    
                    <table id="imageFilesTable" class="table">
                        <thead>
                            <tr>
                                <th>File</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="imageFileTableBody">
                            
                        </tbody>
                    </table>

                    <h1 id="noImagesPrompt" class="visible">No Images</h1>
                    
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <input type="hidden" id="designation" name="designation"/>
                        <input type="hidden" id="existingImagePaths" name="existingImagePaths"/>
                        <button type="submit" id="albumBtn" name="albumBtn" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>&nbsp;Save</button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="image_modal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <img id="imageshown" src="../images/Bridesmaid/bridesmaid.jpg" class="img-responsive"/>
            
        </div>
    </div>
</div>

<div id="background_image_modal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <img id="backgroundimageshown"
            src="<?php echo $weddinginfo[0]['backgroundimage'] == "" ? "":'data:image/png;base64,'.base64_encode($weddinginfo[0]['backgroundimage']);?>"
             class="img-responsive"/>
        </div>
    </div>
</div>


<div id="googleMapModal" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">How to locate a Place/Location?</h4>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Click "OPEN MAP" and Search the place on google map.
                        <ul>
                            <li>
                                <img src="../admin/img/user_guide/how_to_find_location/1.jpg" class="img img-responsive img-thumbnail" />
                            </li>
                        </ul>
                    </li>
                    <br />                    
                    <li>Tap the Share (<i class="fa fa-share-alt"></i>) icon and go to "Embed a map" Tab
                        <ul>
                            <li>
                                <img src="../admin/img/user_guide/how_to_find_location/2.jpg" class="img img-responsive img-thumbnail" />
                            </li>
                        </ul>
                    </li>
                    <br />
                    <li>Click "COPY HTML"
                        <ul>
                            <li>
                                <img src="../admin/img/user_guide/how_to_find_location/3.jpg" class="img img-responsive img-thumbnail" />
                            </li>
                        </ul>
                    </li>
                    <br />
                    <li>Paste it on the field provided.
                        <ul>
                            <li>
                                <img src="../admin/img/user_guide/how_to_find_location/4.jpg" class="img img-responsive img-thumbnail" />
                            </li>
                        </ul>
                    </li>
                    <br />
                </ol>
            </div>
            <div class="modal-footer">                 
                 <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
            </div>
        </div>
    </div>
</div>


<div id="wazeMapModal" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">How to locate a plot waze link?</h4>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Click "OPEN WAZE" and Search the place on "Choose destination" field.
                        <ul>
                            <li>
                                <img src="../admin/img/user_guide/how_to_find_location/5.jpg" class="img img-responsive img-thumbnail" />
                            </li>
                        </ul>
                    </li>
                    <br />                    
                    <li>Tap the Share (<i class="fa fa-share-alt"></i>) icon and go to "SHARE YOUR DRIVE" Tab
                        <ul>
                            <li>
                                <img src="../admin/img/user_guide/how_to_find_location/6.jpg" class="img img-responsive img-thumbnail" />
                            </li>
                        </ul>
                    </li>
                    <br />
                    <li>Click "COPY HTML"
                        <ul>
                            <li>
                                <img src="../admin/img/user_guide/how_to_find_location/7.jpg" class="img img-responsive img-thumbnail" />
                            </li>
                        </ul>
                    </li>
                    <br />
                    <li>Paste it on the field provided.
                        <ul>
                            <li>
                                <img src="../admin/img/user_guide/how_to_find_location/8.jpg" class="img img-responsive img-thumbnail" />
                            </li>
                        </ul>
                    </li>
                    <br />
                </ol>
            </div>
            <div class="modal-footer">                 
                 <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary" >
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-md-6">
                    <b><i class="fa fa-info"></i>&nbsp;Wedding Details</b>
                </div>
                <div class="col-md-6">
                    <button form="wdForm" type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-sm btn-default pull-right"><i class="fa fa-save"></i>&nbsp;Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel-body">
        <form id="wdForm" method="post" enctype="multipart/form-data">
                <!-- Modal content-->
                <div class="form-group">
                    <label for="weddingdate">Wedding Date: <span class="text-danger">*</span></label>
                    <input type="hidden" id="id" name="id" value="<?php echo $weddinginfo[0]['id'] == "" ? "" :$weddinginfo[0]['id'] ?>"/>

                    <input type="date" id="weddingdate" name="weddingdate" class="form-control"  
                    value="<?php echo $weddinginfo[0]['weddingdate'] == "" ? "" :$weddinginfo[0]['weddingdate'] ?>" required/>
                </div>
                <div class="form-group">
                    <label for="weddingtimefrom">Wedding Time From: <span class="text-danger">*</span></label>
                    <input type="time" id="weddingtimefrom" name="weddingtimefrom" class="form-control"  
                    value="<?php echo $weddinginfo[0]['weddingtimefrom'] == "" ? "" :$weddinginfo[0]['weddingtimefrom'] ?>" required/>
                </div>
                <div class="form-group">
                    <label for="weddingtimeto">Wedding Time To: <span class="text-danger">*</span></label>
                    <input type="time" id="weddingtimeto" name="weddingtimeto" class="form-control" 
                    value="<?php echo $weddinginfo[0]['weddingtimeto'] == "" ? "" :$weddinginfo[0]['weddingtimeto'] ?>" required/>
                </div>
                <div class="form-group">
                    <label for="numguests">Total Number of Guests: <span class="text-danger">*</span></label>
                    <input type="number" id="numguests" name="numguests" class="form-control" placeholder="Number of Guests"  
                    value="<?php echo $weddinginfo != null? $weddinginfo[0]['guestnumber']: "";?>" required/>
                </div>

                <div class="form-group">
                    <label for="contactperson">Contact Person: <span class="text-danger">*</span></label>
                    <input type="text" id="contactperson" name="contactperson" class="form-control" placeholder="Contact Person"  
                    value="<?php echo $weddinginfo != null? $weddinginfo[0]['contactperson']: "";?>" required/>
                </div>

                <div class="form-group">
                    <label for="contactnumber">Contact Number: <span class="text-danger">*</span></label>
                    <input type="text" id="contactnumber" name="contactnumber" class="form-control" placeholder="Contact Number"  
                    value="<?php echo $weddinginfo != null? $weddinginfo[0]['contactnumber']: "";?>" required/>
                </div>

                <div class="form-group">
                    <label for="receptiondetails">Reception Details: <span class="text-danger">*</span></label>
                    <textarea id="receptiondetails" name="receptiondetails" class="form-control" placeholder="Location Name/Address with street and nearest landmark/City/Municipality" required ><?php echo $weddinginfo != null? $weddinginfo[0]['receptiondetails']: "";?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="receptiongooglemaps">Reception Google Maps Link: <span class="text-danger">*</span></label>                            
                            
                            <div class="input-group">                                
                                <span class="input-group-btn"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#googleMapModal"><i class="fa fa-question"></i></button></span>                         
                                <input type="text" id="receptiongooglemaps" name="receptiongooglemaps" class="form-control" placeholder="iframe src=https://www.google.com/maps/embed?" 
                                value='<?php echo $weddinginfo != null? $weddinginfo[0]["receptiongooglemaps"]: "";?>' required />
                                <span class="input-group-btn"><a class="btn btn-primary" href="https://www.google.com/maps?hl=en" target="_blank">Open Map</a></span>                            
                            </div>
                           
                                                                         
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="receptionwaze">Reception Waze Link: <span class="text-danger">*</span></label>
                        
                            <div class="input-group">                                
                                <span class="input-group-btn"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#wazeMapModal"><i class="fa fa-question"></i></button></span>                         
                                <input type="text"id="receptionwaze" name="receptionwaze" class="form-control" placeholder="https://ul.waze.com/ul?" 
                                value='<?php echo $weddinginfo != null? $weddinginfo[0]["receptionwaze"]: "";?>' required />
                                <span class="input-group-btn"><a class="btn btn-primary" href="https://www.waze.com/live-map" target="_blank">Open Waze</a></span>                            
                            </div>
                        </div>
                    </div>
                </div>
               

                <div class="form-group">
                    <label for="churchdetails">Church Details: <span class="text-danger">*</span></label>
                    <textarea id="churchdetails" name="churchdetails" class="form-control" placeholder="Location Name/Address with street and nearest landmark/City/Municipality" required ><?php echo $weddinginfo != null? $weddinginfo[0]['churchdetails']: "";?></textarea>
                
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="churchgooglemaps">Church Google Maps Link: <span class="text-danger">*</span></label>
                         

                             <div class="input-group">                                
                                <span class="input-group-btn"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#googleMapModal"><i class="fa fa-question"></i></button></span>                         
                                <input type="text"id="churchgooglemaps" name="churchgooglemaps" class="form-control" placeholder="iframe src=https://www.google.com/maps/embed?" 
                                value='<?php echo $weddinginfo != null? $weddinginfo[0]["churchgooglemaps"]: "";?>' required />
                                <span class="input-group-btn"><a class="btn btn-primary" href="https://www.google.com/maps?hl=en" target="_blank">Open Map</a></span>                            
                            </div>

                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="churchwaze">Church Waze Link: <span class="text-danger">*</span></label>
                          
                             <div class="input-group">                                
                                <span class="input-group-btn"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#wazeMapModal"><i class="fa fa-question"></i></button></span>                         
                                <input type="text"id="churchwaze" name="churchwaze" class="form-control" placeholder="https://ul.waze.com/ul?" 
                                value='<?php echo $weddinginfo != null? $weddinginfo[0]["churchwaze"]: "";?>' required />
                                <span class="input-group-btn"><a class="btn btn-primary" href="https://www.waze.com/live-map" target="_blank">Open Waze</a></span>                            
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="" value="" id="sameasreception" onchange="checkBoxChange()"/>
                    <label class="form-check-label" for="sameasreception">Church address same as reception</label>
                </div>

                <img id="backgroundImageShow" class="img-responsive" src="<?php echo $weddinginfo != null &&  $weddinginfo[0]['backgroundimage'] != "" ? 'data:image/jpg;charset=utf8;base64,'.base64_encode($weddinginfo[0]['backgroundimage']): "";?>"/>
                
                <div class="form-group" style="margin-top:20px" >
                    <label for="backgroundimage">Background Image: <span class="text-danger">*</span></label>
                    <input type="file" id="backgroundimage" name="backgroundimage" class="form-control" accept="image/*" onchange="backgroundImageChange(this)"/>
                    <p class="text-left" style="font-size: xx-small"><b>* HD Photo must not exceed 4000px X 4000px and Maximum of 5MB file size.</b></p>
                </div>
                <hr />
                <!-- <div class="form-group">
                    <div id="frames"></div>
                    <label for="fileupload">Select File:</label><div id="DimensionWarningMsg"></div>
                    <input type="file" id="fileupload" name="fileupload" onchange="ValidateSize(this);" class="form-control" accept="image/*" />
                    <p class="text-left" style="font-size: xx-small"><b>* HD Photo must be 4000px by 4000px and Maximum of 5MB file size.</b></p>
                </div> -->


                
                <?php 
                $designationList = array("bridesmaid","groomsmen","Psponsor_male","Psponsor_female","Ssponsor_male","Ssponsor_female","guestwear");
                foreach($designationList as $desig){?>

                        <div class="panel panel-default">
                            <?php $attire = getAttireInfoFromDesignation($attire_info,normalizeDesignationText($desig));?>
                            <div class="panel-heading">
                                <div class="panel-title"><?php echo normalizeDesignationText($desig)?></div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="<?php echo $desig?>description">Description:</label>
                                    <input type="text" id="<?php echo $desig?>description" name="<?php echo $desig?>description" class="form-control" placeholder="Description" value="<?php echo $attire['description']?>"/>
                                </div>

                        
                                <div class="form-group">
                                    <label for="<?php echo $desig?>imageFile">Add Image(s):</label>
                                    <input type="file" id="<?php echo $desig?>imageFile" name="<?php echo $desig?>imageFile[]" class="form-control" accept="image/*" onchange="addChange(this,'<?php echo $desig?>')" multiple/>
                                </div>
                                <div class="row" id="<?php echo $desig?>_imageRow">
                                    <?php 
                    if($attire != null && $attire['imagepaths'] != "")
                    {?>

                                            <?php
                        foreach(explode(',',$attire['imagepaths']) as $image)
                        {?>

                                                <div class="col-md-4" style="margin-top:20px">
                                                    <img class="img-responsive" style="width: 100%; height:200px; object-fit: cover; cursor:zoom-in" src="./weddingattires/<?php echo formatDesignationText($attire['designation']).'/'.$image?>" data-pic-title="<?php echo $image ?>" data-pic-description="<?php echo $image ?>" data-pic="./weddingattires/<?php echo formatDesignationText($attire['designation']).'/'.$image?>"/>
                                                    <button class="btn btn-danger form-control" type="submit" onclick="return confirm('Are you sure you want to delete this?\n\nSelect OK to continue.');" style="border-radius:0;" value="<?php echo $attire['designation'].','.$image?>" name="deleteBtn">Delete</button> 
                                                </div>
                                            
                                            <?php }?>

                                            
                                    <?php }?>
                                </div>
                            </div>
                        </div>

                    <?php }
                
                    ?>
                
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
            $outputString = substr($outputString,0,strlen($string)-1);
        }
        return $outputString;
    }
    
}



// function designationExists($designation)
// {
//     foreach($attire_info as $attire)
//     {
//         if($attire['designation'] == $designation)
//         {
//             return true;
//         }
//     }
// }


//For Wedding Details

if(ISSET($_POST['btnSubmit']))
{
    $_id = $_POST['id'];
    $weddingdate = mysql_real_escape_string($_POST['weddingdate']);
    $weddingtimefrom = mysql_real_escape_string($_POST['weddingtimefrom']);
    $weddingtimeto = mysql_real_escape_string($_POST['weddingtimeto']);
    $numguests = mysql_real_escape_string($_POST['numguests']);
    $contactperson = mysql_real_escape_string($_POST['contactperson']);
    $contactnumber = mysql_real_escape_string($_POST['contactnumber']);
    $receptiondetails = mysql_real_escape_string($_POST['receptiondetails']);     
    $receptionwaze = mysql_real_escape_string($_POST['receptionwaze']);
    $churchdetails = mysql_real_escape_string($_POST['churchdetails']);     
    $churchwaze = mysql_real_escape_string($_POST['churchwaze']);
    $imgContent = "";
    $affectedRows = 0;

    $doc1 = new DOMDocument();
    $doc1->loadHTML(mysql_real_escape_string($_POST['receptiongooglemaps']));
    $xpath1 = new DOMXPath($doc1);
    $src1 = $xpath1->evaluate("string(//iframe/@src)");    
    $receptiongooglemaps = ($src1 == "" ? mysql_real_escape_string($_POST['receptiongooglemaps']) : str_replace("\\","",str_replace('"',"", mysql_real_escape_string($src1))));

    $doc2 = new DOMDocument();
    $doc2->loadHTML(mysql_real_escape_string($_POST['churchgooglemaps']));
    $xpath2 = new DOMXPath($doc2);
    $src2 = $xpath2->evaluate("string(//iframe/@src)");     
    $churchgooglemaps = ($src2 == "" ? mysql_real_escape_string($_POST['churchgooglemaps']) : str_replace("\\","",str_replace('"',"", mysql_real_escape_string($src2))));

    
    if(!empty($_FILES["backgroundimage"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["backgroundimage"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['backgroundimage']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

            // Upload file
            $target_dir = "../admin/uploads/";                
            move_uploaded_file($_FILES['backgroundimage']['tmp_name'],$target_dir. $WebClientID . "_" . "metadata_bg.png");
        }
    }

    if($weddinginfo == null)
    {
        $tablename = 'weddingdetails';
        $tablecolumns = 'id,weddingdate,
            weddingtimefrom,weddingtimeto,guestnumber,contactperson,contactnumber,
            receptiondetails,receptiongooglemaps,receptionwaze,
            churchdetails,churchgooglemaps,churchwaze,backgroundimage,twds_ci_id';
        $columnvalues = "'$_id',
            str_to_date('$weddingdate', '%Y-%m-%d'),
            str_to_date('$weddingtimefrom', '%H:%i'),
            str_to_date('$weddingtimeto', '%H:%i'),
            '$numguests',
            '$contactperson',
            '$contactnumber',
            '$receptiondetails',
            '$receptiongooglemaps',
            '$receptionwaze',
            '$churchdetails',
            '$churchgooglemaps',
            '$churchwaze',
            '$imgContent',
            '$WebClientID'";

        $result = _saveData($tablename,$tablecolumns,$columnvalues);

        if($result['data']) { 
            $affectedRows += intval($result['count']);
        } else {  
            echo (popUp("error","", "Problem in Adding New Record.",""));
        }
    }
    else
    {

        if($imgContent != "")
        {
            $tablename = 'weddingdetails';
            $columnvalues ="
                weddingdate = str_to_date('$weddingdate', '%Y-%m-%d'),
                weddingtimefrom = str_to_date('$weddingtimefrom', '%H:%i'),
                weddingtimeto = str_to_date('$weddingtimeto', ' %H:%i'),
                guestnumber = '$numguests',
                contactperson = '$contactperson',
                contactnumber = '$contactnumber',
                receptiondetails = '$receptiondetails',
                receptiongooglemaps = '$receptiongooglemaps',
                receptionwaze = '$receptionwaze',
                churchdetails = '$churchdetails',
                churchgooglemaps = '$churchgooglemaps',
                churchwaze = '$churchwaze',
                backgroundimage = '$imgContent',
                twds_ci_id = '$WebClientID'";
            $params = "id = '$_id' AND twds_ci_id = '$WebClientID'";
            
            
            $result = _updateData($tablename,$columnvalues,$params);
            
            if($result['data']) { 
                $affectedRows += intval($result['count']);
            } else {  
                echo (popUp("error","", "Problem in Updating Record.",""));
            }
        }
        else
        {
            $tablename = 'weddingdetails';
            $columnvalues ="
                weddingdate = str_to_date('$weddingdate', '%Y-%m-%d'),
                weddingtimefrom = str_to_date('$weddingtimefrom', '%H:%i'),
                weddingtimeto = str_to_date('$weddingtimeto', ' %H:%i'),
                guestnumber = '$numguests',
                contactperson = '$contactperson',
                contactnumber = '$contactnumber',
                receptiondetails = '$receptiondetails',
                receptiongooglemaps = '$receptiongooglemaps',
                receptionwaze = '$receptionwaze',
                churchdetails = '$churchdetails',
                churchgooglemaps = '$churchgooglemaps',
                churchwaze = '$churchwaze',
                twds_ci_id = '$WebClientID'";
            $params = "id = '$_id' AND twds_ci_id = '$WebClientID'";
            
            $result = _updateData($tablename,$columnvalues,$params);
            
            if($result['data']) { 
                $affectedRows += intval($result['count']);
            } else {  
                echo (popUp("error","", "Problem in Updating Record.",""));
            }
        }
        
    }
    photoSQL($attire_info, $affectedRows,$designationList,$WebClientID);
}

//For Attire Details

function appendToImagePaths($attire_info, $designation, $append, $WebClientID)
{
    
    $attire = getAttireInfoFromDesignation($attire_info,normalizeDesignationText($designation));
    $returnString = "";
    
    
    if($attire['imagepaths'] != "")
    {
        $returnString = $attire['imagepaths'] . ','. $append;
    }
    else
    {
        
        $returnString = $append;
        
        
    }

    return cleanString($returnString);
    

}


function photoSQL($attire_info,$affectedRows,$designationList,$WebClientID)
{
    
    $tablename = 'attiredetails';
    if($attire_info == null)
    {
        $result = null;

        $saveQueryList = array();
        foreach($designationList as $designation)
        {
            $description = mysql_real_escape_string($_POST[$designation.'description']);
            $designationFile = $designation."imageFile";
            $imagePaths = "";
            if(!empty($_FILES[$designationFile]["name"]) && $_FILES[$designationFile]["name"][0] != "") 
            { 
                
                foreach ($_FILES[$designationFile]['tmp_name'] as $key => $file)
                {

                    if(intval($_FILES[$designationFile]['size'][$key]) > 5000000)
                    {
                        $imageresizer = ImageResize::createFromString(file_get_contents($_FILES[$designationFile]['tmp_name'][$key]));
                        $imageresizer->scale(20);
                        $imageresizer->save($_FILES[$designationFile]['tmp_name'][$key]);
                    }
                    // Get file info 
                    $fileName = $WebClientID . "_" . $_FILES[$designationFile]['name'][$key];
                    $fileType = $_FILES[$designationFile]['type'][$key];
                    $fileError  = $_FILES[$designationFile]["error"][$key];
                    
                    //Allow certain file formats 
                    $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif'); 
                    if(in_array($fileType, $allowTypes)){ 
                        
                        if($fileError == UPLOAD_ERR_OK)
                        {
                            $folderto = "./weddingattires/".formatDesignationText($designation)."/";
                            $destination = $folderto.$fileName;
                            $imagePaths = $imagePaths == "" ? $fileName: $imagePaths.",".$fileName;
                            $imageresizer = ImageResize::createFromString(file_get_contents($_FILES[$designationFile]['tmp_name'][$key]));
                            $imageresizer->scale(20);
                            $imageresizer->getImageAsString();
                            if(!move_uploaded_file($_FILES[$designationFile]['tmp_name'][$key],$destination)){
                                echo("<script>alert('error moving file: $fileName, $fileError')</script>");
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
            $imgPathRename = $imagePaths;
            $tablecolumns ='designation,description,imagepaths,twds_ci_id';
            $columnvalues ="'".normalizeDesignationText($designation)."','$description', '$imgPathRename','$WebClientID'";

            ////TODO: Check if there is an existing data.
            ////== GET AttireDetails LIST ==
            //$attire_info = _getAllDataByParam('attiredetails',"twds_ci_id = '$WebClientID'");                
            //if ($attire_info['count'] == 0){       
            //    //IF NO DATA FOUND, INSERT DATA
            //    $xtablename = 'attiredetails';
            //    $xtablecolumns = 'twds_ci_id, 
            //                      designation';

            //    _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Bridesmaid'");
            //    _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Groomsmen'");
            //    _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Principal Sponsors (Male)'");
            //    _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Principal Sponsors (Female)'");
            //    _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Secondary Sponsors (Male)'");
            //    _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Secondary Sponsors (Female)'");
            //    _saveData($xtablename,$xtablecolumns,"'$WebClientID', 'Guest Wear'");
            //}
            

            $saveQueryList[] = new SaveQuery($tablecolumns,$columnvalues);

            
            
        }

        $result = _saveMultipleData($tablename,$saveQueryList);
        
        if($result['data']) { 
            $count = intval($result['count']) + $affectedRows;
            echo (popUp("success","Saved", "(" . $count . ") Record Saved!","weddingdetails.php"));
        } else {  
            echo (popUp("error","", "Problem in Adding New Record.",""));
        }
        
    }
    else
    {
        
        $updateQueryList = array();
        $saveQueryList = array();

        foreach($designationList as $designation)
        {
            if(getAttireInfoFromDesignation($attire_info,normalizeDesignationText($designation))!= null)
            {
                $description = mysql_real_escape_string($_POST[$designation.'description']);
                $designationFile = $designation."imageFile";
                $imagePaths = "";
                if(!empty($_FILES[$designationFile]["name"]) && $_FILES[$designationFile]["name"][0] != "") 
                { 
                    foreach ($_FILES[$designationFile]['tmp_name'] as $key => $file)
                    {

                        if(intval($_FILES[$designationFile]['size'][$key]) > 5000000)
                        {
                            $imageresizer = ImageResize::createFromString(file_get_contents($_FILES[$designationFile]['tmp_name'][$key]));
                            $imageresizer->scale(20);
                            $imageresizer->save($_FILES[$designationFile]['tmp_name'][$key]);
                        }
                        // Get file info 
                        $fileName = $WebClientID . "_" . $_FILES[$designationFile]['name'][$key];
                        $fileType = $_FILES[$designationFile]['type'][$key];
                        $fileError  = $_FILES[$designationFile]["error"][$key];
                        
                        //Allow certain file formats 
                        $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif'); 
                        if(in_array($fileType, $allowTypes)){ 
                            
                            if($fileError == UPLOAD_ERR_OK)
                            {
                                $folderto = "./weddingattires/".formatDesignationText($designation)."/";
                                $destination = $folderto.$fileName;
                                $imagePaths = $imagePaths == "" ? $fileName: $imagePaths.",".$fileName;
                                $imageresizer = ImageResize::createFromString(file_get_contents($_FILES[$designationFile]['tmp_name'][$key]));
                                $imageresizer->scale(20);
                                $imageresizer->getImageAsString();
                                if(!move_uploaded_file($_FILES[$designationFile]['tmp_name'][$key],$destination)){
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

                
                $updatedImagePaths = appendToImagePaths($attire_info,$designation, $imagePaths, $WebClientID);
                
                
                $columnvalues ="description = '$description' ,imagepaths = '$updatedImagePaths', twds_ci_id='$WebClientID'";
                $param ="designation ='".normalizeDesignationText($designation)."' AND twds_ci_id='$WebClientID'";
                $updateQuery = new UpdateQuery($columnvalues,$param);
                $updateQueryList[] = $updateQuery;

                
            }
            else
            {
                $description = mysql_real_escape_string($_POST[$designation.'description']);
                $designationFile = $designation."imageFile";
                $imagePaths = "";
                if(!empty($_FILES[$designationFile]["name"]) && $_FILES[$designationFile]["name"][0] != "") 
                { 
                    
                    foreach ($_FILES[$designationFile]['tmp_name'] as $key => $file)
                    {

                        if(intval($_FILES[$designationFile]['size'][$key]) > 5000000)
                        {
                            $imageresizer = ImageResize::createFromString(file_get_contents($_FILES[$designationFile]['tmp_name'][$key]));
                            $imageresizer->scale(20);
                            $imageresizer->save($_FILES[$designationFile]['tmp_name'][$key]);
                        }
                        // Get file info 
                        $fileName = $WebClientID . "_" . $_FILES[$designationFile]['name'][$key];
                        $fileType = $_FILES[$designationFile]['type'][$key];
                        $fileError  = $_FILES[$designationFile]["error"][$key];
                        
                        //Allow certain file formats 
                        $allowTypes = array('image/jpg','image/png','image/jpeg','image/gif'); 
                        if(in_array($fileType, $allowTypes)){ 
                            
                            if($fileError == UPLOAD_ERR_OK)
                            {
                                $folderto = "./weddingattires/".formatDesignationText($designation)."/";
                                $destination = $folderto.$fileName;
                                $imagePaths = $imagePaths == "" ? $fileName: $imagePaths.",".$fileName;
                                
                                if(!move_uploaded_file($_FILES[$designationFile]['tmp_name'][$key],$destination)){
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

                $tablecolumn ="designation, description ,imagepaths, twds_ci_id";
                $columnvalues = "'".normalizeDesignationText($designation)."','$description','$imagePaths','$WebClientID'";
                $saveQuery = new SaveQuery($tablecolumn,$columnvalues);
                $saveQueryList[] = $saveQuery;

            }
            
            
        }

        $error = false;

        if(count($saveQueryList) >0)
        {
            $result = _saveMultipleData($tablename,$saveQueryList);
            

            if($result['data']) { 
                $affectedRows += intval($result['count']);
            } else {  
                $error = true;
            }
        }
        if(count($updateQueryList) >0)
        {
            $result = _updateMultipleRowsWithDifVal($tablename,$updateQueryList);
            if($result['data']) { 
                $affectedRows += intval($result['count']);
                
            } else {  
                $error = true;
            }
        }

        if(!$error)
        {
            $count = $affectedRows;
            echo (popUp("success","Saved", "(" . $count . ") Record Saved!","weddingdetails.php"));
        }
        else
        {
            echo (popUp("error","", "Problem in Adding New Record.",""));
        }
        
        
        
    }
    
}




if(ISSET($_POST['deleteBtn']))
{
    $designation = explode(',',$_POST['deleteBtn'])[0];
    $imageName = explode(',',$_POST['deleteBtn'])[1];

    $attire = getAttireInfoFromDesignation($attire_info,$designation);


    $test = $attire['imagepaths'];
    $newImagePath = "";
    foreach(explode(',',$attire['imagepaths']) as $img)
    {
        if($img != $imageName)
        {
            $newImagePath = $newImagePath.($newImagePath == ''?$img:",$img");
        }
        else
        {
            $path = "./weddingattires/".formatDesignationText($designation)."/".$img;
            unlink($path);
        }
        
    }


    $tablename = 'attiredetails';

    $imagePathValue = cleanString($newImagePath);
    $columnvalues ="imagePaths = '$imagePathValue', twds_ci_id = '$WebClientID'";
    $params = "designation = '$designation' AND twds_ci_id = '$WebClientID'";

    $result = _updateData($tablename,$columnvalues,$params);

    if($result['data']) { 
        echo (popUp("success","Deleted", "(" . $result['count'] . ") Record Deleted!","weddingdetails.php"));
    } else {  
        echo (popUp("error","", "Problem in Deleting Record.",""));
    }
}

?>


<script>

    var attire_info = <?php echo json_encode($attire_info)?>;
    var htmlBeforeAdd = imageFileTableBody.innerHTML;

    $(function() { 
        $('#FindWeddingLocationMap').locationpicker({
           location: {latitude: 46.15242437752303, longitude: 2.7470703125},   
           radius: 0,
           inputBinding: {
              latitudeInput: $('#FindWeddingLocationLat'),
              longitudeInput: $('#FindWeddingLocationLong'),
              locationNameInput: $('#FindWeddingLocation')
           },
           enableAutocomplete: true,
           onchanged: function(currentLocation, radius, isMarkerDropped) {
              alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
            }
        });
    });

    
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


    function designationExists(designation)
    {   
        var returnVal = false;
        attire_info.forEach((item,index)=>{
            if(item['designation'] == designation)
            {
                returnVal =  true;
                
            }
            else
            {
                returnVal = false;
            }
        })

        return returnVal;
    }


    function formatDesignationText(designation)
    {
        switch(designation)
        {
            case "Bridesmaid":
                return "bridesmaid";
                break;
            case "Groomsmen":
                return "groomsmen";
                break;
            case "Principal Sponsor (Male)":
                return "Psponsor_male";
                break;
            case "Principal Sponsor (Female)":
                return "Psponsor_female";
                break;
            case "Secondary Sponsor (Male)":
                return "Ssponsor_male";
                break;
            case "Secondary Sponsor (Female)":
                return "Ssponsor_female";
                break;
            case "Guest Wear":
                return "guestwear";
                break;
        }
    }
    


    function albumClicked(des)
    {
        designation.value = des;
        var title = des;
        title = title+" Attire";

        albumTitle.innerHTML = title;
        imageFileTableBody.innerHTML = "";
        description.value = "";
        imageFile.value = "";

        emptyTable();

        attire_info.forEach((item,index)=>{
            if(item['designation'] == des)
            {
                description.value = item['description']
                if(item['imagepaths'] != "")
                {
                    existingImagePaths.value = item['imagepaths'];
                    item['imagepaths'].split(',').forEach((item2,index2)=>{
                    imageFileTableBody.innerHTML += `
                        <tr>
                            <td>${item2}</td>
                            <td class="mx-auto">
                                <button type="button" 
                                class="btn btn-sm btn-info"
                                data-target="#image_modal" 
                                data-toggle="modal" 
                                onclick="viewImage('${des}','${item2}')">View Image</button>
                            </td>
                            <td class="mx-auto">
                                <button type="submit" name="deleteBtn" value="${des},${item2}" class="btn btn-sm btn-danger" onclick="deleteImage(${des},${item2})">Delete</button>
                            </td>
                        </tr>`;
                    })
                    
                    nonEmptyTable();
                }
                else
                {
                    emptyTable();
                }
                

               
            }
        })

    }

    var defaultHTMLs = [];


    function addChange(element,designation)
    {
        // ValidateSize(element);
        var id =designation+"_imageRow";
        var row = document.getElementById(id);
        
        if(!rowChanged(id))
        {
            defaultHTMLs[defaultHTMLs.length] = {id:id,defaultHTML:row.innerHTML};
        }

    
        var appendHTML = ""
        for(var file of element.files)
        {
            
            appendHTML += 
            `
                <div class="col-md-4" style="margin-top:20px">
                    <img class="img-responsive" style="width: 100%; height:234px; object-fit: cover; cursor:zoom-in" src="${URL.createObjectURL(file)}" data-pic-title="${file.name}" data-pic-description="${file.name}" data-pic="${URL.createObjectURL(file)}"/>
                </div>
            
            `;
        }

        row.innerHTML =  getRowFromID(id) + appendHTML;
        
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
        var defaultHTML;
        defaultHTMLs.forEach((item,index)=>{
            if(item['id'] == id)
            {
                defaultHTML = item['defaultHTML'];
            }
        })

        return defaultHTML;
    }

    function backgroundImageChange(element)
    {
        // ValidateSize(element);
        for(var file of backgroundimage.files)
        {
            backgroundImageShow.src = URL.createObjectURL(file);
        }
    }

    function deleteTempImage(event)
    {
        if(event.target.classList.contains('disabled'))
        {
            alert("Cannot be deleted unless Updated. Please re-select the files or save before deleting")
        }
    }

    function deleteImage(designation, imagename)
    {
        
    } 

    function viewTempImage(index)
    {
        imageshown.src = URL.createObjectURL(imageFile.files.item(index));
    }


    function viewImage(designation, imagename)
    {
        imageshown.src = './weddingattires/'+formatDesignationText(designation)+"/"+imagename;
    }

    function checkBoxChange()
    {
        if(sameasreception.checked == true)
        {
            churchdetails.value = receptiondetails.value;
            churchgooglemaps.value = receptiongooglemaps.value;
            churchwaze.value = receptionwaze.value;
        }
        else
        {
            churchdetails.value = "";
            churchgooglemaps.value = "";
            churchwaze.value = "";
        }
    }

    
</script>
