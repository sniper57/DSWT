<?php 
$_HeaderTitle = 'Home';  
include '../admin/config/crud.php';
include '../admin/config/header.php'; 
include '../admin/config/helper.php';



//== GET GUESTLIST-ATTENDING LIST ==
$guestlist_total_info = _getAllDataByParam('guestslist',"twds_ci_id = '$WebClientID'");
$guestlist_total_list = array(); // empty array
if ($guestlist_total_info != null && $guestlist_total_info['count'] != 0){       
    $guestlist_total_list = $guestlist_total_info['data'];
}
else{
    $guestlist_total_list = null;
}
//  var_dump ($guestlist_total_info);

//== GET GUESTLIST-ATTENDING LIST ==
$guestlist_attending_info = _getAllDataByParam('guestslist',"isattending=1 AND twds_ci_id = '$WebClientID'");
$guestlist_attending_list = array(); // empty array
if ($guestlist_attending_info != null && $guestlist_attending_info['count'] != 0){       
    $guestlist_attending_list = $guestlist_attending_info['data'];
}
else{
    $guestlist_attending_list = null;
}
//  var_dump ($guestlist_attending_info);

//== GET GUESTLIST-PENDING LIST ==
$guestlist_pending_info = _getAllDataByParam('guestslist',"isattending=0 AND twds_ci_id = '$WebClientID'");
$guestlist_pending_list = array(); // empty array
if ($guestlist_pending_info != null && $guestlist_pending_info['count'] != 0){       
    $guestlist_pending_list = $guestlist_pending_info['data'];
}
else{
    $guestlist_pending_list = null;
}
//  var_dump ($guestlist_pending_info);

//== GET GUESTLIST-NOTATTENDING LIST ==
$guestlist_notattending_info = _getAllDataByParam('guestslist',"isattending=2 AND twds_ci_id = '$WebClientID'");
$guestlist_notattending_list = array(); // empty array
if ($guestlist_notattending_info != null && $guestlist_notattending_info['count'] != 0){       
    $guestlist_notattending_list = $guestlist_notattending_info['data'];
}
else{
    $guestlist_notattending_list = null;
}
//  var_dump ($guestlist_notattending_info);
?>

<!-- Page Content -->

<div class="panel panel-default">
    <div class="panel-heading">Guest List Summary Count</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Total Guests</div>
                    <div class="panel-body text-center text-primary"><u><h2><?php echo (count($guestlist_total_list) > 0 ? array_sum(array_column($guestlist_total_list, 'extraguestcount')) : 0); ?></h2></u></div>
                </div>
            </div>
             <div class="col-lg-3 col-md-3 col-sm-6 col-lg-6">
                 <div class="panel panel-warning">
                    <div class="panel-heading text-center">Pending Confirmation</div>
                    <div class="panel-body text-center text-warning"><u><h2><?php echo (count($guestlist_pending_list) > 0 ? array_sum(array_column($guestlist_pending_list, 'extraguestcount')) : 0); ?></h2></u></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-lg-6">
                 <div class="panel panel-success">
                    <div class="panel-heading text-center">Attending Guests</div>
                    <div class="panel-body text-center text-success"><u><h2><?php echo (count($guestlist_attending_list) > 0 ? array_sum(array_column($guestlist_attending_list, 'extraguestcount')) : 0); ?></h2></u></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-lg-6">
                 <div class="panel panel-danger">
                    <div class="panel-heading text-center">Not Attending Guests</div>
                    <div class="panel-body text-center text-danger"><u><h2><?php echo (count($guestlist_notattending_list) > 0 ? array_sum(array_column($guestlist_notattending_list, 'extraguestcount')) : 0); ?></h2></u></div>
                </div>
            </div>
           
        </div>
    </div>
</div>




<div class="jumbotron col-sm-12 col-xs-12">
    <h1 class="text-center">Welcome to your  Website Control Panel</h1>
</div>
<div class="text-center">
    <p>This page is used for website configuration. All informations configured will reflect on the website page.</p>
    <p>Please ask for assistance when using this page.</p>
</div>


<!-- <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
  </div>
  <div class="panel-body">
    Panel content
  </div>
</div> -->


<?php include '../admin/config/footer.php' ?>