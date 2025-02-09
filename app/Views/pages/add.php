<section>
    <main role="main">
        <section class="container-fluid">
            <br>
          

             <!-- ต้องเพิ่ม Font Awesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

            <!-- Loader -->
            <div id="loader" style="display: none; text-align: center; margin-top: 20px;">
                <i class="fas fa-spinner fa-spin" style="font-size: 54px; color:rgb(139, 108, 189);"></i>
            </div>


            <!-- <div id="search-result" class="leave-policy" style="display: none;"> -->
            <div id="search-result" class="leave-policy">   
            <nav>
                <p>
                <i class="fas fa-user-plus fa-2x"></i> สมัครสมาชิกทะเบียนหุ้น
                </p>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                        <i class="fas fa-user"></i> ชื่อ-นามสกุล
                    </a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                        <i class="fas fa-map-marker-alt"></i> ที่อยู่ติดต่อ
                    </a>
                </div>
            </nav>

                <div class="tab-content" id="nav-tabContent">
                    <!--แถบชื่อ-นามสกุล-->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form>
                            <div class="form-row">
                                <div class="col-md-1 mb-3">
                                    <label for="personalId">ID</label>
                                    <input type="text" class="form-control" id="personalId" >
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="memberId">MemberId</label>
                                    <input type="text" class="form-control" id="mem_id" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="fname">Firstname</label>
                                    <input type="text" class="form-control" id="fname" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="lname">Lastname</label>
                                    <input type="text" class="form-control" id="lname" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="daterecord">Daterecord</label>
                                    <input type="date" class="form-control" id="daterecord" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="dateupdate">Dateupdate</label>
                                    <input type="date" class="form-control" id="dateupdate" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" id="position" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="date_ekyc">date_ekyc</label>
                                    <input type="date" class="form-control" id="date_ekyc" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="user_id">User เจ้าหน้าที่บันทึก</label>
                                    <input type="text" class="form-control" id="user_id" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="max_address">max_address</label>
                                    <input type="text" class="form-control" id="max_address" >
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- ที่อยู่ติดต่อ  -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="tel">Tel</label>
                                    <input type="text" class="form-control" id="tel" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="chk">Chk</label>
                                    <input type="text" class="form-control" id="chk" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ปุ่มฟอร์ม -->
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-success mx-2" onclick="getById()">
                        <i class="fas fa-save"></i> Save
                    </button>

                    <button class="btn btn-danger mx-2" onclick="getById()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                </div>

            </div>
            
        </section>
    </main>
</section>

<script>
  async function getById() {
    const ValueId = document.getElementById('SearchId').value;
    const loader = document.getElementById('loader');
    //เรียก function ที่จะใช้ใน Controller
    const apiBaseUrl = 'http://localhost:8080/ApiEkycController/';

    if (!ValueId) {
        Swal.fire({
            icon: 'error',
            title: 'กรุณากรอก ID',
            text: 'คุณต้องกรอกรหัสค้นหา'
        });
        return;
    }

    loader.style.display = 'block';

    try {
        const response = await fetch(`${apiBaseUrl}${ValueId}`, {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer YOUR_ACCESS_TOKEN',
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();

        if (data.status === 'success') {
            const request = data.data || {};
             // อัปเดตข้อมูลในฟอร์ม
            document.getElementById("personalId").value = request.id || '';
            document.getElementById("mem_id").value = request.mem_id || '';
            document.getElementById("fname").value = request.fname || '';
            document.getElementById("lname").value = request.lname || '';
            document.getElementById("email").value = request.email || '';
            document.getElementById("tel").value = request.tel || '';
            document.getElementById("chk").value = request.chk || '';
            document.getElementById("password").value = request.password || '';
            document.getElementById("daterecord").value = request.daterecord || '';
            document.getElementById("dateupdate").value = request.dateupdate || '';
            document.getElementById("position").value = request.position || '';
            document.getElementById("date_ekyc").value = request.date_ekyc || '';
            document.getElementById("user_id").value = request.user_id || '';
            document.getElementById("max_address").value = request.max_address || '';
            // แสดงผลข้อมูล
            document.getElementById('search-result').style.display = 'block';

            Swal.fire({
                icon: 'success',
                title: 'ค้นหาสำเร็จ',
                text: 'ข้อมูลถูกโหลดเรียบร้อย'
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'ไม่พบข้อมูล',
                text: 'ไม่พบข้อมูลที่ตรงกับคำค้นหา'
            });

            document.getElementById('search-result').style.display = 'none';
        }
    } catch (error) {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'ข้อผิดพลาด',
            text: 'เกิดข้อผิดพลาดในการค้นหา'
        });

        document.getElementById('search-result').style.display = 'none';
    } finally {
        loader.style.display = 'none';
    }
}

// ล้างฟอรม
function clearInput() {
    document.getElementById("SearchId").value = "";
}
   
</script>
