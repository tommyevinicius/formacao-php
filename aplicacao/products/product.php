<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 01/11/17
 * Time: 09:05
 */

session_start();
require __DIR__ . '/../../Files/form/conn.php';

function alterProduct ($products, $conn) {
    $sql = 'SELECT * FROM products WHERE ID_PRODUCTS = :id_product';

    $select = $conn->prepare($sql);
    $select->bindValue(':id_product', $products->ID_PRODUCTS);

    if (!$select->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /aplicacao/products/index.php');
        exit();
    }

    $product = $select->fetch(PDO::FETCH_OBJ);

    $sql = 'ALTER TABLE products SET NAME = :name, PRICE = :price WHERE ID_PRODUCTS = :id_product;';

    $update = $conn->prepare($sql);
    $update->bindValue(':name', $product->NAME);
    $update->bindValue(':price', $product->PRICE);
    $update->bindValue(':id_product', $product->ID_PRODUCTS);

    $update->execute();

    $_SESSION['Erro'] = '';
    $_SESSION['Success'] = 'Successfully registered';
    header('Location: /aplicacao/products/index.php');
    exit();
}

function deleteProduct ($products, $conn) {
    $sql = 'DELETE FROM products WHERE ID_PRODUCTS = :id_product;';

    $delete = $conn->prepare($sql);
    $delete->bindValue(':id_product', $products->ID_PRODUCTS);

    if (!$delete->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /aplicacao/people/index.php');
        exit();
    }

    $_SESSION['Erro'] = '';
    $_SESSION['Success'] = 'Successfully registered';
    header('Location: /aplicacao/products/index.php');
    exit();
}

function insertProduct ($data, $conn) {
    $sql = 'INSERT INTO products (NAME, PRICE) VALUES (:name, :price);';

    $insert = $conn->prepare($sql);
    $insert->bindValue(':name', $data['name']);
    $insert->bindValue(':price', $data['price']);

    if (!$insert->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /aplicacao/products/index.php');
        exit();
    }

    $_SESSION['Erro'] = '';
    $_SESSION['Success'] = 'Successfully registered';
    header('Location: /aplicacao/products/index.php');
    exit();
}