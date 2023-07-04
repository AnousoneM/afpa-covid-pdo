<?php include "templates/head.php" ?>

<h1 class="text-center py-5 bg-dark text-white"><i class="bi bi-universal-access"></i> AFPA COVID TRACKER <i class="bi bi-virus"></i></h1>
<h2 class="text-center my-3">Détails des vaccinations par région</h2>



<table class="table table-striped">
    <thead>
        <tr>
            <th>Région ID</th>
            <th>Nom de la région</th>
            <th>Pfizer/BioNTech</th>
            <th>Moderna</th>
            <th>AstraZeneka</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach (CovidVaccin::getVaccinsDetails() as $details) { ?>

            <tr>
                <td><?= $details['dep_code'] ?></td>
                <td><?= $details['name'] ?></td>
                <td><?= $details['PfizerBioNTech'] ?></td>
                <td><?= $details['Moderna'] ?></td>
                <td><?= $details['AstraZeneca'] ?></td>
                <td><?= $details['Total'] ?></td>
            </tr>

        <?php } ?>

    </tbody>
</table>


<a class="btn btn-outline-secondary" href="../index.php">Retour accueil</a>



<?php include "templates/footer.php" ?>