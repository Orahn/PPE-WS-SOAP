<?php
include('params/params_bdd.php');
/**
 * Description of class_connexion
 *
 * @author usig
 */
class Connexion extends PDO {

    function __construct() {
        $dsn = Params_BDD::DSN;
        $user = Params_BDD::USER;
        $password = Params_BDD::PASSWORD;

        try {
            parent::__construct($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        $this->exec('SET NAMES \'utf8\'');
    }

}