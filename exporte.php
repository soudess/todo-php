<?php
include('db.php');
$result = $conn->query("SELECT * FROM todo");

$xml = new DOMDocument('1.0', 'UTF-8');

$racine = $xml->createElement('taches');
$xml->appendChild($racine);

foreach ($result as $todo) {
    $tache = $xml->createElement('tache');
    $tache->appendChild($xml->createElement('todo', htmlspecialchars($todo['todo'])));
    $racine->appendChild($tache);
}

$conn->close();


$fichier = 'tache.xml';
if ($xml->save($fichier)) {
    echo "Fichier XML est genere </br>";
    echo "</br>";
    echo "<a href='$fichier' target='_blank' style='background-color:yellow; padding:20px;border-radius:10px;text-align:center;margin-top:50px;'>Voir le fichier XML</a>";
} else {
    echo "Erreur lors de lenregistrement";
}
?>
