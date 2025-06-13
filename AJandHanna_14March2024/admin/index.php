<?php 
session_start();
$errmsg = "";
// echo md5(md5(md5('abc123')));

if (isset($_SESSION["isLogin"]))
{    
	$sesfullname = $_SESSION["isLogin"]['name'];
    echo '<script>alert("Welcome Back! '. $sesfullname .'!");window.location.href="home.php";</script>';
    exit();
}



if(isset($_SESSION['num_login_fail']))
{
    if($_SESSION['num_login_fail'] > 3)
    {
        //echo ('Please try to login after ' . (60 - (time() - $_SESSION['last_login_time'])) . ' second(s).');
        
        if(time() - $_SESSION['last_login_time'] < 1*60 ) 
        {
            // alert to user wait for 10 minutes afer
            $errmsg = "You have reach the maximum number of login attempts. This is a part of the website's security. Try to login after 1 minutes.";
            echo '<script>alert("'. $errmsg .'");</script>';

            echo '
            <p id="demo"></p>
            <script>
            momentOfTime = new Date(); // just for example, can be any other time
            myTimeSpan = '. (60 - (time() - $_SESSION['last_login_time'])) .'*1000; // 5 minutes in milliseconds
            momentOfTime.setTime(momentOfTime.getTime() + myTimeSpan);
            var deadline = momentOfTime;
            var x = setInterval(function() {
            var now = new Date().getTime();
            var t = deadline - now;
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((t % (1000 * 60)) / 1000);
            //document.getElementById("demo").innerHTML = days + "d " 
            + hours + "h " + minutes + "m " + seconds + "s ";
            
            document.getElementById("demo").innerHTML = "Please Wait! Page will reload after " + seconds + "s ";
                if (t < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "Reloading...";
                    window.location.href = "index.php";
                }
            }, 1000);
            </script>
         ';

            return; 
        }
        else
        {
            //after 10 minutes
            $errmsg="";
            $_SESSION['num_login_fail'] = 0;
        }
    }      
}
else{
    $_SESSION['num_login_fail'] = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Wedding Day | Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <!-- particles.js container -->
    <div id="particles-js"></div>
    <div class="header">
        <div class="login-box">
            <div class="login-logo">
                <!--<p>
                    <img class="img-responsive" src="../img/Buoyant-industrial-systems-header.png" width="100%" height="10%" alt="" />
                </p>-->
            </div>
            <!-- /.login-logo -->
            <div class="card ">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">WEBSITE ADMIN PORTAL<br /><small><?php echo $_SERVER['HTTP_HOST']; ?></small></p>
                    <form method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" id="uName" name="uName" autofocus="true" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" id="uPass" name="uPass" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12 pull-right">
                                <span id="errmsg" class="badge text-center" style="background-color: red;"></span>
                                <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i>Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
    </div>
    <!-- jQuery -->
    <script src="../admin/js/jquery-3.1.1-min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../admin/js/bootstrap.js"></script>



</body>
</html>

<?php 
if (ISSET($_POST['btnSubmit'])){

    include '../admin/config/crud.php';
    include '../admin/config/helper.php';
    include '../admin/config/WebClient.php';   
    
    $username=$_POST['uName'];
    $password= md5(md5(md5($_POST['uPass'])));

    if (strtoupper($username) == "ADMINISTRATOR")
    {
    	$data = _getAllDataByParam('users','username="' . $username . '" AND password="' . $password . "\"");
    }
    else{
        $data = _getAllDataByParam('users','twds_ci_id = "'.$WebClientID.'" AND username="' . $username . '" AND password="' . $password . "\"");
    }

    

    if ($data != null && $data['count'] != 0){

        $_SESSION['num_login_fail'] = 0;

        if ($data['data'][0]['isactive'] == 0) //If account is inactive
        {
        	echo '<script>alert("This account (' . $data['data'][0]['username'] . ') is locked, Please contact your system administrator.");</script>';
        }
        else
        {
            $_SESSION["isLogin"] = $data['data'][0];
            $fullname = $data['data'][0]['name'];
            echo '<script>alert("Welcome! '. $fullname .'!");window.location.href="home.php";</script>';
            exit();
        }       
    }
    else{

        $_SESSION['num_login_fail'] ++;
        $_SESSION['last_login_time'] = time();

        echo '<script>alert("Username/Password is incorrect! ('. $_SESSION['num_login_fail'] .') attempt.");</script>';
    }
}
?>
