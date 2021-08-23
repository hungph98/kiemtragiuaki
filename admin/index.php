<?php
include("./config/connect.php");
include("./component/header.php");
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
            <img src="admin.png" class="card-img-top">
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item">
                    <button type="button" class="btn btn-secondary" style="width:200px">
                        <a href="http://localhost:8080/kiemtra/admin/logout.php" class="text-decoration-none text-white">Đăng xuất</a>
                    </button>
                </li>
            </ul>
        </div>
        <div class="col-9">
            <h1> Quản lí Danh bạ</h1>
            <!-- Thêm thông tin -->
            <div class="add-user mt-5">
                <form class="row g-3" action="./save.php" method="GET">
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="ten" id="validationDefault01" placeholder="Tên " required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Chức vụ</label>
                        <input type="text" class="form-control" name="chuc_vu" id="validationDefault02" placeholder="Chức vụ" required>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefaultUsername" class="form-label">SĐT cơ quan</label>
                        <input type="text" class="form-control" name="sdt_co_quan" id="validationDefaultUsername" placeholder="sđt" aria-describedby="inputGroupPrepend2" required>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefaultUsername" class="form-label">SĐT di động</label>
                        <input type="text" class="form-control" name="sdt_di_dong" id="validationDefaultUsername" placeholder="sđt" aria-describedby="inputGroupPrepend2" required>

                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault03" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="validationDefault03" placeholder="Email" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault04" class="form-label">Tên đơn vị</label>
                        <select class="form-select" name="ten_don_vi" id="validationDefault04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Khoa công trình</option>
                            <option>Khoa KTTNN</option>
                            <option>Khoa CNTT</option>
                            <option>Khoa Cơ khí</option>
                            <option>Khoa Điện-Điện tử</option>
                            <option>Khoa KT và QL</option>
                            <option>Khoa Hóa và môi trường</option>
                            <option>TTĐTQT</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Tên phòng ban</label>
                        <input type="text" class="form-control" name="ten_phong_ban" id="validationDefault05" placeholder="Phòng ban" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="save" type="submit">Lưu thông tin</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['save'])) {
                    $ten = $_POST['ten'];
                    $chuc_vu = $_POST['chuc_vu'];
                    $sdt_co_quan = $_POST['sdt_co_quan'];
                    $sdt_di_dong = $_POST['sdt_di_dong'];
                    $emai = $_POST['email'];
                    $ten_don_vi = $_POST['ten_don_vi'];
                    $ten_phong_ban = $_POST['ten_phong_ban'];
                    
                    $sql = "INSERT INTO can_bo (id_can_bo, ten, chuc_vu, id_phong_ban, sdt_co_quan, sdt_di_dong, email) 
                                VALUES ('$id', '$ten', '$chuc_vu', '$phong_ban', '$sdt_co_quan', '$sdt_di_dong', '$emai');";

                        echo "<prev>";
                        print_r($row);
                        echo "<?prev>";

                    if (mysqli_query($conn, $sql)) {
                        echo "thêm thành công";
                        // header('location:' . SITEURL . '/admin/users-management.php');
                    }
                }

                ?>
            </div>
            <!-- Tìm kiếm với Admin -->
            <div class="mt-5">
                <form action="" method="GET">
                    Tìm kiếm <input type="text" name="search">
                    <input type="submit" name="ok" value="Tìm kiếm">
                </form>
                <?php
                if (isset($_REQUEST['ok'])) {
                    $search = addslashes($_GET['search']);
                    if (empty($search)) {
                        echo "Điền vào ô trống";
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
                                echo "Không tìm thấy kết quả";
                            }
                        }
                    }
                    ?>
            </div>
            <!-- Danh sách cán bộ -->
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
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        // echo "<prev>";
                        // print_r($row);
                        // echo "<?prev>";

                    ?>
                        <tr>
                            <td> <?php echo $row['ten']; ?> </td>
                            <td> <?php echo $row['chuc_vu']; ?></td>
                            <td> <?php echo $row['sdt_co_quan']; ?></td>
                            <td> <?php echo $row['sdt_di_dong'] ?></td>
                            <td> <?php echo $row['email'] ?></td>
                            <td> <?php echo $row['ten_don_vi'] ?></td>
                            <td> <?php echo $row['ten_phong_ban'] ?></td>
                            <td><a href="edit.php?myid=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a href="./delete.php?myid"><i class="bi bi-archive-fill"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>