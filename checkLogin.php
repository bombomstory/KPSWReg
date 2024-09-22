<?php

require_once("config.kpswreg.inc.php");
// รับข้อมูลจากฟอร์ม
$role=$_REQUEST['role'];
$user = $_POST['username'];
$pass = $_POST['password'];

// เข้ารหัสรหัสผ่าน
$pass = md5($pass);

// สร้าง prepared statement

switch($role){
    case "student":
        $sql="SELECT users.UserID, users.user_name, users.FirstName, users.LastName, users.Profile, users.Email, users.PhoneNumber, users.JoinDate, users.Status 
                FROM users
                JOIN students ON users.UserID = students.UserID
                WHERE users.user_name = ? AND users.password = ?";
        break;
    case "parent":
        $sql="SELECT users.UserID, users.user_name, users.FirstName, users.LastName, users.Profile, users.Email, users.PhoneNumber, users.JoinDate, users.Status 
                FROM users
                JOIN parents ON users.UserID = parents.UserID
                WHERE users.user_name = ? AND users.password = ?";
        break;
    case "teacher":
        $sql="SELECT users.UserID, users.user_name, users.FirstName, users.LastName, users.Profile, users.Email, users.PhoneNumber, users.JoinDate, users.Status 
                FROM users
                JOIN teachers ON users.UserID = teachers.UserID
                WHERE users.user_name = ? AND users.password = ?";
        break;
    case "staff":
        $sql="SELECT users.UserID, users.user_name, users.FirstName, users.LastName, users.Profile, users.Email, users.PhoneNumber, users.JoinDate, users.Status 
                FROM users
                JOIN staff ON users.UserID = staff.UserID
                WHERE users.user_name = ? AND users.password = ?";
        break;
    case "manager":
        $sql="SELECT users.UserID, users.user_name, users.FirstName, users.LastName, users.Profile, users.Email, users.PhoneNumber, users.JoinDate, users.Status 
                FROM users
                JOIN manager ON users.UserID = manager.UserID
                WHERE users.user_name = ? AND users.password = ?";
        break;
    case "admin":
        $sql="SELECT users.UserID, users.user_name, users.FirstName, users.LastName, users.Profile, users.Email, users.PhoneNumber, users.JoinDate, users.Status 
                FROM users 
                JOIN admin ON users.UserID = admin.UserID
                WHERE users.user_name = ? AND users.password = ?";
        break;
    default:
        $sql="";
        echo "<h1>ท่านไม่มีสิทธิ์ในการเข้าใช้งานระบบนี้!!!!</h1>";
        break;
}

// SELECT users.UserID, users.user_name, users.FirstName, users.LastName, users.Profile, users.Email, users.PhoneNumber, users.JoinDate, users.Status FROM users JOIN parents ON users.UserID = parents.UserID WHERE users.user_name = 'somchai' AND users.password = md5('password');
// echo $sql;
// die();

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$stmt->bind_result($UID, $UserName, $FirstName, $LastName, $Profile, $Email, $PhoneNumber, $JoinDate, $Status);

if ($stmt->fetch()) {
    // บันทึก session
    $_SESSION['userid'] = $UID;
    $_SESSION['username'] = $UserName;
    $_SESSION['firstname'] = $FirstName;
    $_SESSION['lastname'] = $LastName;
    $_SESSION['picture'] = $Profile;
    $_SESSION['email'] = $Email;
    $_SESSION['mobile'] = $PhoneNumber;
    $_SESSION['joindate'] = $JoinDate;
    $_SESSION['status'] = $Status;

    echo "Login successful! Welcome " . $user;
    header("Location: index.php?role=$role");

} else {
    // ถ้า login ไม่สำเร็จ
    header("Location: not-access.html");
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>

?>