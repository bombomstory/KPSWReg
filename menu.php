<?php
switch ($role) {
    case "student":
?>

<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="shop-profile">
    <p class="mb-1 fw-bold text-primary">โรงเรียนกำแพงแสนวิทยา</p>
    <p class="m-0">สพม.นครปฐม สพฐ.นครปฐม</p>
    <p class="m-0">กระทรวงศึกษาธิการ</p>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">


    <ul class="sidebar-menu">
        <li<?=checkActive($do,"main");?>>
            <a href="index.php?role=student">
                <i class="fs-3 bi bi-pie-chart"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li<?=checkActive($do,"studentMain");?>>
            <a href="index.php?role=student&do=studentMain">
                <i class="fs-3 bi bi-person-square"></i>
                <span class="menu-text">ข้อมูลนักเรียน</span>
            </a>
        </li>
    
        <li  class="treeview<?=checkActive($do,"treeEvalTeacher");?>">
            <a href="#!">
                <i class="fs-3 bi bi-card-checklist"></i>
                <span class="menu-text">ประเมินครู</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=student&do=treeEvalTeacher">ประเมินครูที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=student&do=treeEvalTeacher">ประเมินครูผู้สอน</a>
                </li>
            </ul>
        </li>

        <li<?=checkActive($do,"announceGrade");?>>
            <a href="index.php?role=student&do=announceGrade">
                <i class="fs-3 bi bi-mortarboard"></i>
                <span class="menu-text">ประกาศผลการเรียน</span>
            </a>
        </li>    

        <li<?=checkActive($do,"resetPassword");?>>
            <a href="index.php?role=student&do=resetPassword">
                <i class="fs-3 bi bi-key"></i>
                <span class="menu-text">เปลี่ยนรหัสผ่าน</span>
            </a>
        </li>

        <li<?=checkActive($do,"logout");?>>
            <a href="logout.php">
                <i class="fs-3 bi bi-door-open"></i>
                <span class="menu-text">ออกจากระบบ</span>
            </a>
        </li>

</div>
<!-- Sidebar menu ends -->

</nav>

<?php
      break;
    case "parent":
?>

<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="shop-profile">
    <p class="mb-1 fw-bold text-primary">โรงเรียนกำแพงแสนวิทยา</p>
    <p class="m-0">สพม.นครปฐม สพฐ.นครปฐม</p>
    <p class="m-0">กระทรวงศึกษาธิการ</p>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">


    <ul class="sidebar-menu">
        <li<?=checkActive($do,"main");?>>
            <a href="index.php?role=parent">
                <i class="bi bi-pie-chart"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li<?=checkActive($do,"parent Main");?>>
            <a href="index.php?role=parent&do=parentMain">
                <i class="bi bi-person-square"></i>
                <span class="menu-text">ข้อมูลนักเรียน</span>
            </a>
        </li>

        <li<?=checkActive($do,"announceGrade");?>>
            <a href="index.php?role=parent&do=announceGrade">
                <i class="bi bi-mortarboard"></i>
                <span class="menu-text">ประกาศผลการเรียน</span>
            </a>
        </li>    

        <li<?=checkActive($do,"resetPassword");?>>
            <a href="index.php?role=parent&do=resetPassword">
                <i class="bi bi-key"></i>
                <span class="menu-text">เปลี่ยนรหัสผ่าน</span>
            </a>
        </li>

        <li<?=checkActive($do,"logout");?>>
            <a href="logout.php">
                <i class="bi bi-door-open"></i>
                <span class="menu-text">ออกจากระบบ</span>
            </a>
        </li>

</div>
<!-- Sidebar menu ends -->

</nav>

<?php
        break;
    case "teacher":
?>

<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="shop-profile">
    <p class="mb-1 fw-bold text-primary">โรงเรียนกำแพงแสนวิทยา</p>
    <p class="m-0">สพม.นครปฐม สพฐ.นครปฐม</p>
    <p class="m-0">กระทรวงศึกษาธิการ</p>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">


    <ul class="sidebar-menu">
        <li<?=checkActive($do,"main");?>>
            <a href="index.php?role=teacher">
                <i class="bi bi-pie-chart"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li  class="treeview<?=checkActive($do,"treeTeacherMain");?>">
            <a href="#!">
                <i class="bi bi-person-square"></i>
                <span class="menu-text">ข้อมูลนักเรียน</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeTeacherMain">นักเรียนในที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeTeacherMain">นักเรียนในรายวิชา</a>
                </li>
            </ul>
        </li>

        <li  class="treeview<?=checkActive($do,"treeEvalTeacher");?>">
            <a href="#!">
                <i class="bi bi-card-checklist"></i>
                <span class="menu-text">ผลการประเมินครู</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeEvalTeacher">ผลประเมินครูที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeEvalTeacher">ผลประเมินครูผู้สอน</a>
                </li>
            </ul>
        </li>

        <li<?=checkActive($do,"announceGrade");?>>
            <a href="index.php?role=teacher&do=announceGrade">
                <i class="bi bi-mortarboard"></i>
                <span class="menu-text">ประกาศผลการเรียน</span>
            </a>
        </li>    

        <li<?=checkActive($do,"resetPassword");?>>
            <a href="index.php?role=teacher&do=resetPassword">
                <i class="bi bi-key"></i>
                <span class="menu-text">เปลี่ยนรหัสผ่าน</span>
            </a>
        </li>

        <li<?=checkActive($do,"logout");?>>
            <a href="logout.php">
                <i class="bi bi-door-open"></i>
                <span class="menu-text">ออกจากระบบ</span>
            </a>
        </li>

</div>
<!-- Sidebar menu ends -->

</nav>

<?php
        break;
    case "staff":
?>

<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="shop-profile">
    <p class="mb-1 fw-bold text-primary">โรงเรียนกำแพงแสนวิทยา</p>
    <p class="m-0">สพม.นครปฐม สพฐ.นครปฐม</p>
    <p class="m-0">กระทรวงศึกษาธิการ</p>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">


    <ul class="sidebar-menu">
        <li<?=checkActive($do,"main");?>>
            <a href="index.php?role=staff">
                <i class="fs-3 bi bi-pie-chart"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li  class="treeview<?=checkActive($do,"treeStaffStudentMain");?>">
            <a href="#!">
                <i class="fs-3 bi bi-person"></i>
                <span class="menu-text">ข้อมูลนักเรียน</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeStaffStudentMain">ทะเบียนรายชื่อนักเรียน</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeStaffStudentMain">เลื่อนชั้นนักเรียน</a>
                </li>
            </ul>
        </li>

        <li  class="treeview<?=checkActive($do,"treeStaffTeacher");?>">
            <a href="#!">
                <i class="fs-3 bi bi-person-video3"></i>
                <span class="menu-text">ข้อมูลครู</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeStaffTeacher">จัดสรรครูที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeStaffTeacher">จัดสรรครูผู้สอน</a>
                </li>
            </ul>
        </li>

        <li  class="treeview<?=checkActive($do,"treeStaffEvalTeacher");?>">
            <a href="#!">
                <i class="fs-3 bi bi-card-checklist"></i>
                <span class="menu-text">ข้อมูลแบบสอบถาม</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeStaffEvalTeacher">จัดสรรครูที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeStaffEvalTeacher">จัดสรรครูผู้สอน</a>
                </li>
            </ul>
        </li>

        <li  class="treeview<?=checkActive($do,"treeSubject");?>">
            <a href="#!">
                <i class="fs-3 bi bi-journals"></i>
                <span class="menu-text">ข้อมูลรายวิชา</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeSubject">จัดสรรครูที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeEvalTeacher">จัดสรรครูผู้สอน</a>
                </li>
            </ul>
        </li>

        <li<?=checkActive($do,"announceGrade");?>>
            <a href="index.php?role=teacher&do=announceGrade">
                <i class="fs-3 bi bi-mortarboard"></i>
                <span class="menu-text">ผลการเรียน</span>
            </a>
        </li>    

        <li<?=checkActive($do,"resetPassword");?>>
            <a href="index.php?role=teacher&do=resetPassword">
                <i class="fs-3 bi bi-key"></i>
                <span class="menu-text">เปลี่ยนรหัสผ่าน</span>
            </a>
        </li>

        <li<?=checkActive($do,"logout");?>>
            <a href="logout.php">
                <i class="fs-3 bi bi-door-open"></i>
                <span class="menu-text">ออกจากระบบ</span>
            </a>
        </li>

</div>
<!-- Sidebar menu ends -->

</nav>

<?php
        break;
    case "manager":
?>

<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="shop-profile">
    <p class="mb-1 fw-bold text-primary">โรงเรียนกำแพงแสนวิทยา</p>
    <p class="m-0">สพม.นครปฐม สพฐ.นครปฐม</p>
    <p class="m-0">กระทรวงศึกษาธิการ</p>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">


    <ul class="sidebar-menu">
        <li<?=checkActive($do,"main");?>>
            <a href="index.php?role=teacher">
                <i class="fs-3 bi bi-pie-chart"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li  class="treeview<?=checkActive($do,"treeTeacherMain");?>">
            <a href="#!">
                <i class="fs-3 bi bi-person-square"></i>
                <span class="menu-text">รายงานข้อมูลนักเรียน</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeTeacherMain">นักเรียนในที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeTeacherMain">นักเรียนในรายวิชา</a>
                </li>
            </ul>
        </li>

        <li  class="treeview<?=checkActive($do,"treeEvalTeacher");?>">
            <a href="#!">
                <i class="fs-3 bi bi-card-checklist"></i>
                <span class="menu-text">รายงานผลการประเมินครู</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeEvalTeacher">ผลประเมินครูที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeEvalTeacher">ผลประเมินครูผู้สอน</a>
                </li>
            </ul>
        </li>

        <li<?=checkActive($do,"announceGrade");?>>
            <a href="index.php?role=teacher&do=announceGrade">
                <i class="fs-3 bi bi-mortarboard"></i>
                <span class="menu-text">รายงานผลการเรียน</span>
            </a>
        </li>    

        <li<?=checkActive($do,"resetPassword");?>>
            <a href="index.php?role=teacher&do=resetPassword">
                <i class="fs-3 bi bi-key"></i>
                <span class="menu-text">เปลี่ยนรหัสผ่าน</span>
            </a>
        </li>

        <li<?=checkActive($do,"logout");?>>
            <a href="logout.php">
                <i class="fs-3 bi bi-door-open"></i>
                <span class="menu-text">ออกจากระบบ</span>
            </a>
        </li>

</div>
<!-- Sidebar menu ends -->

</nav>

<?php
        break;
    case "admin":
?>

<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="shop-profile">
    <p class="mb-1 fw-bold text-primary">โรงเรียนกำแพงแสนวิทยา</p>
    <p class="m-0">สพม.นครปฐม สพฐ.นครปฐม</p>
    <p class="m-0">กระทรวงศึกษาธิการ</p>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">


    <ul class="sidebar-menu">
        <li<?=checkActive($do,"main");?>>
            <a href="index.php?role=teacher">
                <i class="bi bi-pie-chart"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li  class="treeview<?=checkActive($do,"treeTeacherMain");?>">
            <a href="#!">
                <i class="bi bi-person-square"></i>
                <span class="menu-text">ข้อมูลนักเรียน</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeTeacherMain">นักเรียนในที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeTeacherMain">นักเรียนในรายวิชา</a>
                </li>
            </ul>
        </li>

        <li  class="treeview<?=checkActive($do,"treeEvalTeacher");?>">
            <a href="#!">
                <i class="bi bi-card-checklist"></i>
                <span class="menu-text">ผลการประเมินครู</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="index.php?role=teacher&do=treeEvalTeacher">ผลประเมินครูที่ปรึกษา</a>
                </li>
                <li>
                    <a href="index.php?role=teacher&do=treeEvalTeacher">ผลประเมินครูผู้สอน</a>
                </li>
            </ul>
        </li>

        <li<?=checkActive($do,"announceGrade");?>>
            <a href="index.php?role=teacher&do=announceGrade">
                <i class="bi bi-mortarboard"></i>
                <span class="menu-text">ประกาศผลการเรียน</span>
            </a>
        </li>    

        <li<?=checkActive($do,"resetPassword");?>>
            <a href="index.php?role=teacher&do=resetPassword">
                <i class="bi bi-key"></i>
                <span class="menu-text">เปลี่ยนรหัสผ่าน</span>
            </a>
        </li>

        <li<?=checkActive($do,"logout");?>>
            <a href="logout.php">
                <i class="bi bi-door-open"></i>
                <span class="menu-text">ออกจากระบบ</span>
            </a>
        </li>

</div>
<!-- Sidebar menu ends -->

</nav>

<?php
        break;
    case "guest":
?>

<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="shop-profile">
    <p class="mb-1 fw-bold text-primary">โรงเรียนกำแพงแสนวิทยา</p>
    <p class="m-0">สพม.นครปฐม สพฐ.นครปฐม</p>
    <p class="m-0">กระทรวงศึกษาธิการ</p>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">


    <ul class="sidebar-menu">
        <li class="active current-page">
            <a href="index.php">
                <i class="fs-3 bi bi-pie-chart"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>
     
        <li>
            <a href="studentLogin.html">
                <i class="fs-3 bi bi-person"></i>
                <span class="menu-text">สำหรับนักเรียน</span>
            </a>
        </li>

        <li>
            <a href="parentLogin.html">
                <i class="fs-3 bi bi-people"></i>
                <span class="menu-text">สำหรับผู้ปกครอง</span>
            </a>
        </li>    

        <li>
            <a href="teacherLogin.html">
                <i class="fs-3 bi bi-person-video3"></i>
                <span class="menu-text">สำหรับคุณครู</span>
            </a>
        </li>

        <li>
            <a href="staffLogin.html">
                <i class="fs-3 bi bi-person-lines-fill"></i>
                <span class="menu-text">สำหรับนายทะเบียน</span>
            </a>
        </li>

        <li>
            <a href="managerLogin.html">
                <i class="fs-3 bi bi-person-circle"></i>
                <span class="menu-text">สำหรับผู้อำนวยการ</span>
            </a>
        </li>

        <li>
            <a href="adminLogin.html">
                <i class="fs-3 bi bi-robot"></i>
                <span class="menu-text">สำหรับผู้ดูแลระบบ</span>
            </a>
        </li>
    </ul>
</div>
<!-- Sidebar menu ends -->

</nav>

<?php
      break;
    default:
      echo "<h1>ท่านไม่มีสิทธิ์ในการเข้าใช้งานระบบนี้!!!!</h1>";
      break;
  } // จบคำสั่ง switch($role)

