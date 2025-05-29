
<!DOCTYPE html>
<html lang="th">
<?php
$ut = empty($_GET["ut"]) ? "student" : $_GET["ut"];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - ระบบงานทะเบียนนักเรียน โรงเรียนกำแพงแสนวิทยา</title>
    <link rel="shortcut icon" href="images/favicon.svg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#1e3a8a',
                        accent: '#3b82f6',
                    },
                    fontFamily: {
                        sans: ['Kanit'],
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color:rgb(237, 243, 255);
            color: #1f2937;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .login-card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(to right, #1e40af, #1e3a8a);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .login-form {
            padding: 2rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(22, 180, 249, 0.2);
        }
        
        .btn-primary {
            background: linear-gradient(to right, #1e40af, #1e3a8a);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
            width: 100%;
            text-align: center;
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, #1e40af, #1e3a8a);
            transform: translateY(-1px);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .user-type-selector {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }
        
        .user-type-option {
            flex: 1 0 calc(33.333% - 0.75rem);
            min-width: 100px;
            text-align: center;
            padding: 0.75rem 0.5rem;
            border: 2px solid rgb(213, 240, 255);
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .user-type-option:hover {
            border-color:rgb(116, 196, 253);
            background-color:rgb(237, 245, 255);
        }
        
        .user-type-option.selected {
            border-color: #1e40af;
            background-color:rgb(213, 228, 255);
        }
        
        .user-type-option i {
            font-size: 1.5rem;
            color: #1e40af;
        }
        
        .user-type-option span {
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #9ca3af;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #e5e7eb;
        }
        
        .divider span {
            padding: 0 1rem;
            font-size: 0.875rem;
        }
        
        .footer {
            margin-top: auto;
            text-align: center;
            padding: 1.5rem;
            color: #4b5563;
            font-size: 0.875rem;
        }
        
        @media (max-width: 640px) {
            .user-type-option {
                flex: 1 0 calc(50% - 0.75rem);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="container mx-auto px-4 py-8 flex-grow flex items-center justify-center">
            <div class="w-full max-w-md">
                <div class="mb-6 text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-white p-0 shadow-md mb-4">
                        <!-- School Logo -->
                        <img src="images/KPSWLogo.png" alt="โรงเรียนกำแพงแสนวิทยา">
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">โรงเรียนกำแพงแสนวิทยา</h1>
                    <p class="text-gray-600">ระบบงานทะเบียนนักเรียน</p>
                </div>
                
                <div class="login-card">
                    <div class="login-header">
                        <h2 class="text-xl font-semibold">เข้าสู่ระบบ</h2>
                        <p class="text-sm text-orange-100 mt-1">กรุณาเลือกประเภทผู้ใช้งานและกรอกข้อมูลเพื่อเข้าสู่ระบบ</p>
                    </div>
                    
                    <div class="login-form">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">เลือกประเภทผู้ใช้งาน</label>
                            <div class="user-type-selector">
                                <?php
                                if($ut=="student"){
                                    $selected=" selected";
                                }else{
                                    $selected="";
                                }
                                ?>
                                <div class="user-type-option<?=$selected;?>" data-type="student">
                                    <i class="fas fa-user-graduate"></i>
                                    <span>นักเรียน</span>
                                </div>
                                <?php
                                if($ut=="parent"){
                                    $selected=" selected";
                                }else{
                                    $selected="";
                                }
                                ?>
                                <div class="user-type-option<?=$selected;?>" data-type="parent">
                                    <i class="fas fa-users"></i>
                                    <span>ผู้ปกครอง</span>
                                </div>
                                <?php
                                if($ut=="advisor"){
                                    $selected=" selected";
                                }else{
                                    $selected="";
                                }
                                ?>
                                <div class="user-type-option<?=$selected;?>" data-type="advisor">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <span>ครูที่ปรึกษา</span>
                                </div>
                                <?php
                                if($ut=="teacher"){
                                    $selected=" selected";
                                }else{
                                    $selected="";
                                }
                                ?>
                                <div class="user-type-option<?=$selected;?>" data-type="teacher">
                                    <i class="fas fa-book-reader"></i>
                                    <span>ครูผู้สอน</span>
                                </div>
                                <?php
                                if($ut=="registrar"){
                                    $selected=" selected";
                                }else{
                                    $selected="";
                                }
                                ?>
                                <div class="user-type-option<?=$selected;?>" data-type="registrar">
                                    <i class="fas fa-id-card"></i>
                                    <span>งานทะเบียน</span>
                                </div>
                                <?php
                                if($ut=="admin"){
                                    $selected=" selected";
                                }else{
                                    $selected="";
                                }
                                ?>
                                <div class="user-type-option<?=$selected;?>" data-type="admin">
                                    <i class="fas fa-user-shield"></i>
                                    <span>ผู้บริหาร</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="divider">
                            <span>ข้อมูลเข้าสู่ระบบ</span>
                        </div>
                        
                        <form>
                            <div class="mb-4">
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">ชื่อผู้ใช้งาน</label>
                                <input type="text" id="username" name="username" class="form-input" placeholder="กรอกชื่อผู้ใช้งาน / รหัสนักเรียน / รหัสประจำตัว" required>
                            </div>
                            
                            <div class="mb-6">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">รหัสผ่าน</label>
                                <input type="password" id="password" name="password" class="form-input" placeholder="กรอกรหัสผ่าน" required>
                                <div class="flex justify-end">
                                    <a href="#" class="text-sm text-orange-600 hover:text-orange-800">ลืมรหัสผ่าน?</a>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn-primary">
                                เข้าสู่ระบบ
                            </button>
                        </form>
                        
                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-600">
                                มีปัญหาในการเข้าสู่ระบบ? <a href="#" class="text-orange-600 hover:text-orange-800 font-medium">ติดต่อผู้ดูแลระบบ</a>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-500">
                        การเข้าสู่ระบบครั้งแรก ใช้รหัสประจำตัวเป็นรหัสผ่าน
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        ระบบจะบังคับให้เปลี่ยนรหัสผ่านเมื่อเข้าสู่ระบบครั้งแรก
                    </p>
                </div>
            </div>
        </div>
        
        <footer class="footer">
            <p>&copy; 2568 โรงเรียนกำแพงแสนวิทยา. สงวนลิขสิทธิ์.</p>
        </footer>
    </div>
    
    <script>
        // User type selection
        const userTypeOptions = document.querySelectorAll('.user-type-option');
        const usernameInput = document.getElementById('username');
        const userTypeLabels = {
            'student': 'กรอกชื่อผู้ใช้งานของนักเรียน',
            'parent': 'กรอกชื่อผู้ใช้งานของผู้ปกครอง',
            'advisor': 'กรอกชื่อผู้ใช้งานของครูที่ปรึกษา',
            'teacher': 'กรอกชื่อผู้ใช้งานของครูผู้สอน',
            'registrar': 'กรอกชื่อผู้ใช้งานของเจ้าหน้าที่ทะเบียน',
            'admin': 'กรอกชื่อผู้ใช้งานของผู้บริหาร'
        };
        
        userTypeOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                userTypeOptions.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Update placeholder based on selected user type
                const userType = this.getAttribute('data-type');
                usernameInput.placeholder = userTypeLabels[userType];
            });
        });
        
        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const selectedUserType = document.querySelector('.user-type-option.selected').getAttribute('data-type');
            
            if (!username || !password) {
                alert('กรุณากรอกชื่อผู้ใช้และรหัสผ่าน');
                return;
            }
            
            // Here you would normally send the login request to the server
            // For demo purposes, we'll just show an alert
            alert(`กำลังเข้าสู่ระบบในฐานะ: ${selectedUserType}\nชื่อผู้ใช้: ${username}`);
            
            // Redirect to dashboard (in a real application)
            window.location.href = 'studentDashboard.php';
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'93f9fcc061e3893d',t:'MTc0NzIyMTQyOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>