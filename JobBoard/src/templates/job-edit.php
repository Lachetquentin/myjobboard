<?php include 'inc/header.php'; ?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h2 class="page-header">Modification d'offre</h2>
            <form method="get" action="edit.php?id=<?php echo $job->id; ?>">

                <div class="form-group">
                    <label>Entreprise</label>
                    <input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>" required>
                </div>

                <div class="form-group">
                    <label>Profession</label>
                    <select class="form-control" name="profession" required>

                        <option value="">Veuillez choisir une profession</option>
                        <?php foreach ($professions as $profession) : ?>
                            <?php if ($job->profession_id == $profession->id) : ?>
                                <option value="<?php echo $profession->id; ?>" selected><?php echo $profession->name; ?></option>
                            <?php else : ?>
                                <option value="<?php echo $profession->id; ?>"><?php echo $profession->name; ?></option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Contrat</label>
                    <select class="form-control" name="contract" required>
                        <option value="">Veuillez choisir un type de contrat</option>
                        <?php foreach ($contracts as $contract) : ?>
                            <?php if ($job->contract_id == $contract->id) : ?>
                                <option value="<?php echo $contract->id; ?>" selected><?php echo $contract->name; ?></option>
                            <?php else : ?>
                                <option value="<?php echo $contract->id; ?>"><?php echo $contract->name; ?></option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Lieu</label>
                    <select class="form-control" name="location" required>
                        <option value="">Veuillez choisir un lieu</option>
                        <?php foreach ($locations as $location) : ?>
                            <?php if ($job->location_id == $location->id) : ?>
                                <option value="<?php echo $location->id; ?>" selected><?php echo $location->name; ?></option>
                            <?php else : ?>
                                <option value="<?php echo $location->id; ?>"><?php echo $location->name; ?></option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Titre de l'offre</label>
                    <input type="text" class="form-control" name="job_title" value="<?php echo $job->job_title; ?> " required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" required><?php echo $job->description; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Salaire</label>
                    <input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>" required>
                </div>

                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="contact_user" placeholder="DUPONT Jean" value="<?php echo $job->contact_user; ?>" required>
                    <input type="text" class="form-control" name="contact_email" placeholder="jean.dupont@mail.fr" value="<?php echo $job->contact_email; ?>" required>
                </div>

                <input type="hidden" name="job_id" value="<?php echo $job->id; ?>">
                <input type="submit" class="btn btn-primary my-2" value="Submit" name="submit">
            </form>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>