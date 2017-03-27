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
	<title>liste client</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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

<ul>
	<li>
		<a href="tp2.php">index</a>
	</li>
</ul>

</body>
</html>
