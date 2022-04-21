<?php 
require_once './fonction/base.php';
require_once 'autoload.php';

$bd= bd();
$patient_ctrl =new PatientController($bd);
$list_patient=$patient_ctrl->afficher_list();

if(isset($_GET['id']))
{
    $patient_ctrl->supprimer($_GET['id']);
    header("location: liste.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body onload="window.print()">
    <div class="texte3">
        <h1>Liste des patients </h1>
    </div>
    
    <form action="" method="POST"><br>
                
                <table id="myTable" class="table table bordered " border="2" >
                    <thead class="table-primary text-center">
                        <tr>
                        <th scope="col">NOM</th>
                        <th scope="col">PRENOM</th>
                        <th scope="col">GENRE</th>
                        <th scope="col">ADRESSE</th>
                        <th scope="col">TELEPHONE</th>
                        <th scope="col">AGE</th>
                        <th scope="col">GROUPE SANGUIN</th>
                        <th scope="col">ANTECEDANTS MEDICAUX</th>
                        <th scope="col">MALADIE ACTUELLE</th>
                        </tr>
                    </thead>
                     <tbody class="text-center">
                     <tr>             
                                       <?php    
                                       foreach($list_patient as $key => $value) {
                                       ?>
                                         <tr>
                                            <td><?=$value->getNom()?></td>
                                            <td><?=$value->getPrenom()?></td>
                                            <td><?=$value->getGenre()?></td>
                                            <td><?=$value->getAddresse()?></td>
                                            <td><?=$value->getTelephone()?></td>
                                            <td><?=$value->getAge()?></td>
                                            <td><?=$value->getG_sanguin()?></td>
                                            <td><?=$value->getAntecedant()?></td>
                                            <td><?=$value->getM_actuelle()?></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                    </tbody> 
                </table> 
                <br>
            </form>
    <?php
        include 'footer.php'
    ?>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>