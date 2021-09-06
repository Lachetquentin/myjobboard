<?php include 'inc/header.php'; ?>
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <h2 class="page-header"><?php echo $job->job_title; ?> (<?php echo $job->lname; ?>)</h2>
        <small>Posté par <?php echo $job->contact_user; ?> le <?php echo strftime("%A %#d %B %Y à %H:%M", strtotime($job->post_date)); ?></small>
        <hr>
        <p class="lead"><?php echo $job->description; ?></p>
        <ul class="list-group">
            <li class="list-group-item"><strong>Poste:</strong> <?php echo $job->pname; ?></li>
            <li class="list-group-item"><strong>Contrat:</strong> <?php echo $job->cname; ?></li>
            <li class="list-group-item"><strong>Entreprise:</strong> <?php echo $job->company; ?></li>
            <li class="list-group-item"><strong>Salaire:</strong> <?php echo $job->salary; ?></li>
            <li class="list-group-item"><strong>Contact:</strong> <?php echo $job->contact_email; ?></li>
        </ul>
        <br />
        <br />
        <a href="index.php">Retour à l'accueil</a>
        <br />
        <br />
        <div class="well">
            <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-primary my-2">Modifier</a>

            <form style="display:inline;" method="get" action="jobPage.php">
                <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
                <input type="submit" class="btn btn-danger" value="Supprimer">
            </form>
        </div>
    </div>
</section <?php include 'inc/footer.php'; ?>