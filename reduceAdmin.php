
    <?php
    session_start();

    if (!$_SESSION['admin_username']) {
        header('location:login.php');
    }
    function phpAlert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    include 'connection.php';
    $sql = $conn->prepare("SELECT * FROM `tb_admin` WHERE `admin_username` = ?;");
    $sql->bindParam(1, $_SESSION['admin_username']);
    $sql->execute();
    $publisher = $sql->fetch(PDO::FETCH_ASSOC);
    require 'connection.php';
    $num = 0;
    $time = date("Y-m-d H:i:s");
    try {
        $stmt = $conn->prepare("UPDATE `tb_admin` SET `admin_status` = ?, admin_update_by = ?, admin_update_at = ? WHERE `admin_id` = ?;");
        $stmt->bindParam(1, $num);
        $stmt->bindParam(2, $publisher['admin_id']);
        $stmt->bindParam(3, $time);
        $stmt->bindParam(4, $_GET["id"]);


        if ($stmt->execute()) {
            phpAlert("ยืนยันเรียบร้อย");
            header("location: edit_admin.php"); //กลับไปแสดงผลข้อมูล
        }
    } catch (PDOException $e) {
        phpAlert("Error: " . $e->getMessage());
    }
    $conn = null;
    ?>