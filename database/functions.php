<?php

require_once 'db.php';

function getUserList($conn) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    } else {
        return [];
    }
}

function getProductList($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    } else {
        return []; 
    }
}

function getCartList($conn) {
    $sql = "SELECT * FROM cart";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $carts = [];
        while ($row = $result->fetch_assoc()) {
            $carts[] = $row;
        }   
        return $carts;
    } else {
        return [];
    }
}

function getOrderList($conn) {
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        return $orders;
    } else {
        return [];
    }
}

function getCommentList($conn) {
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $comments = [];
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
        return $comments;   
    } else {
        return [];
    }
}







?>