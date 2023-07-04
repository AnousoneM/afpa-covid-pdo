<?php

class Covid
{
    // détermine les attributs de la classe qui correspondent aux colonnes de la table covid
    private int $id;
    private string $id_region;
    private string $jour;
    private int $n_dose1;
    private int $n_dose2;
    private int $n_cum_dose1;
    private int $n_cum_dose2;
    private float $couv_dose1;
    private float $couv_dose2;

    /**
     * Fonction permettant de récupérer toutes les vaccinations
     * return array
     */
    function getAllVaccinations(): array
    {
        // informations de connexion à la base de données
        $host = 'localhost';
        $db = 'exos-afpa';
        $user = 'covid';
        $password = 'covid';

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            // création d'une instannce de la classe PDO
            $pdo = new PDO($dsn, $user, $password);
            if ($pdo) {
                echo "Connected to the $db database successfully!";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        // requête SQL pour récupérer toutes les vaccinations
        $sql = "
            SELECT `id_region` AS 'region_id', `name` AS 'region_name', MAX(`n_cum_dose1`) AS 'dose1_total', MAX(`n_cum_dose2`) AS 'dose2_total' FROM `lpecom_covid`
            INNER JOIN `lpecom_departments` ON `lpecom_covid`.`id_region` = `lpecom_departments`.`code`
            GROUP BY `name`
        ";
        
        $pdo_statement = $pdo->query($sql);
        $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;


    }
}
