<?php
$host = "localhost";
$dbname = "db_patient";
$username = "root";
$password = "";


if(isset($_POST['submit'])){

  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", "root", "");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }

  // récupérer les valeurs 
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $genre = $_POST['genre'];
  $addresse = $_POST['addresse'];
  $telephone = $_POST['telephone'];
  $age = $_POST['age'];
  $g_sanguin = $_POST['g_sanguin'];
  $antecedant = $_POST['antecedant'];
  $m_actuelle = $_POST['m_actuelle'];
  

  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `Patient`(`nom`, `prenom`,`genre`, `addresse`,`telephone`, `age`, `g_sanguin`,`antecedant`, `m_actuelle`) VALUES (:nom,:prenom,:genre,:addresse,:telephone,:age,:g_sanguin,:antecedant,:m_actuelle)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":nom"=>$nom,":prenom"=>$prenom,":genre"=>$genre,":addresse"=>$addresse,":telephone"=>$telephone,":age"=>$age,":g_sanguin"=>$g_sanguin,":antecedant"=>$antecedant,"m_actuelle"=>$m_actuelle));

  // vérifier si la requête d'insertion a réussi
  if($exec){
    header("Location: liste.php");
    exit();
  }else{
    echo "Échec de l'opération d'insertion";
  }
}
?>