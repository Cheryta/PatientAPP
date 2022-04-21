<?php 
require_once './fonction/base.php';
require_once 'autoload.php';

$bd= bd();
$patient_ctrl =new PatientController($bd);
if(isset($_POST['nom']) and $_POST['prenom'] and $_POST['genre'] and $_POST['addresse'] and $_POST['telephone'] and $_POST['age']
and $_POST['g_sanguin'] and $_POST['antecedant'] and $_POST['m_actuelle'])
{
    $patient_ctrl =new PatientController($bd);
    $patient=new Patient($_POST);
    $patient_ctrl->ajouter($patient);
    header("location: liste.php");
}
?>

<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="./css/style.css" media="screen" type="text/css" />
    </head>
    <body>
        <?php
            include 'menu.php'
        ?>
        <div class="texte3">
            <h1>Formulaire d'ajout des patients </h1>
            <p>Veuillez remplir ce formulaire  pour ajouter un nouveau patient !!! </p>
        </div>
        <div class="acceuil">
            <div class="container1">
                <img src="./pictures/form.jpg" alt="">
                <div class="atext1">
                    <h1>Clinique Visa Santé</h1>
                    <p>Votre visa pour une meilleure santé</p>
                </div>
            </div>
            <div class="container">
                <!-- zone de connexion -->
            
                <form action="insertion.php" method="POST">
                    <div class="texte4">
                        <p>Ajouter un Patient</p>
                    </div>
                    
                    <label><b>Nom</b></label>
                    <input type="text" placeholder="Entrer le nom" name="nom" required>

                    <label><b>Prénom</b></label>
                    <input type="text" placeholder="Entrer le prenom" name="prenom" required>

                    <label><b>Genre</b></label>
                    <select name="genre"  required>
                        <option value="">Genre</option>
                        <option value="Masculin">Masculin</option>
                        <option value="Feminin">Féminin</option>
                        <option value="Autre">Autre</option> 
                    </select>

                    <label><b>Adresse</b></label>
                    <input type="text" placeholder="Entrer l'adresse du patient" name="addresse" required>

                    <label><b>Téléphone</b></label>
                    <input type="number" placeholder="Numéro de téléphone" name="telephone" required>

                    <label><b>Age</b></label>
                    <input type="number"  name="age"  required>

                    <label><b>Groupe Sanguin</b></label>
                    <select  name="g_sanguin" required>
                            <option value="">Groupe Sanguin</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-"> 0-</option>
                        </select>

                    <label><b>Antécédants Médicales</b></label>
                    <textarea name="antecedant" id="" cols="" rows="3"></textarea>

                    <label><b>Maladies Actuelles</b></label>
                    <textarea name="m_actuelle" id="" cols="" rows="3"></textarea>

                    <div class="bouton">
                        <div class="bouton1" >
                            <input type="submit" name='submit' value='Ajouter' onclick='return confirm("cliquez OK pour confirmer ")' >
                        </div>
                        <div class="bouton2">
                            <input type="reset" name='reset' value='Annuler'>
                        </div>
                    </div>


                </form>
            </div>
        </div>

        <?php
            include 'footer.php'
         ?>
    </body>
</html>
<?php

?>