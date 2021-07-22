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

$request = $bdd->query("SELECT count(*) FROM survey_feedbacks");
$countId = $request->fetchAll();

echo $id_feedback = $countId[0]["count(*)"]+1;
echo $score= $_POST["note"];
echo $find=$_POST["find"];
echo $texte= htmlspecialchars($_POST["texte"]);
echo $nom= htmlspecialchars($_POST["nom"]);
echo $mail= htmlspecialchars($_POST["mail"]);
echo $tel= htmlspecialchars($_POST["tel"]);

/*
$requete = $bdd->prepare("INSERT INTO `survey_feedbacks` (idFeedBack,`score`, `find`, `texte`, `nom`, `mail`, `tel`) VALUES (:id_feedback, :score, :find, :texte, :nom, :mail,:tel)");
$requete->bindValue(':id_feedback',$id_feedback);
$requete->bindValue(':score', $score);
$requete->bindValue(':find',$find);
$requete->bindValue(':texte',$texte);
$requete->bindValue(':nom',$nom);
$requete->bindValue(':mail',$mail);
$requete->bindValue(':tel',$tel);

$requete->execute();
*/



?>

