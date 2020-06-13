@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/Chart.css')}}">
    <script src="{{asset('/js/Chart.js')}}"></script>
    <script src="{{asset('/js/Chart.bundle.js')}}"></script>
    <canvas id="myChart" width="400" height="400"></canvas>
    <body class="theme-style-1">
    <div id="main">
        <section class="recent-row padd-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div id="content-area">
                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels:[ {!!$text!!}],
                                        datasets: [{
                                            label: 'Профессии',
                                            data: [ {{$counts}}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        legend: {
                                            labels: {
                                                // This more specific font property overrides the global property
                                                fontSize: 80,
                                            }
                                        },
                                        scales: {
                                            xAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: "Профессии",
                                                    fontSize: 20,
                                                }
                                            }],

                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    stepSize: 1,
                                                },
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: "Количество",
                                                    fontSize: 20,

                                                },

                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ url('/chosenProfessionStatistic') }}">
                <select name="profession" class="select-css">
                    @foreach($professions as $profession)
                        <option value="{{$profession->id}}">{{$profession->name}}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <input type="submit" value="Поиск">
            </form>
        </section>
    </div>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.velocity.min.js"></script>
    <script src="js/jquery.kenburnsy.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    </body>
@endsection
