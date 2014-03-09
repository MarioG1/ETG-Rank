<?php

#####################################################
# PermissionsExGui CraftBukkit plugin
#
# Author: NINJ4
# Contributor: Pirmax
# Version: 1.0
# Help: http://pirmax.github.com/PermissionsExGUI/
#####################################################

global $wipeX_User;
$wipeX_User = $_SERVER['REMOTE_ADDR'];

function wipex_check_security()
{

    if(!isset($_SESSION['loginin']) OR empty($_SESSION['loginin']))
    {
        if(!empty($_POST) AND !empty($_POST['login']) AND !empty($_POST['password']) AND ($_POST['login'] == SIMPLE_LOGIN AND $_POST['password'] == SIMPLE_PASSWORD))
        {
            $_SESSION['loginin'] = time();
            header("Location: index.php");
            exit;
        }

		echo 'You must login before to manage permissions.<br /><br />';
		echo '<form method="post" action="index.php">Login ID:<br /><input name="login" type="text" value="" /><br />Password:<br /><input name="password" type="password" value="" /><br /><input name="submit" type="submit" value="Submit" /></form>';

		return false;
    }
    else
    {

        if (!empty($_SESSION['loginin']))
        {
            return true;
        }

    }

	return false;

}
function wipeX_header() {
	echo '
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-gb" xml:lang="en-gb">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta http-equiv="content-language" content="en-gb" />
		<meta name="resource-type" content="document" />
		<meta name="distribution" content="global" />
		<title>wipeX &bull; Web Interface for PermissionsEX by NINJ4</title>
	</head>
	<body>
	';
}
function wipeX_footer() {
	echo '
	</body>
</html>
	';
}

?>
