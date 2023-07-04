<?php include "templates/head.php" ?>

<a class="h1 text-center py-5 bg-dark text-white text-decoration-none" href="../index.php"><i class="bi bi-universal-access"></i> AFPA COVID TRACKER <i class="bi bi-virus"></i></a>
<h2 class="text-center my-3">Suivi des vaccinations par région</h2>

<div class="row justify-content-center mx-0">
    <div class="col-lg-8 py-3 border shadow">

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
                // je boucle sur le tableau que je récupère de la méthode statique getAllVaccinations() de la classe Covid
                foreach (Covid::getAllVaccinations() as $row) { ?>
                    <tr>
                        <!-- echo court pour afficher les données -->
                        <td><?= $row['region_id'] ?></td>
                        <td><?= $row['region_name'] ?></td>
                        <td><?= $row['dose1_total'] ?></td>
                        <td><?= $row['dose2_total'] ?></td>
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