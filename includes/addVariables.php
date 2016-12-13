<?php 

session_start();

$q = $_GET['q'];

if (!isset($_SESSION['vars'])){
	$_SESSION['vars'] = array();
}

array_push($_SESSION['vars'], $q);

$response = "";
foreach ($_SESSION['vars'] as $var) {
	$vars = explode('||', $var);
	$response .= "<tr>
                  <td>" . $vars[0] . "</td>
                  <td>" . $vars[1] . "</td>
                  <td><input type=\"checkbox\" name=\"select\" value=\"4\" onchange=\"\"></td>
                </tr>";	
}

echo $response;

?>