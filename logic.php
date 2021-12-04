<?php

include 'config.php';

if (isset($_POST['item'])) {
    $item = $_POST['item'];
} else {
    $item = "null";
}
if (isset($_POST['category'])) {
    $category = $_POST['category'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    echo $id;
    $stmt = $con->prepare("DELETE FROM todo WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    if (false === $stmt) {
        die('prepare() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->close();
}
if (isset($_POST['updateId'])) {
    $updateId = $_POST['updateId'];
    $stmt = $con->prepare("UPDATE todo SET category = 'completed' WHERE id = ?");
    $stmt->bind_param("s", $updateId);
    $stmt->execute();
    if (false === $stmt) {
        die('prepare() failed:' . htmlspecialchars($stmt->error));
        exit();
    }
    $stmt->close();
}
echo $post;
echo $item;

$stmt = $con->prepare("INSERT INTO todo(item, category) values(?,?)");
$stmt->bind_param("ss", $item, $category);
$stmt->execute();