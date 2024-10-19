<?php

$TeacherID = $_GET["T"];
$Semeter = $_GET["S"];
$AcademicYear = $_GET["Y"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Evaluation Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/main.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: auto;
        }
        form {
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .question {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        /* จัดคอลัมน์แรกชิดซ้าย */
        table td:first-child {
            text-align: left;
            min-width: 100px;
            max-width: 500px;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .submit-btn {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>แบบประเมินคุณครูที่ปรึกษา ประจำภาคเรียนที่ <?=$Semeter;?> ปีการศึกษา <?=$AcademicYear;?></h2>
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

<form id="evaluationForm">
    <table>
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
                <td><?=$i;?>. <?=$row["QuestionText"];?></td>
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
        <button type="submit" class="btn btn-success">ส่งผลการประเมิน</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#evaluationForm').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serializeArray();
            console.log(formData);

            var formattedData = {};
            $.each(formData, function(index, field) {
                formattedData[field.name] = field.value;
            });

            alert('Form submitted! Check the console for data.');
            console.log(formattedData);
        });
    });
</script>

</body>
</html>
