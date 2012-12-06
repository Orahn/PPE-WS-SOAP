<?php
include('lib/nusoap.php');

$serverpath = 'http://127.0.0.1/WebServiceSOAP/serveur.php';

/* Connexion au web service */
$client = new nusoap_client($serverpath);

/* Appel de la fonction du serveur */
$appel = $client->call('listeGroupes');

/* Affichage de la dernière requête SOAP */
echo $client->request.'<br />';
/* Affichage de la dernière réponse SOAP */
echo $client->response.'<br />';
/* Affichage des dernières données brutes en XML */
echo $client->responseData.'<br />';

/* Boucle sur le call pour récupérer les résultats */
foreach($appel as $groupe){
    echo $groupe['libelle'].'<br />';
}
