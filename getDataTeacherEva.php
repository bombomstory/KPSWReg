<?php
session_start();
require_once("config.kpswreg.inc.php");
require_once("lib.inc.php");
// Check if value is posted
if (isset($_POST['value'])) {
    $value = $_POST['value'];
    if($_POST['value']=="NaN"){
        echo "กรุณาเลือกภาคเรียน/ปีการศึกษาที่จะทำการประเมินครูที่ปรึกษา";
        die();
    }
    $v_result = explode("/", $value);
    $semeter = $v_result[0];
    $acadyear = $v_result[1];
    $getClassroomID = getClassroomID($_SESSION["userid"],$acadyear);
    $ClassroomID = $getClassroomID["ClassroomID"];
    echo "<label class=\"form-label\">"; 
    echo "รายชื่อคุณครูที่ปรึกษา ประจำภาคเรียนที่ ".$semeter;
    echo " ปีการศึกษา ".$acadyear;
    echo "</label>";
    $sql="
    SELECT
        ts.TeacherID as TeacherID,
        ts.SubjectID as SubjectID,
        ts.ClassroomID as ClassroomID,
        ts.Semester as Semester,
        ts.AcademicYear as AcademicYear,
        tc.Position as Position,
        ut.FirstName as FirstName,
        ut.LastName as LastName,
        ut.Profile as Profile,
        ut.Email as Email,
        ut.PhoneNumber as PhoneNumber,
        sj.SubjectCode as SubjectCode,
        sj.SubjectName as SubjectName, 
        cr.ClassroomName as ClassroomName 
    FROM
        teachersubjects ts
    JOIN
        subjects sj on ts.SubjectID = sj.SubjectID
    JOIN
        classrooms cr on ts.ClassroomID = cr.ClassroomID
    JOIN
        classroomstudents cs on cr.ClassroomID = cs.ClassroomID
    JOIN
        teachers tc on ts.TeacherID = tc.TeacherID
    JOIN
        users ut on ut.UserID = tc.UserID
    JOIN
        students st on st.StudentID = cs.StudentID
    JOIN
        users us on st.UserID = us.UserID
    WHERE ts.ClassroomID = $ClassroomID";
    
    $result = $conn->query($sql);
    $i=0;
    if ($result->num_rows > 0) {
?>

<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle table-hover m-0">
                <thead>
                    <tr>
                        <th scope="col">ครูผู้สอน</th>
                        <th scope="col">ชื่อ - นามสกุล</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col">รายวิชาที่สอน</th>
                        <th scope="col">สำหรับชั้น</th>
                        <th scope="col">เบอร์โทรครูผู้สอน</th>
                        <th scope="col">การประเมินครู</th>
                    </tr>
                </thead>
                <tbody>

<?php

while($row = $result->fetch_assoc()) {
    $i++;
?>
                    <tr>
                        <th scope="row">
                            <img class="rounded-circle img-3x me-2" src="assets/images/<?=$row["Profile"];?>"
                                alt="Bootstrap Gallery" />
                        </th>
                        <td><?=$row["FirstName"];?> <?=$row["LastName"];?></td>
                        <td><?=$row["Position"];?></td>
                        <td><?=$row["SubjectCode"];?> <?=$row["SubjectName"];?></td>
                        <td><?=$row["ClassroomName"];?></td>
                        <td><?=$row["PhoneNumber"];?></td>
                        <td>
<?php
if(checkTeacSubjEvaluated($_SESSION["userid"],$row["TeacherID"],$row["SubjectID"],$semeter,$acadyear)){
?>
                            <i class="fs-3 bi bi-person-check"></i>
<?php
}else{
?>
                            <a class="btn btn-info btn-sm" href="index.php?role=student&do=treeEvalTeacher&T=<?=$row["TeacherID"];?>&C=<?=$row["SubjectID"];?>&S=<?=$semeter;?>&Y=<?=$row["AcademicYear"];?>"><i class="fs-3 bi bi-ui-checks"></i></i>
                            </a>
<?php
}
?>
                        </td>
                    </tr>
<?php
    } // จบ while($row = $result->fetch_assoc())
?>
<!--
                    <tr>
                        <th scope="row">
                            <img class="rounded-circle img-3x me-2" src="assets/images/user2.png"
                                alt="Bootstrap Gallery" />
                        </th>
                        <td>Sales</td>
                        <td>
                            913 Alpaca Way, Garden Grove, California, 92643
                        </td>
                        <td>30/10/2022</td>
                        <td>
                            <div class="progress small">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td>
                            <i class="fs-3 bi bi-clipboard-check"></i>
                        </td>
                    </tr>
-->           
                </tbody>
            </table>
<?php 

}else {
    echo "0 results";
}

// ปิดการเชื่อมต่อฐานข้อมูล
//$conn->close();
?>
        </div>
    </div>
</div>

<?php
}else{
    echo "No selected!!";
}



?>