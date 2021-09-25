<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
  <div class="bg-light">
  <div class="container d-flex flex-column justify-content-center" style="height:100vh">
    <div class="d-flex justify-content-center">
    <form action="index.php" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email :</label>
          <input type="text" name="email" style="width:600px" placeholder="Email" class="form-control">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password :</label>
          <input type="password" name="pw" style="width:600px" placeholder="Password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="d-flex justify-content-center">
        <button type="submit" name="btn" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <?php 

$cnx = mysqli_connect("localhost","root","","tpsql");
if(isset($_POST['btn'])){
  if(!empty($_POST['email'])){
    $email = $_POST['email'];
    if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){
      $pw = $_POST['pw'];
      $query = "SELECT email,pwd FROM `users` WHERE email= '$email'";
      $sql = mysqli_query($cnx,$query);
      while($row = mysqli_fetch_array($sql,MYSQLI_NUM)){?>
        <div class="d-flex p-2 justify-content-center"><?php echo 'your username is  : '.$row[0].' , and your password : '.$row[1].'</br>';?></div><?php
    }
  }
  else{?>
    <div class="d-flex p-2 justify-content-center"><?php echo 'does not match pattern ';?></div><?php
  }
//haddadislem64@gmail.com' union select email,pwd from users where '1
  }
}

?>
    </div>
  </div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>