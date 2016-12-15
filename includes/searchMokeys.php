<?php
include 'database_functions.php';
$q=$_GET["q"];
$p=rtrim(substr($_GET['p'], 2), "]");;
$hint="";
$pinned="";
db_open();
$stmt = db_query("SELECT aap_id FROM aap");
while($row = db_fetchAssoc($stmt)) {
  $y = array($row['aap_id']);
  $z = $y[0];
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
                  <td></td>
                  <td></td>
                  <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $pin[0] . " onchange=\"managePin(" . $pin[0] . ")\" checked></td>
                </tr>";
    array_push($pin_ids, $pin[0]);
    $i = $i+1;
  }
}
if ($hint=="") {
  $response .="<tr><td>geen suggestie</td><td></td><td></td></tr>";
} else {
  foreach ($hint as $tip) {
    if(!in_array($tip[0], $pin_ids)){
      $response .= "<tr>
                      <td>" . $tip[0] . "</td>
                      <td></td>
                      <td></td>
                      <td><input type=\"checkbox\" name=\"select" . $i . "\" value=" . $tip[0] . " onchange=\"managePin(" . $tip[0] . ")\"></td>
                    </tr>";
      $i = $i+1;
    }
  }
}

echo $response;
?> 