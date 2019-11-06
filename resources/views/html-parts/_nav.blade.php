<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="col-6 col-md-6">
        <a href="#">
            <a href="{{url('pocetna')}}"><img class="img-fluid" src="img/logo.jpg" style="width: 50%; height:auto;" alt=""></a>
        </a>
    </div>
    <div class="col-6 col-md-6 text-right">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('proizvodi')}}">Производи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('akcii')}}">Акции</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('galerija')}}">Галерија</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('informacii')}}">Информации</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('contact')}}">Контакт</a>
                </li>
            </ul>
        </div>
    </div>
</nav>