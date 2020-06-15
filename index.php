<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/bootstrap.css.map">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Le plaisir de jouer</title>
  </head>
  <body>
  <div class="container-fluid">
  <p class="text-right">Le plaisir de jouer</p>
<div class='col-md-5'>
<h3>Registor Form</h3>
<a href="./page/inscript.php">S'inscrire</a>
<div class='col-md-10'>
<form method='post' id='form' name='form' action="">

<hr>
<div class='col-md-10'>
  <input type="text" class='form-control' name='login'  id='login' name='login' placeholder='login'>
</div>

<hr>

<div class='col-md-10'>
  <input type="password" class='form-control' name='password' id='password' name='password' placeholder='password'>

</div>

<hr>
<div class='col-md-10'>
  <button type="submit" name='submit' id='submit' class='btn btn-info'>valider</button>
  
  </div>
  </form>
</div>
</div>
</div>
<img class='img2' src="./public/images/logo-QuizzSA.PNG" class="img-fluid" alt="Responsive image">

</div>
  <?php
 
  //Affichage des erreurs php
  
  error_reporting(E_ALL);
  ini_set('display-errors','on');
  
  //démarrage des sessions
  if(session_id() == '') {
	  session_start();
	}
  
  //connexion à la bdd
  require_once './page/config.php';
  
  //récupération PROPRE des variables AVANT de les utiliser
  $login = !empty($_POST['login']) ? trim($_POST['login']) : NULL;
	$pass = !empty($_POST['password']) ? trim($_POST['password']) : NULL;

  $errMsg = array();

  
  //traitement du formulaire  
	if(isset($_POST['submit'])){
		$errMsg = '';
		//login and password sent from Form
		if(!$login || !$pass){
		  $errMsg=array('<div class="toast-body">
      Tous les champs sont obligatoirs!
    </div>');	
    }
	
    
		if(empty($errMsg)){
      
      //preparation de la requete
      $sql = 'SELECT id,login,password FROM  `users` WHERE login = :login AND password = :password';
      $datas = array(':login'=>$login , ':password'=>$pass);
      
      //execution de la requete
      try{
			  $records = $bdd->prepare($sql);
			  $records->execute($datas);
      }catch(Exception $e){
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
        exit();
      }
			
      $results = $records->fetchAll(PDO::FETCH_ASSOC);
      
			if(count($results) > 0 ){
				$_SESSION['login'] = $results['login'];
				header('location:page_d_acuil.php');
				exit();
			}else{
				$errMsg=array('<div class="toast-body">
        verrifier vos identificatons!
      </div>');
			}
		}
	}
    
     if (!empty($errMsg)) {
    foreach ($errMsg as $err) {
        echo '<div class="alert">';
        echo $err;
        echo '</div>';
    
    }
  }     
    
?>
    
