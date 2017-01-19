<div class="container">
	<div class="row">
		<div class="column medium-12">		
			<form action="handlers/Instellingen_gebruiker_handler.php" method="POST">
				<h3>Gebruikersnaam wijzigen</h3>
				Huidige gebruikersnaam:<input type="text" name="Gebruikersnaam"><br>
				Nieuwe gebruikersnaam:<input type="text" name="NieuweGebruikersnaam"><br>
				<input type="submit" class="button" value="Opslaan">
			</form>
			<hr>
			<h3>Wachtwoord wijzigen</h3>
			<form action="handlers/Instellingen_wachtwoord_handler.php" method="POST">
				Oud wachtwoord:
				<input type="password" name="CurrentPass"><br>
				Nieuw wachtwoord:<input type="password" name="Password"><br>
				Herhaal nieuw wachtwoord:<input type="password" name="PasswordC"><br>
				<input type="submit" class="button" value="Opslaan" style="margin-bottom:10%;">
			</form>
		</div>
	</div>
</div>