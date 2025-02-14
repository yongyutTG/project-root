
<!-- CONTENT -->
<section>
    <main role="main">
            <div class="container mt-5 pt-5">
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                       
                        const tableRows = document.querySelectorAll(".leave-history-table .request-date");
                
                        tableRows.forEach(cell => {
                            const date = new Date(cell.innerText);
                            if (!isNaN(date)) {
                              
                                cell.innerText = date.toISOString().split('T')[0];
                            }
                        });
                    });
                </script>
            <div class="form-container">
            <h2 class="form-title mb-4">
                คำขอลาที่ได้รับการอนุมัติ 
                <i class="fas fa-check-circle fa-2x status-icon status-approved"></i> 
                หรือปฏิเสธ 
                <i class="fas fa-times-circle fa-2x status-icon status-rejected"></i>
            </h2>
    
   
    <label for="leaveRequestId">กรอกเลข ID:</label>
    <input type="text" id="leaveRequestId" placeholder="ใส่ ID ค้นหา" />
    <button onclick="getLeaveRequestById(document.getElementById('leaveRequestId').value)">ค้นหา</button>
    <button onclick="deleteLeaveRequestById(document.getElementById('leaveRequestId').value)">ลบข้อมูล</button>
    <button onclick="getRequests()">ดึงข้อมูล</button>
    <button data-bs-toggle="modal" data-bs-target="#addRequestModal">เพิ่มข้อมูล</button>

        <!-- Modal -->
    <div class="modal fade" id="addRequestModal" tabindex="-1" aria-labelledby="addRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRequestModalLabel">เพิ่มข้อมูลคำขอลา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRequestForm">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="createFirstname" name="firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="createLastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" id="createEmail" name="email" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="create_data()">เพิ่มข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="table-responsive">
        <table id="leaveHistoryTable" class="table table-bordered mt-4 leave-history-table">
            <thead>
                <tr>
                <th>ID</th>
                <th>firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody id="leaveHistoryBody">
                <!-- ข้อมูลจะถูกแสดงที่นี่ -->
               
            </tbody>
        </table>
    </div>    
</div>

<script>
 

    // Read
    function getRequests() {
    fetch('http://localhost:8080/api', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            // 'Authorization' : 'eyJ0eddssdXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MzkyOTQxNjUsImV4cCI6MTczOTI5Nzc2NSwiZGF0YSI6eyJpZCI6MSwidXNlcm5hbWUiOiJleGFtcGxldXNlciIsInJvbGUiOiJhZG1pbiJ9fQ.XZ8gHKrk9Bb3ekKaaNR6P4vQQULFDF1-jbNuBrTP1MU',
            'X-API-Key':  'c79a63cf10f3cf7f9d080fd02a1861ec69a58132df57819c2613c1ed582a98b3'
        
        }
    })
    .then(response => response.json()) 
    .then(data => {
        console.log('Data response:', data);
        if (data.status === 'success') {
            let leaveRequests = data.data;
            let html = '';
            leaveRequests.forEach(request => {
                html += `<tr>
                            <td>${request.id}</td>
                            <td>${request.firstname}</td>
                            <td>${request.lastname}</td>
                            <td>${request.email}</td>
                            <td>
                                <button class="edit-btn" onclick="editRequest(${request.id})">Edit</button>
                                <button class="delete-btn" onclick="deleteLeaveRequestById(${request.id})">Delete</button>
                            </td>
                        </tr>`;
            });
            document.getElementById('leaveHistoryBody').innerHTML = html; // แสดงข้อมูลใน tbody

            Swal.fire({
                icon: 'success',
                title: 'ข้อมูล',
                text: 'ดึงข้อมูลสำเร็จ'
            });
        } else {
            document.getElementById('leaveHistoryBody').innerHTML = '<tr><td colspan="8">ไม่พบข้อมูล</td></tr>';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('leaveHistoryBody').innerHTML = '<tr><td colspan="8">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>';
    });
}


    function editRequest(id) {
        console.log('Editing request with ID:', id);
        // You can redirect to an edit page or show a form to update the request here
    }

    

    // window.onload = getRequests;
</script>


<script> //Cread
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

<script>  //Read By ID
 function getLeaveRequestById() {
    var leaveRequestId = document.getElementById('leaveRequestId').value;
    if (!leaveRequestId) {
        Swal.fire({
            icon: 'error',
            title: 'กรุณากรอกเลขคำขอลา',
            text: 'คุณต้องกรอกรหัสคำขอลาเพื่อทำการค้นหา'
        });
        return;
    }

    console.log('Data Request:', leaveRequestId); // ตรวจสอบข้อมูลที่ส่ง

    fetch(`http://localhost:8080/api/${leaveRequestId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
           'X-API-Key': 'c79a63cf10f3cf7f9d080fd02a1861ec69a58132df57819c2613c1ed582a98b3' // 🔑 ใส่ API Key ที่ได้รับs
        }
    })
    .then(response => response.json()) // แปลงข้อมูลเป็น JSON
    .then(data => {
        console.log('Data response:', data);
        if (data.status === 'success') {
            let request = data.data; // ข้อมูลที่ได้
            let html = `<tr>
                            <td>${request.id}</td>
                            <td>${request.firstname}</td>
                            <td>${request.lastname}</td>
                            <td>${request.email}</td>
                        </tr>`;
            document.getElementById('leaveHistoryBody').innerHTML = html; // แสดงข้อมูลใน tbody
        } else {
            document.getElementById('leaveHistoryBody').innerHTML = '<tr><td colspan="8">ไม่พบข้อมูลสำหรับคำขอลานี้</td></tr>';
            Swal.fire({
                icon: 'warning',
                title: 'ไม่พบข้อมูล',
                text: 'คำขอลานี้ไม่พบข้อมูลในระบบ'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('leaveHistoryBody').innerHTML = '<tr><td colspan="8">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>';
        Swal.fire({
            icon: 'error',
            title: 'เกิดข้อผิดพลาด',
            text: 'ไม่สามารถดึงข้อมูลจากเซิร์ฟเวอร์ได้'
        });
    });
}

</script>

<script>   // Dealte ลบข้อมูลตาม ID
    function deleteLeaveRequestById(leaveRequestId) {
        fetch(`http://localhost:8080/api/${leaveRequestId}`, {
            method: 'DELETE', // ใช้ HTTP DELETE
            headers: {
            'Content-Type': 'application/json',
            'X-API-Key': 'c79a63cf10f3cf7f9d080fd02a1861ec69a58132df57819c2613c1ed582a98b3' // 🔑 ใส่ API Key ที่ได้รับs
             }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('ลบข้อมูลสำเร็จ');
                    // ทำการอัปเดต UI หรือดึงข้อมูลใหม่ (เช่น ปิดการแสดงข้อมูลที่ลบแล้ว)
                } else {
                    alert('ไม่สามารถลบข้อมูลได้');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('เกิดข้อผิดพลาดในการลบข้อมูล');
            });
    }

</script>

<script>
   
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
</body>
</html>

