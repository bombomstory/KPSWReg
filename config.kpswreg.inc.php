<?php
session_start();

// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";  // ชื่อผู้ใช้ฐานข้อมูล
$password = "";      // รหัสผ่านฐานข้อมูล
$dbname = "KPSWRegDB";    // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/* else {
    echo "<h1>การเชื่อมต่อสำเร็จ</h1>";
} */

?>