<template>

<body class="g-sidenav-show  bg-gray-200">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h2 class="font-weight-bolder mb-0">Home</h2>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10 p-2">System</i>
              </div>
              <div class="pt-1">
                <p class="text-sm mb-0 text-capitalize">Yout</p>
                <div class="row">
                  <div class="col d-inline-flex">
                    <img src="img/logo/yout_black.png" width="40" alt="Logo">
                    <h4 class="pt-2">Yout Security</h4>
                  </div>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>more productive in the last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10 p-2">User</i>
              </div>
              <div class="py-2">
                <p class="text-sm mb-0 text-capitalize">Information</p>
                <h4 class="mb-0">{{ name }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Role: </span>{{ rol }}</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10 p-2">Date</i>
              </div>
              <div class="py-2">
                <p class="text-sm mb-0 text-capitalize">Hour</p>
                <h4 class="mb-0"> {{ horas }} : {{ minutos }} : {{ segundos }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-sm font-weight-bolder">Current date: </span>{{ dia }}-{{ mes }}-{{ year }}</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10 p-2">Our numbers</i>
              </div>
              <div class="row py-2">
                <div class="col-4">
                  <p class="text-sm mb-0 text-capitalize">Total Users:</p>
                  <h4 class="mb-0">{{ tuser }}</h4>
                </div>
                <div class="col-4">
                  <p class="text-sm mb-0 text-capitalize">Total Divices:</p>
                  <h4 class="mb-0">{{ tdisp }}</h4>
                </div>
                <div class="col-4">
                  <p class="text-sm mb-0 text-capitalize">Total Employers:</p>
                  <h4 class="mb-0">{{ temployee }}</h4>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Great Job! </span></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Grafica 1 -->
      <div class="row mt-4">
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Visits</h6>
              <p class="text-sm ">Days with the most visits</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">Date:</i>
                <p class="mb-0 text-sm"> Last 30 days </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Grafica 2 -->
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Users </h6>
              <p class="text-sm ">Users with the most assists</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">Date:</i>
                <p class="mb-0 text-sm"> Last 30 days </p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Yout Security</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">30 done</span> this month
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Member</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pay</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                              <!-- Fila de brayan -->
                              <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <!-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> -->
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Project manager</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Brayan Arturo Solorzano Juarez</h6>
                                            </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                              <!-- Fila de abraham -->
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <!-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> -->
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">FrontEnd Developer</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Abraham Alejandro De La Hoya Angeles</h6>
                                            </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $501 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                              <!-- Fila de Liz -->
                              <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <!-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> -->
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Movli Developer</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Lizbeth Joseline Inzunza Pereyra</h6>
                                            </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                              <!-- Fila de Pablo -->
                              <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <!-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> -->
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">BackEnd Developer</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Hernandez Ochoa Pablo Rodrigo</h6>
                                            </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                              <!-- Fila de Rayas -->
                              <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <!-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> -->
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Movli Developer</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Juan Fernando Rayas Alvarado</h6>
                                            </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                              <!-- Fila de wicho -->
                              <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <!-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> -->
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">IOT Developer</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Hidalgo Álvarez Luis Ángel</h6>
                                            </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                              <!-- Fila de israel -->
                              <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <!-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> -->
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Creative Director</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Sánchez Esquivel Israel Alberto</h6>
                                            </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <!-- Agrega más filas según sea necesario -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </main>

</body>
   </template>

<script>
    export default{
      props: {
            name: {
                type: String,
                default: 'name',
                required: true
            },
            rol: {
                type: String,
                default: 'user',
                required: true
            },
            tuser: {
                type: String,
                default: '0',
                required: true
            },
            tdisp: {
                type: String,
                default: '0',
                required: true
            },
            temployee: {
                type: String,
                default: '0',
                required: true
            },
        },
        data(){
          return{
            horas: '0',
            minutos: '0',
            segundos: '0',
            dia: '',
            mes: '',
            year: '',
            datos1: [],
            datos2: [],
          }
        },
        mounted() {
          this.graficas(),
          setInterval(() => this.setTiempo(), 1000)
        },
        methods:{
          setTiempo(){
            const date = new Date();
            let horas = date.getHours();
            let minutos = date.getMinutes();
            let segundos = date.getSeconds();
            let dia = date.getDate();
            let mes = date.getMonth();
            let year = date.getFullYear();
            horas = horas <= 9 ? `${horas}`.padStart(2, 0) : horas;
            minutos = minutos <= 9 ? `${minutos}`.padStart(2, 0) : minutos;
            segundos = segundos <= 9 ? `${segundos}`.padStart(2, 0) : segundos;
            this.horas = horas;
            this.minutos = minutos;
            this.segundos = segundos;
            this.dia = dia;
            this.mes = mes;
            this.year = year;
          },
          graficas(){
            axios.get('/grafico1').then(res => {
                    this.datos1 = res.data;

                    let labels = this.datos1;
                    let fechas = [];
                    let total = [];
                            
                    labels.forEach(function(objeto) {
                      let valor1 = Object.values(objeto)[0]; 
                      fechas.push(valor1);
        
                      let valor2 = Object.values(objeto)[1]; 
                      total.push(valor2);
                      });
                    
                    var ctx = document.getElementById("chart-bars").getContext("2d");
        
                new Chart(ctx, {
                  type: "bar",
                  data: {
                    labels: fechas,
                    datasets: [{
                      label: "Sales",
                      tension: 0.4,
                      borderWidth: 0,
                      borderRadius: 4,
                      borderSkipped: false,
                      backgroundColor: "rgba(255, 255, 255, .8)",
                      data: total,
                    }, ],
                  },
                  options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                      legend: {
                        display: false,
                      }
                    },
                    interaction: {
                      intersect: false,
                      mode: 'index',
                    },
                    scales: {
                      y: {
                        grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5],
                          color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                          suggestedMin: 0,
                          suggestedMax: 500,
                          beginAtZero: true,
                          padding: 10,
                          font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                          },
                          color: "#fff"
                        },
                      },
                      x: {
                        grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5],
                          color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                          display: true,
                          color: '#f8f9fa',
                          padding: 10,
                          font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                          },
                        }
                      },
                    },
                  },
                });
              });
        
            axios.get('/grafico2').then(res => {
                    this.datos2 = res.data;

                    let labels = this.datos2;
                    console.log
                    let fechas = [];
                    let total = [];
                            
                    labels.forEach(function(objeto) {
                      let valor1 = Object.values(objeto)[0]; 
                      fechas.push(valor1);
        
                      let valor2 = Object.values(objeto)[1]; 
                      total.push(valor2);
                      });
                    
        
                var ctx2 = document.getElementById("chart-line").getContext("2d");
        
                new Chart(ctx2, {
                  type: "line",
                  data: {
                    labels: fechas,
                    datasets: [{
                      label: "Mobile apps",
                      tension: 0,
                      borderWidth: 0,
                      pointRadius: 5,
                      pointBackgroundColor: "rgba(255, 255, 255, .8)",
                      pointBorderColor: "transparent",
                      borderColor: "rgba(255, 255, 255, .8)",
                      borderColor: "rgba(255, 255, 255, .8)",
                      borderWidth: 4,
                      backgroundColor: "transparent",
                      fill: true,
                      data: total,
        
                    }],
                  },
                  options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                      legend: {
                        display: false,
                      }
                    },
                    interaction: {
                      intersect: false,
                      mode: 'index',
                    },
                    scales: {
                      y: {
                        grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5],
                          color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                          display: true,
                          color: '#f8f9fa',
                          padding: 10,
                          font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                          },
                        }
                      },
                      x: {
                        grid: {
                          drawBorder: false,
                          display: false,
                          drawOnChartArea: false,
                          drawTicks: false,
                          borderDash: [5, 5]
                        },
                        ticks: {
                          display: true,
                          color: '#f8f9fa',
                          padding: 10,
                          font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                          },
                        }
                      },
                    },
                  },
                });
              });
            
        },
        } 
    }
</script>
