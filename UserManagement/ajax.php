<?php

require 'patials/user.php';

extract($_POST);

$obj = new user();

if($_POST['type'] == 'insert'){
    echo $obj->insert($_POST['name'], $_POST['email'], $_POST['tp'], $_POST['address']);

}

if($_POST['type'] == 'display'){
    echo $obj->display();
}

if($_POST['type'] == 'delete'){
    echo $obj->delete($_POST['id']);
}

if($_POST['type'] == 'update'){
    echo $obj->update($_POST['id']);
}

if($_POST['type'] == 'updateSubmit'){

    $myArr = array($_POST['id'], $_POST['name'], $_POST['address'], $_POST['email'], $_POST['mobile']);

    echo $obj->updateSubmit(json_encode($myArr));
}

if($_POST['type'] == 'search'){
    echo $obj->searching($_POST['search']);
}