<?php


require_once('classes/CRUD.php');

$crud = new CRUD;
$id = $_POST['id'];
$delete = $crud->delete('client', $id);
if ($delete) {
    header('location: client-index.php');
} else {
    echo 'error';
};
