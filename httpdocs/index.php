<?php

// function to get the current url in a reliable way
function curPageURL(){
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    }else{
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

// process url to get route section and setup template locations
$url = curPageURL();
$pages = 'pages/';
$values = parse_url($url);
$path = explode('.',$values['path']);
$path = ltrim($path[0],"/");

// test for existence of template that correlates with route and deal with request
if(file_exists($pages.$path.".php")) {
    include($pages.$path.".php");
}elseif($path == "" || $path == "home"){
    include($pages."home.php");
}else{
    include($pages."404.php");
}

?>
