@extends('layouts.app')
@section('content')
    <body class="theme-style-1">
    <div id="main">
        <section class="recent-row padd-tb">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div id="content-area">
                            <h2>Мой профиль</h2>
                            <div class="banner-outer">
                                <div class="caption">
                                    <div class="holder">
                                        <form action="{{url('/fillProfile')}}">
                                            <div class="container">
                                                <div class="row" style="display: block;">
                                                    @if (session()->has('message'))
                                                        <div class="alert alert-info">
                                                            {{ session('message') }}
                                                        </div>
                                                    @endif
                                                    @if($user->company_name == null)
                                                        @if($user->is_employer)
                                                            <h2>Введите название вашей компании</h2>
                                                            @else
                                                                <h2>Ваше ФИО</h2>
                                                            @endif
                                                            <div class="col-md-4 col-sm-4">
                                                                <input required type="text" name="company_name">
                                                            </div>
                                                        @else
                                                        <h2>{{$user->company_name}}</h2>
                                                        @endif
                                                        <script src="js/input.js"></script>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <img src="{{$user->photo_link}}" style="max-width: 500px;">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div class="col-md-4 col-sm-4">
                                                            <input type="file" name="photo_link" id="photo_link" class="inputfile">
                                                            <label for="photo_link"><span>Загрузить фото</span></label>
                                                        </div>
                                                        <input type="submit" value="Добавить в профиль" style="float: left;
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
