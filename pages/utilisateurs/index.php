<?php



$utilisateurs = App::getinstance()->getTable('Utilisateur')->allWithService();

$services = App::getinstance()->getTable('Service')->all();


?>

<h2 style="text-align: center;">Liste de tout les utilisateurs</h2>

<form class="form-inline" action="index.php?p=utilisateurs.service" method="POST">
	<select class="form-control" name="id" >
		<?php foreach ($services as $service): ?>
			<option value="<?= $service->id?>"><?=$service->nom_du_service ?></option>
		<?php endforeach ?>
	</select>
	<button class="btn btn-primary" type="submit">OK</button>
</form>

<table class="table table-striped" style="margin-top: 50px;">
	<thead>
		<tr>
			<th>NOM Prénom</th>
			<th>Âge</th>
			<th>Adresse complète</th>
			<th>Téléphone</th>
			<th>Service</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($utilisateurs as $utilisateur): ?>
		<tr>
			<td><?=$utilisateur->civilite ?></td>
			<td><?=$utilisateur->age ?></td>
			<td><?=$utilisateur->adressecomplete ?></td>
			<td><?=$utilisateur->numero_de_telephone ?></td>
			<td><?=$utilisateur->service ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>