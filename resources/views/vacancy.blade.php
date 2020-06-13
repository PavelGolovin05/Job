@extends('layouts.app')
@section('content')
    <body class="theme-style-1">
    <div id="main">
        <section class="recent-row padd-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div id="content-area">
                            <h2>{{$vacancy->name}}</h2>
                            <div class="banner-outer">
                                <div class="caption">
                                    <div class="holder">
                                        <div class="container">
                                            <div class="row" style="display: block;">
                                                @if (session()->has('message'))
                                                    <div class="alert alert-info">
                                                        {{ session('message') }}
                                                    </div>
                                                @endif
                                                <div class="box">
                                                    <div class="thumb">
                                                        <img src="{{$vacancy->photo_link}}" style="width: 400px; border-width: 5px;">
                                                    </div>
                                                    <div class="text-col">
                                                        <br>
                                                        <h2>Компания: {{$vacancy->company}}</h2>
                                                        <h2>Профессия: {{$vacancy->profession}}</h2>
                                                        <h2>График: {{$vacancy->schedule}}</h2>
                                                        <h2>Занятость: {{$vacancy->employment}}</h2>
                                                        <h2>Город: {{$vacancy->city}}</h2>
                                                        <h2>Дата публикации: {{$vacancy->publication_date}} </h2>
                                                        <h2>Зарплата: от {{$vacancy->salary_min}} до {{$vacancy->salary_max}}р.</h2>
                                                        <h2>Требования: </h2>
                                                        <p style="word-break: break-all; font-size: 22px;line-height: 150%;">{{$vacancy->requirements}}</p>
                                                        <h2>Описание: </h2>
                                                        <p style="word-break: break-all; font-size: 22px;line-height: 150%;">{{$vacancy->description}}</p>
                                                        <h2>Телефон: {{$vacancy->phone}}</h2>
                                                    </div>
                                                    @auth()
                                                    @if(Auth::user()->is_employer)
                                                        @if($isMyVacancy)
                                                        <form action="{{url('/removeVacancy')}}">
                                                            <input type="hidden" name="vacancy" value="{{$vacancy->id}}">
                                                            <input type="submit" value="Удалить" style="float: left;
border-radius: 3px;
padding: 20px 52px;
margin: 0px 0px 30px 350px;
font: 900 14px/14px 'Roboto', sans-serif;
color: #fff;
text-transform: uppercase;
border: 0;
border-radius: 3px;
background-color: #1b8af3;">
                                                        </form>
                                                            @endif
                                                    @else
                                                        @if($added)
                                                            <form action="{{url('/removeVacancy')}}">
                                                                <input type="hidden" name="vacancy" value="{{$vacancy->id}}">
                                                                <input type="submit" value="Удалить" style="float: left;
border-radius: 3px;
padding: 20px 52px;
margin: 0px 0px 30px 350px;
font: 900 14px/14px 'Roboto', sans-serif;
color: #fff;
text-transform: uppercase;
border: 0;
border-radius: 3px;
background-color: #1b8af3;">
                                                            </form>
                                                        @else
                                                            <form action="{{url('/addVacancy')}}">
                                                                <input type="hidden" name="vacancy" value="{{$vacancy->id}}">
                                                                <input type="submit" value="Добавить вакансию в избранное" style="float: left;
border-radius: 3px;
padding: 20px 52px;
margin: 0px 0px 30px 350px;
font: 900 14px/14px 'Roboto', sans-serif;
color: #fff;
text-transform: uppercase;
border: 0;
border-radius: 3px;
background-color: #1b8af3;">
                                                            </form>
                                                            @endif
                                                    @endif
                                                        @endauth
                                                </div>
                                            </div>
                                        </div>
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
