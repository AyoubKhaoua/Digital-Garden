<?php
$connect = mysqli_connect('localhost', 'root', '', 'digitalgarden');
if (!$connect) {
    die('Error' . mysqli_connect_errno());
}
