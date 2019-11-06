@section ('create-content')
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="img/map.png" alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption">
                        <a href="{{url('contact#mapa')}}"><h3>Локација</h3>
                        <p>Најдетене лесно</p></a>
                    </div>
                </div>

                <div class="item">
                    <img src="img/map.png" alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                       <a href="{{url('laminat#laminat')}}"><h3>Ламинат</h3>
                        <p>Голем избор на ламинати</p></a>
                    </div>
                </div>

                <div class="item">
                    <img src="img/map.png" alt="New York" style="width:100%;">
                    <div class="carousel-caption">
                        <a href="{{url('akcii#akcii')}}"><h3>Акции</h3>
                        <p>Производи на акција!</p></a>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

<!-- Over Galery Picture SO JUMBOTRON -->
-
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-center">За нас</h1>
            <p class="lead">Во Прилеп постоиме од 2015 години и препознатливи сме по високо квалитетни ламинати,внатрешни и надворешни врати.
           </p>
        </div>
    </div>


@endsection