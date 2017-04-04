<?php
namespace App\Entity;
use Core\Entity\Entity;

/**
* 
*/
class UtilisateurEntity extends Entity
{
	public function getCivilite()
	{
	 return strtoupper($this->nom).', '.ucfirst($this->prenom);
	}

	public function getAge()
	{
		return (int)((time()-strtotime($this->date_de_naissance))/(60*60*24*364)).' ans';
	}

	public function getAdresseComplete()
	{
		return $this->adresse.' cp: '.$this->code_postal;
	}
}