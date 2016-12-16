<?php 
		include "includes/database_functions.php";

		db_open();
		$PROEF_NAAM = "Mick";

		var_dump("SELECT PROEF_ID FROM PROEF WHERE PROEF_NAAM = '$PROEF_NAAM'");
		$stmt = db_query("SELECT PROEF_ID FROM PROEF WHERE PROEF_NAAM = '$PROEF_NAAM'");
		$result = db_fetchAssoc($stmt);
		$proef_id = $result['PROEF_ID'];
		var_dump($proef_id);
		db_close();
	?>