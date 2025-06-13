<?php 
include 'admin/config/initialize.php'; 
include 'admin/config/WebClient.php';      
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>We Are Getting Married! &mdash; <?php echo  $groomspec['fname'].' And '.$bridespec['fname']?></title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="We Are Getting Married! - <?php echo  $groomspec['fname'].' And '.$bridespec['fname']?>" />
    <meta name="keywords" content="<?php echo  $groomspec['fname'].' And '.$bridespec['fname']?>, Getting Married, Wedding Day, Magis Technologies Inc., The Wedding Day Story" />
    <meta name="author" content="Magis Technologies Inc" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="We Are Getting Married! - <?php echo  $groomspec['fname'].' And '.$bridespec['fname']?>" />
    <meta property="og:image" content="<?php echo $weddingspec == null || $weddingspec['backgroundimage'] == "" ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/images/img_bg_2.jpg" : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/uploads/". $WebClientID ."_metadata_bg.png";?>" />
    <meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" ?>" />
    <meta property="og:site_name" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" ?>" />
    <meta property="og:description" content="We Are Getting Married! - <?php echo  $groomspec['fname'].' And '.$bridespec['fname']?>" />

    <meta name="twitter:title" content="We Are Getting Married! - <?php echo  $groomspec['fname'].' And '.$bridespec['fname']?>" />
    <meta name="twitter:image" content="<?php echo $weddingspec == null || $weddingspec['backgroundimage'] == "" ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/images/img_bg_2.jpg" : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/uploads/". $WebClientID ."_metadata_bg.png";?>" />
    <meta name="twitter:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" ?>" />
    <meta name="twitter:card" content="<?php echo $weddingspec == null || $weddingspec['backgroundimage'] == "" ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/images/img_bg_2.jpg" : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/uploads/". $WebClientID ."_metadata_bg.png";?>" />

    <!-- FONT STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <link rel="stylesheet" href="css//baguetteBox.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <!--<link rel="stylesheet" href="css/bootstrap.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <style>
        :root {
            --headertextcolor: #FAFAFA;
            --textcolor: #F6E9CE;
            --fontheader: "Sacramento", Arial, serif;
            --fonttext: "Work Sans", Arial, sans-serif;
        }
    </style>

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
    <!-- RUN AUDIO LOOPING HERE -->
    <div class="audio-autoplay" hidden>
        <audio id="audioplayerpanel" controls loop autoplay>
            <source src="admin/audio/themesong.ogg" type="audio/ogg">
            <source src="admin/audio/themesong.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>

    <div class="fh5co-loader"></div>

    <div id="page">
        <div class="bg-static">
            <!--<nav class="fh5co-nav" role="navigation">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 text-center menu-1">
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="#fh5co-couple">About Us</a></li>
                                <li><a href="#fh5co-event">Venue</a></li>
                                <li><a href="#fh5co-couple-story">Our Story</a></li>
                                <li><a href="#fh5co-gallery">Gallery</a></li>
                                <li><a href="#fh5co-counter">Guest List</a></li>
                                <li><a href="#fh5co-entourage">Entourage</a></li>
                                <li><a href="#fh5co-faq">FAQ</a></li>
                                <li><a href="#fh5co-WhatToWear">Attire</a></li>
                                <li><a href="#fh5co-testimonial">Testimonials</a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </nav>-->

            <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image: url('<?php echo $weddingspec == null || $weddingspec['backgroundimage'] == "" ? "admin/img/couplebg.jpg":'data:image/png;base64,'.base64_encode($weddingspec['backgroundimage']);?>');" data-stellar-background-ratio="0.5">
                <!-- <div class="overlay"></div> -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-8 col-md-8 col-md-offset-2 text-center">
                            <div class="display-t">
                                <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                    <h1><?php 
                                echo $groomspec == null ||$groomspec['nickname'] == ""? "Groom": $groomspec['nickname']; 
                                echo(' &amp; '); 
                                echo $bridespec == null ||$bridespec['nickname'] == ""? "Bride": $bridespec['nickname'];?></h1>
                                    <h2 hidden>We Are Getting Married</h2>
                                    <div class="simply-countdown simply-countdown-one hidden" hidden></div>
                                    <p><a href="#fh5co-event" class="btn btn-default btn-sm hidden" hidden>Save the date</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div id="fh5co-couple">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading display-tc animate-box">
                            <h2><?php echo ($gclist == null ? "Hello!" : ($gclist[0]["isattending"] == 0 ? "Hello, " . ucwords(strtolower($gclist[0]["guestname"])) . "!" : "Hello!"));?></h2>
                            <p>We invite you to celebrate our wedding</p>
                            <h3><?php echo $weddingspec == null ? "" :  $weddingspec['churchdetails'];?></h3>
                        </div>
                    </div>
                    <div class="couple-wrap animate-box">
                        <div class="couple-half">
                            <div class="groom">
                                <img src="<?php echo $groomspec!= null && $groomspec['image']!= '' ? 'data:image/jpg;charset=utf8;base64,'.base64_encode($groomspec['image']) : 'admin/img/profile-icon.png'?>" alt="groom" class="img-responsive">
                            </div>
                            <div class="desc-groom">
                                <h2><?php echo _getFullName($groomspec)!= null && _getFullName($groomspec) != ''? _getFullName($groomspec) : "Groom"?></h2>
                                <p><?php echo $groomspec != null ? $groomspec['description'] : "";?></p>
                            </div>
                        </div>
                        <p class="heart text-center"><i class="icon-heart2"></i></p>
                        <div class="couple-half">
                            <div class="bride">
                                <img src="<?php echo $bridespec!= null && $bridespec['image']!= '' ? 'data:image/jpg;charset=utf8;base64,'.base64_encode($bridespec['image']) : 'admin/img/profile-icon.png' ?>" alt="groom" class="img-responsive">
                            </div>
                            <div class="desc-bride">
                                <h2><?php echo _getFullName($bridespec)!= null && _getFullName($bridespec)!= '' ? _getFullName($bridespec) : "Bride"?></h2>
                                <p><?php echo $bridespec != null ? $bridespec['description'] : "";?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- THE REST OF THE GUESTS GOES HERE -->
                <br />

                <!-- TODO HERE -->
            </div>





            <div id="fh5co-event" class="fh5co-bg" style="background-image: url('../images/bg_alter.jpg');">
                <!-- <div class="overlay"></div> -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                            <span>Our Special Events</span>
                            <h2>Wedding Events</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="display-t">
                            <div class="display-tc">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center" style="padding-bottom: 20px">
                                            <div class="event-wrap animate-box">
                                                <h3>Venue Map</h3>
                                                <?php 
                                                if($weddingspec != null)
                                                {
                                                    if($weddingspec['receptiondetails'] ==  $weddingspec['churchdetails'])
                                                    {
                                                        $churchgooglemapsLink = $weddingspec == null ? "" : $weddingspec['churchgooglemaps'];
                                                        $churchwaze = $weddingspec == null ? "" : $weddingspec['churchwaze'];
                                                        $receptiongooglemaps = $weddingspec == null ? "" : $weddingspec['receptiongooglemaps'];
                                                        $receptionwawze = $weddingspec == null ? "" : $weddingspec['receptionwaze'];
                                                        echo '<div style="margin: auto;">';
                                                        echo '    <iframe src="'.$churchgooglemapsLink.'" style="border: 0; width: 100%; min-height: 180px; max-height: 400px" allowfullscreen="" loading="lazy"></iframe>';
                                                        
                                                        echo '</div>';
                                                        echo '<span style="font-size: small;"><i class="icon-location2"></i>&nbsp; <a href="'.$churchwaze.'" target="_blank"><u style="color: var(--textcolor);">Search on Waze</u></a></span>';
            
                                                    }
                                                    else
                                                    {
                                                        $churchgooglemapsLink = $weddingspec == null ? "" : $weddingspec['churchgooglemaps'];
                                                        $churchwaze = $weddingspec == null ? "" : $weddingspec['churchwaze'];
                                                        $receptiongooglemaps = $weddingspec == null ? "" : $weddingspec['receptiongooglemaps'];
                                                        $receptionwaze = $weddingspec == null ? "" : $weddingspec['receptionwaze'];
                                                        echo '<div class="row">';
                                                        echo '  <div class="col-md-6">';
                                                        echo '      <span style="">⛪️ Church</span>';
                                                        echo '      <div style="margin: auto; padding-bottom:10px;">';
                                                        //echo '          <iframe src="'.$churchgooglemapsLink.'" style="border: 0; width: 100%; min-height: 180px; max-height: 400px" allowfullscreen="" loading="lazy"></iframe>';                                                        
                                                        echo '          <image src="../images/Church_QR_Code.png" class="img-responsive" style="border: 0; width: 100%; min-height: 180px; max-height: 400px"/>';   
                                                        echo '      </div>';
                                                        echo '      <span style="font-size: small; padding-bottom:10px;"><i class="icon-location2"></i>&nbsp; <a href="'.$churchwaze.'" target="_blank"><u style="color: var(--textcolor);">Search on Waze</u></a></span>';
                                                        echo '  </div>';
                                                        echo '  <div class="col-md-6">';
                                                        echo '      <span style="">🏨 Reception</span>';
                                                        echo '      <div style="margin: auto; padding-bottom:10px;">';
                                                        //echo '          <iframe src="'.$receptiongooglemaps.'" style="border: 0; width: 100%; min-height: 180px; max-height: 400px" allowfullscreen="" loading="lazy"></iframe>';                                                        
                                                        echo '          <image src="../images/Bella_Plaza_QR_Code.png" class="img-responsive" style="border: 0; width: 100%; min-height: 180px; max-height: 400px"/>';   
                                                        echo '      </div>';
                                                        echo '      <span style="font-size: small; padding-bottom:10px;"><i class="icon-location2"></i>&nbsp; <a href="'.$receptionwaze.'" target="_blank"><u style="color: var(--textcolor);">Search on Waze</u></a></span>';
                                                        echo '  </div>';
                                                        echo '</div>';
                                                    }
                                                
                                                }
                                                else
                                                {
                                                    echo '<h4 style="">-- Venue map and details will be displayed here --</h4>';
                                                }
                                                
                                            ?>

                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
                                            <div class="event-wrap animate-box">
                                                <h3>Event Starts</h3>
                                                <?php
                                                if($weddingspec != null)
                                                {
                                            ?>

                                                <div class="event-col">
                                                    <i class="icon-clock"></i>
                                                    <span><?php echo $weddingspec == null ? "" : $weddingspec['timefromformatted']?></span>
                                                    <span><?php echo $weddingspec == null ? "" : $weddingspec['timetoformatted']?></span>
                                                </div>
                                                <div class="event-col">
                                                    <i class="icon-calendar"></i>
                                                    <span><?php echo $weddingspec == null ? "" : $weddingspec['dateformatted']?></span>
                                                </div>
                                                <div class="col-lg-12">
                                                    <?php
                                                    if($weddingspec['receptiondetails'] ==  $weddingspec['churchdetails'])
                                                    {
                                                        $receptionaddress = $weddingspec == null ? "" : $weddingspec['receptiondetails'];
                                                        echo "<p>🏨⛪️ $receptionaddress</p>";
                                                    }
                                                    else
                                                    {
                                                        $receptionaddress = $weddingspec == null ? "" : $weddingspec['receptiondetails'];
                                                        $churchaddress = $weddingspec == null ? "" : $weddingspec['churchdetails'];
                                                        echo "<p>⛪️ $churchaddress</p>";
                                                        echo "<p>🏨 $receptionaddress</p><br>";
                                                    }
                                                ?>

                                                    <?php 
                                                }
                                                else
                                                {
                                                    echo '<h4 style="">-- Event map and details will be displayed here --</h4>';
                                                }
                                            
                                            ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


             <div id="fh5co-event2" class="fh5co-bg hidden" style="background-image: url('../images/bg_alter.jpg');"  hidden>
                <!-- <div class="overlay"></div> -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                            <span style="color: #fff !important">Our</span>
                            <h2 style="color: #fff !important">Wedding Timeline</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="display-t">
                            <div class="display-tc">
                                <div class="col-md-12">
                                    <img class="img-responsive" src="../images/weddingtimeline.png"/> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-couple-story">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                            <span>We Love Each Other</span>
                            <h2>Our Story</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <ul class="timeline animate-box">

                                <?php
                                if($couplesinfo != null)
                                {
                                    $i = 0;
                                    foreach($couplesinfo as $c)
                                    {
                                        $imageURL = 'data:image/png;base64,' .base64_encode($c['image']);
                                        if($i % 2 == 0)
                                        {
                                            echo '<li class="animate-box">';
                                            echo '<div class="timeline-badge" style="background-image: url('.$imageURL.');"></div>';
                                            echo '<div class="timeline-panel">';
                                            echo    '<div class="timeline-heading">';
                                            echo        '<h3 class="timeline-title timeline-custom">'.$c['title'].'</h3>'; 
                                            echo        '<p>'.$c['location'].'</p>';
                                            echo        '<span class="date">'.$c['date'].'</span>';
                                            echo    '</div>';
                                            echo    '<div class="timeline-body">';
                                            echo        '<p>'.$c['description'].'</p>';
                                            echo    '</div>';
                                            echo '</div>';
                                            echo'</li>';
                                        }
                                        else
                                        {
                                            echo '<li class="timeline-inverted animate-box">';
                                            echo '<div class="timeline-badge" style="background-image: url('.$imageURL.');"></div>';
                                            echo '<div class="timeline-panel">';
                                            echo    '<div class="timeline-heading">';
                                            echo        '<h3 class="timeline-title timeline-custom">'.$c['title'].'</h3>';
                                            echo        '<p>'.$c['location'].'</p>';
                                            echo        '<span class="date">'.$c['date'].'</span>';
                                            echo    '</div>';
                                            echo    '<div class="timeline-body">';
                                            echo        '<p>'.$c['description'].'</p>';
                                            echo    '</div>';
                                            echo '</div>';
                                            echo'</li>';
                                        }
                                        $i+=1;
                                    }
                                }
                                else
                                {
                                    echo '<li class="animate-box">';
                                    echo '<div class="timeline-badge" style="background-image: url();"></div>';
                                    echo '<div class="timeline-panel">';
                                    echo    '<div class="timeline-heading">';
                                    echo        '<h3 class="timeline-title">First Meet</h3>';
                                    echo        '<p>Quezon City</p>';
                                    echo        '<span class="date">1/1/2023</span>';
                                    echo    '</div>';
                                    echo    '<div class="timeline-body">';
                                    echo        '<p>Tell more about your story</p>';
                                    echo    '</div>';
                                    echo '</div>';
                                    echo'</li>';

                                    echo '<li class="timeline-inverted animate-box">';
                                    echo '<div class="timeline-badge" style="background-image: url();"></div>';
                                    echo '<div class="timeline-panel">';
                                    echo    '<div class="timeline-heading">';
                                    echo        '<h3 class="timeline-title">In A Relationship</h3>';
                                    echo        '<p>Quezon City</p>';
                                    echo        '<span class="date">2/1/2023</span>';
                                    echo    '</div>';
                                    echo    '<div class="timeline-body">';
                                    echo        '<p>Tell more about your story</p>';
                                    echo    '</div>';
                                    echo '</div>';
                                    echo'</li>';
                                }
                                
                            
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-gallery" class="fh5co-bg" style="background-image: url('../images/bg_alter.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                            <span>Our Memories</span>
                            <h2>Wedding Gallery</h2>
                            <p>All Photos from prenup and wedding event will be uploaded here.</p>
                        </div>
                    </div>
                    <div class="row row-bottom-padded-md">
                        <div class="col-md-12">
                            <!-- ALL PHOTOS HERE -->
                            <ul id="fh5co-gallery-list">

                                <?php

                                if($galleryinfo != null)
                                {
                                    foreach($galleryinfo as $album)
                                    {
                                        $imagename = $album['imagepaths'] == "" ? "" : explode(',',$album['imagepaths'])[0];
                                        echo '<li class="one-third animate-box" data-animate-effect="fadeIn" 
                                        style="background-image: url(\'admin/albumimages/'.$imagename.'\')">';
                                        echo '    <a href="#exampleModal" data-toggle="modal" data-target="#WeddingGallery_Album_'.$album['id'].'">';
                                        echo '        <div class="case-studies-summary">';
                                        echo '            <span>'.getImageCountFromImagePaths($album['imagepaths']).' Photos</span>';
                                        echo '            <h2>'.$album['albumname'].'</h2>';
                                        echo '        </div>';
                                        echo '    </a>';
                                        echo '</li>';
                                    }
                                }
                                else
                                {?>
                            </ul>
                            <br />

                            <center><h4>-- Photo galleries will be shown here --</h4></center>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enntourage List -->
            <div id="fh5co-entourage" class="fh5co-bg" style="background-image: url('../images/bg.jpg');">
                <div class="container fh5co-heading">
                    <div class="row row-pb-sm">
                        <div class="col-md-8 col-md-offset-2 text-center animate-box">
                            <span>Our</span>
                            <h2>Wedding Entourage</h2>
                        </div>
                    </div>

                    <div class="row <?php echo ($entourage_guestcount == 0 ? "" : "hidden"); ?>">
                        <div class="col-lg-12 text-center animate-box row-pb-md">
                            <h4>--Entourage details will be displayed here --</h4>
                        </div>
                    </div>


                    <div class="row <?php echo ($entourage_guestcount <> 0 ? "" : "hidden"); ?>">
                        <!-- PARENTS -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Father (Bride)')) > 0
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'Father (Groom)')) > 0
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'Mother (Bride)')) > 0
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'Father (Groom)')) > 0 ? "" : "hidden"); ?> ">
                            <h4 class="titleheadblack">Our Parents</h4>
                            <div class="row">

                                <!-- FATHER -->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Father (Bride)')) > 0 || count(array_keys(array_column($entourage_guestlist, 'role'), 'Father (Groom)')) > 0 ? "" : "hidden"); ?>">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Father (Groom)")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }

                                        if ($entourage["role"] == "Father (Bride)")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }    
                                    }
                                 }                                
                                ?>
                                </div>
                                <!-- MOTHER -->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Mother (Groom)')) > 0 || count(array_keys(array_column($entourage_guestlist, 'role'), 'Mother (Bride)')) > 0 ? "" : "hidden"); ?>">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Mother (Groom)")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                         if ($entourage["role"] == "Mother (Bride)")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }   
                                    }
                                 }                                
                                ?>
                                </div>

                            </div>
                        </div>
                        <!-- PRINCIPAL SPONSOR (GENERAL) -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Principal Sponsors')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Principal Sponsors</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Principal Sponsors")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- PRINCIPAL SPONSORS -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Principal Sponsor (Male)')) > 0 
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'Principal Sponsor (Female)')) > 0  ? "" : "hidden"); ?> ">
                            <h4 class="titleheadblack">Principal Sponsors</h4>
                            <div class="row">
                                <!-- MALE -->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Principal Sponsor (Male)')) > 0  ? "" : "hidden"); ?>">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Principal Sponsor (Male)")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                                <!-- FEMALE -->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Principal Sponsor (Female)')) > 0  ? "" : "hidden"); ?>">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Principal Sponsor (Female)")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- BESTMAN -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'BestMan')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Best Man</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "BestMan")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- MAID OF HONOR -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'MaidOfHonor')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Maid Of Honor</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "MaidOfHonor")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <!-- GROOMSMEN -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Groomsmen')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Groomsmen</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Groomsmen")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- BRIDESMAID -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Bridesmaid')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Bridesmaids</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Bridesmaid")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>

                        <!-- JUNIOR BRIDESMAID -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'JuniorBridesmaid')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Junior Bridesmaids</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "JuniorBridesmaid")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>


                        <!-- SECONDARY SPONSORS -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Veil')) > 0
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'Cord')) > 0
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'Candle')) > 0
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'CoinBearer')) > 0
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'RingBearer')) > 0                                                                                      
                                                                                      || count(array_keys(array_column($entourage_guestlist, 'role'), 'BibleBearer')) > 0 ? "" : "hidden"); ?>">
                            <br />
                            <h3 class="titleheadblack">Secondary Sponsors</h3>
                            <br />
                        </div>


                        <!-- VEIL -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Veil')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Veil</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Veil")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- CORD -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Cord')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Cord</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Cord")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- CANDLE -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Candle')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Candle</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Candle")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        
                                   
                        <!-- BEARER -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'Bearer')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Bearer</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "Bearer")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- COIN BEARER -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'CoinBearer')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Coin Bearer</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "CoinBearer")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- RING BEARER -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'RingBearer')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Ring Bearer</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "RingBearer")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- BIBLE BEARER -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'BibleBearer')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Bible Bearer</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "BibleBearer")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- SIGNAGE BEARER -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'SignageBearer')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Signage Bearer</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "SignageBearer")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        <!-- SWORD BEARER -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'SwordSponsor')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Sword Sponsor</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "SwordSponsor")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>


                         <!-- FLOWER GIRL -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'FlowerGirl')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Flower Girls</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "FlowerGirl")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>
                        

                        <!-- OFFICIATING PASTOR -->
                        <div class="col-lg-12 text-center animate-box row-pb-md <?php echo (count(array_keys(array_column($entourage_guestlist, 'role'), 'OfficiatingPastor')) > 0  ? "" : "hidden"); ?>">
                            <h4 class="titleheadblack">Bearer</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                if($entourage_guestcount <> 0)
                                {                                    
                                    foreach($entourage_guestlist as $entourage)
                                    {
                                        if ($entourage["role"] == "OfficiatingPastor")
                                        {
                                        	echo '<span class="ento">'. $entourage["guestname"] .'</span><br>';
                                        }
                                    }
                                 }
                            ?>
                                </div>
                            </div>
                        </div>


                        <!-- 
                    <div class="col-lg-12 text-center animate-box row-pb-sm">                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<h5 class="titleheadblack">Best Man</h5>
                                <span class="ento">Mr. Juan Dela Cruz</span><br>
                                <span class="ento">Mr. Juan Dela Cruz</span><br>
                                <span class="ento">Mr. Juan Dela Cruz</span><br>
                            </div>
	
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<h5 class="titleheadblack">Maid Of Honor</h5>
                                <span class="ento">Mrs. Juana Dela Cruz</span><br>
                                <span class="ento">Mrs. Juana Dela Cruz</span><br>
                                <span class="ento">Mrs. Juana Dela Cruz</span><br>
                            </div>
                        </div>
                     </div>
					 -->
                    </div>
                </div>
            </div>



            <div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image: url('../images/bg_alter.jpg');">
                <!-- <div class="overlay"></div> -->
                <div class="container">
                    <div class="row col-lg-12 col-lg-12">
                        <div class="display-t">
                            <div class="display-tc">
                                <div class="col-lg-6 col-md-6 col-sm-6 animate-box">
                                    <div class="feature-center">
                                        <span class="icon">
                                            <i class="icon-users"></i>
                                        </span>

                                        <!--<span class="counter js-counter" data-from="0" data-to="<?php echo $confirmedguestcount; ?>" data-speed="5000" data-refresh-interval="10">1</span>-->
                                        <span class="counter js-counter" data-from="0" data-to="<?php echo $weddingspec == null ? "" : $weddingspec['guestnumber']?>" data-speed="5000" data-refresh-interval="10">1</span>
                                        <span class="counter-label">We Cater</span>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 animate-box">
                                    <div class="feature-center">
                                        <span class="icon">
                                            <i class="icon-user"></i>
                                        </span>

                                        <span class="counter js-counter" data-from="0" data-to="<?php echo array_sum(array_column($guestlistattendinginfo, 'extraguestcount')) ?>" data-speed="5000" data-refresh-interval="10">1</span>
                                        <span class="counter-label">Estimated Guest</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="fh5co-faq">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                            <h2>Frequently Asked Questions</h2>
                            <p>As we are finally down few more days before our big day, we have prepared answers to some FAQs that may not be clear due to tight schedule for our wedding preparations.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <ul class="animate-box" style="list-style-type: none;">
                                <?php 
                        //FAQ LIST DO LOOP HERE
                        //var_dump($faqlist);
                        if ($faqlist == null){
                            echo '<p class="text-center">-- Soon! --</p>';
                        }
                        else{
                            foreach ($faqlist as $row){
                                echo '<li class="animate-box" style="padding-bottom: 5px">';
                                echo '    <div class="faq-section-box">';
                                echo '        <div class="timeline-heading">';
                                echo '            <h3 class="timeline-title">[Q] '. $row["FAQTitle"] .'</h3>';
                                echo '        </div>';
                                echo '        <div class="timeline-body">';
                                echo '            <p><i>'. $row["FAQAnswer"] .'</i></p>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</li>';
                            }
                        }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-WhatToWear" class="fh5co-bg fh5co-section" style="background-image: url('../images/bg_alter.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                            <h2>What to Wear?</h2>
                            <p>Suggested outfits for the Ladies and Gents.</p>
                        </div>
                    </div>
                    <div class="row row-bottom-padded-md">
                        <div class="col-md-12">
                            <!-- ALL PHOTOS HERE -->
                            <ul id="fh5co-gallery-list1">

                                <?php
                                if($attire_info!= null)
                                {
                                    foreach($attire_info as $attire)
                                    {
                                        echo '<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(\'admin/weddingattires/'.formatDesignationText($attire['designation']).'/'.getFirstImageFromImagePaths($attire['imagepaths']).'\');">';
                                        echo '    <a href="#exampleModal" data-toggle="modal" data-target="#'.formatDesignationText($attire['designation']).'">';
                                        echo '        <div class="case-studies-summary">';
                                        echo '            <span>'.getImageCountFromDesignation($attire_info,$attire['designation']).' Photos</span>';
                                        echo '            <h2>'.$attire['designation'].'</h2>';
                                        echo '        </div>';
                                        echo '    </a>';
                                        echo '</li>';
                                    }
                                }
                               
                               
                            
                            ?>
                                <!-- linkback -->



                            </ul>
                            <br />
                        </div>
                    </div>


                    <div class="row row-bottom-padded-md">
                        <div class="col-md-12">
                            <img class="img-responsive" src="../images/what_to_wear_others.png" />
                            <img class="img-responsive" src="../images/what_to_wear_others2.png" /> 
                        </div>
                    </div>
                </div>
            </div>


            <div id="fh5co-testimonial">
                <div class="container">
                    <div class="row">
                        <div class="row animate-box">
                            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                                <span>Best Wishes</span>
                                <h2>Friends Wishes</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 animate-box">
                                <div class="wrap-testimony">
                                    <div class="owl-carousel-fullwidth">
                                        <?php 
                                //GUEST MESSAGE LIST DO LOOP HERE

                        
                                foreach ($guestmessagelist as $row){
                                    echo '<div class="item">'; 
                                    echo '    <div class="testimony-slide active text-center">'; 
                                    echo '        <figure>'; 
                                    echo '            <img src="'. ($row["photo"] === NULL || $row["photo"] === "" ? "images/user-vector.png" : $row["photo"]) .'" alt="'.($row["filename"] === NULL || $row["filename"] === "" ? "blank_pic.jpg" : $row["guestname"]) .'">'; 
                                    echo '        </figure>'; 
                                    echo '        <span><u>'. $row["guestfullname"] .'</u>, via <a href="#" class="twitter">TheWeddingDayStory</a></span>'; 
                                    echo '        <blockquote>'; 
                                    echo '            <p>"'. $row["questioncomment"] .'"</p>'; 
                                    echo '        </blockquote>'; 
                                    echo '    </div>'; 
                                    echo '</div>';
                                }

                                if ($guestmessagecount <= 1)
                                {
                                    echo '<div class="item">                                                                         ';
                                    echo '    <div class="testimony-slide active text-center">                                       ';
                                    echo '        <figure>                                                                           ';
                                    echo '            <img src="images/user-vector.png" alt="user">                                  ';
                                    echo '        </figure>                                                                          ';
                                    echo '        <span><u>Patrick G</u>, via <a href="#" class="twitter">TheWeddingDayStory</a></span>';
                                    echo '        <blockquote>                                                                       ';
                                    echo '        </blockquote>                                                                      ';
                                    echo '            <p>"Best Wishes!"</p>                                                          ';
                                    echo '    </div>                                                                                 ';
                                    echo '</div>                                                                                     ';
                                }
                                ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div id="fh5co-started" class="fh5co-bg" style="background-image: url('../images/bg_alter.jpg');" <?php echo ($gclist == null ? "hidden" : ($gclist[0]["isattending"] == 0 ? "" : "hidden")) ?>>
                <!-- <div class="overlay"></div> -->
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>Are You Attending?</h2>
                            <p>Please confirm your attendance by filling up the information below. Also we would like to require you to upload your BEST PHOTO, we have a surprise for you on our big day 😉</p>
                        </div>
                    </div>
                    <div class="row animate-box">
                        <div class="col-md-12" style="background-color: #f5f5f5; border-radius: 40px; padding: 30px;">
                            <form method="post" class="form-inline" enctype="multipart/form-data">
                                <input type="hidden" id="_guestcode" name="_guestcode" value="<?php echo ($gclist == null ? "" : ($gclist[0]["isattending"] == 0 ? $gclist[0]["guestcode"] : "")) ?>" />

                                <div class="form-group">
                                    <div id="frames"></div>
                                    <label for="fileupload">Upload Your Best Photo:</label><div id="DimensionWarningMsg"></div>
                                    <input type="file" id="fileupload" name="fileupload" onchange="ValidateSize(this);" class="form-control" accept="image/*" required />
                                    <p class="text-left" style="font-size: small"><b>* Photo must be 4000px by 4000px and Maximum of 5MB file size.</b></p>
                                </div>

                                <div class="form-group">
                                    <label for="guestname">Your Role / Headcount:</label>
                                    <input type="text" class="form-control" value="<?php echo ($gclist == null ? "" : ($gclist[0]["isattending"] == 0 ? $gclist[0]["role"] . " - " . $gclist[0]["extraguestcount"] . " seat(s) for you" : "")) ?>" disabled/>
                                </div>

                                <div class="form-group">
                                    <label for="guestname">Your Full Name:</label>
                                    <input type="text" id="guestfullname" name="guestfullname" class="form-control" placeholder="ex. Juan Dela Cruz" required />
                                </div>

                                <div class="form-group">
                                    <label for="contactnumber">Contact#:</label>
                                    <input type="text" id="contactnumber" name="contactnumber" class="form-control" placeholder="ex. 0917-123-1234" required />
                                </div>

                                <div class="form-group">
                                    <label for="questioncomment">Dedication:</label>
                                    <textarea id="questioncomment" name="questioncomment" class="form-control" rows="10" cols="10" placeholder="ex. Best Wishes!"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="questioncomment">Are you Attending?:</label>
                                    <div class="form-control text-center" style="height: auto;">
                                        <label class="radio-inline text-default">
                                            <input type="radio" style="transform: scale(1.3);" name="isattending" value="1" required>😍 Yes! I will Attend</label>
                                        <label class="radio-inline text-default">
                                            <input type="radio" style="transform: scale(1.3);" name="isattending" value="2" required>🥺 Sorry, I'm not Available</label>
                                    </div>
                                </div>

                                <div class="form-group" style="padding-top: 10px">
                                    <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-save"></i>&nbsp;Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer id="fh5co-footer" class="fh5co-bg" role="contentinfo" style="background-image: url('../images/bg_alter.jpg');">
                <div class="container">
                    <div class="row copyright">
                        <div class="col-md-12 text-center">
                            <p>
                                <small class="block">&copy; <?php echo $groomspec != null? _getFullName($groomspec) : "Groom" ?> & <?php echo $bridespec != null? _getFullName($bridespec) : "Bride" ?>. All Rights Reserved.</small>
                                <small class="block">Designed by <a href="https://www.facebook.com/people/The-Wedding-Day-Story/100080232153815/" target="_blank">The Wedding Day Story</a></small>
                                <small style="font-size: xx-small; color: #92443A"><?php echo $WebClientID ?></small>
                            </p>
                            <!--<p>
                            <ul class="fh5co-social-icons">
                                <li><a href="https://twitter.com/MagisTechInc"><i class="icon-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/MagisTechInc"><i class="icon-facebook"></i></a></li>
                                <li><a href="http://blogs.magistechnologiesinc.com/"><i class="icon-globe2"></i></a></li>
                            </ul>
                        </p>-->
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- CONFIRMATION -->
    <!--    <div class="modal fade" id="AttendanceConfirmation" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Attendance Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>-->

    <!-- INITIAL POP-UP -->
    <div class="modal fade" id="initPopUp" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #800020">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="display-t fh5co-cover" style="height: 600px !important">
                                <center>
                                    <div class="display-tc animate-box" data-animate-effect="fadeIn" style="height: 600px !important">
                                        <h1 style="color: var(--headertextcolor) !important;"><?php 
                                echo $groomspec == null ||$groomspec['nickname'] == ""? "Groom": $groomspec['nickname']; 
                                echo(' &amp; '); 
                                echo $bridespec == null ||$bridespec['nickname'] == ""? "Bride": $bridespec['nickname'];?></h1>
                                        <h2 style="color: var(--headertextcolor) !important;">We Are Getting Married</h2>
                                        <div class="simply-countdown simply-countdown-one"></div>
                                        <p><a href="#" onclick="autoplayfunc();" data-dismiss="modal" class="btn btn-default btn-sm">Let's Start</a></p>                                        
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>


                    <!--<center>
                            <h2>We said yes! Join us in the countdown until we say "I do."
                            </h2>
                            <br />
                            <br />
                            
                     </center>-->
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP MODAL HERE -->

    <?php
        if($attire_info != null)
        {
            foreach($attire_info as $attire)
            {
    
                echo '<div class="modal fade" id="'.formatDesignationText($attire['designation']).'" tabindex="-1" role="dialog" aria-hidden="true">';
                echo '    <div class="modal-dialog" role="document">';
                echo '        <div class="modal-content">';
                echo '            <div class="modal-header">';
                echo '                <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo '                    <span aria-hidden="true">×</span>';
                echo '                </button>';
                echo '            </div>';
                echo '            <div class="modal-body">';
                echo '                <div class="gallery-container">';
                echo '                    <h1>'.$attire['designation'].' Attire</h1>';
                echo '                    <center>';
                echo '                        <p>'.$attire['description'].'</p>';
                echo '                        </center>';
                echo '                    <div class="tz-gallery">';
                echo '                        <div class="row">';
                
                if(strpos(($attire['imagepaths']),','))
                {
                    foreach(explode(',',$attire['imagepaths']) as $path)
                    {
                        echo '<div class="col-sm-6 col-md-4">';
                        echo '    <a class="lightbox" href="admin/weddingattires/'.formatDesignationText($attire['designation']).'/'.$path.'">';
                        echo '        <img src="admin/weddingattires/'.formatDesignationText($attire['designation']).'/'.$path.'" alt="'.$attire['designation'].'">';
                        echo '    </a>';
                        echo '</div>';
                    }
                }
                else
                {
                    if($attire['imagepaths'] != "")
                    {
                        echo '<div class="col-sm-6 col-md-4">';
                        echo '    <a class="lightbox" href="admin/weddingattires/'.formatDesignationText($attire['designation']).'/'.$attire['imagepaths'].'">';
                        echo '        <img src="admin/weddingattires/'.formatDesignationText($attire['designation']).'/'.$attire['imagepaths'].'" alt="'.$attire['designation'].'">';
                        echo '    </a>';
                        echo '</div>';
                    }
                }
                
    
                echo '                        </div>';
                echo '                    </div>';
                echo '                </div>';
                echo '            </div>';
                echo '            <div class="modal-footer">';
                echo '                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        }

        if($galleryinfo != null)
        {
            foreach($galleryinfo as $album)
            {
                echo '<div class="modal fade" id="WeddingGallery_Album_'.$album['id'].'" tabindex="-1" role="dialog" aria-hidden="true">';
                echo '   <div class="modal-dialog" role="document">';
                echo '        <div class="modal-content">';
                echo '            <div class="modal-header">';
                echo '                <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo '                    <span aria-hidden="true">×</span>';
                echo '                </button>';
                echo '            </div>';
                echo '            <div class="modal-body">';
                echo '                <div class="gallery-container">';
                echo '                    <h1>'.$album['albumname'].'</h1>';
                echo '                    <p class="text-center">'.$album['description'].'</p>';
                echo '                    <div class="tz-gallery">';
                echo '                        <div class="row">';
                foreach(getArrayFromImagePaths($album['imagepaths']) as $image)
                {
                    echo '                            <div class="col-sm-6 col-md-4">';
                    echo '                                <a class="lightbox" href="admin/albumimages/'.$image.'">';
                    echo '                                    <img src="admin/albumimages/'.$image.'" alt="'.$album['albumname'].'">';
                    echo '                                </a>';
                    echo '                            </div>';
                }
            
                echo '                        </div>';
                echo '                    </div>';
                echo '                </div>';
                echo '            </div>';
                echo '            <div class="modal-footer">';
                echo '                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        
        }
        

        

        
    ?>






    <!--  END OF BOOTSTRAP MODAL -->



    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="js/jquery.countTo.js"></script>

    <!-- Stellar -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>

    <!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
    <script src="js/simplyCountdown.js"></script>

    <script src="js/baguetteBox.min.js"></script>

    <script src="/admin/js/imgPreview.min.js"></script>

    <!-- Main -->
    <script src="js/main.js"></script>



    <script>

        $(function(){            
            $('#initPopUp').modal("show");    
        });


        baguetteBox.run('.tz-gallery');

        var d = new Date("<?php echo $weddingspec == null ? "0/0/0" : $weddingspec['datenumeric'] . " " . $weddingspec['timefromformatted']?>");
        d = convertTZ(d,"Asia/Manila");

        // default example
        simplyCountdown('.simply-countdown-one', {
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate(),
            hours: d.getHours(),
            minutes: d.getMinutes(),
            enableUtc: false
            
        });

        var owl = $('.owl-carousel-fullwidth');
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            responsiveClass: true,
            nav: true,
            dots: false,
            smartSpeed: 800,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 10000,
            autoplayHoverPause: false
        });



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


       
        function ValidateSize(file) {
            console.table(file.files[0]);
            console.log(file.files[0].type.toString());
            var FileSize = file.files[0].size / 1000000; // in MB
            //alert(FileSize);
            if (FileSize > 5) {
                alert('File too large. File must be less than 5 MB.');
                $(file).val(''); //for clearing with Jquery
            }

            switch (file.files[0].type) {
                case "image/png":
                case "image/jpg":
                case "image/jpeg": {
                    break;
                }
                default: {
                    alert('Invalid file type. Only JPG, JPEG and PNG types are accepted.');
                    $(file).val(''); //for clearing with Jquery
                    break;
                }
            }
        }

        function autoplayfunc(){

            var x = document.getElementById("audioplayerpanel");
            x.play();
            console.log('Play Music----'); 
        }

        function convertTZ(date, tzString) {
            return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));   
        }

       
    </script>
</body>
</html>

