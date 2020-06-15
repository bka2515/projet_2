<?php
//fichier de connexion à la bdd : cnxbdd.php

    $dbname= 'SA_PROJET';
    $user = 'root';
    $password = '';
    $host = 'localhost';

try {
    $bdd = new PDO('mysql:host='.$host .';dbname='.$dbname.';charset=utf8', $user, $password );
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<p>Erreur : " . $e->getMessage() . "</p>";
    exit();
}
function isLoginUsed($login)
{
   global $dbname;
   global $utilisateurs;
   $handler = mysqli_query($dbname, "SELECT * FROM users WHERE login = 'login'");
   if($handler == false) return 0;
   return(mysqli_num_rows($handler) == 0);
}

?>