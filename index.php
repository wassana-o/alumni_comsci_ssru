<?php
include 'connection.php';
$all = $conn->prepare("SELECT COUNT(alumni_status) FROM tb_alumni;");
$all->execute();
$all = $all->fetch(PDO::FETCH_ASSOC);
$all = $all['COUNT(alumni_status)'];

$conf = $conn->prepare("SELECT SUM(alumni_status) FROM tb_alumni;");
$conf->execute();
$conf = $conf->fetch(PDO::FETCH_ASSOC);
$conf = $conf['SUM(alumni_status)'];
$noconf = $all - $conf;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ฐานข้อมูลศิษย์เก่า COM - SCI SSRU</title>
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
            <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
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
                <a class="nav-link" href="login.php">Admin</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </nav>
  <!-- ภาพเลื่อน -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/sl1.png" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="images/sl2.png" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="images/sl3.png" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="images/sl4.png" class="d-block w-100" alt="..." />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br />
  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col-9" style="background-color: #f6fff9">
      <br>
      <h3 class="text-center">ศิษย์เก่าที่ลงทะเบียนทั้งหมด : <?php echo $all ?> คน</h3>
      <h3 class="text-center">ยืนยันแล้ว : <?php echo $conf ?> คน</h3>
      <h3 class="text-center">ยังไม่ยืนยัน : <?php echo $noconf ?> คน</h3>
      <br>
        <table class="table text-center table-bordered table-striped">
          <thead>
            <tr class="bg-info">
              <th scope="col"><h4>ความคิดเห็นของศิษย์เก่า</h4></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = $conn->prepare("SELECT alumni_comment, alumni_status FROM tb_alumni");
            $sql->execute();
            $publisher = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($publisher as $sql) {
              if($sql["alumni_comment"] != "" and $sql["alumni_status"] == 1){
            ?>
              <tr>
                <td><?php echo $sql["alumni_comment"] ?></td>
              </tr>
            <?php
            }} ?>
          </tbody>
        </table>
      </div>
      <div class="col"></div>
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