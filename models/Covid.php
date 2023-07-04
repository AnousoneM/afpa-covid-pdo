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
     * Fonction statique nous permettant de récupérer toutes les vaccinations
     * @return array Tableau associatif contenant toutes les vaccinations
     */
    public static function getAllVaccinations(): array
    {
        // j'appelle la méthode getInstancePDO() de la classe Database
        $pdo = Database::getInstancePDO();

        // requête SQL pour récupérer toutes les vaccinations
        $sql = "SELECT `id_region` AS 'region_id', `name` AS 'region_name', MAX(`n_cum_dose1`) AS 'dose1_total', MAX(`n_cum_dose2`) AS 'dose2_total' FROM `lpecom_covid`
            INNER JOIN `lpecom_departments` ON `lpecom_covid`.`id_region` = `lpecom_departments`.`code`
            GROUP BY `name`";
        
        $pdo_statement = $pdo->query($sql);
        $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;


    }
}
