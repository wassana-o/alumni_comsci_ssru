
    <?php
    session_start();
    if (!$_SESSION['admin_username']) {
        header('location:login.php');
    }
    require 'connection.php';
    function phpAlert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    $num = 1;
    try {
        $stmt = $conn->prepare("UPDATE `tb_alumni` SET `alumni_status` = ? WHERE `alumni_id` = ?;");
        $stmt->bindParam(1, $num);
        $stmt->bindParam(2, $_GET["id"]);
        if ($stmt->execute()) {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_page.php\">";
            phpAlert("ยืนยันเรียบร้อย");
            //header("location: /admin_page.php"); //กลับไปแสดงผลข้อมูล
        }
    } catch (PDOException $e) {
        phpAlert("Error: " . $e->getMessage());
    }
    $conn = null;
    ?>