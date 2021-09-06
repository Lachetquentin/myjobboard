<?php
    //Redirection vers la page
    function redirect($page = FALSE, $message = NULL, $message_type = NULL)
    {
        if (is_string($page)) {
            $location = $page;
        } else {
            $location = $_SERVER['SCRIPT_NAME'];
        }

        // Vérification du message
        if ($message !== NULL) {
            $_SESSION['message'] = $message;
        }

        // Vérification du type du message
        if ($message_type !== NULL) {
            $_SESSION['message_type'] = $message_type;
        }

        //Redirection
        header('Location:' . $location);
        exit;
    }

    //Affichage du message
    function displayMessage(){
        if(!empty($_SESSION['message'])) {

            // Assignation à une variable message
            $message = $_SESSION['message'];

            if(!empty($_SESSION['message_type'])) {

                // Assignation à une variable message_type
                $message_type = $_SESSION['message_type'];

                //Création de la gestion succès/erreur
                if ($message_type === 'error') {
                    echo '<div class="alert alert-danger">'. $message . '</div>';
                } else {
                    echo '<div class="alert alert-success">'. $message . '</div>';
                }
            }

            // Réinitialiser le message
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        } else {
            echo '';
        }
    }
