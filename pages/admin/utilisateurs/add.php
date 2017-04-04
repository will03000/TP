<?php
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_de_naissance']) && isset($_POST['adresse']) && isset($_POST['code_postal']) && isset($_POST['numero_de_telephone']) && isset($_POST['services_id'])) {
	
	App::getInstance()->getTable('utilisateur')->create([
		'nom'=> $_POST['nom'],
		'prenom'=> $_POST['prenom'],
		'date_de_naissance'=>$_POST['date_de_naissance'],
		'adresse'=>$_POST['adresse'],
		'code_postal'=>$_POST['code_postal'],
		'numero_de_telephone'=>$_POST['numero_de_telephone'],
		'services_id'=>$_POST['services_id']
		]);
	header('location: admin.php?p=utilisateurs');
}
?>
<form action="admin.php?p=utilisateurs.add" method="POST" class="form-group">
	<input type="text" name="nom" placeholder="nom" class="form-control">
	<input type="text" name="prenom" placeholder="prénom" class="form-control">
	<input type="date" name="date_de_naissance" placeholder="date_de_naissance" class="form-control">
	<input type="text" name="adresse" placeholder="adresse" class="form-control">
	<input type="text" name="code_postal" placeholder="code_postal" class="form-control">
	<input type="text" name="numero_de_telephone" placeholder="numero_de_telephone" class="form-control">
	<select name="services_id"  class="form-control">
		<?php foreach (App::getInstance()->getTable('service')->all() as $value) : ?>
			<option value="<?=$value->id?>"><?=$value->nom_du_service?></option>
		<?php endforeach ?>
	</select>
	<button type="submit" class="btn btn-success">Envoyer</button>
</form>