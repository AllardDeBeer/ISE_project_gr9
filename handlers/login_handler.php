<?php 
     session_start();

     include '../includes/database_functions.php';
     db_open();

     if(isset($_POST['username'])) {

          $username = $_POST['username'];

          $password = $_POST['password'];

          //$password_hashed = password_hash($password, PASSWORD_DEFAULT, array('cost' => 12));

          $stmt = db_query("SELECT VOORNAAM, ACHTERNAAM, GEBRUIKERSNAAM, WACHTWOORD FROM GEBRUIKER WHERE GEBRUIKERSNAAM = '$username'");
          $result = db_fetchAssoc($stmt);

          if($password == $result['WACHTWOORD']) {
               $_SESSION['username'] = $_POST['username'];
               $_SESSION['firstname'] = $result['VOORNAAM'];
               $_SESSION['surname'] = $result['ACHTERNAAM']
               redirect_to('../beheer_onderzoek.html');
          } else {
               header("Refresh:0; url=C:/Users/Mick/Documents/HAN/ISE/Project/Construction/front_end");
          }
          
     }

     db_close();
?>