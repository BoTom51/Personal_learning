<?php
class Database
{
    private static $dbName = 'shop';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $pdo = null;

    public function __construct()
    {
        // ------------
    }

    public static function connect()
    {
        if (null == self::$pdo) {
            try {
                echo "Connexion ...<br>"; //---------------
                self::$pdo = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erreur connexion ...<br>"; //---------------
                die($e->getMessage());
            }
        }
        return self::$pdo;
    }

    public static function disconnect()
    {
        self::$pdo = null;
        echo "Déconnexion ...<br>"; //---------------
    }

    ////////////////////// TROIS FACONS DE FAIRE UNE REQUETE //////////////////////

    /////////// UTILISATION : FAIRE UNE REQUETE SANS AFFICHAGE DU RESULTAT ///////////
    // Requete et retour du nombre de lignes affectés
    public function myExec($sql)
    {
        self::connect();
        $nblignes = self::$pdo->exec($sql);
        self::disconnect();

        return $nblignes;
    }

    /////////// UTILISATION : AFFICHAGE DU RESULTAT D'UNE REQUETE (SELECT) ///////////
    // Requete et retour du resultat (utilisable en cas de SELECT pour affichage)
    public function myQuery($sql)
    {
        self::connect();
        $pdoStatment = self::$pdo->query($sql);
        self::disconnect();

        return $pdoStatment;
    }

    /////////// UTILISATION : MULTIPLE UTILISATION D'UNE MEME SQL ///////////
    // "prepare" permet de conserver l'sql faite pour la ré-execute aprés avec d'autres valeurs ou non (boucle)
    public function myPrepare($sql)
    {
        self::connect();
        $prep_pdoStatment = self::$pdo->prepare($sql);
        self::disconnect();

        return $prep_pdoStatment; // utilisé par le execute
    }

    // Requete et retour du resultat (utilisable en cas de SELECT pour affichage)
    // le tableau contiendra les valeurs d'une meme colonne ou alors dans l'ordre des colonnes marquées dans l'sql
    public function myExecute($prep_pdoStatment, array $values)
    {
        self::connect();
        $prep_pdoStatment->execute($values);
        self::disconnect();

        return $prep_pdoStatment; // pour affichage si besoin (fetch)
    }
}
