<?php
include("./config/connect.php");
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
    $id=$_GET['id_can_bo'];
    $sql = "DELETE FROM can_bo WHERE id_can_bo='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Xoá thành công!";
    } else {
    echo "Error updating record: " . $conn->error;
    }
}
