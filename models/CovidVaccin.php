<?php

class CovidVaccin
{
    // Les attributs de la classe correspondent aux colonnes de la table covidVaccin
    private int $id;
    private string $dep_code;
    private int $vaccin;
    private string $jour;
    private int $n_dose1;
    private int $n_dose2;
    private int $n_cum_dose1;
    private int $n_cum_dose2;

    /**
     * Fonction statique nous permettant de récupérer le détail des vaccinations : dpt, détail dose1 par vaccin, total dose 1
     * @return array Tableau associatif contenant tous les détails des vaccinations
     */
    public static function getVaccinsDetails(): array
    {
        // j'appelle la méthode getInstancePDO() de la classe Database
        $pdo = Database::getInstancePDO();

        // requête SQL pour récupérer toutes les vaccinations
        $sql = "SELECT `dep_code`,`name`,
        SUM(CASE
        WHEN nom = 'AstraZeneka' THEN `n_dose1` ELSE 0 END
        ) AS AstraZeneca,
        SUM(CASE
        WHEN nom = 'COMIRNATY Pfizer/BioNTech' THEN `n_dose1` ELSE 0 END
        ) AS PfizerBioNTech,
        SUM(CASE
        WHEN nom = 'Moderna' THEN `n_dose1` ELSE 0 END
        ) AS Moderna,
        SUM(CASE
        WHEN nom = 'Tous vaccins' THEN `n_dose1` ELSE 0 END
        ) AS Total
        FROM `lpecom_covid_vaccin`
        INNER JOIN `lpecom_departments` ON `lpecom_covid_vaccin`.`dep_code` = `lpecom_departments`.`code`
        INNER JOIN `lpecom_covid_vaccin_type` ON `lpecom_covid_vaccin`.`vaccin` = `lpecom_covid_vaccin_type`.`id`
        GROUP BY `dep_code`";

        // nous utilisons la méthode query() de l'objet PDO pour exécuter notre requête SQL
        $pdo_statement = $pdo->query($sql);
        // nous utilisons la méthode fetchAll() de l'objet PDOStatement pour récupérer le résultat de la requête sous forme de tableau associatif
        $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
