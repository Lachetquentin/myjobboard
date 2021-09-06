<?php include 'inc/header.php'; ?>
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <h3>Vous êtes une entreprise ?</h3>
            <p>
                <a class="btn btn-primary my-2" href="create.php">Cliquez ici pour ajouter une offre d'emploi !</a>
            </p>
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Recherche d'emploi</h1>
                <h1><?php echo $_SESSION['postdate'] ?></h1>

                <form method="GET" action="index.php">

                    <?php // Formulaire qui permet de filtrer les résultats 
                    ?>

                    <select name="profession" class="form-select">
                        <option value="">Veuillez choisir une profession</option>
                        <?php foreach ($professions as $profession) : ?>
                            <option value="<?php echo $profession->id; ?>"><?php echo $profession->name; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <br />

                    <select name="contract" class="form-select">
                        <option value="">Veuillez choisir un type de contrat</option>
                        <?php foreach ($contracts as $contract) : ?>
                            <option value="<?php echo $contract->id; ?>"><?php echo $contract->name; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <br />

                    <select name="location" class="form-select">
                        <option value="">Veuillez choisir un lieu</option>
                        <?php foreach ($locations as $location) : ?>
                            <option value="<?php echo $location->id; ?>"><?php echo $location->name; ?></option>
                        <?php endforeach; ?>
                    </select>


                    <br />

                    <select name="orderby" class="form-select">
                        <option value="0">Du plus récent au plus ancien</option>
                        <option value="1">Du plus ancien au plus récent</option>
                        <option value="2">Alphabétique Descendant</option>
                        <option value="3">Alphabétique Ascendant</option>
                    </select>

                    <br />


                    <input type="submit" class="btn btn-lg btn-success" value="RECHERCHE">
                    <p>
                        <a class="btn btn-primary my-2" href="index.php?page=1">Réinitialiser</a>
                    </p>

                </form>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <h3><?php echo $title; ?></h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach ($jobs as $job) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src='<?php include 'inc/api.php' ?>' width="420" height="400">

                            <div class="card-body">
                                <p class="card-header"><?php echo $job->company; ?></p>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $job->job_title ?></h4>
                                    <p class="card-text"><?php echo substr($job->description, 0, 30); ?></p>
                                    <p class="card-text">Posté le <?php echo strftime("%A %#d %B %Y à %H:%M", strtotime($job->post_date)); ?></p>
                                    <p class="card-text">Référence de l'offre : n°<?php echo $job->id; ?></p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="jobPage.php?id=<?php echo $job->id; ?>">Voir</a>
                                    </div>
                                    <small class="text-muted"><?php echo $job->pname; ?></small>
                                    <small class="text-muted"><?php echo $job->cname; ?></small>
                                    <small class="text-muted"><?php echo $job->lname; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <section class="py-5 text-center container">

        <div class="col-lg-6 col-md-8 mx-auto">

            <div>
                <ul class="pagination pagination-lg">

                    <?php if ($_SESSION['total_pages'] / $_SESSION['parPage'] < 1.1) : ?>
                    <?php else : ?>
                        <?php for ($i = 1; $i <= ceil($_SESSION['total_pages'] / $_SESSION['parPage']); $i++) : ?>
                            <a class="page-link" href="index.php?page=<?php echo $i; ?>&profession=<?php echo $_SESSION['profession'] ?>&contract=<?php echo $_SESSION['contract'] ?>&location=<?php echo $_SESSION['location'] ?>&orderby=<?php echo $_SESSION['orderby'] ?>"><?php echo $i; ?></a>
                        <?php endfor; ?>
                    <?php endif; ?>

                </ul>
            </div>

        </div>
    </section>

</main>

<?php include 'inc/footer.php'; ?>