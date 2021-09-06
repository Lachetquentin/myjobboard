<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_TITLE; ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">À propos de nous</h4>
                        <p class="text-muted">Êtes-vous à la prochaine étape de votre carrière ? Sur My Job Board, accédez à des millions d'offres d'emploi. Nous pouvons vous aider avec nos outils de recherche d'emploi.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="index.php" class="navbar-brand d-flex align-items-center">

                    <circle cx="12" cy="13" r="4" />
                    </svg>
                    <strong><?php echo SITE_TITLE; ?></strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
    <?php displayMessage(); ?>