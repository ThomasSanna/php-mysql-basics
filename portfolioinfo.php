<?php

function getCountId()
{
    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');
    $query = $dp->prepare('SELECT COUNT(id) FROM portfolio');
    $query->execute();
    $count = $query->fetch();
    return $count;
}

function getImageInfo($id)
{
    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');
    $query = $dp->prepare('SELECT * FROM portfolio WHERE id = :id');
    $query->execute([
        ':id' => $id,
    ]);
    $image = $query->fetch();
    return $image;
}
