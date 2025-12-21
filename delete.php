<?php
require_once __DIR__ . '/config/database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "delete from themes where id='$id'";
    $res = mysqli_query($connect, $query);
    if ($res) {
        echo '<script>alert("deleted sucssfuly")</script>';
        header('Location:themes.php');
    }
}
