<?php

require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\ArrayLoader;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["comment"])) {
        $comment = $_POST["comment"];
    }

    $loader = new ArrayLoader(array('index' => $comment));
    $twig = new Environment($loader);

    try {
        echo htmlspecialchars($twig->render('index'));
    } catch (Exception $e) {
        Header("Location: error.html");
    }
}
