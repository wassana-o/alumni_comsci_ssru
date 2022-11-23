<?php
session_start();

if (!$_SESSION['admin_username']) {
  header('location:login.php');
}
$show = 0;
include 'connection.php';
$sql = $conn->prepare("SELECT * FROM `tb_admin` WHERE `admin_username` = ?;");
$sql->bindParam(1, $_SESSION['admin_username']);
$sql->execute();
$publisher = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการผู้ดูแลระบบ</title>
  <link rel="icon" href="images/logo3.png" type="image/x-icon" />
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;300&display=swap" rel="stylesheet" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    * {
      font-family: "Kanit", sans-serif;
    }
  </style>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<!-- Navigation-->
<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/logo2.png" height="50" alt="logo" />
    </a>
    <h5>ฐานข้อมูลศิษย์เก่า
      <br> COM - SCI SSRU
    </h5>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alumni_info.php">ข้อมูลศิษย์เก่า</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="register_page.php">ลงทะเบียนศิษย์เก่า</a>
        </li>
      </ul>
      <div class="row">
        <div class="col align-self-end">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <div class="nav-link">Name : <?php
                                            echo $publisher['admin_firstname']
                                            ?> <br> Status : <?php if ($publisher['admin_status'] == 0) {
                                                                echo "ไม่มีสิทธิ์";
                                                              } else {
                                                                echo "มีสิทธิ์";
                                                              } ?></div>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="login.php">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<body class="d-flex flex-column min-vh-100" style="background-color: #f6fff9">
  <br>
  <?php if ($publisher['admin_status'] == 1) {  ?>
    <h3 class="text-center">จัดการผู้ดูแลระบบ</h3>
    <br>
    <div class="row justify-content-center">
      <div class="col-10">
      <div class="text-end">
          <a href="admin_page.php"><button type="button" class="btn btn-outline-secondary">จัดการข้อมูลศิษย์เก่า</button></a>
        </div>
        <br>
        <table class="table table-striped table-bordered" style="background-color: #ffffff;">
          <thead>
            <tr class="bg-warning">
              <th scope="col">รหัสผู้ดูแลระบบ</th>
              <th scope="col">สถานะ</th>
              <th scope="col">ชื่อ</th>
              <th scope="col">Username</th>
              <th scope="col">เพิ่มโดย</th>
              <th scope="col">สร้างเวลา</th>
              <th scope="col">อัพเดทโดย</th>
              <th scope="col">อัพเดทเวลา</th>
              <th scope="col">เพิ่มสิทธิ์</th>
              <th scope="col">ลดสิทธิ์</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = $conn->prepare("SELECT * FROM tb_admin");
            $sql->execute();
            $publisher = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($publisher as $sql) {
            ?>
              <tr>
                <th scope="row"><?php echo $sql["admin_id"] ?></th>
                <td><?php if ($sql["admin_status"] == 0) {
                      echo "<b style='color:red;'>ไม่มีสิทธิ์</b>";
                    } else {
                      echo "<b style='color:green;'>มีสิทธิ์</b>";
                    }  ?></td>
                <td><?php echo $sql["admin_firstname"] ?> <?php echo $sql["admin_lastname"] ?></td>
                <td><?php echo $sql["admin_username"] ?></td>
                <td><?php echo $sql["admin_created_by"] ?></td>
                <td><?php echo $sql["admin_created_at"] ?></td>
                <td><?php echo $sql["admin_update_by"] ?></td>
                <td><?php echo $sql["admin_update_at"] ?></td>
                <td><a href="addAdmin.php?id=<?php echo $sql["admin_id"] ?>" onclick="return confirm('คุณต้องการเพิ่มสิทธิ์ที่เลือก')"><button type="button" class="btn btn-success">เพิ่มสิทธิ์</button></a></td>
                <td><a href='reduceAdmin.php?id=<?php echo $sql["admin_id"] ?>' onclick="return confirm('คุณต้องการลดสิทธิ์ที่เลือก')"><button type="button" class="btn btn-danger">ลดสิทธิ์</button></a></td>
                
              </tr>
            <?php
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php } else { ?>
    <h1 class="text-center">คุณไม่มีสิทธิ์จัดการข้อมูลศิษย์เก่า</h1><br>
    <img src="images/x.png" alt="" class="center" style="width: 30%;display: block; margin-left: auto; margin-right: auto;"><br>
  <?php } ?>
</body>
<!-- ส่วนท้าย -->
<footer class="mt-auto" style="background-color: #e7e7e7">
  <div class="container"><br>
    <div class="row">
      <div class="col">
        <img src="images/logo2.png" height="80" alt="" />
        Copyright &copy; SSRU COM - SCI
      </div>
      <div class="col"></div>
      <div class="col">
        <p>
          <strong>เกี่ยวกับเรา</strong> <br />
          มหาวิทยาลัยราชภัฏสวนสุนันทา สาขาวิทยาการคอมพิวเตอร์ <br />
          ฐานข้อมูลศิษย์เก่า
        </p>
      </div>
    </div>
  </div>
</footer>
</html>

