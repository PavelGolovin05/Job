@extends('layouts.app')
@section('content')
    <body class="theme-style-1">
    <div id="main">
        <section class="recent-row padd-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div id="content-area">
                            <h2>Создание новой вакансии</h2>
                            <div class="banner-outer">
                                <div class="caption">
                                    <div class="holder">
                                        <form action="{{url('/createVacancy')}}">
                                            <div class="container">
                                                <div class="row" style="display: block;">
                                                    @if (session()->has('message'))
                                                        <div class="alert alert-info">
                                                            {{ session('message') }}
                                                        </div>
                                                    @endif
                                                    <h2>Название вакансии</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input required type="text" name="name" placeholder="Введите название вакансии">
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Требования</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <textarea name="requirements" cols="40" rows="10" style="height: 200px;     width: 100%;
    background: #fff;
    border: 0;
    padding: 0 20px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    border-radius: 3px;
    box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -webkit-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    font: 400 14px 'Roboto', sans-serif;
    color: #777;"> </textarea>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Описание</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <textarea name="description" cols="40" rows="10" style="height: 200px;     width: 100%;
    background: #fff;
    border: 0;
    padding: 0 20px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    border-radius: 3px;
    box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -webkit-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    font: 400 14px 'Roboto', sans-serif;
    color: #777;"> </textarea>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Опыт работы</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="number" name="experience" min="0" placeholder="0" style="    float: left;
    width: 100%;
    background: #fff;
    border: 0;
    padding: 0 20px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    height: 45px;
    border-radius: 3px;
    box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -webkit-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    font: 400 14px 'Roboto', sans-serif;
    color: #777;;">
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Зарплата (руб) от</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input required type="number" name="salary_min" min="0" placeholder="0" style="    float: left;
    width: 100%;
    background: #fff;
    border: 0;
    padding: 0 20px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    height: 45px;
    border-radius: 3px;
    box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -webkit-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    font: 400 14px 'Roboto', sans-serif;
    color: #777;">
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                        <h2>Зарплата (руб) до</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input required type="number" name="salary_max" min="0" placeholder="0" style="    float: left;
    width: 100%;
    background: #fff;
    border: 0;
    padding: 0 20px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    height: 45px;
    border-radius: 3px;
    box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -webkit-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    font: 400 14px 'Roboto', sans-serif;
    color: #777;">
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>График работы</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select name="schedule" style="width: 150px;">
                                                            @foreach($schedules as $schedule)
                                                                <option value="{{$schedule->id}}">{{$schedule->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Занятость</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select name="employment" style="width: 150px;">
                                                            @foreach($employments as $employment)
                                                                <option value="{{$employment->id}}">{{$employment->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Город</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select name="city" style="width: 150px;">
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Профессия</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select name="profession" style="width: 150px;">
                                                            @foreach($professions as $profession)
                                                                <option value="{{$profession->id}}">{{$profession->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <h2>Контактный номер</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" name="phone" id="phone">
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <input type="submit" value="Создать" style="float: left;
    border-radius: 3px;
    padding: 20px 52px;
    margin: 0px 0px 30px 500px;
    font: 900 14px/14px 'Roboto', sans-serif;
    color: #fff;
    text-transform: uppercase;
    border: 0;
    border-radius: 3px;
background-color: #1b8af3;">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#phone").mask("+38 (071) 99-99-999");
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.velocity.min.js"></script>
    <script src="js/jquery.kenburnsy.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    </body>
@endsection
