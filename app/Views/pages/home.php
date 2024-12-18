
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
                        // ค้นหาตารางที่มี class "leave-history-table"
                        const tableRows = document.querySelectorAll(".leave-history-table .request-date");
                
                        tableRows.forEach(cell => {
                            const date = new Date(cell.innerText);
                            if (!isNaN(date)) {
                                // ฟอร์แมตวันที่เป็นรูปแบบ YYYY-MM-DD
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
                                    <!-- <td class="request-date"><%= request.startdate %> - <%= request.enddate %></td> -->
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


