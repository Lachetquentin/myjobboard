<?php

// Initialise les fichiers nécessaire au fonctionnement du site ainsi que la liaison à la DB 
include_once 'config/init.php';

// Initialise une nouvelle classe Job
$job = new Job;

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

if (isset($_GET['submit'])) {
    $data = array();
    $data['job_title'] = $_GET['job_title'];
    $data['company'] = $_GET['company'];
    $data['profession_id'] = $_GET['profession'];
    $data['contract_id'] = $_GET['contract'];
    $data['location_id'] = $_GET['location'];
    $data['description'] = $_GET['description'];
    $data['salary'] = $_GET['salary'];
    $data['contact_user'] = $_GET['contact_user'];
    $data['contact_email'] = $_GET['contact_email'];
    $id = $_GET['job_id'];

    if ($job->update($id, $data)) {
        redirect('index.php', 'Votre offre a été mise à jour !', 'success');
    } else {
        redirect('index.php', 'Oups !', 'error');
    }
}

// Initialise une nouvelle classe Template
$template = new Template('templates/job-edit.php');

$template->job = $job->getJob($job_id);

// Affiche les différentes options pour la barre de recherche
$template->professions = $job->getProfession();
$template->locations = $job->getLocation();
$template->contracts = $job->getContract();

// Affiche le template
echo $template;
