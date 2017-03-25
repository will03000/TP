<?php 
	$erreur = [];
	$pdo = new PDO('mysql:dbname=Tp2;host=localhost;charset=utf8','root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$statement = $pdo->query("SELECT id , Statut FROM StatutMarital");
	$resultat2 = $statement->fetchAll();
	
	$statement = $pdo->query("SELECT client.id,client.Nom , client.Prenom , client.DateDeNaissance , client.Adresse , client.CodePostal , client.NumeroTel , client.StatutMarital, StatutMarital.Statut FROM client, StatutMarital WHERE client.StatutMarital = StatutMarital.id ");
	$resultat = $statement->fetchAll();
	if (isset($_POST)) {
		
		$donnee = [];
		
		if (isset($_POST['Nom']) && $_POST['Nom'] !== ''){
			$donnee['Nom'] = $_POST['Nom'];
		}else{
			$erreur[] = 'merci de mettre un nom';
		}
		if (isset($_POST['Prenom']) && $_POST['Prenom'] !== '') {
			$donnee['Prenom'] = $_POST['Prenom'];
		}else{
			$erreur[] = 'merci de mettre un prenom';
		}
		if (isset($_POST['DateDeNaissance'])) {
				$donnee['DateDeNaissance'] = $_POST['DateDeNaissance'];
		}else{
			$erreur[] = 'merci de mettre une date de naissance';
		}
		if (isset($_POST['Adresse'])) {
				$donnee['Adresse'] = $_POST['Adresse'];
		}else{
			$erreur[] = 'Saisissez une adresse';
		}	
		if (isset($_POST['CodePostal'])) {
				$donnee['CodePostal'] = $_POST['CodePostal'];
		}else{
			$erreur[] = 'Saisissez un Code Postal';
		}
		if (isset($_POST['NumeroTel'])) {
				$donnee['NumeroTel'] = $_POST['NumeroTel'];
		}else{
			$erreur[] = 'Saisissez un Numéro de téléphone';
		}
		if (isset($_POST['StatutMarital'])) {
				$donnee['StatutMarital'] = $_POST['StatutMarital'];
		}else{
			$erreur[] = 'Saisissez un StatutMarital';
		}			
			
		if (empty($erreur)) {
			
			$statement = $pdo->prepare('INSERT INTO client 
										SET Nom = :Nom,
											Prenom = :Prenom,
											DateDeNaissance = :DateDeNaissance,
											Adresse = :Adresse,
											CodePostal = :CodePostal,
											NumeroTel = :NumeroTel,
											StatutMarital = :StatutMarital
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

		<input type="text" name="Nom" placeholder="nom">
		<input type="text" name="Prenom" placeholder="prenom">
		<input type="date" name="DateDeNaissance">
		<input type="text" name="Adresse" placeholder="Adresse">
		<input type="text" name="CodePostal" placeholder="CodePostal">
		<input type="text" name="NumeroTel" placeholder="numero de tel">
		<select name="StatutMarital">
			<?php foreach ($resultat2 as $key=>$value) :?> 
				<option <?="value=".$value->id ?>><?=$value->Statut ?></option>
			<?php endforeach ?>
		</select>
		<button type="submit">ok</button>

		
	</form>
<ul>
	<li><a href="AjoutCredit.php">Ajout crédit</a></li>
	<li><a href="Listeclient.php">Liste client</a></li>
	<li><a href="tabclient.php">Détails client</a></li>
</ul>
	

	</body>
	</html>
