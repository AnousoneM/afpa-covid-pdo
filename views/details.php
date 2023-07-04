<?php include "templates/head.php" ?>

<a class="h1 text-center py-5 bg-dark text-white text-decoration-none" href="../index.php"><i class="bi bi-universal-access"></i> AFPA COVID TRACKER <i class="bi bi-virus"></i></a>
<h2 class="text-center my-3">Détails des vaccinations par région</h2>

<div class="row justify-content-center mx-0">
    <div class="col-lg-8 py-3 shadow border">

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

                <?php
                // je boucle sur le tableau que je récupère de la méthode statique getVaccinsDetails() de la classe CovidVaccin
                foreach (CovidVaccin::getVaccinsDetails() as $details) { ?>

                    <tr>
                        <!-- echo court pour afficher les données -->
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

    </div>
</div>

<div class="row justify-content-center mx-0">
    <a class="btn btn-outline-secondary col-lg-2 col-11 my-4" href="../index.php">Retour accueil</a>
</div>

<?php include "templates/footer.php" ?>