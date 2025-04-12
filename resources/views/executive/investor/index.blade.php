<x-app>

    <body>
        <div class="page">
            <div class="page-wrapper">
                <!-- Page header -->
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <div class="page-pretitle">
                                    DASHBOARD
                                </div>
                                <h2 class="page-title">
                                    Investor
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-deck row-cards">
                            {{-- card gawe info --}}
                            <div class="col-sm-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="text-muted text-uppercase small fw-bold">JUMLAH INVESTOR</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <!-- Donut Chart for Gender -->
                                            <svg width="100%" height="200" viewBox="0 0 200 200">
                                                <circle cx="100" cy="100" r="70" fill="transparent" stroke="#FF8F00"
                                                    stroke-width="30" stroke-dasharray="330 440" />
                                                <circle cx="100" cy="100" r="70" fill="transparent" stroke="#FFAD45"
                                                    stroke-width="30" stroke-dasharray="110 440"
                                                    stroke-dashoffset="-330" />
                                                <circle cx="100" cy="100" r="50" fill="white" />
                                            </svg>
                                            <!-- Legend -->
                                            <div class="mt-1">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h2><b>124</b><h5>Total Investor</h5></h2>
                                                </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="d-inline-block me-2"
                                                        style="width: 12px; height: 12px; background-color: #FF8F00;"></span>
                                                    <span><b>100</b> Investor Fattening</span>
                                                </div>
                                                <div class="mt-3">
                                                    <span class="d-inline-block me-2"
                                                        style="width: 12px; height: 12px; background-color: #FFAD45;"></span>
                                                    <span><b>24</b> Investor Breeding</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
    </body>
    <!-- Initialize the charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gender chart
            const genderOptions = {
                series: [85, 15],
                labels: ['Betina', 'Jantan'],
                chart: {
                    type: 'donut',
                    height: 230,
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif'
                },
                colors: ['#4CAF50', '#8BC34A'],
                stroke: {
                    width: 0
                },
                legend: {
                    position: 'right',
                    offsetY: 20,
                    fontSize: '13px',
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 12,
                        offsetX: -5
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '55%',
                            labels: {
                                show: true,
                                name: {
                                    show: true
                                },
                                value: {
                                    show: true,
                                    fontSize: '22px',
                                    fontWeight: 600,
                                    formatter: function(val) {
                                        return val + '%';
                                    }
                                },
                                total: {
                                    show: false
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 250
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            const genderChart = new ApexCharts(document.querySelector("#genderChart"), genderOptions);
            genderChart.render();

            // Condition chart (Jumlah Domba Per Kondisi)
            const conditionOptions = {
                series: [{
                    name: 'Tagging',
                    data: [160, 50, 40, 25]
                }],
                chart: {
                    type: 'bar',
                    height: 260,
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif',
                    toolbar: {
                        show: false
                    },
                    animations: {
                        enabled: false
                    },
                    offsetX: 0,
                    offsetY: 10
                },
                colors: ['#0D6EFD'],
                plotOptions: {
                    bar: {
                        distributed: false,
                        borderRadius: 0,
                        columnWidth: '28%',
                        dataLabels: {
                            position: 'top'
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -25,
                    style: {
                        fontSize: '14px',
                        fontWeight: '500',
                        colors: ["#0D6EFD"]
                    },
                    formatter: function(val) {
                        return val;
                    }
                },
                grid: {
                    show: true,
                    borderColor: '#D3D3D3',
                    strokeDashArray: 0,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true,
                            opacity: 0.6
                        }
                    },
                    padding: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 10
                    }
                },
                xaxis: {
                    categories: ['Sehat', 'Menyusui', 'Hamil', 'Sakit'],
                    position: 'bottom',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#000000',
                            fontSize: '13px'
                        },
                        offsetY: 2
                    }
                },
                yaxis: {
                    min: 0,
                    max: 200,
                    tickAmount: 4,
                    labels: {
                        style: {
                            colors: '#000000',
                            fontSize: '13px'
                        },
                        formatter: function(val) {
                            return val;
                        },
                        offsetX: -5
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    enabled: false
                }
            };
            const conditionChart = new ApexCharts(document.querySelector("#conditionChart"), conditionOptions);
            conditionChart.render();

            // Age chart

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Age chart
            const ageOptions = {
                series: [60, 16.2, 11.5, 12.3],
                labels: ['Poel 3 (3-4 tahun)', 'Poel 2 (2-3 tahun)', 'Poel 1 (1-2 tahun)', 'Belum poel (0-1 tahun)'],
                chart: {
                    type: 'donut',
                    height: 230,
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif'
                },
                colors: ['#E65100', '#FB8C00', '#FFB300', '#FFD54F'],
                stroke: {
                    width: 0
                },
                legend: {
                    position: 'right',
                    offsetY: 20,
                    fontSize: '13px',
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 12,
                        offsetX: -5
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '55%',
                            labels: {
                                show: true,
                                name: {
                                    show: true
                                },
                                value: {
                                    show: true,
                                    fontSize: '22px',
                                    fontWeight: 600,
                                    formatter: function(val) {
                                        return val + '%';
                                    }
                                },
                                total: {
                                    show: false
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 250
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            const ageChart = new ApexCharts(document.querySelector("#ageChart"), ageOptions);
            ageChart.render();
        });
    </script>
</x-app>
