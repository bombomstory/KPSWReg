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
    echo "<label class=\"form-label\">"; 
    echo "รายชื่อคุณครูที่ปรึกษา ประจำภาคเรียนที่ ".$semeter;
    echo " ปีการศึกษา ".$acadyear;
    echo "</label>";
    $sql="
    SELECT 
        us.UserID,
        us.FirstName as AdvFirstName,
        us.LastName as AdvLastName,
        us.Profile as Profile,
        us.PhoneNumber as AdvPhoneNumber,
        us.Status as Status,
        te.TeacherID as TeacherID,
        te.Position as Position,
        cl.ClassroomID as ClassroomID,
        cl.ClassroomName as ClassroomName,
        te.DepartmentID as DepartmentID,
        de.DepartmentName as DepartmentName,
        cs.StudentID as StudentID,
        sus.FirstName as FirstName,
        sus.LastName as LastName,
        av.AdvisorID as AdvisorID,
        av.AcademicYear as AdvAcademicYear,
        av.Status as AdvStatus
    FROM
        teachers te
    JOIN
        users us ON us.UserID = te.UserID
    JOIN
        advisors av ON te.TeacherID = av.TeacherID
    JOIN
        departments de ON te.DepartmentID = de.DepartmentID
    JOIN
        classrooms cl on av.ClassroomID = cl.ClassroomID
    RIGHT JOIN
        classroomstudents cs on cl.ClassroomID = cs.ClassroomID
    JOIN
        students st on cs.StudentID = st.StudentID
    JOIN
        users sus on st.UserID = sus.UserID
    WHERE
        av.AcademicYear = 2567 AND
        av.Status = 1 AND
        sus.UserID = ".$_SESSION["userid"].";";
    
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
                        <th scope="col">ครูที่ปรึกษา</th>
                        <th scope="col">ชื่อ - นามสกุล</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col">กลุ่มสาระการเรียนรู้</th>
                        <th scope="col">ครูที่ปรึกษาประจำชั้น</th>
                        <th scope="col">เบอร์โทรครูที่ปรึกษา</th>
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
                        <td><?=$row["AdvFirstName"];?> <?=$row["AdvLastName"];?></td>
                        <td><?=$row["Position"];?></td>
                        <td><?=$row["DepartmentName"];?></td>
                        <td><?=$row["ClassroomName"];?></td>
                        <td><?=$row["AdvPhoneNumber"];?></td>
                        <td>
<?php
if(checkEvaluated($_SESSION["userid"],$row["TeacherID"],$semeter,$acadyear)){
?>
                            <i class="fs-3 bi bi-person-check"></i>
<?php
}else{
?>
                            <a class="btn btn-info btn-sm" href="index.php?role=student&do=treeEvalAdvisor&T=<?=$row["TeacherID"];?>&S=<?=$semeter;?>&Y=<?=$row["AdvAcademicYear"];?>"><i class="fs-3 bi bi-ui-checks"></i></i>
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