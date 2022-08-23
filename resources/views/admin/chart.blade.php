@extends('master.master-admin')

@section('content')


<head>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
        var analytics = <?php echo $id_kategori; ?>

        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(analytics);
            // var options = {
            //     title: 'Keterangan : 1 = Tshirt 2 = Crewneck'
            // };
            var options = {
                backgroundColor: '',
               
                border: '1px solid'


            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }
    </script>
</head>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline">
                   

                    <div class="header-elements d-none py-0 mb-3 mb-md-0">
                        <div class="breadcrumb">
                            <a class="breadcrumb-item"><i ></i> </a>
                         
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="ml-auto mr-auto ">
                                <h3 class="panel-title   ">Persentase Produk pada Bengkel</h3>
                            </div>
                            <div class="panel-body" align="left">

                                <div id="pie_chart" class="text-center" style="height:350px">
                                </div>

                            </div>
                            <div class="table-responsive">
						<table class="">
							<thead>
								<tr class="">
									
									<br>KETERANGAN</br>
									<br>21 = KALIPER</br>
									<br>22 = SHOCK</br>
									<br>23 = HELM</br>
									<br>24 = TRIPLE CLAMP</br>
									<br>25 = STEERING DUMPER</br>
									<br>26 = SWING ARM</br>
									<br>27 = MASTER REM</br>
									<br>28 = VELG</br>
									<br></br>
                                  
								</tr>
							</thead>
                           
                        </div>
                    </div>
                    
                    <div class="col-md-6"></div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection