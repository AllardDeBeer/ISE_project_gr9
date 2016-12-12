<?php
include 'database_functions.php';
$q=$_GET["q"];
$p=rtrim(substr($_GET['p'], 2), "]");;
$hint="";
$pinned="";
db_open();
$stmt = db_query("SELECT voornaam, tussenvoegsel, achternaam, gebruiker_id FROM gebruiker");
while($row = db_fetchAssoc($stmt)) {
  $y = array($row['voornaam'], $row['tussenvoegsel'], $row['achternaam'], $row['gebruiker_id']);
  $z = $y[0]." ".$y[1]." ".$y[2]." ".$y[3];
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
db_close();


$response = "";
$pin_ids = array();
$i = 1;
if ($pinned != ""){
  foreach ($pinned as $pin) {
    $response .= "<tr>
                  <td>" . $pin[0] . "</td>
                  <td>" . $pin[1] . "</td>
                  <td>" . $pin[2] . "</td>
                  <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $pin[3] . " onchange=\"managePin(" . $pin[3] . ")\" checked></td>
                </tr>";
    array_push($pin_ids, $pin[3]);
    $i = $i+1;
  }
}
if ($hint=="") {
  $response .="<tr><td>geen suggestie</td><td></td><td></td></tr>";
} else {
  foreach ($hint as $tip) {
    if(!in_array($tip[3], $pin_ids)){
      $response .= "<tr>
                      <td>" . $tip[0] . "</td>
                      <td>" . $tip[1] . "</td>
                      <td>" . $tip[2] . "</td>
                      <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $tip[3] . " onchange=\"managePin(" . $tip[3] . ")\"></td>
                    </tr>";
      $i = $i+1;
    }
  }
}

echo $response;
?> 