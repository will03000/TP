<?php
$pdo = new PDO('mysql:dbname=Tp1;host=localhost;charset=utf8','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
if (isset($_POST['supp']) && $_POST['supp'] != "") {
	$statement = $pdo->query("DELETE FROM Utilisateur WHERE id=".$_POST['supp']);
}
if (isset($_POST['NomDuService']) && $_POST['NomDuService'] != "") {
	
$NomDuService = $_POST['NomDuService'];

$statement = $pdo->query("SELECT Utilisateur.id,
								Utilisateur.Nom,
 								Utilisateur.Prenom,
 								Utilisateur.DateDeNaissance,
 								Utilisateur.Adresse,
 								Utilisateur.CodePostal,
 								Utilisateur.NumTel,
 								Services.NomDuService 
 								FROM Utilisateur, Services 
 								WHERE Utilisateur.Service = Services.id AND Services.id = ".$_POST['NomDuService']);


$resultat = $statement->fetchAll();
$statement = $pdo->query("SELECT * FROM Services");
$resultat2 = $statement->fetchAll();
}else{
	$pdo = new PDO('mysql:dbname=Tp1;host=localhost;charset=utf8','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$statement = $pdo->query("SELECT Utilisateur.id,Utilisateur.Nom , Utilisateur.Prenom , Utilisateur.DateDeNaissance , Utilisateur.Adresse , Utilisateur.CodePostal , Utilisateur.NumTel , Utilisateur.Service, Services.NomDuService FROM Utilisateur, Services WHERE Utilisateur.Service = Services.id ");
$resultat = $statement->fetchAll();
$statement = $pdo->query("SELECT id , NomDuService FROM Services");
$resultat2 = $statement->fetchAll();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>tp1</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<form method="POST" action="tp1.php">
	<select name="NomDuService">
		<?php foreach ($resultat2 as $key=>$value) :?> 
			<option <?="value=".$value->id ?>><?=$value->NomDuService ?></option>
		<?php endforeach ?>
	</select>
	<button type="submit">OK</button>
</form>	

<form method="POST" action="tp1.php">
	<input type="text" name="supp" placeholder="supprimer Utilisateur avec id">
	<button type="submit">OK</button>
</form>

<table>
	
	<thead>
			<tr>
				<th>id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Date de Naissance</th>
				<th>Adresse</th>
				<th>Numéro de tél</th>
				<th>Service</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach ($resultat as $key=>$value) : ?>
		
		<tr>
				<td><?= $value->id; ?></td>
				<td><?= $value->Nom; ?></td>
				<td><?= $value->Prenom; ?></td>
				<td><?= $value->DateDeNaissance; ?></td>
				<td><?= $value->Adresse."<br>".$value->CodePostal ?></td>
				<td><?= $value->NumTel; ?></td>
				<td><?= $value->NomDuService; ?></td>
			</tr>
	

	<?php endforeach ?>

		</tbody>
</table>

<a href="ajoutUti.php">Ajout d'un utilisateur</a>

	

</body>
</html>