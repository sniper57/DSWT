<?php
$_HeaderTitle = 'Bride Information';  
include '../admin/config/crud.php';
include '../admin/config/helper.php';
include '../admin/config/WebClient.php';

if (isset($_GET['p'])) {
    if ($_GET['p'] == "confirmed")
    {
    	$guestlist_query = _getAllDataByParam('guestslist',"isattending=1 AND twds_ci_id = '$WebClientID'");
    }
    else if  ($_GET['p'] == "all")
    {
        $guestlist_query = _getAllDataByParam('guestslist', "twds_ci_id = '$WebClientID'");
    }
}
else{
    echo (popUp("warning","No Data Found", "No Record Found!","summary.php"));
}    

$weddingdetails_query = _getAllDataByParam('weddingdetails',"twds_ci_id = '$WebClientID'");
$attiredetails_query = _getAllDataByParam('attiredetails',"twds_ci_id = '$WebClientID'");
//$guestlist_query = _getAllDataByParam('guestslist',"twds_ci_id = '$WebClientID'");
$groominfo_query = _getAllDataByParam('groominformation',"twds_ci_id = '$WebClientID'");
$brideinfo_query = _getAllDataByParam('brideinformation',"twds_ci_id = '$WebClientID'");



$weddinginfo = array();
$attire_info = array();
$guestlist_info = array();
$groominfo = array();
$brideinfo = array();


if($weddingdetails_query!= null && $weddingdetails_query['count'] > 0)
{
    $weddinginfo = $weddingdetails_query['data'];
}
else
{
    $weddinginfo = null;
}

if($attiredetails_query!= null && $attiredetails_query['count'] > 0)
{
    $attire_info = $attiredetails_query['data'];
}
else
{
    $attire_info = null;
}

if($guestlist_query!= null && $guestlist_query['count'] > 0)
{
    $guestlist_info = $guestlist_query['data'];
}
else
{
    $guestlist_info = null;
}

if($groominfo_query!= null && $groominfo_query['count']>0)
{
    $groominfo = $groominfo_query['data'];
}
else
{
    
    $groominfo = null;
}

if($brideinfo_query!= null && $brideinfo_query['count']>0)
{
    $brideinfo = $brideinfo_query['data'];
}
else
{
    
    $brideinfo = null;
}


$bridesmaidList = array();
$groomsmenList = array();
$bestmanList = array();
$maidofhonorList = array();
$pSponsorMaleList = array();
$pSponsorFemaleList = array();
$guestList = array();
$flowerGirlList = array();
$motherbrideinfo = array();
$fatherbrideinfo = array();
$mothergroominfo = array();
$fathergroominfo = array();
$pSponsorsList = array();

foreach($guestlist_info as $guest)
{
    if($guest['role'] == "Bridesmaid")
    {
        array_push($bridesmaidList,$guest);
    }
    else if($guest['role'] == "Groomsmen")
    {
        array_push($groomsmenList,$guest);
    }
    else if($guest['role'] == "BestMan")
    {
        array_push($bestmanList,$guest);
    }
    else if($guest['role'] == "MaidOfHonor")
    {
        array_push($maidofhonorList,$guest);
    }
    else if($guest['role'] == "FlowerGirl")
    {
        array_push($flowerGirlList,$guest);
    }
    else if($guest['role'] == "Principal Sponsor (Female)")
    {
        array_push($pSponsorFemaleList,$guest);
    }
    else if($guest['role'] == "Principal Sponsor (Male)")
    {
        array_push($pSponsorMaleList,$guest);
    }

    else if($guest['role'] == "Mother (Bride)")
    {
        array_push($motherbrideinfo,$guest);
    }
    else if($guest['role'] == "Father (Bride)")
    {
        array_push($fatherbrideinfo,$guest);
    }
    else if($guest['role'] == "Mother (Groom)")
    {
        array_push($mothergroominfo,$guest);
    }
    else if($guest['role'] == "Father (Groom)")
    {
        array_push($fathergroominfo,$guest);
    }

    else if($guest['role'] == "Principal Sponsors")
    {
        array_push($pSponsorsList,$guest);
    }
    else if($guest['role'] == "Guests")
    {
        array_push($guestList,$guest);
    }
}



function formatDesignationText($designation)
{
    switch($designation)
    {
        case "Mother (Bride)":
            return "mothersbride";
        
        case "Mother (Groom)":
            return "mothergroom";
        
        case "Father (Bride)":
            return "fatherbride";
        
        case "Father (Groom)":
            return "fathergroom";
        
        case "Bridesmaid":
            return "bridesmaid";
        
        case "Groomsmen":
            return "groomsmen";

        case "FlowerGirl":
            return "flowergirl";
        
        case "Principal Sponsors (Male)":
            return "Psponsor_male";
        
        case "Principal Sponsors (Female)":
            return "Psponsor_female";
        
        case "Secondary Sponsors (Male)":
            return "Ssponsor_male";
        
        case "Secondary Sponsors (Female)":
            return "Ssponsor_female";
        
        case "Guest Wear":
            return "guestwear";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../admin/css/font-awesome.css" rel="stylesheet">
    <title>Document</title>

    <style>
        @media print {
            img {
                width: 33%;
            }
        }
    </style>


</head>


<body>
    <div class="panel-body">
        <h3>Invitation Guide & Others</h3>
        <div>
            <span style="font-weight: bold;">Date of Event:</span> <span><?php echo $weddinginfo[0]['weddingdate']?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Time of Ceremony:</span> <span><?php echo $weddinginfo[0]['weddingtimefrom']?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Church:</span> <span><?php echo $weddinginfo[0]['churchdetails']?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Venue:</span> <span><?php echo $weddinginfo[0]['receptiondetails']?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Contact Person:</span> <span><?php echo $weddinginfo[0]['contactperson']?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Contact Number:</span> <span><?php echo $weddinginfo[0]['contactnumber']?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Attire:</span>
            <?php
            if($attire_info != null)
            {
                foreach($attire_info as $attire)
                {

                    if($attire['description'] != "" || $attire['imagepaths'] != "")
                    {
                        
            ?>

            <h1></h1>
            <table class="table table-bordered">
                <thead>
                    <th>
                        <?php echo $attire['designation']?>
                    </th>
                </thead>
                <tbody>
                    <td>
                        <div style="margin-top: 10px; margin-bottom: 10px"><?php echo $attire['description']?></div>
                        <?php
                        if($attire['imagepaths'] != "")
                        {
                            foreach(explode(',',$attire['imagepaths']) as $image)
                            {?>
                        <img class="image" style="max-width: 33%;" src="./weddingattires/<?php echo formatDesignationText($attire['designation']).'/'.$image?>">



                        <?php 
                            }
                        }
                        ?>
                    </td>
                </tbody>
            </table>
            <?php
                        
                    }
                }
            }
            else
            {
                
            }
            ?>
            <p style="page-break-before: always">
                <h1 class="text-center" style="margin-top: 30px">Entourage List</h1>
                <table class="table table-bordered">
                    <thead>
                        <th>Role</th>
                        <th>Complete Name</th>
                        <th>Head Count</th>
                        <th>Contact Number/s</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Groom</td>
                            <td><?php echo $groominfo[0]['fname'].' '.$groominfo[0]['mname'].' '.$groominfo[0]['lname']?></td>
                            <td>- </td>
                            <td><?php echo $groominfo[0]['contactnumber']?></td>
                        </tr>
                        <tr>
                            <td>Bride</td>
                            <td><?php echo $brideinfo[0]['fname'].' '.$brideinfo[0]['mname'].' '.$brideinfo[0]['lname']?></td>
                            <td>- </td>
                            <td><?php echo $brideinfo[0]['contactnumber']?></td>
                        </tr>
                        <tr>
                            <td>Father (Bride)</td>
                            <td><?php echo $fatherbrideinfo[0]['guestname'];?></td>
                            <td><?php echo $fatherbrideinfo[0]['extraguestcount']?></td>
                            <td><?php echo $fatherbrideinfo[0]['contactnumber']?></td>
                        </tr>
                        <tr>
                            <td>Mother (Bride)</td>
                            <td><?php echo $motherbrideinfo[0]['guestname'];?></td>
                            <td><?php echo $motherbrideinfo[0]['extraguestcount']?></td>
                            <td><?php echo $motherbrideinfo[0]['contactnumber']?></td>
                        </tr>
                        <tr>
                            <td>Father (Groom)</td>
                            <td><?php echo $fathergroominfo[0]['guestname'];?></td>
                            <td><?php echo $fathergroominfo[0]['extraguestcount']?></td>
                            <td><?php echo $fathergroominfo[0]['contactnumber']?></td>
                        </tr>
                        <tr>
                            <td>Mother (Groom)</td>
                            <td><?php echo $mothergroominfo[0]['guestname'];?></td>
                            <td><?php echo $mothergroominfo[0]['extraguestcount'];?></td>
                            <td><?php echo $mothergroominfo[0]['contactnumber']?></td>
                        </tr>


                        <?php 
                        $count = 1;                                 
                        foreach($bestmanList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Best Man</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>

                        <?php 
                        $count = 1;
                        foreach($maidofhonorList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Maid Of Honor</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>

                        <?php 
                        $count = 1;
                        foreach($groomsmenList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Groomsmen</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>

                        <?php 
                        $count = 1;
                        foreach($bridesmaidList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Bridesmaids</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>


                        <?php 
                        $count = 1;
                        foreach($flowerGirlList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Flower Girl</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>

                        <?php 
                        $count = 1;
                        foreach($pSponsorMaleList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Principal Sponsor (Male)</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>

                        <?php 
                        $count = 1;
                        foreach($pSponsorFemaleList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Principal Sponsor (Female)</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>


                        <?php 
                        $count = 1;
                        foreach($pSponsorsList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Principal Sponsors</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>


                        <?php 
                        $count = 1;
                        foreach($guestList as $guest)
                        {
                            if($count == 1){?>
                        <tr>
                            <td>Guests</td>
                            <?php 
                            }else {?>
                        <tr>
                            <td></td><?php }?>
                            <td><?php echo $count.'. '.$guest['guestname'] . " " . ($guest['isattending'] == 0 ? "<label class='label label-warning'>Pending Confirmation</label>" : "")?></td>
                            <td><?php echo $guest['extraguestcount']?></td>
                            <td><?php echo $guest['contactnumber']?></td>
                        </tr>
                        <?php $count++;
                        }?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right" colspan="3">
                                <b>Total Confirmed Guest Head Count</b>
                            </td>
                            <td>
                                <?php echo (count($guest) > 0 ? array_sum(array_column($guest, 'extraguestcount')) : 0); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
        </div>
    </div>
    <?php include '../admin/config/footer.php' ?>
</body>
</html>




<script>

    $(function(){
        printpage();
    });
    
    function printClick()
    {
        window.open("printsummary.php",'_blank');
    }

    function printpage() {
        document.title= '<?php echo $groominfo[0]['nickname'] . ' and ' . $brideinfo[0]['nickname'] . ' Wedding | The Wedding Day Story'; ?>';
        window.print();
    }
</script>
