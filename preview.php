<?php
require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\ArrayLoader;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["comment"])) {
        $comment = base64_encode($_POST["comment"]);
    }
    $loader = new ArrayLoader(array('index' => $comment));
    $twig = new Environment($loader);

    try {
        echo htmlspecialchars(base64_decode($twig->render('index')));
    } catch (Exception $e) {
        echo $e->getMessage() . " Please try again!";
    }
}
