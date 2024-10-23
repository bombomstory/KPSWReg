<?php

function getTeacherInfo($TeacherID){
	include("config.kpswreg.inc.php");
	$sql = "
    SELECT
        te.TeacherID as TeacherID,
        u.UserID as UserID,
        u.FirstName as FirstName,
        u.LastName as LastName,
        u.Profile as Profile,
        u.Email as Email,
        u.Status as userStatus,
        u.PhoneNumber as PhoneNumber,
        te.Position as Position,
        te.DepartmentID as DepartmentID,
        d.DepartmentName as DepartmentName
    FROM
        teachers te
    JOIN
        users u on te.UserID = u.UserID
    JOIN
        departments d on d.DepartmentID = te.DepartmentID
    WHERE
        te.TeacherID = ".$TeacherID."";

    $result = $conn->query($sql);
    $i=0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    return $row;
}

function getClassroomID($userID,$AcademicYear){
	include("config.kpswreg.inc.php");
	$sql = "
    	SELECT
			cs.ClassroomID as ClassroomID
		FROM
			classroomstudents cs
		JOIN
			students s on s.StudentID = cs.StudentID
		JOIN
			users u on s.UserID = u.UserID
		WHERE
			cs.AcademicYear = $AcademicYear AND u.UserID = $userID";

    $result = $conn->query($sql);
    $i=0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    return $row;
}

function checkAction($do){
	switch ($do) {
		case "main":
			include("main.php");
			break;
		case "studentMain":
			include("maintenance.php");
			break;
		case "treeEvalAdvisor":
			include("advisorEvaluate.php");
			break;
		case "treeEvalTeacher":
			include("teacherEvaluate.php");
			break;
		case "announceGrade":
			include("maintenance.php");
			break;
		case "resetPassword":
			include("maintenance.php");
			break;
		case "parentMain":
			include("maintenance.php");
			break;
		case "treeTeacherMain":
			include("maintenance.php");
			break;
		case "checkLogin":
			include("checkLogin.php");
			break;
		default:
			echo "<h1>ท่านไม่มีสิทธิ์ในการเข้าใช้งานระบบนี้!!!!</h1>";
			break;
	} // จบคำสั่ง switch($do)
}

function showNavbar($do){
	switch ($do) {
		case "main":
			echo '<li class="breadcrumb-item">
								<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
								<a href="index.php" class="text-decoration-none">Home</a>
				  </li>
				  <li class="breadcrumb-item text-secondary" aria-current="page">
								หน้าหลัก
				  </li>';
			break;
		case "studentMain":
			echo '<li class="breadcrumb-item">
								<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
								<a href="index.php?role=student" class="text-decoration-none">Home</a>
				  </li>
				  <li class="breadcrumb-item text-secondary" aria-current="page">
								ข้อมูลนักเรียน
				  </li>';
			break;
		case "treeEvalAdvisor":
				echo '<li class="breadcrumb-item">
									<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
									<a href="index.php?role=student" class="text-decoration-none">Home</a>
					  </li>
					  <li class="breadcrumb-item text-secondary" aria-current="page">
									ประเมินครู
					  </li>';
				break;
		case "treeEvalTeacher":
			echo '<li class="breadcrumb-item">
								<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
								<a href="index.php?role=student" class="text-decoration-none">Home</a>
				  </li>
				  <li class="breadcrumb-item text-secondary" aria-current="page">
								ประเมินครู
				  </li>';
			break;
		case "announceGrade":
			echo '<li class="breadcrumb-item">
								<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
								<a href="index.php?role=student" class="text-decoration-none">Home</a>
				  </li>
				  <li class="breadcrumb-item text-secondary" aria-current="page">
								ประกาศผลการเรียน
				  </li>';
			break;
		case "resetPassword":
			echo '<li class="breadcrumb-item">
								<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
								<a href="index.php?role=student" class="text-decoration-none">Home</a>
				  </li>
				  <li class="breadcrumb-item text-secondary" aria-current="page">
								เปลี่ยนรหัสผ่าน
				  </li>';
			break;
		case "parentMain":
			echo '<li class="breadcrumb-item">
								<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
								<a href="index.php?role=parent" class="text-decoration-none">Home</a>
				  </li>
				  <li class="breadcrumb-item text-secondary" aria-current="page">
								ข้อมูลนักเรียน
				  </li>';
			break;
		case "treeTeacherMain":
			echo '<li class="breadcrumb-item">
								<i class="bi bi-house lh-1 pe-3 me-3 border-end border-dark"></i>
								<a href="index.php?role=teacher" class="text-decoration-none">Home</a>
				  </li>
				  <li class="breadcrumb-item text-secondary" aria-current="page">
								ข้อมูลนักเรียน
				  </li>';
			break;
		default:
			echo "";
			break;
	} // จบคำสั่ง switch($do)
}

function checkActive($do,$menu){
	if(($do=="treeTeacherMain"||$do=="treeEvalAdvisor"||$do=="treeEvalTeacher")&&($do==$menu)){
		echo ' active current-page';
	}elseif($do==$menu){
		echo ' class="active current-page"';
	}
}

function checkEvaluated($StudentID,$TeacherID,$Semester,$AcademicYear){
    include("config.kpswreg.inc.php");
    $sql="
    SELECT
        distinct
        EvaluationID,
        StudentID,
        TeacherID,
        Semester,
        AcademicYear,
        Status 
    FROM 
        studentteacherevaluations 
    WHERE 
        StudentID = ".$StudentID." and
        TeacherID = ".$TeacherID." and
        Semester = '".$Semester."' and
        AcademicYear = '".$AcademicYear."';";
	
	$result = $conn->query($sql);
	$i=0;
	if ($result->num_rows > 0) {
		$row = true;
	}else{
		$row = false;
	}

    return $row;
}

function checkTeacSubjEvaluated($StudentID,$TeacherID,$SubjectID,$Semester,$AcademicYear){
    include("config.kpswreg.inc.php");
    $sql="
    SELECT
        distinct
        EvaluationID,
        StudentID,
        TeacherID,
		SubjectID, 
        Semester,
        AcademicYear,
        Status 
    FROM 
        stuteasubjevaluations 
    WHERE 
        StudentID = ".$StudentID." and 
        TeacherID = ".$TeacherID." and 
		SubjectID = ".$SubjectID." and 
        Semester = '".$Semester."' and 
        AcademicYear = '".$AcademicYear."';";
	
	$result = $conn->query($sql);
	$i=0;
	if ($result->num_rows > 0) {
		$row = true;
	}else{
		$row = false;
	}

    return $row;
}

?>