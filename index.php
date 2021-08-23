<?php
include("./conn.php");
include("./component.php");
$sql = "SELECT can_bo.ten, can_bo.chuc_vu, can_bo.sdt_co_quan, can_bo.sdt_di_dong,
        can_bo.email, phong_ban.ten_phong_ban,
        don_vi.ten as ten_don_vi
        FROM can_bo, phong_ban, don_vi
        WHERE can_bo.id_phong_ban = phong_ban.id_phong_ban AND don_vi.id_don_vi = phong_ban.id_don_vi order by can_bo.ten";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
    exit();
}
?>
<div>
    <div class="row">
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="./admin/admin.png" class="card-img-top">
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">
                        <button type="button" class="btn btn-secondary" style="width:200px">
                            <a href="http://localhost:8080/kiemtra/admin/index-login.php" class="text-decoration-none text-white">Đăng nhập</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-9 mt-5">
            <h1> Quản lí Danh bạ</h1>
            <div class="mt-5">
                <form action="" method="GET">
                    Tìm kiếm <input type="text" name="search">
                    <input type="submit" name="ok" value="Tìm kiếm">
                </form>
                <?php
                if (isset($_REQUEST['ok'])) {
                    $search = addslashes($_GET['search']);
                    if (empty($search)) {
                        echo "Điền dữ liệu và ô trống";
                    } else {
                        $sql1 = "SELECT can_bo.ten, can_bo.chuc_vu, can_bo.sdt_co_quan, can_bo.sdt_di_dong,can_bo.email, phong_ban.ten_phong_ban,don_vi.ten as ten_don_vi
                                    FROM can_bo, phong_ban, don_vi 
                                    WHERE can_bo.id_phong_ban = phong_ban.id_phong_ban AND don_vi.id_don_vi = phong_ban.id_don_vi AND can_bo.ten like '%$search%'";
                        $query = mysqli_query($conn, $sql1);
                        $num = mysqli_num_rows($query);
                        if ($num > 0 && $search != "") {
                ?>
                            <table class="table mt-5 table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Chức vụ</th>
                                        <th scope="col">SĐT cơ quan</>
                                        <th scope="col">SĐT di dộng</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tên đơn vị</th>
                                        <th scope="col">Tên phòng ban</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['ten']; ?></td>
                                        <td><?php echo $row['chuc_vu']; ?></td>
                                        <td><?php echo $row['sdt_co_quan']; ?></td>
                                        <td><?php echo $row['sdt_di_dong']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['ten_don_vi']; ?></td>
                                        <td><?php echo $row['ten_phong_ban']; ?></td>
                                    </tr>
                    <?php
                                }
                            } else {
                                echo "Không tìm thấy kết quả!";
                            }
                        }
                    }
                    ?>
            </div>
            <table class="table mt-5 table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">SĐT cơ quan</>
                        <th scope="col">SĐT di dộng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tên đơn vị</th>
                        <th scope="col">Tên phòng ban</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td> <?php echo $row['ten']; ?> </td>
                            <td> <?php echo $row['chuc_vu']; ?></td>
                            <td> <?php echo $row['sdt_co_quan']; ?></td>
                            <td> <?php echo $row['sdt_di_dong'] ?></td>
                            <td> <?php echo $row['email'] ?></td>
                            <td> <?php echo $row['ten_don_vi'] ?></td>
                            <td> <?php echo $row['ten_phong_ban'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>