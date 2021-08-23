<?php
    include("./config/connect.php");
    $id_can_xoa = $_GET['id_can_bo'];
    $sql = "DELETE FROM can_bo WHERE id_can_bo = '$id_can_xoa'";
    
    if(mysqli_query($conn,$sql)){
        echo "đến đây rồi 4";
        // header('location:http://localhost:8080/kiemtra/admin/index.php');
    }else{
        echo "Xóa thất bại: " . mysqli_error($conn);
    }
    // echo "đên đây rồi";
?>
