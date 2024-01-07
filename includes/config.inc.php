<?php
session_start();

/*ini_set('display_errors', 1); 
error_reporting(E_ALL);*/

date_default_timezone_set('America/Los_Angeles');
setlocale(LC_MONETARY, 'en_US');

$db_name = "carsmatch";
$db_host="localhost:8888";
$db_user="root";
$db_pass="root";

/*$db_name = "elevensb11_carmatch";
$db_host="sam.carsmatch.com";
$db_user="carmatch";
$db_pass="p&4Auj84";*/


$conn = mysql_connect($db_host,$db_user,$db_pass) or
die ("Couldn't Connect to server");

$db_select = mysql_select_db($db_name,$conn) or 

die ("Couldn't select Databse");
    
mysql_query("SET NAMES 'utf8'") OR die(mysql_error()); 

define("site_url","http://localhost:8888/sam.carsmatch.com/");
//header('Cache-control: private'); 



$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$str_page = pathinfo($parts[count($parts) - 1]);
$ad_page = $str_page['filename'];

$state_lists = array(
			'AL'=>"Alabama",  
			'AK'=>"Alaska",  
			'AZ'=>"Arizona",  
			'AR'=>"Arkansas",  
			'CA'=>"California",  
			'CO'=>"Colorado",  
			'CT'=>"Connecticut",  
			'DE'=>"Delaware",  
			'DC'=>"District Of Columbia",  
			'FL'=>"Florida",  
			'GA'=>"Georgia",  
			'HI'=>"Hawaii",  
			'ID'=>"Idaho",  
			'IL'=>"Illinois",  
			'IN'=>"Indiana",  
			'IA'=>"Iowa",  
			'KS'=>"Kansas",  
			'KY'=>"Kentucky",  
			'LA'=>"Louisiana",  
			'ME'=>"Maine",  
			'MD'=>"Maryland",  
			'MA'=>"Massachusetts",  
			'MI'=>"Michigan",  
			'MN'=>"Minnesota",  
			'MS'=>"Mississippi",  
			'MO'=>"Missouri",  
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio",  
			'OK'=>"Oklahoma",  
			'OR'=>"Oregon",  
			'PA'=>"Pennsylvania",  
			'RI'=>"Rhode Island",  
			'SC'=>"South Carolina",  
			'SD'=>"South Dakota",
			'TN'=>"Tennessee",  
			'TX'=>"Texas",  
			'UT'=>"Utah",  
			'VT'=>"Vermont",  
			'VA'=>"Virginia",  
			'WA'=>"Washington",  
			'WV'=>"West Virginia",  
			'WI'=>"Wisconsin",  
			'WY'=>"Wyoming");
?>

