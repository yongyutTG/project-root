<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-fluid {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        p {
            color:rgb(89, 32, 164);
            font-weight: bold;
        }
    </style>
<section>
    <main role="main">
        <section class="container-fluid">
            <br>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <p class="mb-0">กราฟ E-KYC ประจำเดือนปี (Real-Time)</p>
            <div class="ms-3">
                <select id="yearSelect" class="form-select form-select-sm">
                    <option value="" disabled selected>กรุณาเลือกปี</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
        </div>
            <p id="totalMembers" class="text-center mt-3"></p>
            <p id="updateTime" class="text-center mt-2"></p> <!-- แสดงเวลาที่อัปเดตล่าสุด -->
            <div style="width: 75%; margin: auto;">
                <canvas id="myChart"></canvas>  
            </div>

            <!-- Script การทำงานของ Chart -->
            <script>
                let myChart;

                function fetchDataAndUpdateChart(year) {
                    fetch(`api/data-ekyc-year.php?year=${year}`)
                        .then(response => response.json())
                        .then(data => {
                            const ctx = document.getElementById('myChart').getContext('2d');
                            if (myChart) {
                                myChart.data.labels = data.labels;
                                myChart.data.datasets[0].data = data.datasets[0].data;
                                myChart.data.datasets[1].data = data.datasets[1].data;
                                myChart.data.datasets[2].data = data.datasets[2].data;
                                myChart.update();
                            } else {
                                myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: data,
                                    options: {
                                        plugins: {
                                            datalabels: {
                                                display: true,
                                                color: '#444',
                                                anchor: 'end',
                                                align: 'top',
                                                formatter: function(value) {
                                                    return value;
                                                },
                                                font: {
                                                    weight: 'bold'
                                                }
                                            }
                                        },
                                        scales: {
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'เดือน'
                                                }
                                            },
                                            y: {
                                                beginAtZero: true,
                                                title: {
                                                    display: true,
                                                    text: 'จำนวนสมาชิก'
                                                },
                                                ticks: {
                                                    min: 0,
                                                    max: 1000,
                                                    stepSize: 100
                                                }
                                            }
                                        }
                                    },
                                    plugins: [ChartDataLabels]
                                });
                            }
                            document.getElementById('totalMembers').innerText = `ยอดรวมทั้งหมดในปี: ${data.total_count} คน`;
                            const currentTime = new Date();
                            const formattedDate = currentTime.toLocaleDateString('th-TH', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            });
                            const formattedTime = currentTime.toLocaleTimeString('th-TH', {
                                hour: '2-digit',
                                minute: '2-digit',
                                second: '2-digit'
                            });
                            document.getElementById('updateTime').innerText = `อัปเดตล่าสุดเมื่อ: ${formattedDate} เวลา ${formattedTime}`;
                    })
                    .catch(error => console.error('Error fetching data:', error));
                }

                function updateChart() {
                    const selectedYear = document.getElementById('yearSelect').value || new Date().getFullYear();
                    fetchDataAndUpdateChart(selectedYear);
                }

                setInterval(updateChart, 1000);
                updateChart();
            </script>
                

                
        </section>
    </main>
</section>

</script>
