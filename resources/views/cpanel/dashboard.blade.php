@extends('layouts.app')

@section('css')
    <link href="{{ asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')
@hasrole('admin')
<div class="card-group">
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h2 class="text-dark mb-1 font-weight-medium">236</h2>
                        <span
                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span>
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Murid Baru</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                            class="set-doller">$</sup>18,306</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Earnings of Month
                    </h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                        <span
                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span>
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Projects</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium">864</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Projects</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endhasrole

@hasrole('guru')
<div class="row">
	<div class="col-lg-6 col-md-12">
		<div class="card">
          <div class="card-body">
            <h3 class="card-title">Siswa Berpotensi Bermasalah</h3>
            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <br>
            <h5 class="center">Jumlah Siswa: 40</h5>
          </div>
        </div>
	</div>

	<div class="col-lg-6 col-md-12">
		<div class="card">
          <div class="card-body">
            <h3 class="card-title">Rata-rata Nilai Kelas</h3>
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
	</div>
</div>

<!-- <div class="row">
	<div class="col-md-6 col-lg-8">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Daftar Siswa</h4>

				
			</div>
		</div>
	</div>

	<div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Aktivitas Terakhir</h4>
                    <div class="mt-4 activity">
                        <div class="d-flex align-items-start border-left-line pb-3">
                            <div>
                                <a href="javascript:void(0)" class="btn btn-info btn-circle mb-2 btn-item">
                                    <i data-feather="shopping-cart"></i>
                                </a>
                            </div>
                            <div class="ml-3 mt-2">
                                <h5 class="text-dark font-weight-medium mb-2">New Product Sold!</h5>
                                <p class="font-14 mb-2 text-muted">John Musa just purchased <br> Cannon 5M
                                    Camera.
                                </p>
                                <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start border-left-line pb-3">
                            <div>
                                <a href="javascript:void(0)"
                                    class="btn btn-danger btn-circle mb-2 btn-item">
                                    <i data-feather="message-square"></i>
                                </a>
                            </div>
                            <div class="ml-3 mt-2">
                                <h5 class="text-dark font-weight-medium mb-2">New Support Ticket</h5>
                                <p class="font-14 mb-2 text-muted">Richardson just create support <br>
                                    ticket</p>
                                <span class="font-weight-light font-14 text-muted">25 Minutes Ago</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start border-left-line">
                            <div>
                                <a href="javascript:void(0)" class="btn btn-cyan btn-circle mb-2 btn-item">
                                    <i data-feather="bell"></i>
                                </a>
                            </div>
                            <div class="ml-3 mt-2">
                                <h5 class="text-dark font-weight-medium mb-2">Notification Pending Order!
                                </h5>
                                <p class="font-14 mb-2 text-muted">One Pending order from Ryne <br> Doe</p>
                                <span class="font-weight-light font-14 mb-1 d-block text-muted">2 Hours
                                    Ago</span>
                                <a href="javascript:void(0)" class="font-14 border-bottom pb-1 border-info">Load More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> -->
@endhasrole

@endsection

@section('javascript')
    <script src="{{ asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script src="{{ asset('admin/assets/extra-libs/chart.js/Chart.min.js') }}"></script>
    <script>
	    $(document).ready(function() {
	    	$('#table').DataTable();

	    	var donutData        = {
		      labels: [
		          'Prestasi',
		          'Bermasalah',
		      ],
		      datasets: [
		        {
		          data: [30,10],
		          backgroundColor : ['#f56954', '#00a65a'],
		        }
		      ]
		    }

	    	var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
		    var pieData        = donutData;
		    var pieOptions     = {
		      maintainAspectRatio : false,
		      responsive : true,
		    }

		    new Chart(pieChartCanvas, {
		      type: 'pie',
		      data: pieData,
		      options: pieOptions
		    })

		    // bar chart
		    var areaChartData = {
		      labels  : ['Matematika', 'B. Inggris', 'Kimia', 'Fisika'],
		      datasets: [
		        {
		          label               : 'Mata Pelajaran',
		          backgroundColor     : 'rgba(60,141,188,0.9)',
		          borderColor         : 'rgba(60,141,188,0.8)',
		          pointRadius          : false,
		          pointColor          : '#3b8bba',
		          pointStrokeColor    : 'rgba(60,141,188,1)',
		          pointHighlightFill  : '#fff',
		          pointHighlightStroke: 'rgba(60,141,188,1)',
		          data                : [78, 86, 80, 58]
		        },
		      ]
		    }

		    var barChartCanvas = $('#barChart').get(0).getContext('2d')
		    var barChartData = $.extend(true, {}, areaChartData)
		    var temp0 = areaChartData.datasets[0]
		    barChartData.datasets[0] = temp0

		    var barChartOptions = {
		      responsive              : true,
		      maintainAspectRatio     : false,
		      datasetFill             : false
		    }

		    new Chart(barChartCanvas, {
		      type: 'bar',
		      data: barChartData,
		      options: barChartOptions
		    })
	    });
	</script>
@endsection

