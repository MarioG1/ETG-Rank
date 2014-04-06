<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ETG Minecraft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <script src="./bootstrap/js/jquery.js" type="text/javascript"></script>
    
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="bootstrap/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="bootstrap/ico/favicon.png">
  </head>

<!-- Include necessary files -->

<?php
  $time_start = microtime(true);
  
  
  //include all needed class files
  set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__DIR__));
  function __autoload($class_name) {
    include './incl/class/' . $class_name . '.class.php';
 }
  
  session_start();
  //session_unset();
  $server = new server();
  $config = new config();
  
  if (isset($_SESSION['Player'])){
       $player = unserialize($_SESSION['Player']);
  }
    else {
      $player = new player();  
    }
        
  
  // Include all necessary files
  include'incl/functions.php';
  
 
  if (isset($_POST["ben"]) AND isset($_POST["password"]))
   {
   $login = $player->do_login($_POST["ben"],$_POST["password"]);
   header("Location: index.php?login=1");
   }

   if (isset($_POST["logout"]))
   {
    $logout = $player->logout();
   }

   if (!isset($_GET["page"])) $page = 'home';
   else $page = $_GET["page"];
   
   if (!isset($_GET["id"])) $id = '0';
   else $id = $_GET["id"];
   

  //Set selected page to active

        switch($page)
        {
          case "stats":
          case "architect":
          case "banker":
          case "donator":
          case "warrior":
          case "voyager":
          case "dwarf":
          case "don":
          case "voter":
                 $active_stats = 'class="active"';
                 $active_password=$active_pers=$active_pers=$active_home="";
                 break;
          case "password":
                 $active_password = 'class="active"';
                 $active_stats=$active_pers=$active_pers=$active_home="";
                 break;
          case "perms":
          case "password":
          case "ban_history":
          case "setemail":
                 $active_password=$active_pers=$active_stats=$active_home=$active_pers="";
                 break;
          default:
                $active_home = 'class="active"';
                $active_password=$active_pers=$active_pers=$active_stats="";
                 break;
          }
     ?>

  <body>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-42931223-1']);
  _gaq.push(['_setDomainName', 'etg-clan.at']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="http://www.etg-clan.at/">ETG Minecraft</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <?php echo "<li $active_home >" ?><a href="?page=home">Home</a></li>
              <?php echo "<li $active_stats >" ?><a href="?page=stats">Rank Selection</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">User Area<b class="caret"></b></a>
                <ul la class="dropdown-menu">
                  <li><a href="?page=password">Password Mangagement</a></li>
                  <li><a href="?page=ban_history">Ban History</a></li>
                  <?php
                  echo '<li><a href="http://stats.etg-clan.at/index.php?page=player&id='.$player->get_uuid().'">Stats</a></li>';
                  ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Moderator Area<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?page=mod_perms">Permissions Manager</a></li>
                  <li><a href="?page=mod_manage_group">Player Manager</a></a></li>
                  <li><a href="?page=ban_guidelines">Ban Guidelines</a></li>
                  <li><a href="?page=purge">Purge Accounts</a></li>
                </ul>
              </li>
            </ul>
<?php
   if ($player->is_loggedin())
    {
     echo '<ul class="nav pull-right"><li>';
     echo '<a href="?page=stats"><b><img src="';
     echo get_face($player->name());
     echo '"width="20" height="20"></img>&nbsp;';
     echo $player->name();
     echo '</b></a></li><li><form class="navbar-form pull-right" method="POST"><button type="submit" class="btn" name = "logout">Log Out</button></form></li></ul>';
     }
   else
     {
     echo'<form class="navbar-form pull-right" method="POST">';
     echo'<input class="span2" type="text" placeholder="Minecraft Name" name="ben">&nbsp;';
     echo'<input class="span2" type="password" placeholder="Server Password" name="password">&nbsp;';
     echo'<button type="submit" class="btn">Sign in</button></form>';
     }
?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

 <!-- Check if logout was pressed -->

 <?php
  if (isset($_POST["logout"]))
   {
    if($logout)
    {
     echo'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> Sucessfully logged out ! </div>';
    }
    else
    {
     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> An error occurred durin log out! </div>';
    }
   }
 ?>

 <!-- Check for falid password -->

 <?php
 
 if(isset($_GET["login"]))
 {
  if(($_GET["login"] == 1))
  {
   if($player->is_loggedin())
   {
    echo'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> Sucessfully logged in ! </div>';
   }
   else
   {
    echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Username or Password incorrect! </div>';
   }
   }
  }
 ?>

 <!-- Render selected page -->

     <?php
        $player->has_emain(); //Checks if the player has an E-Mail
        switch($page)
        {
          case "home":
                 include 'pages/home.php';
                 break;
          case "stats":
                 include $player->has_access('pages/stats.php');
                 break;
          case "password":
                 include $player->has_access('pages/password.php');
                 break;
          case "mod_perms":
                 include $player->has_access('pages/mod_permission_manager.php');
                 break;
          case "ban_guidelines":
                 include $player->has_access('pages/ban_guidelines.php');
                 break;
          case "mod_manage_group":
                 include $player->has_access('pages/mod_manage_group.php');
                 break;
          case "purge":
                 include $player->has_access('pages/owner_purge.php');
                 break;
          case "ban_history":
                 include $player->has_access('pages/ban_history.php');
                 break;
          case "banker":
                 if(is_file($player->has_access('pages/ranks/banker/banker'.$id.'.php'))) include $player->has_access('pages/ranks/banker/banker'.$id.'.php');
                 else{
                     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                     include 'pages/home.php';
                 }
                 break;
          case "warrior":
                 if(is_file($player->has_access('pages/ranks/warrior/warrior'.$id.'.php'))) include $player->has_access('pages/ranks/warrior/warrior'.$id.'.php');
                 else{
                     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                     include 'pages/home.php';
                 }
                 break;
          case "dwarf":
                 if(is_file($player->has_access('pages/ranks/dwarf/dwarf'.$id.'.php'))) include $player->has_access('pages/ranks/dwarf/dwarf'.$id.'.php');
                 else{
                     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                     include 'pages/home.php';
                 }
                 break;
          case "voyager":
                 if(is_file($player->has_access('pages/ranks/voyager/voyager'.$id.'.php'))) include $player->has_access('pages/ranks/voyager/voyager'.$id.'.php');
                 else{
                     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                     include 'pages/home.php';
                 }
                 break;
          case "donator":
                 if(is_file($player->has_access('pages/ranks/donator/donator'.$id.'.php'))) include $player->has_access('pages/ranks/donator/donator'.$id.'.php');
                 else{
                     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                     include 'pages/home.php';
                 }
                 break;
          case "architect":
                 if(is_file($player->has_access('pages/ranks/architect/architect'.$id.'.php'))) include $player->has_access('pages/ranks/architect/architect'.$id.'.php');
                 else{
                     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                     include 'pages/home.php';
                 }
                 break;
          case "don":
                 if(is_file($player->has_access('pages/ranks/don/don.php'))) include $player->has_access('pages/ranks/don/don.php');
                 else{
                     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                     include 'pages/home.php';
                 }
                 break;
          case "voter":
                 if(is_file($player->has_access('pages/ranks/vote/vote.php'))) include $player->has_access('pages/ranks/vote/vote.php');
                 else{
                     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                     include 'pages/home.php';
                 }
                 break;
          case "setemail":
                 include $player->has_access('pages/setemail.php');
                 break;
          default:          
                 echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Requestet page not found! </div>';
                 include 'pages/home.php';
                 break;
          }
     ?>

      <footer>
        <p>&copy; ETG-Clan 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script>

    <script>
         $(function ()
         { $("#more_banker").popover({delay: { show: 100, hide: 3000}});
         })
         $(function ()
         { $("#more_warrior").popover({delay: { show: 100, hide: 3000}});
         });
        $(function ()
         { $("#more_dwarf").popover({delay: { show: 100, hide: 3000}});
         });
        $(function ()
         { $("#more_voyager").popover({delay: { show: 100, hide: 3000}});
         });
        $(function ()
         { $("#more_bonator").popover({delay: { show: 100, hide: 3000}});
         });
        $(function ()
         { $("#more_architect").popover({delay: { show: 100, hide: 3000}});
         });
     </script>
    
    <?php
    $_SESSION['Player'] = serialize($player);
    if($server->get_debug()){
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    echo "Exectuion Time: $time";
    }
    ?>
    </br>
  </body>
</html>