<?php
include("config.kpswreg.inc.php");
?>
<div class="app-body">

						<!-- Row start -->

						<div class="row gx-3">
							<div class="col-xxl-12">

                                <div class="alert alert-primary d-flex align-items-center fade show" role="alert">
                                    <i class="fs-3 bi bi-calendar2-check"></i>&nbsp; ภาคเรียนปัจจุบัน: ภาคเรียนที่ 1 ปีการศึกษา 2567
                                </div>

                                <!--
								<div class="alert alert-warning" role="alert">
									<div class="mb-3">
										<i class="bi bi-exclamation-circle fs-1 me-2 lh-1"></i>
									</div>
									<h4 class="alert-heading">คำเตือน!</h4>
									<p>
										นักเรียนที่ยังไม่ได้ทำการประเมินครูที่ปรึกษาหรือครูผู้สอนในภาคเรียนนี้ จะไม่สามารถดูข้อมูลนักเรียนได้
									</p>
									<hr />
									<p>
										
									</p>
								</div>
                                -->

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="m-0">
<?php
$sql1="
SELECT 
    distinct Semester,AcademicYear 
FROM 
    evaluations 
ORDER BY 
    AcademicYear DESC";
$result1 = $conn->query($sql1);
$i=0;
if ($result1->num_rows > 0) {
?>
                                            <label class="form-label">เลือกภาคเรียน/ปีการศึกษาเพื่อทำการประเมินครูที่ปรึกษา</label>
                                            <select class="form-select" aria-label="Default select example" id="mySelect">
                                                <option selected="" value="NaN">กรุณาเลือกภาคเรียนและปีการศึกษา</option>
<?php
while($row1 = $result1->fetch_assoc()) {
    $i++;
?>
                                                <option value="<?=$row1["Semester"];?>/<?=$row1["AcademicYear"];?>"><?=$row1["Semester"];?>/<?=$row1["AcademicYear"];?></option>
<?php
    } // จบ while($row = $result->fetch_assoc())
?>

                                            </select>
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

                                <div class="card mb-3">
                                    <div class="card-body p-5">
                                        <div id="result"></div>

<?php
$TeacherID = (empty($_GET["T"])) ? "-" : $_GET["T"];
$Semeter = (empty($_GET["S"])) ? "-" : $_GET["S"];
$AcademicYear = (empty($_GET["Y"])) ? "-" : $_GET["Y"];

if($TeacherID!="-"&&$TeacherID!="-"&&$AcademicYear!="-")
{
    $row_teacher = getTeacherInfo($TeacherID);
?>

<div align="center">
    <img src="assets/images/<?=$row_teacher["Profile"];?>" class="rounded-2 img-4x">
    <br /><br />
    <h5>แบบประเมินครูที่ปรึกษาคุณครู<?=$row_teacher["FirstName"];?> <?=$row_teacher["LastName"];?> <br />
        ประจำภาคเรียนที่ <?=$Semeter;?> ปีการศึกษา <?=$AcademicYear;?></h5>
    <hr>
</div>
<?php

$sql = "
SELECT
    ev.EvaluationID,
    ev.Semester,
    ev.AcademicYear,
    et.EvaluationTypeID,
    et.EvaluationTypeName,
    ei.EvaluationItemID,
    qb.QuestionID,
    qb.QuestionText
FROM
    evaluations ev
JOIN
    evaluationitems ei ON ev.EvaluationID = ei.EvaluationID
JOIN
    questionbank qb ON ei.QuestionID = qb.QuestionID
JOIN
    evaluationtypes et ON ev.EvaluationTypeID = et.EvaluationTypeID
WHERE
    ev.EvaluationTypeID = 1 AND
    ev.Semester = 1 AND
    ev.AcademicYear = 2567 AND
    ev.Status = 1;
";

$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
?>

<form id="evaluationForm" method="POST" action="index.php?role=student&do=treeEvalAdvisor">
<div class="table-responsive">
    <input type="hidden" name="T" value="<?=$TeacherID;?>">
    <input type="hidden" name="S" value="<?=$Semeter;?>">
    <input type="hidden" name="Y" value="<?=$AcademicYear;?>">
	<table class="table align-middle table-hover m-0">
        <thead>
            <tr>
                <th>คำถาม</th>
                <th>(5) มากที่สุด</th>
                <th>(4) มาก</th>
                <th>(3) ปานกลาง</th>
                <th>(2) พอใช้</th>
                <th>(1) ปรับปรุง</th>
            </tr>
        </thead>
        <tbody>

<?php
    while($row = $result->fetch_assoc()) {
        $i++;
?>
            <!-- Question <?=$i;?> -->
            <tr>
                <td><?=$i;?>. <?=$row["QuestionText"];?>
<?php
        if($i==1){
            echo "<input type='hidden' name='E' value='".$row["EvaluationID"]."'>";
        }
?>
                </td>
                <td><input type="radio" name="question<?=$i;?>" value="5" required></td>
                <td><input type="radio" name="question<?=$i;?>" value="4"></td>
                <td><input type="radio" name="question<?=$i;?>" value="3"></td>
                <td><input type="radio" name="question<?=$i;?>" value="2"></td>
                <td><input type="radio" name="question<?=$i;?>" value="1"></td>
            </tr>
<?php
    } // จบ while($row = $result->fetch_assoc())
?>
        </tbody>
    </table>
</div>

<?php 

}else {
    echo "0 results";
}

// ปิดการเชื่อมต่อฐานข้อมูล
// $conn->close();
?>
    <br>
    <div align="right">
        
        <button type="reset" class="btn btn-outline-secondary">ล้างแบบฟอร์ม</button>
        <button type="submit" name="Submit" value="sendEva" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">ส่งผลการประเมิน</button>

    </div>
    </div>
</form>


<?php
} // จบ if($TeacherID!="-"&&$TeacherID!="-"&&$AcademicYear!="-")
?>

<?php
$Submit = (empty($_POST["Submit"])) ? "NaN" : $_POST["Submit"];
$TeacherID = (empty($_POST["T"])) ? "-" : $_POST["T"];
$Semeter = (empty($_POST["S"])) ? "-" : $_POST["S"];
$AcademicYear = (empty($_POST["Y"])) ? "-" : $_POST["Y"];
$EvaluationID = (empty($_POST["E"])) ? "-" : $_POST["E"];
if($Submit=="sendEva"){
    $sql = "
    INSERT INTO 
        studentteacherevaluations 
        (StudentTeacherEvaluationID, 
        EvaluationID, 
        EvaluationItemID, 
        StudentID, 
        TeacherID, 
        Score, 
        Semester, 
        AcademicYear, 
        Status) 
    VALUES 
        (NULL, '$EvaluationID', '1', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question1"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '2', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question2"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '3', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question3"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '4', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question4"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '5', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question5"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '6', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question6"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '7', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question7"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '8', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question8"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '9', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question9"]."', '$Semeter', '$AcademicYear', '1'),
        (NULL, '$EvaluationID', '10', '".$_SESSION["userid"]."', '$TeacherID', '".$_POST["question10"]."', '$Semeter', '$AcademicYear', '1');";
    
    if($result = $conn->query($sql)){
        $row_teacher = getTeacherInfo($TeacherID);
?>

<div class="alert alert-success" role="alert">
											<div class="mb-3">
												<i class="bi bi-check-circle fs-1 me-2 lh-1"></i>
											</div>
											<h4 class="alert-heading">บันทึกข้อมูลสำเร็จ!</h4>
											<p>
												ระบบทำการบันทึกข้อมูลการประเมินอาจารย์ที่ปรึกษาประจำภาคเรียนที่ <?=$Semeter;?> ปีการศึกษา <?=$AcademicYear;?> สำเร็จเรียบร้อยแล้ว
											</p>
											<hr>
											<p>
												ข้อมูลครูที่ปรึกษา 
                                                <b>
                                                คุณครู <?=$row_teacher["FirstName"];?> <?=$row_teacher["LastName"];?>
                                                </b>
                                                <br />
                                                ได้คะแนนประเมินเฉลี่ย <b>
                                                <?php
                                                $score = ($_POST["question1"]+$_POST["question2"]+$_POST["question3"]+$_POST["question4"]+$_POST["question5"]+
                                                        $_POST["question6"]+$_POST["question7"]+$_POST["question8"]+$_POST["question9"]+$_POST["question10"])
                                                        /10;
                                                echo number_format($score, 2);
                                                ?>
                                                </b>
                                                <br />
                                                ผลการประเมินอยู่ในระดับ <b>
                                                <?php
                                                if($score>=4.5){
                                                    echo "ดีมาก";
                                                }elseif($score>=3.5&&$score<4.5){
                                                    echo "ดี";
                                                }elseif($score>=2.5&&$score<3.5){
                                                    echo "ปานกลาง";
                                                }elseif($score>=1.5&&$score<2.5){
                                                    echo "พอใช้";
                                                }else{
                                                    echo "ต้องปรับปรุง";
                                                }
                                                ?>
                                                </b>
                                                <br />
                                                <a href="http://localhost/KPSWReg/index.php?role=student&do=treeEvalAdvisor">คลิกที่นี่เพื่อทำการประเมินอาจารย์ท่านอื่น</a>
                                            
											</p>

										</div>

<?php
    } // จบ if($result = $conn->query($sql);)

}
?>


                                    </div>
                                </div>
                              
							</div>

						</div>
						<!-- Row end -->

					</div>

<script>
        $(document).ready(function(){
            $('#mySelect').on('change', function(){
                var selectedValue = $(this).val();

                if(selectedValue) {
                    $.ajax({
                        url: "getData.php",
                        method: "POST",
                        data: { value: selectedValue },
                        success: function(response) {
                            $('#result').html(response);
                        }
                    });
                } else {
                    $('#result').html("");
                }
            });
        });
</script>
