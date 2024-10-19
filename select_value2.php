<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
 rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
 crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
  $("select").change(function(){
    $("#div1").load("demo_test.php?v_year="+y_year.val);
  });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<select class="form-select mx-auto"
			aria-label="Default select example"
			style="width: 280px; margin-top: 20px;"
			id="v_year" name="y_year">
		<option selected>โปรดเลือกภาคเรียนและปีการศึกษา</option>
		<option value="1/2567">ภาคเรียนที่ 1 ปีการศึกษา 2567</option>
		<option value="2/2566">ภาคเรียนที่ 2 ปีการศึกษา 2566</option>
		<option value="1/2566">ภาคเรียนที่ 1 ปีการศึกษา 2566</option>
	</select>
<!--
<button>Get External Content</button>
-->

</body>
</html>