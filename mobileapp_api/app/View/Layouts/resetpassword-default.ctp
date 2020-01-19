<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?php echo "hello" ?>Forget Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <link href="<?php echo BASE_URL ?>/app/webroot/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL ?>/app/webroot/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL ?>/app/webroot/css/theme.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL ?>//app/webroot/css/theme-responsive.min.css" rel="stylesheet" type="text/css">
    </head>
    <body id="pages" class="full-layout no-nav-left no-nav-right nav-top-fixed background-login responsive login-layout   clearfix breakpoint-975">
        <div class="container">
            <div class="vd_login-page">
                <div class="panel widget">
                    <div class="login-icon">
                        <i class="fa fa-lock"></i>
                    </div>

                     <?php echo $this->fetch('content'); ?>

