    <?php
    function phpAlert($msg)
    {
      echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    session_start();
    if (!$_SESSION['admin_username']) {
      header('location:login.php');
    }
    require 'connection.php';
    try {
      //prepare
      $sql = "DELETE FROM tb_alumni WHERE alumni_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(1, $_GET["id"]);
      $sql2 = "DELETE FROM tb_alomni_education WHERE alumni_id = ?";
      $stmt2 = $conn->prepare($sql2);
      $stmt2->bindParam(1, $_GET["id"]);
      $sql3 = "DELETE FROM tb_alumni_school WHERE alumni_id = ?";
      $stmt3 = $conn->prepare($sql3);
      $stmt3->bindParam(1, $_GET["id"]);
      $sql4 = "DELETE FROM tb_alumni_work WHERE alumni_id = ?";
      $stmt4 = $conn->prepare($sql4);
      $stmt4->bindParam(1, $_GET["id"]);
      if ($stmt->execute()) { //เริ่มลบข้อมูล
        $stmt2->execute();
        $stmt3->execute();
        $stmt4->execute();
        //header("location: admin_page.php"); //กลับไปแสดงผลข้อมูล
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page.php\">";
        phpAlert("ลบข้อมูลเรียบร้อย");
      }
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    ?>
