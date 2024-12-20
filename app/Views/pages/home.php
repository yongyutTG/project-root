
<!-- CONTENT -->

<section>

    <main role="main">
            <div class="container mt-5 pt-5">
                <div class="leave-policy">
                <h3>Wellcome to Home Pages</h3>
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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
            <script>
               
                function getRequests() {
                    fetch('http://localhost:8080/api')  
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
                                                    ${request.status === 'approved' 
                                                        ? '<i class="fas fa-check-circle fa-2x status-icon status-approved"></i>' 
                                                        : request.status === 'rejected' 
                                                        ? '<i class="fas fa-times-circle fa-2x status-icon status-rejected"></i>' 
                                                        : ''
                                                    }
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


                window.onload = getRequests;
            </script>



</body>
</html>

