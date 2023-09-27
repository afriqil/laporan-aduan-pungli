 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">

      <div class="mt-4">
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                NO
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nama Pelapor
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                NIK
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                No. Telp
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Alamat
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Jenis Kelamin
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nama Terlapor
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Waktu Kejadian
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Alamat Pelapor
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                KTP Terlapor
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Kronologi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($users as $user)
                        <tr>
                            <td class="ps-4">
                                <p class="text-xs font-weight-bold mb-0">{{ $no }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->nik }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->telp }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->alamat }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->gender }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->name_terlpor }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->waktu }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->alamat_pelapor }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->ktp_terlapor }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->kronologi }}</p>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editAdmin<?=$user->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ $user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('edit-user-management') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" name="full_name" class="form-control"id="full_name" value="{{$user->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary bg-gradient-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                        @php
                            $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <script src="/assets/js/plugins/Chart.extension.js"></script>
  <script>

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(253,235,173,0.4)');
    gradientStroke1.addColorStop(0.2, 'rgba(245,57,57,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.4)');
    gradientStroke2.addColorStop(0.2, 'rgba(245,57,57,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors


    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#fbcf33",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#f53939",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6

          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          enabled: true,
          mode: "index",
          intersect: false,
        },
        scales: {
          yAxes: [{
            gridLines: {
              borderDash: [2],
              borderDashOffset: [2],
              color: '#dee2e6',
              zeroLineColor: '#dee2e6',
              zeroLineWidth: 1,
              zeroLineBorderDash: [2],
              drawBorder: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              fontSize: 11,
              fontColor: '#adb5bd',
              lineHeight: 3,
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
          xAxes: [{
            gridLines: {
              zeroLineColor: 'rgba(0,0,0,0)',
              display: false,
            },
            ticks: {
              padding: 10,
              fontSize: 11,
              fontColor: '#adb5bd',
              lineHeight: 3,
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
        },
      },
    });
  </script>
