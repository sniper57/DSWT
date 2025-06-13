<?php
include '../admin/config/WebClient.php';
include '../admin/config/authenticate.php';
function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active'; //class name in css 
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title><?php echo (isset($_HeaderTitle) ? $_HeaderTitle : 'Admin Panel') ?> - TheWeddingDayStory.</title>

    <link rel='icon' href='../admin/favicon.png' type='image/x-icon'>

    <!-- Bootstrap core CSS -->
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../admin/css/font-awesome.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet" />


    <!-- Custom styles for this template -->
    <link href="../admin/css/admin.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        /*Mobile menu css*/
        body {
            font-family: 'Lato', sans-serif;
        }

        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgb(0,0,0);
            background-color: #ffffff;
            overflow-x: hidden;
            transition: 0.5s;
        }

        .overlay-content {
            position: relative;
            top: 25%;
            width: 100%;
            text-align: center;
            margin-top: 30px;
            padding-left: 40px;
        }

        .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
            text-align: left;
        }

            .overlay a:hover, .overlay a:focus {
                /*  color: #f1f1f1;*/
                color: #b7b2b2;
            }

        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
        }

        @media screen and (max-height: 450px) {
            .overlay a {
                font-size: 20px;
            }

            .overlay .closebtn {
                font-size: 40px;
                top: 15px;
                right: 35px;
            }
        }

    </style>

</head>

<body class="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">The Wedding Day Story</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <p class="navbar-text navbar-right">
                    <img class="img-responsive" src="<?php echo $_SESSION["isLogin"]['photo'] ?>" style="width: 30px;height: 30px;float: left;border: 1px solid white;border-radius: 50%;"/>
                    &nbsp;Signed in as <strong style="text-transform: uppercase; text-decoration: underline"><?php echo $_SESSION["isLogin"]['name'] . "-" . $WebClientID ?></strong> | <i class="fa fa-sign-out"></i>&nbsp;<a href="logout.php" onclick="return confirm('Are you sure you want to Log-Out?');">Logout</a></p>
                <ul class="nav navbar-nav hidden-lg hidden-md">
                    
                    <li class="<?php echo ($_SESSION["isLogin"]['isadmin'] == "1" ? "" : "hidden"); ?>"><a href="customerinformation.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Customer Info</a></li>
                    <li class="<?php echo ($_SESSION["isLogin"]['isadmin'] == "1" ? "" : "hidden"); ?>"><a href="packagelist.php"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;Package List</a></li>
                    <hr />
                    <li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Homepage</a></li>
                    <li><a href="users.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Users</a></li>
                    <li><a href="faq.php"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQ</a></li>
                    <!--<li><a href="guestmessage.php"><i class="fa fa-weixin" aria-hidden="true"></i>&nbsp;Guest Message</a></li>-->
                    <li><a href="guestlist.php"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Guest List</a></li>
                    <li><a href="guestphotolist.php"><i class="fa fa-photo" aria-hidden="true"></i>&nbsp;Guest Photo</a></li>
                    <li><a href="weddingdetails.php"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Wedding Details</a></li>
                    <li><a href="brideinformation.php"><i class="fa fa-female" aria-hidden="true"></i>&nbsp;Bride Information</a></li>
                    <li><a href="groominformation.php"><i class="fa fa-male" aria-hidden="true"></i>&nbsp;Groom Information</a></li>
                    <li><a href="couplesinformation.php"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;Couple's Info</a></li>
                    <li><a href="photogallery.php"><i class="fa fa-folder" aria-hidden="true"></i>&nbsp;Photo Gallery</a></li>
                    <li><a href="summary.php"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;Summary</a></li>

                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="hidden-sm hidden-xs col-lg-2 col-md-2">
                <p class="lead">Admin Panel<br /><span style="font-size:x-small !important"><?php echo $_SERVER['HTTP_HOST']; ?></span></p>
                <div class="list-group">
                    <a href="customerinformation.php" class=" <?php echo ($_SESSION["isLogin"]['isadmin'] == "1" ? "" : "hidden"); ?> list-group-item <?php active('customerinformation.php');?>"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Customer Info</a>
                    <a href="packagelist.php" class=" <?php echo ($_SESSION["isLogin"]['isadmin'] == "1" ? "" : "hidden"); ?> list-group-item <?php active('packagelist.php');?>"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;Package List</a>
                    <hr />
                    <a href="home.php" class="list-group-item <?php active('home.php');?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Homepage</a>
                    <a href="users.php" class="list-group-item <?php active('users.php');?>"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Users</a>
                    <a href="faq.php" class="list-group-item <?php active('faq.php');?>"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQ</a>
                    <!--<a href="guestmessage.php" class="list-group-item <?php active('guestmessage.php');?>"><i class="fa fa-weixin" aria-hidden="true"></i>&nbsp;Guest Message</a>-->
                    <a href="guestlist.php" class="list-group-item <?php active('guestlist.php');?>"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Guest List</a>
                    <a href="guestphotolist.php" class="list-group-item <?php active('guestphotolist.php');?>"><i class="fa fa-photo" aria-hidden="true"></i>&nbsp;Guest Photo</a>
                    <a href="weddingdetails.php" class="list-group-item <?php active('weddingdetails.php');?>"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Wedding Details</a>
                    <a href="brideinformation.php" class="list-group-item <?php active('brideinformation.php');?>"><i class="fa fa-female" aria-hidden="true"></i>&nbsp;Bride Information</a>
                    <a href="groominformation.php" class="list-group-item <?php active('groominformation.php');?>"><i class="fa fa-male" aria-hidden="true"></i>&nbsp;Groom Information</a>
                    <a href="couplesinformation.php" class="list-group-item <?php active('couplesinformation.php');?>"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;Couple's Info</a>
                    <a href="photogallery.php" class="list-group-item <?php active('photogallery.php');?>"><i class="fa fa-folder" aria-hidden="true"></i>&nbsp;Photo Gallery</a>
                    <a href="summary.php" class="list-group-item <?php active('summary.php');?>"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;Summary</a>
                    
                </div>

            </div>

            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <div id="bodycontainer" style="display: none">
