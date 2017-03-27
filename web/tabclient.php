<?php 
	
	$pdo = new PDO('mysql:dbname=Tp2;host=localhost;charset=utf8','root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$statement = $pdo->query("SELECT * FROM client");
	$listecomp = $statement->fetchAll();
	if (isset($_POST['Nom'])) {
		
	
	$statement2 = $pdo->query('SELECT client.id ,
									client.Nom ,
	 								client.Prenom ,
	  								client.DateDeNaissance ,
	  								client.Adresse ,
	  								client.CodePostal ,
	  								client.NumeroTel ,
	  								client.StatutMarital,
	  								StatutMarital.Statut  
	  								FROM client, StatutMarital 
	  								WHERE client.StatutMarital = StatutMarital.id AND client.id ='.$_POST["Nom"]);
	$resultat = $statement2->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>tabclient</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<form action="" method="post">
		<select name="Nom" >
		<?foreach ($listecomp as $key=>$value) :?>
			<option <?="value=".$value->id ?>><?=$value->Nom ?> <?=$value->Prenom?></option>
		<?php endforeach ?>
		</select>
		<button type="submit">Recherce</button>
	</form>


<?php if(isset($resultat)) : ?>
	<table>
	
	<thead>
			<tr>
				<th>id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Date de Naissance</th>
				<th>Adresse</th>
				<th>Numéro de tél</th>
				<th>Statut Marital</th>
				<th>Organisme de crédit</th>
				<th>Montant du crédit</th>
			</tr>
		</thead>
		<tbody>
		
		<tr>
				<td><?= $resultat->id; ?></td>
				<td><?= $resultat->Nom; ?></td>
				<td><?= $resultat->Prenom; ?></td>
				<td><?= $resultat->DateDeNaissance; ?></td>
				<td><?= $resultat->Adresse."<br>".$value->CodePostal ?></td>
				<td><?= $resultat->NumeroTel; ?></td>
				<td><?= $resultat->Statut; ?></td>
			</tr>
	

		</tbody>
</table>

<?php endif ?>

<ul>
	<li>
		<a href="tp2.php">index</a>
	</li>
</ul>

</body>
</html>