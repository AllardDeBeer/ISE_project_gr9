<div class="container">
	<div class="row">
		<div class="column large-12">
			<h3>Gebruikersnaam wijzigen</h3>
				Gebruikersnaam:<input type="text" name="Gebruikersnaam"><br>
				<input type="submit" class="button" value="Submit">
			</form>
			
			<hr>
			
			<h3>Wachtwoord wijzigen</h3>
			<form action="handlers/nieuwWachtwoordHandler.php" method="post"">
				Oud wachtwoord
				<input type="password" name="currentPass"><br>
				Nieuw wachtwoord:<input type="password" name="Password"><br>
				Herhaal nieuw wachtwoord<input type="password" name="PasswordC"><br>
				<input type="submit" class="button" value="Submit">
			</form>
		</div>
	</div>
</div>