<!DOCTYPE html>
<html lang="en">
<head>
<title>STAGE 2 NOW TESTING PROXIES - EXTREME PROXY HARVESTER AND CHECKER - ANONYMOUS PROXY HARVESTER AND CHECKER ALL IN ONE BY JEFF CHILDERS Chesapeake Virginia</title>
<meta name="description" content="STAGE 2 NOW TESTING PROXIES, EXTREME PROXY HARVESTER AND CHECKER - ANONYMOUS PROXY HARVESTER AND CHECKER ALL IN ONE BY PHP NINJA JEFF CHILDERS Chesapeake Virginia">
<meta name="author" content="Troy Jeffrey Childers Chesapeake Virginia 757-266-9111">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body> 
<h1>TESTING FOR ANONYMOUS PROXIES</h1> 
<?php

// EXTREME PROXY HARVESTER AND CHECKER
// CREATED WITH CURL AND PHP
// BY PHP NINJA JEFF CHILDERS


//STAGE 2 PROXY TESTING


//Start

//Settings
error_reporting(0);
ini_set('max_execution_time', 259200);
set_time_limit(0);
ob_implicit_flush(true);
//All Proxies Saved File
$leeched_proxies = "leeched/leeched_proxies.txt";  
//All Good Proxies Are Saved Here 
$success = "goodproxies/success.txt"; 


//NOW TESTING PROXIES

{
ob_start();
if(!is_file($leeched_proxies)) die ('Proxy file not available'); 
$proxies = file($leeched_proxies);  
for($p=0; $p<count($proxies);$p++) {  
    $ch = curl_init();  
                                     //CHANGE TO YOUR DOMAIN HERE
    curl_setopt ($ch, CURLOPT_URL, "http://www.mydomain.com/proxy_judge.php"); 
    curl_setopt($ch, CURLOPT_HEADER, 1); //show headers 
    curl_setopt($ch, CURLOPT_HTTPGET,1); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_HEADER, FALSE);  
    curl_setopt($ch, CURLOPT_VERBOSE, TRUE); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
    curl_setopt($ch, CURLOPT_PROXY, trim($proxies[$p]));  
    $data = curl_exec($ch); 
if (strpos($data, 'Anonymous') !== false) { 
echo   "<img src=\"images/good.png\">&nbsp;&nbsp;<font color=\"#7CFC00\"><strong>" .$proxies[$p] . " </font></strong><font color=\"#FFFFE0\"><strong>   THIS IS A WORKING ANONYMOUS PROXY SAVED TO /goodproxies/success.txt</font></strong><font color=\"yellow\"><strong> " . "Total time: " .curl_getinfo($ch, CURLINFO_TOTAL_TIME)." seconds!</font></strong><img src=\"images/small.png\"> <br/><br/>"; 
$f=fopen($success, "a"); 
fwrite($f, $proxies[$p]); 
fclose($f); 
} 
elseif (curl_errno($ch)) {
echo "<img src=\"images/bad.png\">&nbsp;&nbsp;<font color=\"white\"><strong>" .$proxies[$p] . " </font></strong><font color=\"red\"><strong>ERROR:</font></strong><font color=\"#00FFFF\"><strong> ".curl_error($ch)." </font></strong><img src=\"images/redx.png\"> <br/><br/>";
}else{ 
echo "<img src=\"images/warning.png\">&nbsp;&nbsp;<font color=\"#7CFC00\"><strong> " .$proxies[$p] . "   </font></strong><font color=\"white\"><strong> THERE WAS NO ERROR CONNECTING BUT THIS PROXY IS NOT ANONYMOUS!  NOT SAVED</font></strong> <font color=\"#FF69B4\"><strong>(No content from source)</font></strong><img src=\"images/redx.png\"> <br/><br/>"; 
} 
curl_close($ch);
ob_flush();
flush();         
} 
}  
ob_end_clean(); 


$done = "FINISHED TESTING PROXIES!  ALL GOOD PROXIES SAVED IN  goodproxies/success.txt<br>  DONE!"; 
file_put_contents("$leeched_proxies", "");
echo $done;

//FINISHED TESTING PROXIES


// EXTREME PROXY HARVESTER AND CHECKER
// CREATED WITH CURL AND PHP
// BY PHP NINJA JEFF CHILDERS



?>




</body></html>

