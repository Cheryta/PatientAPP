<?php
require_once './fonction/base.php';
require_once 'autoload.php';

$bd=bd();
$patient_ctrl =new PatientController($bd);

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $valuer=$patient_ctrl->get((int)$id);
}

if(isset($_REQUEST['update_id']))
{
	try
	{
		$id = $_REQUEST['update_id']; //obtenir la mise à jour de la liste_article à travers "$id" variable
		$select_stmt = $bd->prepare('SELECT * FROM Patient WHERE id =:id');
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute(); 
		$bd = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($bd);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

if(isset($_REQUEST['btn_update']))
{
	
	$nom	= $_REQUEST['nom'];	
	$prenom	= $_REQUEST['prenom'];
	$genre	= $_REQUEST['genre'];
	$addresse	= $_REQUEST['addresse'];
    $telephone	= $_REQUEST['telephone'];	
	$age	= $_REQUEST['age'];
	$g_sanguin	= $_REQUEST['g_sanguin'];
	$antecedant	= $_REQUEST['antecedant'];
    $m_actuelle	= $_REQUEST['m_actuelle'];
		
		try
		{
			if(!isset($errorMsg))
			{
				$update_stmt=$db->prepare('UPDATE Patient SET nom=:nom, prenom=:prenom, genre=:genre, addresse=:addresse, telephone=:telephone, age=:age, g_sanguin=:g_sanguin, antecedant=:antecedant, m_actuelle=:m_actuelle WHERE id=:id'); //sql update query
				$update_stmt->bindParam(':nom',$nom);
				$update_stmt->bindParam(':prenom',$prenom);
				$update_stmt->bindParam(':genre',$genre);
				$update_stmt->bindParam(':addresse',$addresse);
                $update_stmt->bindParam(':telephone',$telephone);
				$update_stmt->bindParam(':age',$age);
				$update_stmt->bindParam(':g_sanguin',$g_sanguin);
				$update_stmt->bindParam(':antecedant',$antecedant);
                $update_stmt->bindParam(':m_actuelle',$m_actuelle);
				$update_stmt->bindParam(':id',$id);
				 
				if($update_stmt->execute())
				{
					$updateMsg="Mise à jour avec succès.......";	//message de mise à jour
					header("refresh:3;liste.php");	//refresh 3 second and redirect to liste_article.php page
				}
			}	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
	}	
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <?php
            include 'menu.php'
        ?>
        <?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($updateMsg)){
		?>
			<div class="alert alert-success">
				<strong>UPDATE ! <?php echo $updateMsg; ?></strong>
			</div>
        <?php
		}
		?> 
        <div class="texte3">
            <h1>Modifier un patient </h1>
            <p>Veuillez remplir ce formulaire  pour modifier un patient !!! </p>
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
            
                <form action="modifier.php" method="POST">
                    <div class="texte4">
                        <p> Patient N° <?= $valuer->getId() ?></p>
                    </div>
                    
                    <label><b>Nom</b></label>
                    <input type="text" placeholder="Entrer le nom" name="nom" required value="<?= $valuer->getNom()?>">

                    <label><b>Prénom</b></label>
                    <input type="text" placeholder="Entrer le prenom" name="prenom" required value="<?= $valuer->getPrenom()?>">

                    <label><b>Genre</b></label>
                    <select name="genre"  required>
                            <?php
                                if($valuer->getGenre()!=""){
                                echo "<option>".$valuer->getGenre()."</option>"; 
                            }
                            ?>
                        <option value="">Genre</option>
                        <option value="Masculin">Masculin</option>
                        <option value="Feminin">Féminin</option>
                        <option value="Autre">Autre</option> 
                    </select>

                    <label><b>Adresse</b></label>
                    <input type="text" placeholder="Entrer l'adresse du patient" name="addresse" required value="<?= $valuer->getAddresse()?>">

                    <label><b>Téléphone</b></label>
                    <input type="number" placeholder="Numéro de téléphone" name="telephone" required value="<?= $valuer->getTelephone()?>">

                    <label><b>Age</b></label>
                    <input type="number"  name="age"  required value="<?= $valuer->getAge()?>">

                    <label><b>Groupe Sanguin</b></label>
                    <select  name="g_sanguin" required>
                        <?php
                            if($valuer->getG_sanguin()!=""){
                                echo "<option>".$valuer->getG_sanguin()."</option>"; 
                            }
                        ?>
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
                    <textarea name="antecedant" id="" cols="" rows="3">
                        <?php
                            if($valuer->getAntecedant()!=""){
                                  echo $valuer->getAntecedant(); 
                            }
                        ?>
                    </textarea>

                    <label><b>Maladies Actuelles</b></label>
                    <textarea name="m_actuelle" id="" cols="" rows="3">
                            <?php
                               if($valuer->getM_actuelle()!=""){
                                  echo $valuer->getM_actuelle(); 
                               }
                            ?>
                            </textarea>

                    <div class="bouton">
                        <div class='bouton1'>
                            <a type="button" class="btn btn-danger" name="btn_update" href="liste.php" onclick='return confirm("Cliquez OK pour modifier ?")'>MODIFIER</a>
                        </div>
                        <div class='bouton1'>
                            <a type="button" class="btn btn-dark" href="liste.php"> RETOUR</a>
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

