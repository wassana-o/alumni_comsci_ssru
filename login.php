<?php
session_start();
if ($_SESSION) {
  if ($_SESSION['admin_username']){
    header('location:admin_page.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
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

<body class="d-flex flex-column min-vh-100" style="background-color: #f6fff9">
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
                <a class="nav-link active" href="login.php">Admin</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <br>
  <h2 align="center">เข้าสู่ระบบจัดการข้อมูล</h2>
  <br>
  <!-- login -->
  <div class="container">
    <div class="row">
      <div class="col">

      </div>
      <div class="col-md-6" style="border-radius: 10px; border: 2px solid #000000; background-color: #FFFFFF;">
        <br>
        <form method="POST">
          <div class="form-group">
            <label for="formGroupExampleInput">Username</label>
            <input type="text" class="form-control" id="addInput1" required placeholder="กรอก Username" name="user">
          </div><br>
          <div class="form-group">
            <label for="formGroupExampleInput2">Password</label>
            <input type="password" class="form-control" id="addInput2" required placeholder="กรอก password" name="pass">
          </div>
          <br>
          <button type="submit" name='submit' class="btn btn-primary">เข้าสู่ระบบ</button>
        </form>
        <br>
      </div>
      <div class="col">

      </div>
    </div>
  </div>
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

include 'connection.php';
function phpAlert($msg)
{
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if (isset($_POST['submit'])) {
  $username = trim($_POST['user']);
  $password = trim($_POST['pass']);

  if ($username != "" && $password != "") {
    try {
      //$query = "select * from tb_admin where admin_username=:username and admin_password=:password";
      $query = "select * from tb_admin where admin_username=:username";
      $stmt = $conn->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      //$stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($count == 1 && !empty($row)) {
            if (password_verify($password, $row['admin_password'])){
              /******************** Your code ***********************/            
              $_SESSION = $row;              
              //echo '<meta http-equiv=\"refresh\" content=\"0;URL=admin_page.php\">';
              //header('Location: /admin_page.php');
              // header( "refresh: 1; url=admin_page.php" );
              // exit(0);
              phpAlert("Admin login สำเร็จ");
              echo '<script type="text/javascript"> window.location = "admin_page.php" </script>';            
              
            }else{
              phpAlert("password ไม่ถูกต้อง");
            }
      } else {
        phpAlert("user หรือ password ไม่ถูกต้อง");
      }
    } catch (PDOException $e) {
      echo "Error : " . $e->getMessage();
    }
  } else {
    phpAlert("กรอก user และ รหัสผ่าน");
  }
}
?>