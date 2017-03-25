<?php 
	$erreur = [];
	$pdo = new PDO('mysql:dbname=Tp2;host=localhost;charset=utf8','root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$statement = $pdo->query("SELECT id , Organisme , Montant FROM crédit");
	$resultat2 = $statement->fetchAll();

	if (isset($_POST)) {
		
		$donnee = [];
		
		if (isset($_POST['Organisme']) && $_POST['Organisme'] !== ''){
			$donnee['Organisme'] = $_POST['Organisme'];
		}else{
			$erreur[] = 'merci de mettre un Organisme';
		}
		if (isset($_POST['Montant']) && $_POST['Montant'] !== '') {
			$donnee['Montant'] = $_POST['Montant'];
		}else{
			$erreur[] = 'merci de mettre un Montant';
		}
		if (empty($erreur)) {
			
			$statement = $pdo->prepare('INSERT INTO crédit
										SET   Organisme = :Organisme,
											Montant = :Montant
											');
			$statement->execute($donnee);

			$erreur[] = 'le client est bien ajouté';
		}
	 }
	 ?>
	 <!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<ul>
		<?php
		foreach ($erreur as $value) {
			echo "<li>$value</li>";
		}
		?>
	</ul>
	<form method="POST" action="">

		<input type="text" name="Organisme" placeholder="Organisme">
		<input type="text" name="Montant" placeholder="Montant">
		<button type="submit">OK</button>
	</form>

	<ul>
		<li><a href="tp2.php">index</a></li>
	</ul>
	</body>
	</html>
	