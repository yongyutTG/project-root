
<!-- CONTENT -->

<!-- <section>

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
                    <h2 class="form-title mb-4"></i> คำขอลาที่ได้รับการอนุมัติ<i class="fas fa-check-circle fa-2x status-icon status-approved"></i> หรือปฏิเสธ <i class="fas fa-times-circle fa-2x status-icon status-rejected"></i> </h2>
                    <div class="table-responsive">
                        <table id="leaveHistoryTable" class="table table-bordered mt-4 leave-history-table">
                            <thead>
                            <tr>
                                <th>เลขคำขอลา</th>
                                <th>วันที่ยื่นคำขอ</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ประเภทการลา</th>
                                <th>เหตุผล</th>
                                <th>วันที่เริ่มลา</th>
                                <th>วันที่สิ้นสุดลา</th>
                                <th>สถานะการยืนคำขอลา</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><%= request.leaverequestid %></td>
                                    <td class="request-date"><%= request.requestdate %></td>
                                    <td><%= request.firstname %> <%= request.lastname %></td>
                                    <td><%= request.leavetype %></td>
                                    <td><%= request.reason %></td>
                                  
                                    <td class="request-date"><%= request.startdate %></td>
                                    <td class="request-date"><%= request.enddate %></td>
                                    <td>
                                        <% if (request.status === 'approved') { %>
                                            <i class="fas fa-check-circle fa-2x status-icon status-approved"></i> 
                                        <% } else if (request.status === 'rejected') { %>
                                            <i class="fas fa-times-circle fa-2x status-icon status-rejected"></i>
                                        <% } %>
                                    </td>
                                </tr>
                          
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>


    </main> 

</section>
 -->

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Frontend</title>
</head>
<body>
    <h1>รายการข้อมูลจาก API</h1>
    <div id="data-container">
        <!-- ตารางจะแสดงผลที่นี่ -->
    </div>

    <!-- <script src="script.js"></script> -->
</body>
</html>

<script>
// URL ของ API (ปรับตามที่ตั้งของคุณ)
const apiUrl = 'http://localhost:8080/api';

// ดึงข้อมูลจาก API และแสดงในหน้าเว็บ
async function fetchData() {
    try {
        // ใช้ Fetch API เพื่อดึงข้อมูล
        const response = await fetch(apiUrl);

        // ตรวจสอบว่า API ตอบกลับสำเร็จหรือไม่
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        // แปลงข้อมูลจาก JSON
        const data = await response.json();

        // แสดงข้อมูลใน HTML
        renderData(data);
    } catch (error) {
        console.error('Error fetching data:', error);
        document.getElementById('data-container').innerText = 'Error loading data';
    }
}

// แสดงข้อมูลใน HTML
function renderData(data) {
    const container = document.getElementById('data-container');
    let html = '<table border="1"><tr><th>ID</th><th>firstname</th><th>lastname</th><th>Email</th></tr>';

    // วนลูปสร้างแถวข้อมูล
    data.forEach(item => {
        html += `<tr>
                    <td>${item.id}</td>
                    <td>${item.firstname}</td>
                     <td>${item.lastname}</td>
                    <td>${item.email}</td>
                 </tr>`;
    });

    html += '</table>';
    container.innerHTML = html;
}

// เรียกใช้ฟังก์ชันเมื่อโหลดหน้าเว็บเสร็จ
fetchData();
</script>