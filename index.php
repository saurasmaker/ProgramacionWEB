<html lang = "es">

    <?php session_start() ?>

    <head>

        <title>INFODEO</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
       

        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/administer_divs.js"></script>
        <script src="js/login_tools.js"></script>
        <script src="js/register_tools.js"></script>

        <!-- Cookies -->
        <link rel="stylesheet" type="text/css" href="css/cookies.css"/>
        <script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
        
    </head>

    <body style = "background-color: lightgray; ">
    
        <div class = "general container" style = "-webkit-box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.75); box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.75); background-color: white; padding:0;">
            
            <?php include("src/header.php");?>
            
            <?php 
            if(isset($_GET["SEARCH_PRODUCT"])){
                $_SESSION["SEARCH_PRODUCT"] = $_GET["SEARCH_PRODUCT"];              
            }
            
            if(isset($_GET["ACTUAL_PAGE"])){
                $_SESSION["ACTUAL_PAGE"] = $_GET["ACTUAL_PAGE"];

                if(isset($_SESSION["ACTUAL_PAGE"]) && $_SESSION["ACTUAL_PAGE"]!=null){                    
                    include("src/".$_SESSION["ACTUAL_PAGE"].".php");
                }
                else{
                    include("src/catalogue.php");
                }
            }
            else{
                include("src/catalogue.php");
            }
            ?>
            <?php include("src/footer.html");?>

            <?php //include("src/cookies.html");?>
    	</div>

    </body>

</html>