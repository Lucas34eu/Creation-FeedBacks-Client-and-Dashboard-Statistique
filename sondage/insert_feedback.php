<?php 

try {
  $bdd = new PDO('mysql:host=localhost;dbname=j4cfrstats;charset=utf8', 'j4cfrstats', 'GDS4nXSCwtahuyeYjNxT');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (!isset($_GET["colonne"])) {
  $_GET["colonne"] = '';
} else {
  $_GET["colonne"] = ' order by ' . $_GET["colonne"];
}
if (!isset($_GET["valeur"])) {
  $_GET["valeur"] = '';
}

$request = $bdd->query("SELECT max(idFeedBack) FROM survey_feedbacks");
$countId = $request->fetchAll();
var_dump($_POST);
 $id_feedback = $countId[0]["max(idFeedBack)"]+1;
 $score= $_POST["note"];
 $find=$_POST["find"];
 $texte= htmlspecialchars($_POST["texte"]);
 $nom= htmlspecialchars($_POST["nom"]);
 $mail= htmlspecialchars($_POST["mail"]);
 $tel= htmlspecialchars($_POST["tel"]);
 $resolution= htmlspecialchars($_POST["resolution"]);
$navigateur = $_SERVER["HTTP_USER_AGENT"];
$ip = $_SERVER["REMOTE_ADDR"];
$url = htmlspecialchars($_POST["url_depart"]);
$date_creation = date("Y-m-d H-i-s");

try {
$requete = $bdd->prepare("INSERT INTO `survey_feedbacks` (idFeedBack,`score`, `find`, `texte`, `nom`, `mail`, `tel`,resolution,navigateur ,ip,url_depart,date_creation) 
                          VALUES (:id_feedback, :score, :find, :texte, :nom, :mail,:tel,:resolution,:navigateur ,:ip,:url_depart,:date_creation)");
$requete->bindValue(':id_feedback',$id_feedback);
$requete->bindValue(':score', $score);
$requete->bindValue(':find',$find);
$requete->bindValue(':texte',$texte);
$requete->bindValue(':nom',$nom);
$requete->bindValue(':mail',$mail);
$requete->bindValue(':tel',$tel);
$requete->bindValue(':resolution',$resolution);
$requete->bindValue(':navigateur',$navigateur);
$requete->bindValue(':ip',$ip);
$requete->bindValue(':url_depart',$url);
$requete->bindValue(':date_creation',$date_creation);
$requete->execute();
} catch (Exception $e) {
  echo 'Exception reçue : ',  $e->getMessage(), "\n";
}



?>

