<section>
    <main role="main">
        <section class="container-fluid">
           <!-- ช่องค้นหา -->
            <div class="search-container">
                
                <label for="SearchId">กรอกเลข ID:</label>
                <input type="text" id="SearchId" class="form-control search-input" placeholder="ใส่ ID ค้นหา" />
                <div class="button-container">
                    <button class="btn-custom" onclick="getById()">
                        <i class="fas fa-search"></i> ค้นหา
                    </button>
                    <button class="btn-custom-clear" onclick="clearInput()">
                        <i class="fas fa-times"></i> ล้างข้อมูล
                    </button>
                </div>
            </div>

            
             <!-- ต้องเพิ่ม Font Awesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

            <div id="search-result" class="tab-show" style="display: none;">
            <!-- <div id="search-result" class="tab-show">    -->    
                 <!-- Loader -->
                <div id="loader" style="display: none; text-align: center; margin-top: 20px;">
                    <i class="fas fa-spinner fa-spin" style="font-size: 100px; color:rgb(54, 30, 94);"></i>
                    <P>กำลังโหลด....</P>
                </div>
                <nav>
                    <br>
                    <p>
                    <i class="fas fa-user-plus fa-2x"></i> สอบถามสมาชิกทะเบียนหุ้น
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

                <!-- ค้นหา -->
                <div class="tab-content" id="nav-tabContent">
                    <!--แถบชื่อ-นามสกุล-->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form>
                            <div class="form-row">
                                <div class="col-md-1 mb-3">
                                    <label for="personalId">ID</label>
                                    <input type="text" class="form-control" id="personalId" readonly>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="memberId">MemberId</label>
                                    <input type="text" class="form-control" id="mem_id" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="fname">Firstname</label>
                                    <input type="text" class="form-control" id="fname" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="lname">Lastname</label>
                                    <input type="text" class="form-control" id="lname" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="daterecord">Daterecord</label>
                                    <input type="text" class="form-control" id="daterecord" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="dateupdate">Dateupdate</label>
                                    <input type="text" class="form-control" id="dateupdate" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" id="position" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="date_ekyc">date_ekyc</label>
                                    <input type="text" class="form-control" id="date_ekyc" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="user_id">User เจ้าหน้าที่บันทึก</label>
                                    <input type="text" class="form-control" id="user_id" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="max_address">max_address</label>
                                    <input type="text" class="form-control" id="max_address" readonly>
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
                                    <input type="email" class="form-control" id="email" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="tel">Tel</label>
                                    <input type="text" class="form-control" id="tel" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="chk">Chk</label>
                                    <input type="text" class="form-control" id="chk" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
<!-- -------------------สมัครสมาชิกทะเบียนหุ้น--------------------- -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                  
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a short card.</p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    </div>
                </div>
            </div>
            
        </section>
    </main>
</section>

<script>
    async function getById() {
        const ValueId = $("#SearchId").val();
        const loader = document.getElementById('loader');
        const apiBaseUrl = 'http://localhost:8080/ApiEkycController/';
        const apiKey ='fa3bd0b9a96fd306d2900c2c281b98a79f3e81045d21c90b4a76e191e4de5913'
        $apiKey = getenv('API-KEY');
        // Check ค่าต้องเป็นตัวเลขเท่านั่น
        if (ValueId === "" || !/^\d+$/.test(ValueId)) {
            toastr.error('กรุณากรอกข้อมูลที่เป็นตัวเลข', 'Error');
            document.getElementById("SearchId").focus();
        } else {
            loader.style.display = 'block';

            try {
                const response = await fetch(`${apiBaseUrl}${encodeURIComponent(ValueId)}`, {
                    method: 'GET',
                    headers: {
                        // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN',
                        'X-API-KEY': apiKey,  // 🔹 แนบ API Key ใน Header
                        'Content-Type': 'application/json'
                    }
                });

                console.log("API Response Status:", response.status);

                if (response.ok) {
                    const data = await response.json();
                    console.log("ข้อมูลที่ได้รับจาก API:", data);

                    if (data.status === 'success' && data.data) {
                        const request = data.data;
                        // Log ค่าข้อมูลแต่ละฟิลด์
                        console.log("ข้อมูลผู้ใช้:", request);

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

                        document.getElementById('search-result').style.display = 'block';
                    } else {
                        console.log("API ส่งข้อมูลกลับมาไม่ถูกต้อง");
                        toastr.error('ข้อมูลไม่ถูกต้อง', 'ไม่พบข้อมูลกรุณาตรวจสอบข้อมูล');
                        document.getElementById("SearchId").focus();
                        document.getElementById('search-result').style.display = 'none';
                    }
                } else {
                    console.log("HTTP Error: ${response.status}");
                    toastr.error(`HTTP Error: ${response.status}`, 'Error');
                    document.getElementById('search-result').style.display = 'none';
                }
            } catch (error) {
                console.error("Error fetching data:", error);
                toastr.error(' ดักจับข้อผิดข้อผิดพลาด (เช่น API ล่ม หรือ Network ขัดข้อง)', 'Error');
                document.getElementById('search-result').style.display = 'none';
            } finally {
                loader.style.display = 'none'; // ซ่อน Loader
            }
        }
    }


 

    function clearInput() {
        document.getElementById("SearchId").value = ""; // ล้างค่าข้อมูลใน input
        document.getElementById("SearchId").focus();
    }

</script>
