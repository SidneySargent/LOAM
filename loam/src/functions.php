<?php
function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}

function selectExercice(int $exercice_id) : array
{
    require_once(__DIR__ . '\databaseconnect.php');
    $exerciceStatement = $mysqlClient->prepare('SELECT * FROM exercices WHERE exercice_id = :exercice_id');
    $exerciceStatement->execute([
        'user_id' => $user_id,
        'exercice_id' => $exercice_id,
    ]);
    $exercice = $exerciceStatement->fetchAll();

    return $exercice;
}