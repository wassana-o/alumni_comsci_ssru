<?php
session_start();

if (!$_SESSION['admin_username']) {
  header('location:login.php');
}
$show = 0;
include 'connection.php';
//echo $_SESSION['admin_username'];
$sql = $conn->prepare("SELECT * FROM tb_admin WHERE admin_username  = ?;");
$sql->bindParam(1, $_SESSION['admin_username']);
$sql->execute();
$publisher = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>เพิ่มผู้ดูแลระบบ</title>
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

    .gradient-custom {
      background: rgb(144, 170, 226);
      background: radial-gradient(circle, rgba(144, 170, 226, 1) 0%, rgba(230, 202, 232, 1) 100%);
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }
  </style>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>

<body class="gradient-custom d-flex flex-column min-vh-100">

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
  <!-- เนื้อหา -->
  <?php if ($publisher['admin_status'] == 1) {  ?>
    <section>
      <form method="POST" enctype="multipart/form-data">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-10-strong card-registration" style="border-radius: 15px; border: 3px solid #000000;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">เพิ่มผู้ดูแลระบบ</h3>
                  <form>
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="alumni_id">รหัสผู้ดูแลระบบ</label>
                          <input type="text" name="admin_id" placeholder="รหัสผู้ดูแลระบบ" class="form-control form-control-lg" required />
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label">ชื่อ</label>
                          <input type="text" name="admin_firstname" placeholder="ชื่อ" class="form-control form-control-lg" required />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label">นามสกุล</label>
                          <input type="text" name="admin_lastname" placeholder="นามสกุล" class="form-control form-control-lg" required />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label">Username</label>
                          <input type="text" name="admin_username" placeholder="username" class="form-control form-control-lg" required />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label">Password</label>
                          <input type="password" name="admin_password" placeholder="password" class="form-control form-control-lg" required />
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="mt-4 pt-2 text-center">
                      <input class="btn btn-primary" type="submit" name="submit" value="เพิ่มข้อมูล" />
                      <button type="button" class="btn btn-secondary"><a href="login.php" style="text-decoration: none;color: white;">ย้อนกลับ</a></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  <?php } else { ?>
    <br>
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

<?php

if (isset($_POST['submit'])) {
  $admin_id =  $_POST['admin_id'];
  $admin_firstname = $_POST['admin_firstname'];
  $admin_lastname = $_POST['admin_lastname'];
  $admin_username = $_POST['admin_username'];
  //$admin_password = $_POST['admin_password'];
  $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

  function phpAlert($msg)
  {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }
  //ไฟล์เชื่อมต่อฐานข้อมูล
  require 'connection.php';
  $status = 1;
  $time = date("Y-m-d H:i:s");
  try {
    $stmt = $conn->prepare("INSERT INTO  tb_admin(admin_id, admin_firstname, admin_lastname, admin_username, admin_password, admin_status, admin_created_by, admin_created_at) VALUES(?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $admin_id);
    $stmt->bindParam(2, $admin_firstname);
    $stmt->bindParam(3, $admin_lastname);
    $stmt->bindParam(4, $admin_username);
    $stmt->bindParam(5, $admin_password);
    $stmt->bindParam(6, $status);
    $stmt->bindParam(7, $publisher['admin_id']);
    $stmt->bindParam(8, $time);

    $stmt->execute();
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_admin.php\">";
    phpAlert("บันทึกเรียบร้อย");
  } catch (PDOException $e) {
    phpAlert("Error: " . $e->getMessage());
  }
}
$conn = null;
exit;
?>