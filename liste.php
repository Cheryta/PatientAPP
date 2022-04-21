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
</head>
<body>
    <?php
        include 'menu.php'
    ?>
    <div class="texte3">
        <h1>Liste des patients </h1>
    </div>
    
    <form action="" method="POST"><br>
    <div class=" m-3">
        <a type="button" class="btn btn-primary" href="patient.php"> NOUVEAU PATIENT</a>
    </div><br>
                
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
                        <th scope="col">DETAILS</th>
                        <th scope="col">MODIFIER</th>
                        <th scope="col">SUPPRIMER</th>
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
                                            <td><a href="detail.php?id=<?= $value->getId()?>" type="button"> <img src="./pictures/more_info_24px.png" alt="" class="signe"> </a></td>
                                            <td><a href="modifier.php?id=<?= $value->getId()?>"  type="button"><img src="./pictures/renew_26px.png" alt="" class="signe"> </a></td>
                                            <td><a href="supprimer.php?id=<?= $value->getId()?>" type="button" onclick='return confirm("Etes-vous sûr de vouloir supprimer ?")'> <img src="./pictures/delete_30px.png" alt="" class="signe"> </a></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                    </tbody> 
                </table> 
                <br>
                <div class="m-2">
                    <a type="button" class="btn btn-warning" href="imprimer.php"> IMPRIMER LA LISTE</a>
                </div>
            </form>

            <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        }
                        else {
                            tr[i].style.display = "none";
                        }
                    }       
                }
            }
        </script>

    <?php
        include 'footer.php'
    ?>
    
</body>
</html>