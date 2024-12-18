<!-- <!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'เว็บไซต์ตัวอย่าง'; ?></title>
</head>
<body>
    <header>
        <h1>เว็บไซต์ตัวอย่าง</h1>
        <p>ยินดีต้อนรับสู่เว็บไซต์ของเรา</p>
    </header> -->
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Leave Request Form</title>
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
  
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
   <!-- Scripts for Bootstrap, jQuery, DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <style>
    body {
        background-color: #e9ecef;
    }

    .form-container {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .form-title {
        font-weight: bold;
        color: #67696b;
        margin-bottom: 20px;
        text-align: center;
        font-size: 20px;
    }

    .form-control,
    .form-select-custom {
        border-radius: 8px;
        padding: 12px;
    }

    .btn-custom {
        background-color: #007bff;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 16px;
        color: #ffffff;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    /* ไอคอนสถานะ */
    .status-icon {
        font-size: 18px;
    }

    .status-pending {
        color: #f39c12;
    }

    .status-approved {
        color: #27ae60;
    }

    .status-rejected {
        color: #e74c3c;
    }


    /* Custom styles for leave policy section */
    .leave-policy {
        background-color: #f0f8ff;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: 1px solid #f3f3fa;
    }

    .leave-policy h4 {
        font-weight: bold;
        color: #4b4c4d;
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

    /* Custom styles for leave history table */
    .table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .table th,
    .table td {
        border-top: none;
        text-align: center;
         font-size: 14px;
        padding: 12px;
    }

    .table thead th {
        background-color: #3d216b;
        color: #ffffff;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #eaf3ff;
    }

    .table-responsive {
        overflow-x: auto;
    }

        
    /* ปุ่มแอ็คชั่น */
    button {
        background-color: #4caf50;
        border: none;
        color: white;
        padding: 10px 16px;
        width: 120px;
        text-align: center;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        margin-right: 5px;
        transition: background-color 0.3s ease;
    }

    .view-details-btn {
        background-color: #a19b92;
    }

    .view-details-btn:hover {
        background-color: #a19b92;
    }

    /* ไอคอนสถานะ */
    .status-icon {
        font-size: 18px;
    }

    .status-pending {
        color: #f39c12;
    }

    .status-approved {
        color: #27ae60;
    }

    .status-rejected {
        color: #e74c3c;
    }

   
    /* สไตล์ Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        width: 500px;
        max-width: 90%;
    }

    .modal-header {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    /* Close Modal */
    .close-btn {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
        float: right;
    }

  </style>
</head>
    <title><?php echo $title ?? 'เว็บไซต์ตัวอย่าง'; ?></title>
    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a href="#" class="navbar-brand"><i class="fa fa-cube"></i> สวัสดีคุณ <%= user %></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="/home" class="nav-item nav-link"><i class="fa fa-home"></i> หน้าหลัก</a>
                <a href="/leave-request-form" class="nav-item nav-link"><i class="fa fa-file-alt"></i> ยื่นคำขอลา</a>
                <a href="/leave-request-pending" class="nav-item nav-link"><i class="fa fa-file-alt"></i> รอการอนุมัติ</a>
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
