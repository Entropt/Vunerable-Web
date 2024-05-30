<!DOCTYPE html>
<html>

<body>
    <form action="" method="post">
        First nickname:<br>
        <input type="text" nickname="nickname" value="">
        <input type="submit" value="Submit">
    </form>
    <h2>Hello
        <?php

        require_once 'vendor/autoload.php';

        use Twig\Environment;
        use Twig\Loader\ArrayLoader;



        if (isset($_POST["nickname"])) {
            $nickname = $_POST["nickname"];
        }

        $t = '' . $nickname;


        $loader = new ArrayLoader(array('index' => $t));
        $twig = new Environment($loader);

        try {
            echo $twig->render('index', array('nickname' => 'Fabien'));
        } catch (Exception $e) {
            Header("Location: error.html");
        }
        ?>
    </h2>
</body>

</html>