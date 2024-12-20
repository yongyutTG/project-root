
<!-- CONTENT -->

<section>

    <main role="main">
            <div class="container mt-5 pt-5">
                <div class="leave-policy">
                <h3>Wellcome to  Update</h3>
                    <ul>
                        <li><strong>ลาพักร้อน:</strong> พนักงานมีสิทธิลาพักร้อนได้ปีละ 10 วัน หลังจากทำงานครบ 1 ปี</li>
                        <li><strong>ลากิจส่วนตัว:</strong> สามารถลางานได้โดยไม่หักค่าจ้าง 5 วันต่อปี</li>
                        <li><strong>ลาป่วย:</strong> พนักงานสามารถลาป่วยได้ตามความจำเป็น แต่ต้องมีใบรับรองแพทย์หากลาติดต่อกันเกิน 3 วัน</li>
                        <li><strong>ลาคลอด:</strong> พนักงานหญิงมีสิทธิลาคลอดได้ 90 วัน โดยมีเงินเดือนจ่าย 45 วันตามกฎหมายแรงงาน</li>
                        <li><strong>การยื่นขอลา:</strong> พนักงานต้องยื่นใบคำขอลาล่วงหน้าอย่างน้อย 3 วันทำการ ยกเว้นกรณีลาป่วยที่สามารถยื่นย้อนหลังได้</li>
                        <li><strong>เอกสาร:</strong> สำหรับการลาป่วยเกิน 3 วัน ต้องแนบใบรับรองแพทย์</li>
                    </ul>
                    
                </div>
    
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
                <div class="table-responsive">
                    <table id="leaveHistoryTable" class="table table-bordered mt-4 leave-history-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="leaveHistoryBody">
                          
                        </tbody>
                    </table>
                </div>    
            </div>


<!-- ช่องกรอกข้อมูลคำขอลาเพื่ออัปเดต -->
<label for="leaveRequestId">เลขคำขอลา:</label>
<input type="text" id="leaveRequestId" placeholder="ใส่เลขคำขอลา"  />
<label for="firstname">ชื่อ:</label>
<input type="text" id="firstname" placeholder="ชื่อ" />
<label for="lastname">นามสกุล:</label>
<input type="text" id="lastname" placeholder="นามสกุล" />
<label for="email">อีเมล์:</label>
<input type="email" id="email" placeholder="อีเมล์" />
<button onclick="updateLeaveRequest()">อัปเดตคำขอลา</button>
<script>
               
     // ดึงข้อมูลคำขอลาเพื่อให้ผู้ใช้สามารถแก้ไข
function getLeaveRequestById(leaveRequestId) {
    fetch(`http://localhost:8080/api/${leaveRequestId}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                let request = data.data; // ข้อมูลคำขอลาที่ได้
                // ตัวอย่างการเติมข้อมูลเข้าใน form เพื่อให้ผู้ใช้แก้ไข
                document.getElementById('leaveRequestId').value = request.id;
                document.getElementById('firstname').value = request.firstname;
                document.getElementById('lastname').value = request.lastname;
                document.getElementById('email').value = request.email;
               
            } else {
                alert('ไม่พบข้อมูลสำหรับคำขอนี้');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('เกิดข้อผิดพลาดในการดึงข้อมูล');
        });
}
</script>

<script>
    // ฟังก์ชันในการอัปเดตข้อมูลคำขอลา
function updateLeaveRequest() {
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('email').value;

    // ตรวจสอบข้อมูลว่ามีครบหรือไม่
    if ( !firstname || !lastname || !email) {
        alert('กรุณากรอกข้อมูลให้ครบ');
        return;
    }

    var updatedData = {
        firstname: firstname,
        lastname: lastname,
        email: email
    };

    // ใช้ PUT หรือ PATCH สำหรับการอัปเดต
    fetch(`http://localhost:8080/api/${leaveRequestId}`, {
        method: 'PUT',  // ใช้ PUT สำหรับการอัปเดตข้อมูลทั้งหมด
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(updatedData) // ส่งข้อมูลที่อัปเดตไปใน body
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('อัปเดตข้อมูลสำเร็จ');
            // อาจจะต้องรีเฟรชหน้าจอหรือตาราง
            getLeaveRequests();  // ถ้าต้องการดึงข้อมูลใหม่
        } else {
            alert('ไม่สามารถอัปเดตข้อมูลได้');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล');
    });
}

</script>



</body>
</html>

