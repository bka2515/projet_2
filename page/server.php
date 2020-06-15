<?php
$prenom='';
$nom='';
$login='';
$password='';
$errors=array();
//SE CONNECTER A LA BASE DE DONNEES
$db=mysqli_connect('localhost', 'root','', 'users' );
//si le bouton est cliqué
if(isset($_POST['valider'])){
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $login=$_POST['login'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    $profil='joueur';
    if (empty($prenom)) {
        array_push($errors,"Entrer votr prenom!");
    }
    if (empty($nom)) {
       echo array_push($errors,"Entrer votr nom!");
    }
    if (empty($login)) {
      echo  array_push($errors,"Entrer votr login!");
    }
    if (empty($password)) {
        array_push($errors,"Entrer votr password!");
    }
    if ($password!=$password2) {
        array_push($errors,"Vos mots de passe doivent etre identiques!");
    }
    if (empty($errors)) {
        $password=md5($password2);
    $sql= "insert into utilisateurs (prenom,nom,login,password,profil)
    VALUES('$prenom,$nom,$login,$password,$profil')";
    mysqli_query($db,$sql);
    $_SESSION['login']=$login;
    
    }
}

 ?>