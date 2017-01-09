<?php 
     session_start();

     include '../includes/database_functions.php';
     db_open();

     if(isset($_POST['username'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
	     $password = sha1($password);
          $stmt = db_query("SELECT VOORNAAM, TUSSENVOEGSEL, ACHTERNAAM, GEBRUIKERSNAAM, WACHTWOORD, DATUMLAATSTELOGIN FROM GEBRUIKER WHERE GEBRUIKERSNAAM = '$username'");
          $result = db_fetchAssoc($stmt);
          if($password == $result['WACHTWOORD']) {
               $_SESSION['username'] = $result['GEBRUIKERSNAAM'];
               $_SESSION['firstname'] = $result['VOORNAAM'];
               $_SESSION['insertion'] = $result['TUSSENVOEGSEL'];
               $_SESSION['surname'] = $result['ACHTERNAAM'];
               $_SESSION['last_login'] = date_format($result['DATUMLAATSTELOGIN'], 'd/m/Y H:i:s');

               $stmt = db_query("UPDATE GEBRUIKER SET DATUMLAATSTELOGIN = GETDATE() WHERE GEBRUIKERSNAAM = ".$result['GEBRUIKERSNAAM']);
               header('Location: ../index.php');
          } else {
               header("Refresh:0; ../login.html");
          }
     }

     db_close();
?> 