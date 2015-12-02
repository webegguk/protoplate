<?php
function curPageURL()
{
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .=
            $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    }
    else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
#keeps users from requesting any file they want
$url = curPageURL();
$pagelocation = 'pages/';

$values = parse_url($url);

$path = explode('.',$values['path']);
$path = ltrim($path[0],"/");

$safe_pages = array("matchtech-strategy", "home", "");


if(in_array($path, $safe_pages)) {
    if($path == "" || $path == "home"){
        include($pagelocation."index.php");
    }else{
        include($pagelocation.$path.".php");
    }
} else {
    include("404.php");
}

?>
