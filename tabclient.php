<?php 
	$erreur = [];
	$pdo = new PDO('mysql:dbname=Tp2;host=localhost;charset=utf8','root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
	$statement = $pdo->query("SELECT client.id,client.Nom , client.Prenom , client.DateDeNaissance , client.Adresse , client.CodePostal , client.NumeroTel , client.StatutMarital, StatutMarital.Statut  FROM client, StatutMarital WHERE client.StatutMarital = StatutMarital.id ");
	$resultat = $statement->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>




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
	<?php foreach ($resultat as $key=>$value) : ?>
		
		<tr>
				<td><?= $value->id; ?></td>
				<td><?= $value->Nom; ?></td>
				<td><?= $value->Prenom; ?></td>
				<td><?= $value->DateDeNaissance; ?></td>
				<td><?= $value->Adresse , $value->CodePostal ?></td>
				<td><?= $value->NumeroTel; ?></td>
				<td><?= $value->Statut; ?></td>
			</tr>
	

	<?php endforeach ?>

		</tbody>
</table>




</body>
</html>