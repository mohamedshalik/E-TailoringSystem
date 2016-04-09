<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>


<html>
    <head>
<title>Contact Us</title>
        <style>
            body
{
background:url(Img/back.jpg);
background-size:100%;
background-repeat:no-repeat;
background-position:absolute;
background-position-x: auto;
background-position-y: auto;
}
#content
{
width:450px;
height:230px;
background-image:url('Img/content.png');
padding-left:0px;
padding-right:10px;
padding-bottom:0px;
}
        </style>
		
  <!-- Site made with Mobirise Website Builder v1.9.10, # -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v1.9.10, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>E-Tailoring</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
  <link rel="stylesheet" href="assets/mobirise-slider/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  

    </head>
<body >
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="menu-0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <a class="mbr-navbar__brand-link mbr-brand mbr-brand--inline text-white" href="#">
                        <span class="mbr-brand__logo"><img class="mbr-navbar__brand-img mbr-brand__img" alt="" src="assets/images/stock-vector-retro-sewing-machine-vintage-tailor-logo-template-tailor-shop-theme-3009202401491x1425-151.jpg"></span>
                        <span class="mbr-brand__name">Sharmila Tailor</span>
                    </a>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger text-white"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                   <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="index.html#top">HOME</a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="index.html#header3-3">ABOUT US</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="index.html#features1-7">ORDER DETAIL</a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="login.php">LOGIN</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="index.html#bottom">CONTACT</a></li></ul></div>
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
     </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br>
    </br></br>
<div class = "container form-signin">
 
   
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "logintest.php" method = "post">
           <!-- <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>-->
           
            <center>
			   <table border="0" style="color: white;">
                <tbody>
                   <tr>
                     <td style="border-color:#BCD2E6; height:20px;font-size:20pt;font-family: Comic Sans MS, Times, serif;">&nbsp;&nbsp;User Name&nbsp;</td> 

                        <td> <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus style=" height:40px;font-size:14pt;font-family: Comic Sans MS, Times, serif;"></br></td>
                    </tr>

                    <tr>
<br>
                     <td style="border-color:#BCD2E6; height:20px;font-size:20pt;font-family: Comic Sans MS, Times, serif;">&nbsp;&nbsp;Password&nbsp;</td> 

                        <td><input type = "password" class = "form-control"
               name = "password" placeholder = "password " required style=" height:40px;font-size:14pt;font-family: Comic Sans MS, Times, serif;"></td>

                    </tr>

                    

                </tbody>

            </table>
			<br>
			 <button type="submit" name = "login" style="border-color:#BCD2E6;font-size:25px; font-family: Comic Sans MS, Times, serif; font-color: black;" >Login</button>
			</center>
         </form>
			<center style="color: white; font-size:14pt;font-family: Comic Sans MS, Times, serif;"><span style="background-color: rgba(0,0,0,.5);">Click here to If Your Are New User &nbsp;</span><a href= "reg.html"style=" color: blue;font-size:14pt;font-family: Comic Sans MS, Times, serif;"><span style="background-color: rgba(0,0,0,.5);"> Click</span></a></center>
        <!-- Click here to clean <a href = "logout.php" tite = "Logout">Session.-->
         
      </div> 

</body>
</html>