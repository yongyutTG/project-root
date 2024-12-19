
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

    <script src="script.js"></script>
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