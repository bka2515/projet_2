<link rel="stylesheet" href="../public/css/style.css">
 <?php
 include ('config.php');
  if (!empty($errMsg)):?> 
    <div class="error">
    <?php foreach ($errMsg as $err): ?>
        <p><?php  echo $err;?></p>
        <?php endforeach ?>
    
    </div>

<?php endif  ?>