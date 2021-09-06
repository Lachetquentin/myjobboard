<?php include 'inc/header.php'; ?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h2 class="page-header">Création d'offre</h2>
            <form method="get" action="create.php">
                <div class="form-group">
                    <label>Entreprise</label>
                    <input type="text" class="form-control" name="company" required>
                </div>
                <div class="form-group">
                    <label>Profession</label>
                    <select class="form-control" name="profession" required>
                        <option value="">Veuillez choisir une profession</option>
                        <?php foreach ($professions as $profession) : ?>
                            <option value="<?php echo $profession->id; ?>"><?php echo $profession->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contrat</label>
                    <select class="form-control" name="contract" required>
                        <option value="">Veuillez choisir un type de contrat</option>
                        <?php foreach ($contracts as $contract) : ?>
                            <option value="<?php echo $contract->id; ?>"><?php echo $contract->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Lieu</label>
                    <select class="form-control" name="location" required>
                        <option value="">Veuillez choisir un lieu</option>
                        <?php foreach ($locations as $location) : ?>
                            <option value="<?php echo $location->id; ?>"><?php echo $location->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Titre de l'offre</label>
                    <input type="text" class="form-control" name="job_title" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Salaire</label>
                    <input type="text" class="form-control" name="salary" required>
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="contact_user" placeholder="DUPONT Jean" required>
                    <input type="text" class="form-control" name="contact_email" placeholder="jean.dupont@mail.fr" required>
                </div>

                <input type="submit" class="btn btn-primary my-2" value="Créer" name="submit">
            </form>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>