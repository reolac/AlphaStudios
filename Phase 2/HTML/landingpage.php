<!DOCTYPE HTML>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="stylesheet" type="text/css" href="../css/landingpage.css">
    </head>
    <?php 
    ob_start();
    session_start();
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
        <li class='last'><a href='landingpage.php'><span>Home</span></a></li>
        <li class='last'><a href='#'><span>Create</span></a></li>
        <li><a href='#'><span>View</span></a></li>
        <li class='last'><a href='logout.php'><span>Logout</span></a></li>
      <li class='last'><a href='#'><span>Help</span></a></li>
    </ul>
    </div>
    <div id = "buttons">
    <form action="cEnquiry.php">
    <button class="Enquiry "type="submit">Enquiry</button>
    </form>

    <form action="quotesheet.HTML">
    <button class="Quotes" type="submit">Quotes</button>
    </form>

    <form action="cCostingSheet.php">
    <button class="Costing" type="submit">Costing</button>
    </form>

    <form action="cEnquiry.php">
    <button class="Checklist"type="submit">Checklist</button>
    </form>

    <form action="cMaintenanceSpecification.html">
    <button class="maintanence"type="submit">Maintanence</button>
    </form>

    <form action="cOrderRegister.html">
    <button class="order"type="submit">Order</button>
    </form>
    </div>  
  </body>
</html>