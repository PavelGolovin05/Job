@extends('layouts.app')
@section('content')
    <body class="theme-style-1">
    <div id="main">
        <section class="recent-row padd-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div id="content-area">
                            <h2>Резюме</h2>
                            <div class="banner-outer">
                                <div class="caption">
                                    <div class="holder">
                                        @if($created)
                                            @if (session()->has('message'))
                                                <div class="alert alert-info">
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                                <div class="container">
                                                    <div class="row" style="display: block;">
                                                        @if (session()->has('message'))
                                                            <div class="alert alert-info">
                                                                {{ session('message') }}
                                                            </div>
                                                        @endif
                                                        <div class="box">
                                                            <div class="text-col">
                                                                <br>
                                                                <h2>ФИО: {{$resume->FIO}}</h2>
                                                                <h2>Дата Рождения: {{$resume->date_birth}}</h2>
                                                                <h2>Пол: {{$resume->sex}}</h2>
                                                                <h2>Телефон: {{$resume->phone}}</h2>
                                                                <h2>Город: {{$resume->city}}</h2>
                                                                <h2>Образование: {{$resume->education}} </h2>
                                                                @if($resume->university != null)
                                                                <h2>ВУЗ: {{$resume->university}}</h2>
                                                                <h2>Специальность: {{$resume->specialization}}</h2>
                                                                <h2>Год выпуска:{{$resume->year_of_graduation}} </h2>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <form action="{{url('/createResume')}}">
                                                    <div class="container">
                                                        <div class="row" style="display: block;">
                                                            <h2>Дата рождения</h2>
                                                            <div class="col-md-4 col-sm-4">
                                                                <input required type="date" name="date_birth">
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <h2>Пол</h2>
                                                            <div class="col-md-4 col-sm-4">
                                                                <select name="sex">
                                                                    <option value="М">Мужской</option>
                                                                    <option value="Ж">Женский</option>
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <h2>Город</h2>
                                                            <div class="col-md-4 col-sm-4">
                                                                <select name="city" style="width: 150px;">
                                                                    @foreach($cities as $city)
                                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <h2>Образование</h2>
                                                            <div class="col-md-4 col-sm-4">
                                                                <select name="education" style="width: 150px;">
                                                                    @foreach($educations as $education)
                                                                        <option value="{{$education->id}}">{{$education->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <h2>ВУЗ</h2>
                                                            <div class="col-md-4 col-sm-4">
                                                                <select name="university" style="width: 150px;">
                                                                    <option value="0">нет</option>
                                                                    @foreach($universities as $university)
                                                                        <option value="{{$university->id}}">{{$university->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <h2>Специальность</h2>
                                                            <div class="col-md-4 col-sm-4">
                                                                <input type="text" name="specialization" placeholder="Введите название вакансии">
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <h2>Год окончания обучения</h2>
                                                            <div class="col-md-4 col-sm-4">
                                                                <input type="number" name="year_of_graduation" min="1950" placeholder="0" style="    float: left;
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
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <h2>Номер</h2>
                                                            <div class="col-md-4 col-sm-4">
                                                                <input required type="text" name="phone" id="phone">
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
                                            @endif
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
