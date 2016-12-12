<?php 
     session_start();

     include '../includes/database_functions.php';
     db_open();

     if(isset($_POST['username'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];

          $stmt = db_query("SELECT VOORNAAM, ACHTERNAAM, GEBRUIKERSNAAM, WACHTWOORD FROM GEBRUIKER WHERE GEBRUIKERSNAAM = '$username'");
          $result = db_fetchAssoc($stmt);

          if($password == $result['WACHTWOORD']) {
               $_SESSION['username'] = $result['GEBRUIKERSNAAM'];
               $_SESSION['firstname'] = $result['VOORNAAM'];
               $_SESSION['surname'] = $result['ACHTERNAAM'];
               header('Location: ../containers/beheer_onderzoek.php');
          } else {
               header("Refresh:0; ../login.html");
          }
          
     }

     db_close();
?> 