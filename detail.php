<?php
require_once './fonction/base.php';
require_once 'autoload.php';

$bd=bd();
$patient_ctrl =new PatientController($bd);
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $valuer=$patient_ctrl->get((int)$id);
    //echo $id;
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Detail patient</title>
    </head>
    <body>
        <?php
            include 'menu.php'
        ?>
        <div class="texte3">
            <h1>Detail sur le patient N° <?= $id ?>  </h1>
        </div>
        <div class="acceuil">
            <div class="containers">
                <img src="./pictures/user.png" alt="">
                <div class="atext1">
                    <h1>Clinique Visa Santé</h1>
                    <p>Votre visa pour une meilleure santé</p>
                </div>
            </div>
            <div class="container">
                <!-- zone de connexion -->
            
                <form action="insertion.php" method="POST">
                   
                    <label for="">Nom:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                     <span> <?= $valuer->getNom()?> </span> <br>
                    <label for="">Prenom:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                     <span><?= $valuer->getPrenom()?></span> <br>
                    <label for="">Sexe:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                     <span> <?= $valuer->getGenre()?> </span>  <br>
                    <label for="">Addresse:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                     <span> <?= $valuer->getAddresse()?> </span>  <br>
                    <label for="">N° Telephone:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                     <span> <?= $valuer->getTelephone()?> </span>  <br>
                    <label for="">Age:</label> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                     <span> <?= $valuer->getAge()?> </span>  <br>
                    <label for="">Groupe sanguin:</label >&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                     <span> <?= $valuer->getG_sanguin()?> </span>  <br>
                    <label for="">Antecedants medicals:</label> &nbsp; &nbsp; &nbsp;
                     <span> <?= $valuer->getAntecedant()?> </span>  <br>
                    <label for="">Maladie actuelle:</label> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                     <span> <?= $valuer->getM_actuelle()?> </span>  <br>
                </form>
                <div class="bouton">
                    <div class='bouton1'>
                        <a type="button" class="btn btn-dark" href="liste.php"> RETOUR</a>
                    </div> 
                        
                </div>
            </div>
            
        </div>

        <?php
            include 'footer.php'
         ?>
        

          
    </body>
</html>

