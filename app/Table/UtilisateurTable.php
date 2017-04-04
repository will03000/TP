<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class UtilisateurTable extends Table
{
	public function allWithService()
	{
		return $this->query("SELECT utilisateurs.id,
									utilisateurs.nom,
									utilisateurs.prenom,
									utilisateurs.date_de_naissance,
									utilisateurs.numero_de_telephone,
									utilisateurs.adresse,
									utilisateurs.code_postal,
									services.nom_du_service as service
							FROM utilisateurs
							LEFT JOIN services
							ON services_id = services.id
							");
	}
	public function allByService($id)
	{
		return $this->query("SELECT utilisateurs.id,
									utilisateurs.nom,
									utilisateurs.prenom,
									utilisateurs.date_de_naissance,
									utilisateurs.numero_de_telephone,
									utilisateurs.adresse,
									utilisateurs.code_postal,
									services.nom_du_service as service
							FROM utilisateurs
							LEFT JOIN services
							ON services_id = services.id
							WHERE services_id = ?"
							, [$id]);
	}

}
