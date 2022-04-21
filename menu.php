<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar  navbar-light bg-primary">
        <div class="container-fluid m-1 d-flex ">
            <img src="./pictures/logo1.jpg" alt="" width="200px" height="80px">
            <div class="text">
                <a href="index.php">Acceuil</a>
            </div>
            <div class="text">
                <a href="patient.php">Patients</a>
            </div>
            <div class="text">
                <a href="liste.php">Liste des patients</a>
            </div>
            <div class="recherche"> 
                <input id="myInput" onkeyup="myFunction()" type="search"  aria-label="Search"> 
                <button type="submit" bg-primary >Search</button>
            </div>
        </div>
      </nav>

   <script src="./js/bootstrap.bundle.js"></script>
   <script src="./js/bootstrap.bundle.min.js"></script>
   <script src="./js/bootstrap.min.js"></script> 
   <script src="./js/main.js"></script>
   <script src="./js/popper.min.js"></script>
   <script src="./js/jquery-3.3.3.slim.min.js"></script>
</body>
</html>