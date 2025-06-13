<?php
function popUp($message_type, $title, $message , $href){
//$message_type
// - success
// - warning
// - info

//$title (optional)
// - Any Title

//$message
// - Any message

//$href (optional)
// - Any URL Link redirect after click close


if($href == null || $href == ""){
    $href = "#";
}

$headercolor = "";
$str= "";
$uniqID = $message_type . "_" . uniqid('xxx') . "_" . uniqid('yyy');
if ($message_type == 'success'){
    $headercolor = "bg-primary";
}
else if ($message_type == 'warning'){
    $headercolor = "bg-warning";
}
else if ($message_type == 'error'){
    $headercolor = "bg-error";
}
else if ($message_type == 'info'){
    $headercolor = "bg-info";
}

$str .= '<div class="modal fade in" id="'. $uniqID .'" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">';
$str .= '<div class="modal-dialog">';
$str .= '   <div class="modal-content">';
$str .= '      <div class="modal-header '. $headercolor .'">';
$str .= '        <label class="modal-title" id="myModalLabel">'. $title .'</label>';
$str .= '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
$str .= '      </div>';
$str .= '      <div class="modal-body">';
$str .= '        <h4>'. $message .'</h4>';
$str .= '      </div>';
$str .= '      <div class="modal-footer">';
$str .= '        <a href="'. $href .'" class="btn '. $headercolor .'">Close</a>';
$str .= '      </div>';
$str .= '    </div>';
$str .= '  </div>';
$str .= '</div>';
$str .= '<script>$(document).ready(function(){ $("#'. $uniqID .'").modal("show"); }); </script>';
return $str;
}



function sendmail($name,$email_address,$phone,$message){
    if(empty($email_address) || !filter_var($email_address,FILTER_VALIDATE_EMAIL))
    {
        return false;
    }

    $name = strip_tags(htmlspecialchars($name));
    $email_address = strip_tags(htmlspecialchars($email_address));
    $phone = strip_tags(htmlspecialchars($phone));
    $message = strip_tags(htmlspecialchars($message));

    // Create the email and send the message
    $to = strip_tags(htmlspecialchars($email_address)); // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    $email_subject = "[www.buoyant.com.ph]: Contact Form Inquiry: $name";
    $email_body = "$message";
    $email_from = "noreply@buoyant.com.ph"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    $email_from_name = "Buoyant Industrial Systems, Inc.";
    
    include_once 'admin/config/PHPMailer.php';
    return _sendmail($to,$email_from,$email_from_name,$email_subject,$email_body);
    //return mail($to,$email_subject,$email_body,$headers);
}

function sendcustomhtmlmail($to,$email_subject,$message){
    if(empty($to) || !filter_var($to,FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    // Create the email and send the message
    $email_subject = "The Wedding Day Story: " . $email_subject;
    
    $email_to = strip_tags(htmlspecialchars($to)); // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    $email_body = "$message";
    $email_from = "noreply@theweddingdaystory.com"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    $email_from_name = "The Wedding Day Story";

    //return mail($to,$email_subject,$message,$headers);
    include_once 'admin/config/PHPMailer.php';
    return _sendmail($email_to,$email_from,$email_from_name,$email_subject,$email_body);
}

function stripTags($tagsString, $separator){
    $TagsArr = explode(',', $tagsString);
    $TagsHTMLOutput = "";

    foreach ($TagsArr as $value)
    {
    	$TagsHTMLOutput .= '<span class="badge">'. $value .'</span>&nbsp;';
    }
    return $TagsHTMLOutput;
}

?>