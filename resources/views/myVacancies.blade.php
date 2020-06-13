@extends('layouts.app')
@section('content')

    <body class="theme-style-1">
        <div id="main">
            <section class="recent-row padd-tb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div id="content-area">
                                @if($my)
                                    <h2>Мои вакансии</h2>
                                    @else
                                <h2>Вакансии</h2>
                                @endif
                                <ul id="myList">
                                    @foreach($vacancies as $vacancy)
                                        <li>
                                            <div class="box">
                                                <div class="thumb"><a href="{{ url('vacancies' . $vacancy->id ) }}"><img src="{{$vacancy->photo_link}} " style="max-width: 150px;"></a></div>
                                                <div class="text-col">
                                                    <h4><a href="{{ url('vacancies' . $vacancy->id ) }}">{{$vacancy->name}}</a></h4>
                                                    <p>Компания: {{$vacancy->company}}</p>
                                                    <p>Профессия: {{$vacancy->profession}}</p>
                                                    <p>График: {{$vacancy->schedule}}</p>
                                                    <p>Занятость: {{$vacancy->employment}}</p>
                                                    <a href="{{ url('vacancies' . $vacancy->id ) }}" class="text"><i class="fa fa-map-marker"></i>{{$vacancy->city}}</a>
                                                    <a href="{{ url('vacancies' . $vacancy->id ) }}" class="text"><i class="fa fa-calendar"></i>{{$vacancy->publication_date}} </a>
                                                </div>
                                                <strong class="price"><i class="fa fa-money"></i>{{$vacancy->salary_min}} - {{$vacancy->salary_max}}р.</strong>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @if($vacancies->total() > $vacancies->count())
                                    <div style="margin-left: 500px;">
                                        {{$vacancies->links()}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
