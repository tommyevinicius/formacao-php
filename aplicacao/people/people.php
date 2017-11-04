<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 01/11/17
 * Time: 08:20
 */

session_start();
require __DIR__ . '/../../Files/form/conn.php';

function alterPeople ($people, $conn) {
    $sql = 'SELECT * FROM people WHERE ID_PEOPLE = :id_people;';

    $select = $conn->prepare($sql);
    $select->bindValue(':id_people', $people->ID_PEOPLE);

    if (!$select->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /aplicacao/people/index.php');
        exit();
    }

    $person = $select->fetch(PDO::FETCH_OBJ);

    $sql = 'ALTER TABLE people SET NAME = :name, LASTNAME = :lastname, PHONE = :phone, EMAIL = :email, CPF = :cpf WHERE ID_PEOPLE = :id_people;';

    $update = $conn->prepare($sql);
    $update->bindValue(':name', $people->NAME);
    $update->bindValue(':lastname', $people->LASTNAME);
    $update->bindValue(':phone', $people->PHONE);
    $update->bindValue(':email', $people->EMAIL);
    $update->bindValue(':cpf', $people->CPF);
    $update->bindValue(':id_people', $people->ID_PEOPLE);

    $update->execute();

    $_SESSION['Erro'] = '';
    $_SESSION['Success'] = 'Successfully registered';
    header('Location: /aplicacao/people/index.php');
    exit();
}

function deletePeople ($people, $conn) {
    $sql = 'DELETE FROM people WHERE ID_PEOPLE = :id_people;';

    $delete = $conn->prepare($sql);
    $delete->bindValue(':id_people', $people->ID_PEOPLE);

    if (!$delete->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /aplicacao/people/index.php');
        exit();
    }

    $_SESSION['Erro'] = '';
    $_SESSION['Success'] = 'Successfully registered';
    header('Location: /aplicacao/people/index.php');
    exit();
}

function insertPeople ($data, $conn) {
    $sql = 'INSERT INTO people (NAME, LASTNAME, PHONE, EMAIL, CPF) VALUES (:name, :lastname, :phone, :email, :cpf);';

    $insert = $conn->prepare($sql);
    $insert->bindValue(':name', $data['name']);
    $insert->bindValue(':lastname', $data['lastname']);
    $insert->bindValue(':phone', $data['phone']);
    $insert->bindValue(':email', $data['email']);
    $insert->bindValue(':cpf', $data['cpf']);

    if (!$insert->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /aplicacao/people/index.php');
        exit();
    }

    $_SESSION['Erro'] = '';
    $_SESSION['Success'] = 'Successfully registered';
    header('Location: /aplicacao/people/index.php');
    exit();
}