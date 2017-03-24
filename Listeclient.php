<?php 
	$erreur = [];
	$pdo = new PDO('mysql:dbname=Tp2;host=localhost;charset=utf8','root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$statement = $pdo->query("SELECT id , Nom , Prenom FROM client");
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
			</tr>
		</thead>
		<tbody>
	<?php foreach ($resultat as $key=>$value) : ?>
		
		<tr>
				<td><?= $value->id; ?></td>
				<td><?= $value->Nom; ?></td>
				<td><?= $value->Prenom; ?></td>
			</tr>
	

	<?php endforeach ?>

		</tbody>
</table>

</body>
</html>
