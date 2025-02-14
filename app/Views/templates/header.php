
<title><?php echo $title ?? 'เว็บไซต์ตัวอย่าง'; ?></title>
    <!DOCTYPE html>
<html lang="en">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Leave Request Form</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <link href="bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="fontawesome-free-6.2.1-web/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="css/home.css">
  <!-- <link rel="stylesheet" href="public/css/admin.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
   
    
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
   <!-- Scripts for Bootstrap, jQuery, DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    
    <!-- โหลด Chart.js ก่อน -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script> <!-- Plugin Datalabels -->


    
  
   

</head>
    <title><?php echo $title ?? 'เว็บไซต์ตัวอย่าง'; ?></title>
    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a href="#" class="navbar-brand"><i class="fa fa-cube"></i> สวัสดีคุณ ยงยุทธ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="/home" class="nav-item nav-link"><i class="fa fa-home"></i> หน้าหลัก</a>
                <a href="/add" class="nav-item nav-link"><i class="fa fa-file-alt"></i> เพิ่มข้อมูล</a>
              
                
                
                <a href="/report" class="nav-item nav-link"><i class="fa fa-file-alt"></i> รายงาน</a>
                <a href="/leave-history" class="nav-item nav-link"><i class="fa fa-history"></i> ประวัติการลา</a>
                <a href="/leave-approvals" class="nav-item nav-link"><i class="fa fa-check-circle"></i> การอนุมัติหรือปฏิเสธคำขอ</a>
                <a href="/leave-balance" class="nav-item nav-link"><i class="fa fa-calculator"></i> คำนวณวันลาคงเหลือ</a>
                <a href="/dashboard" class="nav-item nav-link"><i class="fa fa-users"></i> เจ้าหน้าที่ทั้งหมด</a>
                <div class="nav-item dropdown position-relative">
                    <a href="#" class="nav-link dropdown-toggle" id="notificationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope"></i> ข้อความ
                        <span id="notificationBadge" class="position-absolute translate-middle badge rounded-pill bg-danger d-none"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown" id="notificationsList">
                        <li class="dropdown-item text-center">กำลังโหลด...</li>
                    </ul>
                </div>
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
