<?php
session_start();

if (!$_SESSION['admin_username']) {
  header('location:login.php');
}

include 'connection.php';
$sql = $conn->prepare("SELECT * FROM `tb_admin` WHERE `admin_username` = ?;");
$sql->bindParam(1, $_SESSION['admin_username']);
$sql->execute();
$publisher = $sql->fetch(PDO::FETCH_ASSOC);
$sql2 = $conn->prepare("SELECT tb_alumni.alumni_id, tb_alumni.alumni_year_in, tb_alumni.alumni_year_out, tb_alumni.alumni_prefix
, tb_alumni.alumni_firstname, tb_alumni.alumni_lastname, tb_alumni.alumni_birthday, tb_alumni.alumni_img, tb_alumni.alumni_email, 
tb_alumni.alumni_phone, tb_alumni.alumni_address, tb_alumni.alumni_comment, 
tb_alumni.alumni_status, tb_alumni.alumni_sex, tb_alumni_school.school_name, tb_alumni_school.school_province, tb_alumni_school.school_url, tb_alomni_education.education_year, tb_alomni_education.education_level, 
tb_alomni_education.education_faculty, tb_alomni_education.education_branch, tb_alomni_education.education_university, tb_alumni_work.company_name, tb_alumni_work.company_address, tb_alumni_work.company_start, 
tb_alumni_work.company_end, tb_alumni_work.company_performance, tb_alumni_work.company_position
FROM    ((tb_alumni LEFT JOIN tb_alumni_school ON tb_alumni.alumni_id  = tb_alumni_school.alumni_id)
LEFT JOIN tb_alomni_education ON tb_alumni.alumni_id  = tb_alomni_education.alumni_id)
LEFT JOIN tb_alumni_work ON tb_alumni.alumni_id  = tb_alumni_work.alumni_id WHERE tb_alumni.alumni_id=?");
$sql2->bindParam(1, $_GET["id"]);
$sql2->execute();
$publisher2 = $sql2->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>แก้ไขข้อมูล</title>
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
  <!-- เนื้อหา -->
  <section>
    <form method="POST" enctype="multipart/form-data">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-10-strong card-registration" style="border-radius: 15px; border: 3px solid #000000;">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">แก้ไขข้อมูล</h3>
                <form>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="alumni_id">รหัสนักศึกษา</label>
                        <input type="text" name="alumni_id" readonly placeholder="รหัสนักศึกษา" class="form-control form-control-lg" value="<?php echo $publisher2['alumni_id'] ?>" required />
                      </div>
                    </div>
                    <div class=" col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="alumni_birthday">วันเกิด</label>
                        <input type="date" name="alumni_birthday" placeholder="วันเกิด" class="form-control form-control-lg" value="<?php echo $publisher2['alumni_birthday'] ?>" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="firstName">ปีที่เข้าศึกษา</label>
                        <input type="number" name="alumni_year_in" placeholder="ปีที่เข้าศึกษา" class="form-control form-control-lg" value="<?php echo $publisher2['alumni_year_in'] ?>" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="lastName">ปีจบการศึกษา</label>
                        <input type="number" name="alumni_year_out" placeholder="ปีจบการศึกษา" class="form-control form-control-lg" value="<?php echo $publisher2['alumni_year_out'] ?>" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 mb-2">
                      <label class="form-label select-label">คำนำหน้า</label>
                      <select class="select form-control form-control-lg" name="alumni_prefix" required>
                        <option value="<?php echo $publisher2['alumni_prefix'] ?>"><?php echo $publisher2['alumni_prefix'] ?></option>
                        <option value="นาย">นาย</option>
                        <option value="นางสาว">นางสาว</option>
                        <option value="นาง">นาง</option>
                      </select>
                    </div>
                    <div class="col-md-5 mb-4">
                      <div class="form-outline">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" name="alumni_firstname" placeholder="ชื่อ" class="form-control form-control-lg" value="<?php echo $publisher2['alumni_firstname'] ?>" required />
                      </div>
                    </div>
                    <div class="col-md-5 mb-4">
                      <div class="form-outline">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" name="alumni_lastname" placeholder="นามสกุล" class="form-control form-control-lg" value="<?php echo $publisher2['alumni_lastname'] ?>" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label">E-Mail</label>
                        <input type="email" name="alumni_email" placeholder="E-mail" class="form-control form-control-lg" value="<?php echo $publisher2['alumni_email'] ?>" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label">เบอร์โทร</label>
                        <input type="text" name="alumni_phone" placeholder="เบอร์โทร" class="form-control form-control-lg" value="<?php echo $publisher2['alumni_phone'] ?>" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-12 d-flex align-items-center">
                      <div class="form-outline datepicker w-100">
                        <label for="alumni_address" class="form-label">ที่อยู่</label>
                        <textarea placeholder="ที่อยู่" class="form-control" name="alumni_address" rows="3" required><?php echo $publisher2['alumni_address'] ?></textarea>
                      </div>
                    </div>
                  </div>
                  <br>
                  <h4>ข้อมูลการศึกษาระดับมัธยม</h4>
                  <br>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="school_name">ชื่อโรงเรียน</label>
                        <input type="text" name="school_name" placeholder="ชื่อโรงเรียน" class="form-control form-control-lg" value="<?php echo $publisher2['school_name'] ?>" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="school_province">จังหวัด</label>
                        <input type="text" name="school_province" placeholder="จังหวัด" class="form-control form-control-lg" value="<?php echo $publisher2['school_province'] ?>" required />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-outline">
                        <label class="form-label" for="school_url">URL Web โรงเรียน</label>
                        <input type="text" name="school_url" placeholder="URL Web โรงเรียน" class="form-control form-control-lg" value="<?php echo $publisher2['school_url'] ?>" required />
                      </div>
                    </div>
                  </div>
                  <br>
                  <h4>ข้อมูลการศึกษาต่อ</h4>
                  <br>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="education_year">ปีที่เข้าศึกษาต่อ</label>
                        <input type="number" name="education_year" placeholder="ปีที่เข้าศึกษาต่อ" class="form-control form-control-lg" value="<?php echo $publisher2['education_year'] ?>" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <label class="form-label" for="education_level">ระดับการศึกษา</label>
                      <select placeholder="ระดับการศึกษา" class="select form-control form-control-lg" name="education_level">
                        <option value="<?php echo $publisher2['education_level'] ?>" disabled><?php echo $publisher2['education_level'] ?></option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="education_faculty">คณะ</label>
                        <input type="text" name="education_faculty" placeholder="คณะ" class="form-control form-control-lg" value="<?php echo $publisher2['education_faculty'] ?>" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="education_branch">สาขา</label>
                        <input type="text" name="education_branch" placeholder="สาขา" class="form-control form-control-lg" value="<?php echo $publisher2['education_branch'] ?>" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="education_university">มหาวิทยาลัย</label>
                        <input type="text" name="education_university" placeholder="มหาวิทยาลัย" class="form-control form-control-lg" value="<?php echo $publisher2['education_university'] ?>" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <h4>ข้อมูลการทำงาน</h4>
                  <br>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="company_start">ปีที่เริ่มทำงาน</label>
                        <input type="text" name="company_start" placeholder="ปีที่เริ่มทำงาน" class="form-control form-control-lg" value="<?php echo $publisher2['company_start'] ?>" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="company_end">ปีที่สิ้นสุดการทำงาน</label>
                        <input type="text" name="company_end" placeholder="ปีที่สิ้นสุดการทำงาน" class="form-control form-control-lg" value="<?php echo $publisher2['company_end'] ?>" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="company_position">ตำแหน่งงาน</label>
                        <input type="text" name="company_position" placeholder="ตำแหน่งงาน" class="form-control form-control-lg" value="<?php echo $publisher2['company_position'] ?>" />
                      </div>
                    </div>
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="company_name">ชื่อบริษัท</label>
                        <input type="text" name="company_name" placeholder="ชื่อบริษัท" class="form-control form-control-lg" value="<?php echo $publisher2['company_name'] ?>" />
                      </div>
                    </div>
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="company_address">ที่อยู่บริษัท</label>
                        <textarea placeholder="ที่อยู่บริษัท" class="form-control" name="company_address" rows="3"><?php echo $publisher2['company_address'] ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="company_performance">ผลงานที่โดดเด่น</label>
                        <textarea placeholder="ผลงานที่โดดเด่น" class="form-control" name="company_performance" rows="3"><?php echo $publisher2['company_performance'] ?></textarea>
                      </div>
                    </div>
                  </div>
                  <br>
                  <h4>ข้อคิดเห็น</h4>
                  <div class="col-md-12 mb-6">
                    <div class="form-outline">
                      <textarea placeholder="ข้อคิดเห็น" class="form-control" name="alumni_comment" rows="3"><?php echo $publisher2['alumni_comment'] ?></textarea>
                    </div>
                  </div>
                  <hr size="4px">
                  <h4>รูปศิษย์เก่า </h4>
                  <div class="col-md-12 mb-6">
                    <div class="form-outline">
                      <input type="file" class="form-control-file" name='img' accept="image/png, image/jpeg">
                      <img src="<?php echo $publisher2['alumni_img'] ?>" width="150" height="150">
                    </div>
                  </div>
                  <div class="mt-4 pt-2 text-center">
                    <input class="btn btn-primary" type="submit" name="submit" value="บันทึก" />
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
  $alumni_id =  $_POST['alumni_id'];
  $alumni_prefix = $_POST['alumni_prefix'];
  $alumni_firstname = $_POST['alumni_firstname'];
  $alumni_lastname = $_POST['alumni_lastname'];
  $alumni_year_in = $_POST['alumni_year_in'];
  $alumni_year_out = $_POST['alumni_year_out'];
  $alumni_birthday = $_POST['alumni_birthday'];
  $alumni_email = $_POST['alumni_email'];
  $alumni_phone = $_POST['alumni_phone'];
  $alumni_address = $_POST['alumni_address'];
  $alumni_comment = $_POST['alumni_comment'];
  $school_name = $_POST['school_name'];
  $school_province = $_POST['school_province'];
  $school_url = $_POST['school_url'];
  $company_name = $_POST['company_name'];
  $company_address = $_POST['company_address'];
  $company_start = $_POST['company_start'];
  $company_end = $_POST['company_end'];
  $company_performance = $_POST['company_performance'];
  $company_position = $_POST['company_position'];
  $education_year = $_POST['education_year'];
  $education_level = $_POST['education_level'];
  $education_faculty = $_POST['education_faculty'];
  $education_branch = $_POST['education_branch'];
  $education_university = $_POST['education_university'];
  if ($alumni_prefix == "นาย") {
    $alumni_sex = "ชาย";
  } else {
    $alumni_sex = "หญิง";
  }
  if (empty($_FILES["img"]["name"])) {
    $fileImg = $publisher2['alumni_img'];
  } else {
    $dir = "images/alumni_image/";
    $fileImg = $dir . $alumni_id . ".png";
    move_uploaded_file($_FILES["img"]["tmp_name"], $fileImg);
  }
  function phpAlert($msg)
  {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

  //ไฟล์เชื่อมต่อฐานข้อมูล
  require 'connection.php';

  try {
    $stmt = $conn->prepare("UPDATE tb_alumni SET alumni_prefix=?, alumni_firstname=?, alumni_lastname=?, alumni_birthday=?, alumni_email=?, alumni_phone=?, alumni_address=?, alumni_comment=?, alumni_sex=?, alumni_year_in=?, alumni_year_out=?, alumni_img=?  WHERE alumni_id=?");

    $stmt->bindParam(1, $alumni_prefix);
    $stmt->bindParam(2, $alumni_firstname);
    $stmt->bindParam(3, $alumni_lastname);
    $stmt->bindParam(4, $alumni_birthday);
    $stmt->bindParam(5, $alumni_email);
    $stmt->bindParam(6, $alumni_phone);
    $stmt->bindParam(7, $alumni_address);
    $stmt->bindParam(8, $alumni_comment);
    $stmt->bindParam(9, $alumni_sex);
    $stmt->bindParam(10, $alumni_year_in);
    $stmt->bindParam(11, $alumni_year_out);    
    $stmt->bindParam(12, $fileImg);
    $stmt->bindParam(13, $alumni_id);

    $stmt2 = $conn->prepare("UPDATE tb_alumni_school SET school_name=?, school_province=?, school_url=? WHERE alumni_id=?");
    $stmt2->bindParam(1, $school_name);
    $stmt2->bindParam(2, $school_province);
    $stmt2->bindParam(3, $school_url);
    $stmt2->bindParam(4, $alumni_id);

    if (!empty($alumni_id)) {
      $stmt3 = $conn->prepare("UPDATE tb_alomni_education SET education_year=?, education_level=?, education_faculty=?, education_branch=?, 	education_university=? WHERE alumni_id=?");
      $stmt3->bindParam(1, $education_year);
      $stmt3->bindParam(2, $education_level);
      $stmt3->bindParam(3, $education_faculty);
      $stmt3->bindParam(4, $education_branch);
      $stmt3->bindParam(5, $education_university);
      $stmt3->bindParam(6, $alumni_id);
      $stmt3->execute();
    }
    if (!empty($alumni_id)) {
      $stmt4 = $conn->prepare("UPDATE tb_alumni_work SET company_name=?, company_address=?, company_start=?, company_end=?, 	company_performance=?, company_position=? WHERE alumni_id=?");
      $stmt4->bindParam(1, $company_name);
      $stmt4->bindParam(2, $company_address);
      $stmt4->bindParam(3, $company_start);
      $stmt4->bindParam(4, $company_end);
      $stmt4->bindParam(5, $company_performance);
      $stmt4->bindParam(6, $company_position);
      $stmt4->bindParam(7, $alumni_id);
      $stmt4->execute();
    }

    $stmt->execute();
    $stmt2->execute();
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page.php\">";
    phpAlert("บันทึกข้อมูลเรียบร้อย");
  } catch (PDOException $e) {
    phpAlert("Error: " . $e->getMessage());
  }
}
$conn = null;
exit;
?>