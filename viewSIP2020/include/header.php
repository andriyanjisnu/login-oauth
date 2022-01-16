<!DOCTYPE html>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<html class="no-js" lang="en">
<head>
  <!-- title -->
  <title>
  <?php 
    if(isset($web_title)) 
    {
        echo $web_title;
    }
    else
    {
        echo TITLE;
    }
    // echo " | ".DOMAIN;
  ?>
  </title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- description -->
  <meta name="description" content="<?php if(isset($web_desc)) { echo $web_desc.". "; } else { echo DESC; } ?>">
  <!-- keywords -->
  <meta name="keywords" content="<?php if(isset($web_keywords)) { echo $web_keywords.". "; } else { echo KEYWORDS; } ?>">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Blibli.com">
  <meta name="google-signin-client_id" content="354736706568-m0bt9i3a5fnh5514o25t70gk7jmmirc3.apps.googleusercontent.com">
  <!-- favicon -->
  <link rel="apple-touch-icon" href="<?=base_url('assets/images/apple-touch-icon-57x57.png');?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/images/apple-touch-icon-72x72.png');?>">
  <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/images/apple-touch-icon-114x114.png');?>">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link href="<?=base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
  <!-- Slick -->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/slick/slick.css');?>"/>
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/slick/slick-theme.css');?>"/>
  <!-- animation -->
  <link rel="stylesheet" href="<?=base_url('assets/css/animate.css');?>" />
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>" />
  <!-- style -->
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css');?> " />
  <!-- responsive css -->
  <link rel="stylesheet" href="<?=base_url('assets/css/responsive.css');?> " />
  <!-- Select 2 -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="<?=base_url('assets/css/select2.min.css');?> " />
  <script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js');?> "></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
      <div class="container font-1x">
        <a class="navbar-brand logo" href="<?=base_url();?>"><img class="img-fluid" src="<?=base_url('assets/images/header-footer/logo.png');?>"></a>
        <?php if(isset($_SESSION['email_user'])): ?>
        <?php else: ?>
          <div class="d-md-none d-lg-none d-xl-none padding-70px-left padding-5px-right">
            <button type="submit" style="border: 0; background: transparent;">
              <a href="<?=base_url('registration');?>"><img src="<?=base_url('assets/images/header-footer/Daftar.png');?> " width="55" height="30" alt="submit" /></a>
            </button>
          </div>
        <?php endif; ?>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar top-bar"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>				
        </button>
        <div class="collapse navbar-collapse flex-column align-items-end ml-lg-2 ml-0" id="navbarCollapse">          
          <ul class="navbar-nav flex-row ">            
            <?php if(isset($_SESSION['email_user'])): ?>   
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle text-white " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hai, <?=$_SESSION['name'];?>
                </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=base_url('verifikasi-1');?>" >
                  <i class="fa fa-user"></i>
                  &nbspProfile
                </a>
                <a class="dropdown-item" href="<?=base_url('auth/logout');?>">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  Logout
                </a>
              </li>  
            <?php else: ?>        
            <li class="nav-item d-none d-sm-block padding-7px-top">
              <a class="nav-link cool-link py-0 pr-3 text-white" href="<?=base_url('login');?>"><img class="ic-menu" src="<?=base_url('assets/images/header-footer/7-login.png');?> " alt="submit" /> Masuk</a>
            </li>
            <li class="nav-item d-none d-sm-block">
              <button type="submit" style="border: 0; background: transparent;">
                <a href="<?=base_url('registration');?>"><img src="<?=base_url('assets/images/header-footer/Daftar-2.png');?> " width="60" height="33" alt="submit" /></a>
              </button>
            </li>
            <?php endif; ?>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link cool-link b-top b-bt text-white" href="<?=base_url();?>"><img class="ic-menu" src="<?=base_url('assets/images/header-footer/1-home.png');?> " alt="submit" /> Beranda</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link cool-link b-bt text-white " href="<?=base_url('kreasi');?>"><img class="ic-menu" src="<?=base_url('assets/images/header-footer/2-kreasi.png');?> " alt="submit" /> Kreasi</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link cool-link b-bt text-white" href="<?=base_url('inspirasi');?>"><img class="ic-menu" src="<?=base_url('assets/images/header-footer/3-inspirasi.png');?> " alt="submit" /> Inspirasi</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link cool-link b-bt text-white" href="<?=base_url('event');?>"><img class="ic-menu" src="<?=base_url('assets/images/header-footer/4-event.png');?> " alt="submit" /> Event</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link cool-link b-bt text-white" href="<?=base_url('promo');?>"><img class="ic-menu" src="<?=base_url('assets/images/header-footer/5-promo.png');?> " alt="submit" /> Promo</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link cool-link b-bt text-white" href="<?=base_url('tentang');?>"><img class="ic-menu" src="<?=base_url('assets/images/header-footer/6-tentang.png');?> " alt="submit" /> Tentang Sahabat Ibu Pintar</a>
            </li>
            <?php if(isset($_SESSION['email_user'])): ?>
              
            <?php else: ?>            
              <li class="nav-item d-md-none padding-10px-bottom d-lg-none d-xl-none">
                <a class="nav-link cool-link text-white" href="<?=base_url('login');?>"><img class="ic-menu" src="<?=base_url('assets/images/header-footer/7-login.png');?> " alt="submit" /> Masuk</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
    