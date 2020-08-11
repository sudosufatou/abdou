<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <title>AGENCES</title>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-dark black">
    <img alt="" src="logo_white.png" width="30px" src="logo_white.png" style="background-color: ">&nbsp&nbsp
    <a class="navbar-brand" href="#">
        <strong>
            AGENCES</a>
    </strong>
</nav>
<br><br>
<div class="container-fluid" style="width: 40%;" >
    <div class="card">
        <h5 class="card-header text-center py-4">
            <strong>Login</strong>
        </h5>
        <div class="card-body">
    <?php

        if(isset($_GET['message']))
        {
            if ($_GET['message'] == 'LOGIN INCORRECT!')
            {
                echo"  <div class='alert alert-danger' role='alert'> ";
                echo 'LOGIN INCORRECT!';
                echo" </div>";
            }
           else if ($_GET['message'] == 'PASSWORD INCORRECT!')
            {
                echo"  <div class='alert alert-danger' role='alert'> ";
                echo 'PASSWORD INCORRECT!';
                echo" </div>";
            }
           else if ($_GET['message'] == 'VEUILLEZ SAISIR TOUS LES CHAMPS')
           {
               echo"  <div class='alert alert-danger' role='alert'> ";
               echo 'VEUILLEZ SAISIR TOUS LES CHAMPS';
               echo" </div>";
           }
        }


    ?>
<!-- Default form subscription -->
<form class="text-center border border-light p-5" action="/api-charge-data-oracle/adddata/login" method="post">

    <i class="fas fa-user-tie fa-4x"></i><br><br>
    <!-- Name -->
    <input type="text" name="login" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Login">

    <!-- Email -->
    <input type="password" id="defaultSubscriptionFormEmail" name="password" class="form-control mb-4" placeholder="Mot de passe">

    <!-- Sign in button -->
    <button class="btn btn-secondary btn-block" type="submit" name="connexion">Se Connecter</button>

</form>
        </div>
    </div>
</div>
<!-- Default form subscription -->


</body>


<!-- Footer -->

<br>  <br><footer class="page-footer font-small black">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Expresso© 2019 Copyright:
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</html>