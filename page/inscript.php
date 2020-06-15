 <?php include('page.php') ?>
<div class='col-md-5'>
<h3>Registor Form</h3>
<a href="../index.php">Se connecter</a>
<img class='img3' src="../public/images/téléchargement.PNG" class="img-fluid" alt="Responsive image">

<form method='post' id='form' name='form' action="data_save.php" enctype = "multipart / form-data">
<?php if (!empty($errors)) {
    echo $errors;
} ?>

<hr>

    <div class='col-md-10'>
       <input type="text" class='form-control' id='prenom'  name='prenom' placeholder='prenom' required>
    </div>

<hr>

    <div class='col-md-10'>
        <input type="text" class='form-control' id='nom' name='nom' placeholder='nom' required>
    </div>

<hr>

    <div class='col-md-10'>
       <input type="text" class='form-control' id='login' name='login' placeholder='login' required>
     </div>

<hr>

    <div class='col-md-10'>
      <input type="password" class='form-control' id='password' name='password' placeholder='password' required>

    </div>
<hr>
 
    <div class='col-md-10'>
      <input type="password" class='form-control' id='password2' name='password2' placeholder='valid yor password' required>
    </div>

<hr>

    <div class='col-md-10'>
        <input type="file" name='avatar' id='avatar' class='form-control-file'>
    </div>
<hr>
    <div class='col-md-10'>
        <button type="submit" id='submit' name='valider' class='btn btn-info'>valider</button>
  
    </div>
  
  </form>
</div>

<script>
$(document).ready(function(){
});
//Select the button element, then add click event function
$("#submit").click(function(){
 });
//Add the variable with the value is the data from textfield element that you will insert into database.
                var prenom=$("#prenom").val();
                var nom=$("#nom").val();
                var login=$("#login").val();
                var password=$("#password").val();
                var password2=$("#password2").val();

                $.ajax({
                    url:'data_save.php',
                    method:'POST',
                    dataType:'JSON',
                    data:{
                        prenom:prenom,
                        nom:nom,
                        login:login,
                        password:password
                        password:password2
                        
                    },
                   success:function(data){
                       alert(data);
                   }
                });

</script>