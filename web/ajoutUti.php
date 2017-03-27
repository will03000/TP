	<?php 
	$erreur = [];
	$pdo = new PDO('mysql:dbname=Tp1;host=localhost;charset=utf8','root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$statement = $pdo->query("SELECT id , NomDuService FROM Services");
	$resultat2 = $statement->fetchAll();
	$statement = $pdo->query("SELECT Utilisateur.id,Utilisateur.Nom , Utilisateur.Prenom , Utilisateur.DateDeNaissance , Utilisateur.Adresse , Utilisateur.CodePostal , Utilisateur.NumTel , Utilisateur.Service, Services.NomDuService FROM Utilisateur, Services WHERE Utilisateur.Service = Services.id ");
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
		if (isset($_POST['NumTel'])) {
				$donnee['NumTel'] = $_POST['NumTel'];
		}else{
			$erreur[] = 'Saisissez un Numéro de téléphone';
		}
		if (isset($_POST['Service'])) {
				$donnee['Service'] = $_POST['Service'];
		}else{
			$erreur[] = 'Saisissez un Service';
		}			
			
		if (empty($erreur)) {
			
			$statement = $pdo->prepare('INSERT INTO Utilisateur 
										SET Nom = :Nom,
											Prenom = :Prenom,
											DateDeNaissance = :DateDeNaissance,
											Adresse = :Adresse,
											CodePostal = :CodePostal,
											NumTel = :NumTel,
											Service = :Service
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
		<input type="text" name="NumTel" placeholder="numero de tel">
		<select name="Service">
			<?php foreach ($resultat2 as $key=>$value) :?> 
				<option <?="value=".$value->id ?>><?=$value->NomDuService ?></option>
			<?php endforeach ?>
		</select>
		<button type="submit">ok</button>

		
	</form>

	<a href="tp1.php">Retour au tableau des utilisateurs</a>

	</body>
	</html>
