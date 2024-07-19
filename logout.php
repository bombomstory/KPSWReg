<?php
// เริ่มต้นเซสชัน
session_start();

// ทำลายเซสชันทั้งหมด
session_unset();
session_destroy();

// เปลี่ยนเส้นทางผู้ใช้ไปยังหน้าเข้าสู่ระบบหรือหน้าแรก
header("Location: index.php"); // เปลี่ยน "login.php" เป็น URL ของหน้าที่คุณต้องการเปลี่ยนเส้นทางไป
exit();
?>
