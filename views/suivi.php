<?php include "templates/head.php" ?>
<?php include "templates/navbar.php" ?>

<h1>AFPA COVID</h1>
<h2>Suivi des vaccinations par région</h2>

<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Région ID</th>
            <th>Nom de la région</th>
            <th>Total 1ère dose</th>
            <th>Total 2ème dose</th>
        </tr>
    </thead>
    <tbody>


        <?php
        // je boucle sur le tableau $result
        foreach ( Covid::getAllVaccinations() as $row) { ?>
            <tr>
                <td><?= $row['region_id'] ?></td>
                <td><?= $row['region_name'] ?></td>
                <td><?= $row['dose1_total'] ?></td>
                <td><?= $row['dose2_total'] ?></td>
            </tr>

        <?php } ?>

    </tbody>
</table>


<a class="btn btn-outline-secondary" href="../index.php">Retour accueil</a>

<hr>

<?php include "templates/footer.php" ?>