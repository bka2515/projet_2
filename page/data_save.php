
<?php
$conn = new mysqli('mysql-babs.alwaysdata.net', 'babs', 'babacarK@', 'babs_sa_projet');
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$login=$_POST['login'];
$password=$_POST['password'];
$password2=$_POST['password2'];
if ($password!=$password2) {
        echo 'vos mots de passes doivent etre identiques!';
}else {
        $sql = "SELECT * FROM users WHERE login='$login'";
  	$results = mysqli_query($conn, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "Ce login est deja utilisé!";	
  	}else {
                $password=md5($password2);
                $sql="INSERT INTO `users` (`id`, `prenom`, `nom`, `login`, `password`, `profil`) VALUES (NULL, '$prenom', '$nom', '$login', '$password','joueur')";
                if ($conn->query($sql) === TRUE) {
                        echo "les données sont bien inserées!";
                        header('location:../index.php');
                    }
                    else 
                    {
                        echo "Une erreur est survenue lors de l'insertion!";
                    }
          }
}



