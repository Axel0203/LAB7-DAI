<?php
include_once 'db.php';

/*insert*/
if(isset($_POST['save']))
{
    $stmt = $MySQLiconn->prepare("INSERT INTO libros(year, autor, titulo, url, especialidad, editorial) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("isssss", $_POST['year'], $_POST['autor'], $_POST['titulo'], $_POST['url'], $_POST['especialidad'], $_POST['editorial']);
    $stmt->execute();
}
/*delete*/
if(isset($_GET['del']))
{
    $stmt = $MySQLiconn->prepare("DELETE FROM libros WHERE id = ? ");
    $stmt->bind_param("i", $_GET['del']);
    $stmt->execute();
}
/*update*/
if(isset($_GET['edit']))
{   
    $id = $_GET['edit'];
    $stmt = $MySQLiconn->prepare("SELECT * FROM libros WHERE id = ? ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $arrayRow = $stmt->get_result()->fetch_array();
}

if(isset($_POST['update']))
{
    $stmt = $MySQLiconn->prepare("UPDATE libros SET year=?, autor=?, titulo=?, url=?, especialidad=?, editorial=? WHERE id=?");

    $stmt->bind_param("isssssi", $_POST['year'], $_POST['autor'], $_POST['titulo'], $_POST['url'], $_POST['especialidad'], $_POST['editorial'], $_GET['edit']);
    $stmt->execute();
    header("Location: index.php");
}