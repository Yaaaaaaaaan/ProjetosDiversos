   <link href="../Frameworks/css/brands.css" rel="stylesheet">
    <link href="../Frameworks/css/solid.css" rel="stylesheet">
 <!-- Digitar dados aqui--> 
                          <div class="col-12">
                            <script src="../Frameworks/js/Chart.bundle.js"></script>
                              <?PHP
                              //  while( $exbCoS = mysqli_fetch_array($rsltCoS)){
                             //   echo $exbCos['C.nome']; 
                              ?>
                                <canvas id="myChart" height=150></canvas>
                                <script>
                                  var ctx = document.getElementById('myChart');
                                  var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: [ "Juca","Mario","Lucas","Junior","antônio","carlos",//'<?php //echo $exbCoS["usuario"];?>'
                                      ],
                                        datasets: [{
                                          label: 'Índice de Conclusão de Serviços',
                                          data: [15,9,8,3,1,1,/*'<?php //echo $psqOs["total"];?>',*/],
                                          backgroundColor: [
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)'
                                          ],
                                            borderColor: [
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)'
                                            ],
                                              borderWidth: 3
                                              }]
                                    },
                                      options: {
                                        scales: {
                                          yAxes: [{
                                            ticks: {
                                              beginAtZero: true
                                                  }
                                              }]
                                          }
                                      }
                                  });
                                </script>
                              <?php// } ?>
                          </div>
                <!-- Fim dos dados da primeira página-->  <!-- Digitar dados aqui--> 
                          <div class="col-12">
                            <script src="../Frameworks/js/Chart.bundle.js"></script>
                              <?PHP
                              //  while( $exbCoS = mysqli_fetch_array($rsltCoS)){
                             //   echo $exbCos['C.nome']; 
                              ?>
                                <canvas id="myChart" height=150></canvas>
                                <script>
                                  var ctx = document.getElementById('myChart');
                                  var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels: [ "Juca","Mario","Lucas","Junior","antônio","carlos",//'<?php //echo $exbCoS["usuario"];?>'
                                      ],
                                        datasets: [{
                                          label: 'Índice de Conclusão de Serviços',
                                          data: [15,9,8,3,1,1,/*'<?php //echo $psqOs["total"];?>',*/],
                                          backgroundColor: [
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)',
                                            'rgba(158, 228, 255, 0.5)'
                                          ],
                                            borderColor: [
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)',
                                              'rgba(84, 114, 128, 0.5)'
                                            ],
                                              borderWidth: 3
                                              }]
                                    },
                                      options: {
                                        scales: {
                                          yAxes: [{
                                            ticks: {
                                              beginAtZero: true
                                                  }
                                              }]
                                          }
                                      }
                                  });
                                </script>
                              <?php// } ?>
                          </div>
                <!-- Fim dos dados da primeira página--> 

                
Teste bbbbbbbbbbbbbb