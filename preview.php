<?php

require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\ArrayLoader;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["comment"])) {
        $comment = $_POST["comment"];
    }

    $t = '' . $comment;

    $loader = new ArrayLoader(array('index' => $t));
    $twig = new Environment($loader);

    try {
        echo $twig->render('index', array('comment' => ''));
    } catch (Exception $e) {
        Header("Location: error.html");
    }
}
