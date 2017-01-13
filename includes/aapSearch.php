<?php
session_start();
include 'database_functions.php';
$q=$_GET["q"];
$p=rtrim(substr($_GET['p'], 2), "]");
$hint="";
$pinned="";
$currentResearch=$_SESSION['onderzoek'];
db_open();

$stmt = db_query("SELECT aap_id, geboortedatum, diersoort, geslacht, gewicht, datumgewichtmeting FROM aap
where aap_id not in(select aap_id from aapinonderzoek where onderzoek_id ='$currentResearch ')");

while($row = db_fetchAssoc($stmt)) {
  $y = array($row['aap_id'], $row['geboortedatum'], $row['diersoort'], $row['geslacht'], $row['gewicht'], $row['datumgewichtmeting']);
  $z = $y[0]." ".$y[1]->format('Y-m-d')." ".$y[2]." ".$y[3]." ".$y[4]." ".$y[5]->format('Y-m-d');
  if (strlen($q)>0) {
    if(stristr($z, $q)){
      if($hint=="") {
        $hint = array($y);
      }else{
        array_push($hint, $y);
      }
    }
  }
  if(strlen($p)>0){
    $ps = explode("][", $p);
    foreach ($ps as $pi) {
      if(stristr($z, $pi)){
        if($pinned=="") {
          $pinned = array($y);
        }else{
          array_push($pinned, $y);
        }
      }
    }
    
  }
}
//db_close();


$response = "";
$pin_ids = array();
$i = 1;
if ($pinned != ""){
  foreach ($pinned as $pin) {
    $response .= "<tr>
                  <td>" . $pin[0] . "</td>
                  <td>" . $pin[1]->format('Y-m-d') . "</td>
				  <td>" . $pin[2] . "</td>
                  <td>" . $pin[3]  . "</td>
				  <td>" . $pin[4]  . "</td>
                 <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $pin[0] . " onchange=\"managePin(" . $pin[0] . ")\" checked></td>
                </tr>";
    array_push($pin_ids, $pin[5]);
    $i = $i+1;
  }
}
if ($hint=="") {
  $response .="<tr><td>geen suggestie</td><td></td><td></td></tr>";
} else {
  foreach ($hint as $tip) {
    if(!in_array($tip[5], $pin_ids)){
      $response .= "<tr>
                      <td>" . $tip[0] . "</td>
                      <td>" . $tip[1]->format('Y-m-d') . "</td>
                      <td>" . $tip[2] . "</td>
					  <td>" . $tip[3] . "</td>
					  <td>" . $tip[4] . "</td>
                      <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $tip[0]. " onchange=\"managePin(" . $tip[0] . ")\"></td>
                    </tr>";
      $i = $i+1;
    }
  }
}

echo $response;
?> 