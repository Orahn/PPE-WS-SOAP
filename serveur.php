<?php
include('lib/nusoap.php');
include('connexion.php');

/* Création du serveur soap */
$serveur = new soap_server;
/* Enregistrement de la méthode listeGroupes dans le WSDL */
$serveur->register('listeGroupes',array(),array('Groupe'=>'tns:GroupeArray'));

/**
 * Retourne la liste des groupes
 * @return type
 */
function listeGroupes(){
    $groupes = array();
    $connexion = new Connexion();
    $query = 'SELECT * FROM GROUPE';
    $result = $connexion->query($query);
    foreach($result as $row){
        $groupes[] = array('id'=>$row['id'],'libelle'=>$row['libelle'],'nombre'=>$row['nombre']);
    }
    return $groupes;
}

/* Méthode de renvoi des données */
$serveur->service($HTTP_RAW_POST_DATA);