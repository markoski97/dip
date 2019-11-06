
@extends ('main')
<link rel="stylesheet" type="text/css" href="{{url('/css/css.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/css/lightbox.min.css')}}">
<script type="text/javascript" src="{{url('/js/lightbox-plus-jquery.min.js')}}"></script>
@section('title','Galerija')


@section('create-content')


    <div class="container-fluid padding">
        <div class="row padding">
        <div class="col-md-10 text-center">



        </div>
@auth
        <div class="col-md-2">

            <a href="{{route("galerija.create")}}" class="btn btn-info">Додај нова Слика</a>
        </div>
@endauth
    </div>
    </div>

    <div class="container-fluid padding">
        <div class="row padding">
         @foreach($galerija as $galerijas)
             <div class="col-md-2">
                    <div class="gallery">
                        <a href="/storage/GaleryuploadTumb/{{ $galerijas->image }}" data-lightbox="mygallery"><img src="/storage/Galeryuploads/{{ $galerijas->image }}"></a>
                        <style>
                            body{
                                font-family: sans-serif;
                            }
                            h1{
                                text-align:center;
                                color:forestgreen;
                                margin:30px 0 50 px;
                            }
                            .gallery{
                                margin:10px 50px;
                            }

                            .gallery img{
                                width:230px;
                                padding:5px;
                                filter:grayscale(100%);
                                transition:1s;
                            }

                            .gallery img:hover{
                                filter:grayscale(0);
                                transform:scale(1.1);
                            }

                        </style>
                    </div>
             </div>



@endforeach
    </div>
    </div>




@endsection

