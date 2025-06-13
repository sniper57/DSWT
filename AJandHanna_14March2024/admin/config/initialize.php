    <?php
use \Gumlet\ImageResize;
include 'WebClient.php';


function _getAllData($tablename){
    if ($tablename != NULL){
        require_once('fix_mysql.inc.php');
        require_once("config.php");
        $result = mysql_query("SELECT * FROM " . $tablename)  or die (mysql_error());
        
        if($result){
            $result_list = array();
            while($row = mysql_fetch_array($result)) {
                $result_list[] = $row;
            }
            
            $data['data'] = $result_list;
            $data['count'] = count($result_list);
            //var_dump($result_list);
            return $data;
        }
        else{
            $data['data'] = NULL;
            $data['count'] = 0;
            return $data;
        }
    }
}

function _getAllDataByParam($tablename,$param,$attribute){
    if ($tablename != NULL){
        require_once('admin/config/fix_mysql.inc.php');
        require_once("admin/config/config.php");
        //echo "SELECT * FROM " . $tablename . " WHERE " . $param;

        $result = mysql_query("SELECT * FROM " . $tablename . " WHERE " . $param . " " . $attribute)  or die (mysql_error()); //(header("location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/pagenotfound.php"));
        
        if($result){
            $result_list = array();
            while($row = mysql_fetch_array($result)) {
                $result_list[] = $row;
            }
            $data['data'] = $result_list;
            $data['count'] = count($result_list);
            return $data;
        }
        else{
            $data['data'] = NULL;
            $data['count'] = 0;
            return $data;
        }
    }
}

function _getAllDataBySpecificColumnAndParam($tablecolumn,$tablename,$param,$attribute){
    if ($tablename != NULL){
        require_once('admin/config/fix_mysql.inc.php');
        require_once("admin/config/config.php");
        //echo "SELECT * FROM " . $tablename . " WHERE " . $param;

        $result = mysql_query("SELECT ". ($tablecolumn == NULL ? "*" : $tablecolumn) ." FROM " . $tablename . " WHERE " . $param . " " . $attribute)  or die (mysql_error()); //(header("location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/pagenotfound.php"));
        
        if($result){
            $result_list = array();
            while($row = mysql_fetch_array($result)) {
                $result_list[] = $row;
            }
            $data['data'] = $result_list;
            $data['count'] = count($result_list);
            return $data;
        }
        else{
            $data['data'] = NULL;
            $data['count'] = 0;
            return $data;
        }
    }
}

function _getAllDataSpecColumn($tablename,$tableColumns)
{
    if ($tablename != NULL){
        require_once('admin/config/fix_mysql.inc.php');
        require_once("admin/config/config.php");
        
        $result = mysql_query("SELECT $tableColumns FROM " . $tablename)  or die (mysql_error()); //(header("location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/pagenotfound.php"));
        
        if($result){
            $result_list = array();
            while($row = mysql_fetch_array($result)) {
                $result_list[] = $row;
            }
            $data['data'] = $result_list;
            $data['count'] = count($result_list);
            return $data;
        }
        else{
            $data['data'] = NULL;
            $data['count'] = 0;
            return $data;
        }
    }
}

function _updateData($tablename,$ColumnValues,$param){

    if ($tablename != NULL){
        require_once('admin/config/fix_mysql.inc.php');
        require_once("admin/config/config.php");

        $query = "UPDATE " . $tablename . " SET " . $ColumnValues . " WHERE " . $param;

        //echo ($query);
        $result = mysql_query($query) or die (mysql_error());
        
        if($result){
            $data['data'] = $result;
            $data['count'] = mysql_affected_rows();
            return $data;
        }
        else{
            $data['data'] = $result;
            $data['count'] = 0;
            return $data;
        }
    }   
}

function _saveData($tablename,$tableColumns,$ColumnValues){

    if ($tablename != NULL){
        require_once('admin/config/fix_mysql.inc.php');
        require_once('admin/config/config.php');

        $query = "INSERT INTO " . $tablename . " (" . $tableColumns . ") VALUES (" . $ColumnValues . ")";

        //echo ($query);
        $result = mysql_query($query) or die (mysql_error());
        
        if($result){
            $data['data'] = $result;
            $data['count'] = mysql_affected_rows();
            return $data;
        }
        else{
            $data['data'] = $result;
            $data['count'] = 0;
            return $data;
        }
    }    
}

function _getFullName($person)
{  
    if($person != null)
    {
        return trim($person['fname'].' '.$person['mname'].' '.$person['lname'].' '.$person['prefix']);
    }
    else
    {
        return null;
    }
    
}

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

function getImageCountFromDesignation($attireInfo,$designation)
{
    foreach($attireInfo as $attire)
    {
        if($attire['designation'] == $designation)
        {
            
            if($attire['imagepaths'] != "")
            {
                if(strpos($attire['imagepaths'],','))
                {
                    return count(explode(',',$attire['imagepaths']));
                }
                else
                {
                    return 1;
                }
            }
        }
    }
    return 0;
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
    }
}

function getFirstImageFromImagePaths($imagePaths)
{
    if($imagePaths!="")
    {
        if(strpos($imagePaths,','))
        {
            return explode(',',$imagePaths)[0];
        }
        else
        {
            return $imagePaths;
        }
    }
    return null;
}

function getArrayFromImagePaths($imagePaths)

{
    if($imagePaths!="")
    {
        if(strpos($imagePaths,','))
        {
            return explode(',',$imagePaths);
        }
        else
        {
            $arr = array();
            array_push($arr,$imagePaths);
            return $arr;
        }
    }
    else
    {
        return null;
    }
}






//== faq ==

$faq_info = _getAllDataByParam('faq','isactive=1 AND twds_ci_id = "'.$WebClientID.'"', 'order by id asc');
$faqlist = array(); // empty array
$faqcount = 0;
if ($faq_info != null && $faq_info['count'] != 0){       
    $faqlist = $faq_info['data'];
    $faqcount = $faq_info['count'];
}
else{
    $faqlist = null;
}
//var_dump($faqcount);


//== guestmessage ==
//$guestmessage_info = _getAllDataByParam('guestslist','isattending in (1,2) and questioncomment <> "" AND twds_ci_id = "'.$WebClientID.'"', 'Order by modifieddate desc');
$guestmessage_info = _getAllDataBySpecificColumnAndParam('id,guestname,guestfullname,questioncomment,photo,filename','guestslist','twds_ci_id = "'.$WebClientID.'" and isattending in (1,2) and questioncomment <> ""', 'Order by modifieddate desc');
$guestmessagelist = array(); // empty array
$guestmessagecount = 0;
if ($guestmessage_info != null && $guestmessage_info['count'] != 0){       
    $guestmessagelist = $guestmessage_info['data'];
    $guestmessagecount = $guestmessage_info['count'];
}
else{
    $guestmessagelist = array();
}
//var_dump($guestmessagecount);



////TOTAL CONFIRMED GUESTS
////== guestmessage ==
//$confirmedguest_info = _getAllDataByParam('guestslist','isattending=1 AND twds_ci_id = "'.$WebClientID.'"', '');
//$confirmedguestlist = array(); // empty array
//$confirmedguestcount = 0;
//if ($confirmedguest_info != null && $confirmedguest_info['count'] != 0){       
//    $confirmedguestlist = $confirmedguest_info['data'];
//    $confirmedguestcount = $confirmedguest_info['count'];
//}
//else{
//    $confirmedguestlist = null;
//}



//GET ENTOURAGE GUESTS
//== guestmessage ==
//$entourage_guest_info = _getAllDataByParam('guestslist','isattending <> 2 AND role <> "Guests" AND twds_ci_id = "'.$WebClientID.'" ORDER BY partnergroup,guestname ASC', '');
$entourage_guest_info = _getAllDataBySpecificColumnAndParam('id,guestname,role,guestfullname,partnergroup','guestslist','twds_ci_id = "'.$WebClientID.'" AND role <> "Guests" AND isattending <> 2 ORDER BY partnergroup,guestname ASC', '');
$entourage_guestlist = array(); // empty array
$entourage_guestcount = 0;
if ($entourage_guest_info != null && $entourage_guest_info['count'] != 0){       
    $entourage_guestlist = $entourage_guest_info['data'];
    $entourage_guestcount = $entourage_guest_info['count'];
}
else{
    $entourage_guestlist = null;
}






//var_dump($guestmessagecount);



////GROOMS PARENTS

//$groomsparentfilters = array_filter($guestmessagelist, function($obj){
//  foreach ($obj as $row) {
//      if (isset($row->role) && $row->role == 'Father (Groom)') {
//        return true;
//      }
// }
//  return false;
//});




$gclist =  array();
if (ISSET($_GET["gc"]))
{
    $_gcode = $_GET["gc"];
    //== gc ==
    $gc_info = _getAllDataByParam('guestslist',"guestcode='$_gcode' AND twds_ci_id = '$WebClientID'", '');
    $gclist = array(); // empty array
    $gccount = 0;
    if ($gc_info != null && $gc_info['count'] != 0){       
        $gclist = $gc_info['data'];
        $gccount = $gc_info['count'];
        $test = $gclist[0]['isattending'];
    }
    else{
        $gclist = null;
    }
    //var_dump($gccount);
}

//Getting and Groom Information

$brideinfo = array();
$groominfo = array();
$userinfo = array();
$weddinginfo = array();
$couplesinfo = array();
$attire_info = array();
$galleryinfo = array();
$guestlistattendinginfo = array();
$bridespec;
$groomspec;
$weddingspec;
$userinfospec;


$bridequery = _getAllDataByParam('brideinformation','twds_ci_id = "'.$WebClientID.'"','');
$groomquery = _getAllDataByParam('groominformation','twds_ci_id = "'.$WebClientID.'"','');
$userinfoquery = _getAllDataByParam('users','twds_ci_id = "'.$WebClientID.'"','');

$weddingquery = _getAllDataSpecColumn('weddingdetails WHERE twds_ci_id = "'.$WebClientID.'"','
    TIME_FORMAT(weddingtimefrom, "%h:%i %p") as timefromformatted,
    TIME_FORMAT(weddingtimeto, "%h:%i %p") as timetoformatted,
    DATE_FORMAT(weddingdate, "%W-%M %d, %Y")as dateformatted,
    DATE_FORMAT(weddingdate, "%m/%d/%Y")as datenumeric,
    guestnumber,receptiondetails,receptiongooglemaps,receptionwaze,churchdetails,churchgooglemaps,churchwaze,backgroundimage');



$couplesquery = _getAllDataByParam('couplesinformation','twds_ci_id = "'.$WebClientID.'"','');
$attiredetails_query = _getAllDataByParam('attiredetails','twds_ci_id = "'.$WebClientID.'"','');
$galleryquery = _getAllDataByParam('photogallery','twds_ci_id = "'.$WebClientID.'"','');
$guestlistattendingquery = _getAllDataByParam('guestslist','isattending = 1 AND twds_ci_id = "'.$WebClientID.'"','');

if($userinfoquery != null && $userinfoquery['count'] != 0)
{
    $userinfo = $userinfoquery['data'];
    $userinfospec = $userinfo[0];
}
else
{
    $userinfo = null;
    $userinfospec = null;
}

if($bridequery != null && $bridequery['count'] != 0)
{
    $brideinfo = $bridequery['data'];
    $bridespec = $brideinfo[0];
}
else
{
    $brideinfo = null;
    $bridespec = null;
}

if($groomquery != null && $groomquery['count'] != 0)
{
    $groominfo = $groomquery['data'];
    $groomspec = $groominfo[0];
}
else
{
    $groominfo = null;
    $groomspec = null;
}

if($weddingquery != null && $weddingquery['count'] != 0)
{
    $weddinginfo = $weddingquery['data'];
    $weddingspec = $weddinginfo[0];
}
else
{
    $weddinginfo = null;
    $weddingspec = null;
}

if($couplesquery != null && $couplesquery['count'] != 0)
{
    $couplesinfo = $couplesquery['data'];
}
else
{
    $couplesinfo = null;
}



if($attiredetails_query != null && $attiredetails_query['count'] != 0)
{
    $attire_info = $attiredetails_query['data'];
}
else
{
    $attire_info = null;
}

if($galleryquery != null && $galleryquery['count'] != 0)
{
    $galleryinfo = $galleryquery['data'];
}
else
{
    $galleryinfo = null;
}

if($guestlistattendingquery != null && $guestlistattendingquery['count'] != 0)
{
    $guestlistattendinginfo = $guestlistattendingquery['data'];
}
else
{
    $guestlistattendinginfo = array();
}



///SUBMIT POST HERE
//SAVE GUEST CONFIRMATION
//== SEND EMAIL CONTACT FOR --
if (ISSET($_POST["btnSubmit"]))
{
    //SEND EMAIL

    include_once 'admin/config/helper.php';
    include_once 'admin/config/emailtemplate.php';
    include_once 'admin/vendor/ImageResize/ImageResize.php';   

    //Couple Nicknames
    $coupleNicknames = ($groomspec == null ||$groomspec['nickname'] == ""? "Groom": $groomspec['nickname']) . " &amp; " . ($bridespec == null ||$bridespec['nickname'] == ""? "Bride": $bridespec['nickname']);


    $guestfullname = mysql_real_escape_string($_POST["guestfullname"]);
    $guestcontactnumber = mysql_real_escape_string($_POST["contactnumber"]);
    $guestdedication = mysql_real_escape_string($_POST["questioncomment"]);
    $guestconfirmation = $_POST["isattending"];
    $guestcode = $_POST["_guestcode"];
    $modifiedby= mysql_real_escape_string($_POST["guestfullname"]);
    $modifieddate= date("Y-m-d H:i:s");       

    //FILE UPLOAD VALIDATION HERE
    if($_FILES['fileupload']['size'] != 0) {
        $errors     = array();
        $maxsize    =  2000000; //2MB 
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
    
    //SAVE DETAILS
    $tablename = 'guestslist';
    
    $columvalues =  "guestfullname='$guestfullname',
                    isattending='$guestconfirmation',
                    contactnumber='$guestcontactnumber',
                    questioncomment='$guestdedication',
                    photo='$image',
                    filestring='$imagefullsize',
                    filename='$name',
                    modifiedby='$modifiedby',
                    modifieddate='$modifieddate',
                    twds_ci_id = '$WebClientID'";

    
    $filter= "guestcode='$guestcode'";

    $result = _updateData($tablename,$columvalues,$filter);


    $tablename1 = 'guestmessage';
    $tablecolumns1 = 'guestname, message, createdby, createddate, modifiedby, modifieddate, twds_ci_id, isactive';
    $columvalues1 =  "'$guestfullname',
                    '$guestdedication',
                    '$modifiedby',
                    '$modifieddate',
                    '$modifiedby',
                    '$modifieddate',
                    '$WebClientID',
                    '1'";

    //CHECK IF GUEST ALREADY DID AN RSVP
    //$RSVPMessage_query =  _getAllDataByParam('guestmessage',"twds_ci_id = '$WebClientID' AND guestcode='$guestcode'");
    //$RSVPMessageInfo = array();
    //if($RSVPMessage_query['count'] == 0)
    //{
        $savestatus = _saveData($tablename1,$tablecolumns1,$columvalues1);
    //}
    

    //SENT EMAIL
    foreach ($userinfo as $value)
    {
        //EMAIL TO CLIENT
        $mailto = $value["email"];
        $sendername = 'Congratulations ' . $coupleNicknames . '!';
        $mailtitle = "Attendance Confirmation";
        $mailcontent = "A Guest Confirm his/her attendance, Kindly see details below.<br><br><b>GUEST NAME:</b> $guestfullname<br><b>CONFIRMATION:</b>". ($guestconfirmation == 1 ? "Yes! I will Attend " : ($guestconfirmation == 2 ? "Sorry, I'm not Available" : "--NA--"))  ."<br><b>CONTACT NUMBER:</b> $guestcontactnumber<br><b>DEDICATION / MESSAGE:</b><br><br><i>$guestdedication</i><br><br>";
        $sitelink = $_SERVER['HTTP_HOST'];
        $sitelinktitle = "The Wedding Day Story | Guests Confirmation of " . $guestfullname;
        $composemailcontent = emailtemplate($sendername,$mailtitle,$mailcontent,$sitelink,$sitelinktitle);
        $mailstatus = sendcustomhtmlmail($mailto,"Guest Confirmation: $guestfullname",$composemailcontent);        
    }

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    //TODO: FIX ERROR HERE
    //if ($mailstatus && $result['data']){
    if ($result['data']){
        echo "<script>alert('Attendance Confirmation Sent. Thank you!'); window.location.href='$actual_link';</script>";
    }
    else{
        echo "<script>alert('Issue on sending form!');</script>";
    }   
}

?>