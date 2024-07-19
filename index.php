<?php
$role = (empty($_REQUEST["role"])) ? "guest" : $_REQUEST["role"];
$do = (empty($_GET["do"])) ? "main" : $_GET["do"];

function checkAction($do){
	switch ($do) {
		case "main":
			include("main.php");
			break;
		case "studentMain":
			include("maintenance.php");
			break;
		case "treeEvalTeacher":
			include("maintenance.php");
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
								Dashboard
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
	if(($do=="treeTeacherMain"||$do=="treeEvalTeacher")&&($do==$menu)){
		echo ' active current-page';
	}elseif($do==$menu){
		echo ' class="active current-page"';
	}
}

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>ระบบงานทะเบียนและประมวลผล - โรงเรียนกำแพงแสนวิทยา</title>

		<!-- Meta -->
		<meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="ระบบงานทะเบียนและประมวลผล - โรงเรียนกำแพงแสนวิทยา">
		<meta property="og:description" content="ระบบงานทะเบียนและประมวลผล - โรงเรียนกำแพงแสนวิทยา">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="ระบบงานทะเบียนและประมวลผล">
		<link rel="shortcut icon" href="assets/images/favicon.svg" />

		<!-- *************
			************ CSS Files *************
		************* -->
		<link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css" />
		<link rel="stylesheet" href="assets/css/main.min.css" />

		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Scrollbar CSS -->
		<link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />

		<!-- Toastify CSS -->
		<link rel="stylesheet" href="assets/vendor/toastify/toastify.css" />

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App header starts -->
			<?php
			include("header.php");
			?>
			<!-- App header ends -->

			<!-- Main container start -->
			<div class="main-container">

				<!-- Sidebar wrapper start -->
				 
				<?php
				include("menu.php");
				?>

				<!-- Sidebar wrapper end -->

				<!-- App container starts -->
				<div class="app-container">
					<!-- App hero header starts -->
					<div class="app-hero-header d-flex align-items-center">
						<!-- Breadcrumb start -->
						<ol class="breadcrumb">
							<?=showNavbar($do);?>
						</ol>
						<!-- Breadcrumb end -->

						<!-- Sales stats start -->
						<!--
						<div class="ms-auto d-lg-flex d-none flex-row">
							<div class="d-flex flex-row gap-2">
								<button class="btn btn-sm btn-primary">Today</button>
								<button class="btn btn-sm btn-white">7d</button>
								<button class="btn btn-sm btn-white">2w</button>
								<button class="btn btn-sm btn-white">1m</button>
								<button class="btn btn-sm btn-white">3m</button>
								<button class="btn btn-sm btn-white">6m</button>
								<button class="btn btn-sm btn-white">1y</button>
							</div>
						</div>
						-->
						<!-- Sales stats end -->

					</div>
					<!-- App Hero header ends -->

					<!-- App body starts -->
<?php
					checkAction($do);
?>
					<!-- App body ends -->

					<!-- App footer start -->
					<div class="app-footer">
						<span>© 2024 โรงเรียนกำแพงแสนวิทยา 186 หมู่ 7 บ้านยางพัฒนา ต.ทุ่งกระพังโหม อ.กำแพงแสน จ.นครปฐม 73140 Tel. 034-351047, Fax 034-351264</span>
					</div>
					<!-- App footer end -->

				</div>
				<!-- App container ends -->

			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->

		<!-- *************
			************ JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/moment.min.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
		<script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

		<!-- Toastify JS -->
		<script src="assets/vendor/toastify/toastify.js"></script>
		<script src="assets/vendor/toastify/custom.js"></script>

		<!-- Apex Charts -->
		<script src="assets/vendor/apex/apexcharts.min.js"></script>
		<script src="assets/vendor/apex/custom/dash1/visitors.js"></script>
		<script src="assets/vendor/apex/custom/dash1/sales.js"></script>
		<script src="assets/vendor/apex/custom/dash1/sparkline.js"></script>
		<script src="assets/vendor/apex/custom/dash1/tasks.js"></script>
		<script src="assets/vendor/apex/custom/dash1/income.js"></script>

		<!-- Custom JS files -->
		<script src="assets/js/custom.js"></script>
		<script src="assets/js/todays-date.js"></script>
	</body>

</html>