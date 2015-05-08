<!DOCTYPE HTML>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="stylesheet" type="text/css" href="../css/homepage2.css">
    </head>
    <?php
    //php Author: Daniel Bentley eeu236 
    ob_start();
    session_start();
    //redirects if the user isn't logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
      #user logged in
    }
    else 
    {
      header('Location: login.html');
    }?>
    <body>
          <div class="companyHeader">
            <img src="../img/GELogo.jpg"> 
          </div>

          <div id='cssmenu'>
            <ul>
              <li><a href='cEnquiry.php'><span>Create</span></a></li>
              <li><a href='viewEnquiry.php'><span>View</span></a></li>
              <li class='last'><a href='#'><span>Help</span></a></li>
           </ul>
          </div>        
    </body>
</html>