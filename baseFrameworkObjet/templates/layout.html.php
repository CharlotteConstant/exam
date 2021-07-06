<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titreDeLaPage ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="ttps://bootswatch.com/5/sandstone/bootstrap.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
      <!--
        <li class="nav-item">
          <a class="nav-link active" href="index.php?controller=gateau&task=index">Gateaux
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        -->
        <?php //if(!$user){?>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=user&task=login">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=user&task=register">Inscription</a>
        </li>
        -->
        <?php // } ?>

        <?php //if($user){?>
        <!--
        <li class="nav-item">
          <a class="nav-link btn btn_danger" href="index.php?controller=user&task=logout">Deconnexion</a>
        </li>
        <li class="nav-item mx-3">     
          <p><strong><?php //echo $user->username; ?></strong></p>
        </li>
          -->
        <?php //} ?> 
      </ul>
    </div>
  </div>
</nav>

<h2 class="mt-5">Haut de la page</h2>

<hr>

  <?php echo $contenuDeLaPage ?>

<hr>
<h2>Bas de la page</h2>



</body>

</html>