<?php

// Initialise les fichiers nécessaire au fonctionnement du site ainsi que la liaison à la DB 
include_once 'config/init.php';

// Initialise une nouvelle classe Job
$job = new Job;

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    if($job->delete($del_id)){
        redirect('index.php', 'Votre offre d\'emploi  a été supprimé !', 'success');
    } else {
        redirect('index.php', 'Oups, erreur ! Votre offre d\'emploi n\'as pas été supprimé !', 'error');
    }
}

// Initialise une nouvelle classe Template
$template = new Template('templates/job-single.php');

// Vérifie si les variables sont définie sinon les attribue à null
$job_id = isset($_GET['id']) ? $_GET['id'] : null;

// Récupère l'offre d'emploi en fonction de l'id
$template->job = $job->getJob($job_id);

// Affiche le template
echo $template;
