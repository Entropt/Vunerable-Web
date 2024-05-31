<?php
setcookie("session", "", time() - 3600, "/");

Header("Location: index.php");