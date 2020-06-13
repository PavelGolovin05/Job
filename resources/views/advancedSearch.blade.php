@extends('layouts.app')
@section('content')
    <body class="theme-style-1">
    <div id="main">
        <section class="recent-row padd-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div id="content-area">
                            <h2>Расшеренный поиск вакансий</h2>
                            <div class="banner-outer">
                                <div class="caption">
                                    <div class="holder">
                                        <form action="{{url('/advancedSearch')}}">
                                            <div class="container">
                                                <div class="row" style="display: block;">
                                                    <h2>Название вакансии</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" name="name" placeholder="Введите название вакансии">
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Опыт работы</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="col-md-4 col-sm-4">
                                                            <input required type="number" title="Введите большое значение, если опыт работы не важен" name="experience" min="0" placeholder="0" style="    float: left;
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
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Тип занятости</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="radio" required id="employmentChoice1"
                                                               name="employment" value="Полная">
                                                        <label for="employmentChoice1">Полная</label>
                                                        <br>
                                                        <input type="radio" id="employmentChoice2"
                                                               name="employment" value="Частичная">
                                                        <label for="employmentChoice2">Частичная</label>
                                                        <br>
                                                        <input type="radio" id="employmentChoice3"
                                                               name="employment" value="Стажировка">
                                                        <label for="employmentChoice2">Стажировка</label>
                                                        <br>
                                                        <input type="radio" id="employmentChoice4"
                                                               name="employment" value="Волонтерство">
                                                        <label for="employmentChoice2">Волонтерство</label>
                                                        <br>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>График работы</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="radio" required id="scheduleChoice1"
                                                               name="schedule" value="Полный день">
                                                        <label for="scheduleChoice1">Полный день</label>
                                                        <br>
                                                        <input type="radio" id="scheduleChoice2"
                                                               name="schedule" value="Гибкий">
                                                        <label for="scheduleChoice2">Гибкий</label>
                                                        <br>
                                                        <input type="radio" id="scheduleChoice3"
                                                               name="schedule" value="Удаленная работа">
                                                        <label for="scheduleChoice3">Удаленная работа</label>
                                                        <br>
                                                        <input type="radio" id="scheduleChoice4"
                                                               name="schedule" value="Сменный">
                                                        <label for="scheduleChoice4">Сменный</label>
                                                        <br>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <h2>Зарплата (руб)</h2>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input required type="number" name="salary" min="0" placeholder="0" style="    float: left;
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
                                                    <br>
                                                    <input type="submit" value="Найти" style="float: left;
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.velocity.min.js"></script>
    <script src="js/jquery.kenburnsy.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    </body>
@endsection

