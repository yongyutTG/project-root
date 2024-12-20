<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Leave Request Form</title>

  <style>
    body {
        background-color: #ffffff;
    }

    .form-container {
        background-color: #3d216b;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .form-title {
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 20px;
        text-align: center;
        font-size: 16px;
    }

  

    input,
    label {
        color: rgb(253, 251, 251);
        margin: 0.4rem 0;
    } 

    .form-control {
        border-radius: 8px;
        padding: 8px;
    }

    .form-select-custom {
        background-color: #f0f8ff;
        color: #000000;
        border: 1px solid #cccccc;
        border-radius: 8px;
        padding: 12px;
    }

    .form-select-custom:focus, 
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .btn-custom {
        background-color: #007bff;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 14px;
        color: #ffffff;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    .row {
        margin-bottom: 20px;
    }

    .dashboard-card {
        background-color: #3d216b;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .dashboard-card h6 {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .dashboard-card p, .stat-item h4 {
        margin: 0;
        font-size: 14px;
        width: 100%;
    }
    /* Custom Style for Leave Policy Section */
    .leave-policy {
          background-color: #f0f8ff;
          padding: 20px;
          border-radius: 10px;
          margin-bottom: 20px;
          border: 1px solid #f3f3fa;
      }

      .leave-policy h4 {
          font-weight: bold;
          color: #3d216b;
          margin-bottom: 15px;
      }

      .leave-policy ul {
          list-style-type: disc;
          padding-left: 20px;
      }

      .leave-policy ul li {
          margin-bottom: 10px;
          font-size: 14px;
          color: #3d216b;
      }
  </style>

</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a href="#" class="navbar-brand"><i class="fa fa-cube"></i>สวัสดีคุณ <%= user %></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <<div class="navbar-nav ml-auto">
            <a href="/home" class="nav-item nav-link"><i class="fa fa-home"></i> หน้าหลัก</a>
            <a href="/leave-request-form" class="nav-item nav-link"><i class="fa fa-file-alt"></i> ยื่นคำขอลา</a>
            <a href="/leave-request-pending" class="nav-item nav-link"><i class="fa fa-file-alt"></i> รอการอนุมัติ</a>
            <a href="/leave-history" class="nav-item nav-link"><i class="fa fa-history"></i> ประวัติการลา</a>
            <a href="/leave-approvals" class="nav-item nav-link"><i class="fa fa-check-circle"></i> การอนุมัติหรือปฏิเสธคำขอ</a>
            <a href="/leave-balance" class="nav-item nav-link"><i class="fa fa-calculator"></i> คำนวณวันลาคงเหลือ</a>
            <a href="/dashboard" class="nav-item nav-link"><i class="fa fa-users"></i> เจ้าหน้าที่ทั้งหมด</a>
            
            <!-- <a href="/notifications" class="nav-item nav-link"><i class="fa fa-envelope"></i> ข้อความ -->
            <!-- Dropdown Menu for notifications -->
            <div class="nav-item dropdown position-relative">
                <a href="#" class="nav-link dropdown-toggle" id="notificationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope"></i> ข้อความ
                    <span id="notificationBadge" class="position-absolute translate-middle badge rounded-pill bg-danger d-none">
                        <!-- จะใส่จำนวนข้อความใหม่ใน badge -->
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown" id="notificationsList">
                    <li class="dropdown-item text-center">กำลังโหลด...</li>
                </ul>
            </div>
            
            
            
            <!-- Dropdown Menu for Logout -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-user me-1"></i> บัญชีผู้ใช้
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <li><a class="dropdown-item" href="/leave-profile"><i class="fa fa-user me-2"></i> โปรไฟล์ของฉัน</a></li>
                    <li><a class="dropdown-item" href="/leave-settings"><i class="fa fa-cog"></i> ตั้งค่า</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/logout"><i class="fa fa-sign-out-alt"></i> ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
        </div>
      </nav>
  </header>

  <main role="main">
        <div class="container mt-5 pt-5">
           <!-- Leave Policy Section -->
           <div class="leave-policy">
            <h4>ระเบียบการลาของพนักงาน</h4>
            <ul>
                <li><strong>ลาพักร้อน:</strong> พนักงานมีสิทธิลาพักร้อนได้ปีละ 10 วัน หลังจากทำงานครบ 1 ปี</li>
                <li><strong>ลากิจส่วนตัว:</strong> สามารถลางานได้โดยไม่หักค่าจ้าง 5 วันต่อปี</li>
                <li><strong>ลาป่วย:</strong> พนักงานสามารถลาป่วยได้ตามความจำเป็น แต่ต้องมีใบรับรองแพทย์หากลาติดต่อกันเกิน 3 วัน</li>
                <li><strong>ลาคลอด:</strong> พนักงานหญิงมีสิทธิลาคลอดได้ 90 วัน โดยมีเงินเดือนจ่าย 45 วันตามกฎหมายแรงงาน</li>
                <li><strong>การยื่นขอลา:</strong> พนักงานต้องยื่นใบคำขอลาล่วงหน้าอย่างน้อย 3 วันทำการ ยกเว้นกรณีลาป่วยที่สามารถยื่นย้อนหลังได้</li>
                <li><strong>เอกสาร:</strong> สำหรับการลาป่วยเกิน 3 วัน ต้องแนบใบรับรองแพทย์</li>
            </ul>
        </div>
            <div class="form-container">
                    <h2 class="form-title mb-4">เพิ่มข้อมูล</h2>

                        <div class="row">
                           
                            <div class="col-md-3 mb-3">
                                <label for="firstname">ชื่อ</label>
                                <input type="text" class="form-control" id="createFirstname" name="firstname">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastname">นามสกุล</label>
                                <input type="text" class="form-control" id="createLastname" name="lastname">
                              
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="createEmail" name="email" >
                            </div>
                        </div>        
                        <button onclick="create_data()">สร้างคำขอลา</button>
                    
                        <button class="btn btn-secondary">ยกเลิก</button>
            
               
            </div>
        </div>
    </main>

   <script>
        function create_data() {
            var firstname = document.getElementById('createFirstname').value;
            var lastname = document.getElementById('createLastname').value;
            var email = document.getElementById('createEmail').value;
            if (!firstname || !lastname || !email) {
                alert('กรุณากรอกข้อมูลให้ครบ');
                return;
            }
            var newRequestData = { firstname, lastname, email };
            console.log('Data Request:', newRequestData); // ตรวจสอบข้อมูลที่ส่ง
            fetch('http://localhost:8080/api', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(newRequestData),
            })
                .then(response => response.json())  
                .then(data => {  
                    console.log('Data response:', data);
                    if (data.status === 'success') {
                            Swal.fire({
                            icon: 'success',
                            title: 'ข้อมูล',
                            text: 'สร้างข้อมูลสำเร็จ'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'ข้อมูล',
                            text: 'สร้างข้อมูลไม่สำเร็จ'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('เกิดข้อผิดพลาดในการสร้างข้อมูล');
                });
        }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
 
</body>
</html>
