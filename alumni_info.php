<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ข้อมูลศิษย์เก่า</title>
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
            <a class="nav-link active" href="alumni_info.php">ข้อมูลศิษย์เก่า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="register_page.php">ลงทะเบียนศิษย์เก่า</a>
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


  <br />
  <h2 align="center">ข้อมูลศิษย์เก่า</h2>
  <br />
  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="text-center">
        <form action="alumni_info.php" method="post">
          <div class="input-group">
            <input type="search" name="valueToSearch" class="form-control rounded" placeholder="ค้นหาจากรหัสนักศึกษา / ชื่อ / นามสกุล" aria-label="Search" aria-describedby="search-addon" value="<?php if (isset($_POST['search'])) {echo $_POST['valueToSearch'];} ?>" />
            <button type="submit" name="search" class="btn btn-outline-primary">ค้นหา</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <br />
  <div class="container">
    <div class="row row-cols-1 row-cols-xs-1 row-cols-md-5 g-3 justify-content-md-center">
      <?php
      if (isset($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $sql = $conn->prepare("SELECT alumni_id, alumni_sex, alumni_status, alumni_firstname, alumni_lastname, alumni_img, alumni_year_in FROM tb_alumni WHERE CONCAT(`alumni_id`, `alumni_firstname`, `alumni_lastname`) like '%$valueToSearch%'");
      } else {
        $sql = $conn->prepare("SELECT alumni_id, alumni_sex, alumni_status, alumni_firstname, alumni_lastname, alumni_img, alumni_year_in FROM tb_alumni");
      }
      $sql->execute();
      $publisher = $sql->fetchAll(PDO::FETCH_ASSOC);

      foreach ($publisher as $sql) {
        if ($sql["alumni_status"] == 1) {
          $alumni_gen = $sql["alumni_year_in"]-2529+1;
          //echo $sql["alumni_year_in"];
      ?>

          <div class="col-md-3">
            <div class="card text-dark" style="background-color: #e3f2fd;">
              <img class="card-img-top bg-white" src="<?php
                                                      if ($sql["alumni_img"] == "") {
                                                        if ($sql["alumni_sex"] == "ชาย") {
                                                          echo "images/man.png";
                                                        } else {
                                                          echo "images/woman.png";
                                                        }
                                                      }
                                                      else {
                                                        echo $sql["alumni_img"];
                                                      } ?>" width="250" height="250" style="object-fit: contain;" />
              <div class="card-body">
                <p class="card-text">
                  <strong>รุ่น : </strong> <?php echo $alumni_gen ?><br />
                  <strong>ชื่อ : </strong> <?php echo $sql["alumni_firstname"] ?> <?php echo $sql["alumni_lastname"] ?><br />
                  <strong>รหัสนักศึกษา : </strong> <?php echo $sql["alumni_id"] ?>
                </p>
              </div>
              <div class="card-footer text-muted text-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#v<?php echo $sql["alumni_id"] ?>">รายละเอียดเพิ่มเติม</button>
              </div>
            </div>
          </div>

          &nbsp;&nbsp;&nbsp;

      <?php }
      } ?>
    </div>
  </div>
  <br>
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

$sql = $conn->prepare("SELECT tb_alumni.alumni_id, tb_alumni.alumni_year_in, tb_alumni.alumni_year_out, tb_alumni.alumni_prefix
, tb_alumni.alumni_firstname, tb_alumni.alumni_lastname, tb_alumni.alumni_birthday, tb_alumni.alumni_email, 
tb_alumni.alumni_phone, tb_alumni.alumni_address, tb_alumni.alumni_comment, 
tb_alumni.alumni_status, tb_alumni.alumni_sex, tb_alumni_school.school_name, tb_alumni_school.school_province, tb_alumni_school.school_url, tb_alomni_education.education_year, tb_alomni_education.education_level, 
tb_alomni_education.education_faculty, tb_alomni_education.education_branch, tb_alomni_education.education_university, tb_alumni_work.company_name, tb_alumni_work.company_address, tb_alumni_work.company_start, 
tb_alumni_work.company_end, tb_alumni_work.company_performance, tb_alumni_work.company_position
FROM    ((tb_alumni LEFT JOIN tb_alumni_school ON tb_alumni.alumni_id  = tb_alumni_school.alumni_id)
LEFT JOIN tb_alomni_education ON tb_alumni.alumni_id  = tb_alomni_education.alumni_id)
LEFT JOIN tb_alumni_work ON tb_alumni.alumni_id  = tb_alumni_work.alumni_id");
$sql->execute();
$publisher = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($publisher as $sql) {
  if ($sql["alumni_status"] == 1) {
?>

    <div class="modal fade" id="v<?php echo $sql["alumni_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title"><?php echo $sql["alumni_prefix"], " ", $sql["alumni_firstname"], " ", $sql["alumni_lastname"] ?></h2>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <th>
                    <h4><strong>รหัสนักศึกษา</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo $sql["alumni_id"] ?></h4>
                  </td>
                </tr>
                <tr>
                  <th>
                    <h4><strong>ปีที่เข้าศึกษา</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo $sql["alumni_year_in"] ?></h4>
                  </td>
                </tr>
                <tr>
                  <th>
                    <h4><strong>ปีที่จบการศึกษา</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo $sql["alumni_year_out"] ?></h4>
                  </td>
                </tr>
                <tr>
                  <th>
                    <h4><strong>วันเกิด</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo substr($sql["alumni_birthday"], 0, 4), "******";?></h4>
                  </td>
                </tr>
                <tr>
                  <th>
                    <h4><strong>อีเมล</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo "******",substr($sql["alumni_email"], -12);?></h4>
                  </td>
                </tr>
                <tr>
                  <th>
                    <h4><strong>เบอร์โทร</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo  substr( $sql["alumni_phone"], 0,5),"*****"; ?></h4>
                  </td>
                </tr>
                <tr>
                  <th>
                    <h4><strong>ที่อยู่</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo "****************",substr($sql["alumni_address"], -50);?></h4>
                  </td>
                </tr>
                <tr>
                  <th>
                    <h4><strong>เพศ</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo $sql["alumni_sex"] ?></h4>
                  </td>
                </tr>
                <tr>
                  <th>
                    <h4><strong>โรงเรียนมัธยม</strong></h4>
                  </th>
                  <td>
                    <h4><?php echo $sql["school_name"] ?></h4>
                    <h4>จังหวัด : <?php echo $sql["school_province"] ?></h4>
                    <h4>เว็บไซต์ : <a href="<?php echo $sql["school_url"] ?>"><?php echo $sql["school_url"] ?></a> </h4>
                  </td>
                </tr>
                <?php if ($sql["education_year"]) { ?>
                  <tr>
                    <th>
                      <h4><strong>การศึกษาต่อ</strong></h4>
                    </th>
                    <td>
                      <h4>ปีที่เข้าศึกษาต่อ : <?php echo $sql["education_year"] ?></h4>
                      <h4>ระดับการศึกษา : <?php echo $sql["education_level"] ?></h4>
                      <h4>คณะ : <?php echo $sql["education_faculty"] ?></h4>
                      <h4>สาขา : <?php echo $sql["education_branch"] ?></h4>
                      <h4>มหาวิทยาลัย : <?php echo $sql["education_university"] ?></h4>
                    </td>
                  </tr>
                <?php } ?>
                <?php if ($sql["company_name"]) { ?>
                  <tr>
                    <th>
                      <h4><strong>สถานที่การทำงาน</strong></h4>
                    </th>
                    <td>
                      <h4>ชื่อบริษัท : <?php echo $sql["company_name"] ?></h4>
                      <h4>ที่อยู่ : <?php echo $sql["company_address"] ?></h4>
                      <h4>ปีที่เริ่มทำงาน : <?php echo $sql["company_start"] ?></h4>
                      <h4>ปีที่ออกจากงาน : <?php echo $sql["company_end"] ?></h4>
                      <h4>ตำแหน่ง : <?php echo $sql["company_position"] ?></h4>
                      <h4>ผลงานที่โดดเด่น : <?php echo $sql["company_performance"] ?></h4>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-success" data-bs-dismiss="modal">
              OK
            </button>
          </div>
        </div>
      </div>
    </div>
<?php }
} ?>