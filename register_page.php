<?php
include 'connection.php';
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ลงทะเบียนศิษย์เก่า</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <a class="nav-link active" href="register_page.php">ลงทะเบียนศิษย์เก่า</a>
          </li>
        </ul>
        <div class="row">
          <div class="col align-self-end">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="login.php">Admin</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- เนื้อหา -->
  <script>
    function Hello() {
      var copyText = document.getElementById('myInput')
      copyText.select();
      document.execCommand('copy')
      console.log('Copied Text')
    }
  </script>
   <script>
    const myTimeout = setTimeout(modalAccept, 500);
    function modalAccept() {
      console.log("TEST");
      $(document).ready(function() {
        $("#acceptPolicy").modal('show');
      });
    }
  </script>
  <!-- Modal Accept -->
  <div id="acceptPolicy" class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="  display: flex; align-items: center; justify-content: center;">
          <h5 class="modal-title">นโยบายคุ้มครองข้อมูลส่วนบุคคล <br> (Personal Data Privacy Policy)</h5>
        </div>
        <div class="modal-body">
          <p style="text-align: justify;padding: 10px;">&nbsp; &nbsp; &nbsp; <b>สาขาวิชาวิทยาการคอมพิวเตอร์และนวัตกรรมข้อมูล มหาวิทยาลัยราชภัฎสวนสุนันทา</b> ในฐานะผู้ควบคุมดูแลระบบฐานข้อมูลศิษย์เก่าวิทยาการคอมพิวเตอร์และจัดเก็บข้อมูลส่วนบุคคลตามพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ.2562 ได้ตระหนักถึงความสำคัญของการคุ้มครองข้อมูลส่วนบุคคลที่มีประสิทธิภาพและสอดคล้องกับหลักการพื้นฐานของการคุ้มครองข้อมูลส่วนบุคคล คือ หลักความจำเป็น ความได้สัดส่วนและการเคารพสิทธิขั้นพื้นฐานของเจ้าของข้อมูลส่วนบุคคลตามรัฐธรรมนูญและมาตรฐานสากล จึงได้จัดทำนโยบายคุ้มครองข้อมูลส่วนบุคคล เพื่อให้เจ้าของข้อมูลและสาธารณชนรับทราบและเข้าใจถึงวัตถุประสงค์ หลักการและมาตรการรักษาความปลอดภัยของข้อมูลส่วนบุคคล โดย ธปท. เพื่อดำเนินการในหน้าที่รวบรวมและรักษาข้อมูลส่วนบุคคลและการกำกับดูแลข้อมูลนั้น ให้เป็นประโยชน์ต่อการพัฒนาฐานข้อมูลศิษย์เก่าของสาขาวิชา ตลอดจนการบริหารจัดการภายในสาขาวิชา
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">ข้าพเจ้ารับทราบนโยบายและยินยอมให้จัดเก็บข้อมูล</button>
          <button type="button" onclick="window.location.href = 'index.php';" class="btn btn-secondary">ข้าพเจ้ารับทราบนโยบายและไม่ยินยอมให้จัดเก็บข้อมูล</button>
        </div>
      </div>
    </div>
  </div>

  <br> 
  <section>
    <form method="POST" enctype="multipart/form-data">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-10-strong card-registration" style="border-radius: 15px; border: 3px solid #000000;">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">แบบฟอร์มลงทะเบียนศิษย์เก่า </h3>
                <div class="text-end ">
                  <div class="row justify-content-end align-items-end h-100">
                    <div class="col-md-6">
                      <input class="form-control" type="text" readonly id="myInput" value="<?php echo 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"> <br>
                    </div>
                  </div>
                  <button type="button" class="btn btn-outline-info" onclick="Hello()"> คัดลอก URL </button>
                </div>
                <form>
                  <h4>ข้อมูลทั่วไป <b style="color:red;">*</b></h4>
                  <br>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="alumni_id">รหัสนักศึกษา <b style="color:red;">*</b></label>
                        <input type="text" name="alumni_id" placeholder="รหัสนักศึกษา" class="form-control form-control-lg" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="alumni_birthday">วันเกิด</label>
                        <input type="date" name="alumni_birthday" placeholder="วันเกิด" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="firstName">ปีที่เข้าศึกษา <b style="color:red;">*</b></label>
                        <input type="number" name="alumni_year_in" placeholder="ปีที่เข้าศึกษา" class="form-control form-control-lg" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="lastName">ปีจบการศึกษา <b style="color:red;">*</b></label>
                        <input type="number" name="alumni_year_out" placeholder="ปีจบการศึกษา" class="form-control form-control-lg" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 mb-2">
                      <label class="form-label select-label">คำนำหน้า <b style="color:red;">*</b></label>
                      <select class="select form-control form-control-lg" name="alumni_prefix" required>
                        <option value="0" disabled>เลือกคำนำหน้า</option>
                        <option value="นาย">นาย</option>
                        <option value="นางสาว">นางสาว</option>
                        <option value="นาง">นาง</option>
                      </select>
                    </div>
                    <div class="col-md-5 mb-4">
                      <div class="form-outline">
                        <label class="form-label">ชื่อ <b style="color:red;">*</b></label>
                        <input type="text" name="alumni_firstname" placeholder="ชื่อ" class="form-control form-control-lg" required />
                      </div>
                    </div>
                    <div class="col-md-5 mb-4">
                      <div class="form-outline">
                        <label class="form-label">นามสกุล <b style="color:red;">*</b></label>
                        <input type="text" name="alumni_lastname" placeholder="นามสกุล" class="form-control form-control-lg" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="col-md-12">
                      <div class="form-outline">
                        <label class="form-label">เลขบัตรประชาชน</label>
                        <input type="text" name="alumni_idcard" placeholder="เลขบัตรประชาชน" class="form-control form-control-lg" />
                      </div>
                    </div> -->
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label">E-Mail <b style="color:red;">*</b></label>
                        <input type="email" name="alumni_email" placeholder="E-mail" class="form-control form-control-lg" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label">เบอร์โทร <b style="color:red;">*</b></label>
                        <input type="text" name="alumni_phone" placeholder="เบอร์โทร" class="form-control form-control-lg" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-12 d-flex align-items-center">
                      <div class="form-outline datepicker w-100">
                        <label for="alumni_address" class="form-label">ที่อยู่สำหรับติดต่อ </label>
                        <textarea placeholder="ที่อยู่" class="form-control" name="alumni_address" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <br>
                  <hr size="4px">
                  <h4>ข้อมูลการศึกษาระดับมัธยม <b style="color:red;">*</b></h4>
                  <br>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="school_name">ชื่อโรงเรียน <b style="color:red;">*</b></label>
                        <input type="text" name="school_name" placeholder="ชื่อโรงเรียน" class="form-control form-control-lg" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="school_province">จังหวัด <b style="color:red;">*</b></label>
                        <input type="text" name="school_province" placeholder="จังหวัด" class="form-control form-control-lg" required />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-outline">
                        <label class="form-label" for="school_url">URL Web โรงเรียน <b style="color:red;">*</b></label>
                        <input type="text" name="school_url" placeholder="URL Web โรงเรียน" class="form-control form-control-lg" required />
                      </div>
                    </div>
                  </div>
                  <br>
                  <hr>
                  <h4 size="4px">ข้อมูลการศึกษาต่อ</h4>
                  <br>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="education_year">ปีที่เข้าศึกษาต่อ</label>
                        <input type="number" name="education_year" placeholder="ปีที่เข้าศึกษาต่อ" class="form-control form-control-lg" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <label class="form-label" for="education_level">ระดับการศึกษา</label>
                      <select placeholder="ระดับการศึกษา" class="select form-control form-control-lg" name="education_level">
                        <option value="">--เลือกระดับการศึกษาต่อ--</option>
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
                        <input type="text" name="education_faculty" placeholder="คณะ" class="form-control form-control-lg" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="education_branch">สาขา</label>
                        <input type="text" name="education_branch" placeholder="สาขา" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="education_university">มหาวิทยาลัย</label>
                        <input type="text" name="education_university" placeholder="มหาวิทยาลัย" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <hr size="4px">
                  <h4>ข้อมูลการทำงาน</h4>
                  <br>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="company_start">ปีที่เริ่มทำงาน</label>
                        <input type="text" name="company_start" placeholder="ปีที่เริ่มทำงาน" class="form-control form-control-lg" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="company_end">ปีที่สิ้นสุดการทำงาน</label>
                        <input type="text" name="company_end" placeholder="ปีที่สิ้นสุดการทำงาน" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="company_position">ตำแหน่งงาน</label>
                        <input type="text" name="company_position" placeholder="ตำแหน่งงาน" class="form-control form-control-lg" />
                      </div>
                    </div>
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="company_name">ชื่อบริษัท</label>
                        <input type="text" name="company_name" placeholder="ชื่อบริษัท" class="form-control form-control-lg" />
                      </div>
                    </div>
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="company_address">ที่อยู่บริษัท</label>
                        <textarea placeholder="ที่อยู่บริษัท" class="form-control" name="company_address" rows="3"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 mb-6">
                      <div class="form-outline">
                        <label class="form-label" for="company_performance">ผลงานที่โดดเด่น</label>
                        <textarea placeholder="ผลงานที่โดดเด่น" class="form-control" name="company_performance" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <br>
                  <hr size="4px">
                  <h4>ข้อคิดเห็น</h4>
                  <div class="col-md-12 mb-6">
                    <div class="form-outline">
                      <textarea placeholder="ข้อคิดเห็น" class="form-control" name="alumni_comment" rows="3"></textarea>
                    </div>
                  </div>
                  <hr size="4px">
                  <h4>รูปศิษย์เก่า  <b style="color:red;">*</b></h4>
                  <div class="col-md-12 mb-6">
                    <div class="form-outline">
                      <input type="file" class="form-control-file" name='img'  accept="image/png, image/jpeg" required>
                    </div>
                  </div>
                  <div class="mt-4 pt-2 text-center">
                    <input class="btn btn-primary" type="submit" name="submit" value="ลงทะเบียน" />
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

  $dir = "images/alumni_image/";
  $fileImg = $dir . $alumni_id.".png";
  move_uploaded_file($_FILES["img"]["tmp_name"], $fileImg);


  function phpAlert($msg)
  {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

  //ไฟล์เชื่อมต่อฐานข้อมูล
  require 'connection.php';

  try {
    $stmt = $conn->prepare("INSERT INTO tb_alumni(alumni_id, alumni_prefix, alumni_firstname, alumni_lastname, alumni_birthday, alumni_email, alumni_phone, alumni_address, alumni_comment, alumni_sex, alumni_year_in, alumni_year_out, alumni_img) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $alumni_id);
    $stmt->bindParam(2, $alumni_prefix);
    $stmt->bindParam(3, $alumni_firstname);
    $stmt->bindParam(4, $alumni_lastname);
    $stmt->bindParam(5, $alumni_birthday);
    $stmt->bindParam(6, $alumni_email);
    $stmt->bindParam(7, $alumni_phone);
    $stmt->bindParam(8, $alumni_address);
    $stmt->bindParam(9, $alumni_comment);
    $stmt->bindParam(10, $alumni_sex);
    $stmt->bindParam(11, $alumni_year_in);
    $stmt->bindParam(12, $alumni_year_out);
    $stmt->bindParam(13, $fileImg);


    $stmt2 = $conn->prepare("INSERT INTO tb_alumni_school(alumni_id, school_name, school_province, school_url) VALUES(?,?,?,?)");
    $stmt2->bindParam(1, $alumni_id);
    $stmt2->bindParam(2, $school_name);
    $stmt2->bindParam(3, $school_province);
    $stmt2->bindParam(4, $school_url);


    $stmt3 = $conn->prepare("INSERT INTO tb_alomni_education(education_year, education_level, education_faculty, education_branch, 	education_university, alumni_id) VALUES(?,?,?,?,?,?)");
    $stmt3->bindParam(1, $education_year);
    $stmt3->bindParam(2, $education_level);
    $stmt3->bindParam(3, $education_faculty);
    $stmt3->bindParam(4, $education_branch);
    $stmt3->bindParam(5, $education_university);
    $stmt3->bindParam(6, $alumni_id);
    $stmt3->execute();


    $stmt4 = $conn->prepare("INSERT INTO tb_alumni_work(company_name, company_address, company_start, company_end, 	company_performance, alumni_id, company_position) VALUES(?,?,?,?,?,?,?)");
    $stmt4->bindParam(1, $company_name);
    $stmt4->bindParam(2, $company_address);
    $stmt4->bindParam(3, $company_start);
    $stmt4->bindParam(4, $company_end);
    $stmt4->bindParam(5, $company_performance);
    $stmt4->bindParam(6, $alumni_id);
    $stmt4->bindParam(7, $company_position);
    $stmt4->execute();

    $stmt->execute();
    $stmt2->execute();
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=alumni_info.php\">";
    phpAlert("บันทึกเรียบร้อย กรุณารอผู้ดูแลระบบตรวจสอบข้อมูล");    
  } catch (PDOException $e) {
    phpAlert("Error: " . $e->getMessage());
  }
}
$conn = null;
exit;
?>