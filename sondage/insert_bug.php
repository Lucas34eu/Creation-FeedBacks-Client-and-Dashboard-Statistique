<?php 

try {
  $bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '');
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

$request = $bdd->query("SELECT max(idBug) FROM survey_bug");
$countId = $request->fetchAll();

$id_feedback = $countId[0]["max(idBug)"]+1;
$texte= htmlspecialchars ($_POST["text"]);
$nom= htmlspecialchars ($_POST["nom"]);
$mail= htmlspecialchars ($_POST["mail"]);
$resolution= htmlspecialchars($_POST["resolution2"]);
$naviguateur = $_SERVER["HTTP_USER_AGENT"];
$ip = $_SERVER["REMOTE_ADDR"];
$url_depart2 = htmlspecialchars($_POST["url_depart2"]);
$date_creation = date("Y-m-d H-i-s");


$requete = $bdd->prepare("INSERT INTO `survey_bug` (idBug,`texte`,nom,mail,tel,resolution,naviguateur,ip,url_depart,date_creation) 
VALUES (:id_feedback, :texte,:nom,:mail,'0',:resolution,:naviguateur,:ip,:url_depart,:date_creation)");
$requete->bindValue(':id_feedback',$id_feedback);
$requete->bindValue(':texte', $texte);
$requete->bindValue(':nom', $nom);
$requete->bindValue(':mail', $mail);
//$requete->bindValue(':tel', $tel);
$requete->bindValue(':resolution', $resolution);
$requete->bindValue(':naviguateur', $naviguateur);
$requete->bindValue(':ip', $ip);
$requete->bindValue(':url_depart', $url_depart2);
$requete->bindValue(':date_creation', $date_creation);
$requete->execute();




?>

