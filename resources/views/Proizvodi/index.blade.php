@extends ('main')
@section('title','Proizvodi-index')


@section('create-content')

    <div class="container-fluid padding">
        <div class="row padding">
        <div class="col-md-10">

        </div>
@auth
        <div class="col-md-2">

            <a href="{{route("proizvodi.create")}}" class="btn btn-info">Креирај Нов Производ</a>
        </div>
@endauth
     </div>
    </div>
    <div class="container-fluid padding">
        <div class="panel panel-default">
            <div class="panel-body">
            @foreach($proizvodi as $proizvodis)


                <div class="col-md-4">
                    <div class="card text-center">
                        <img class="card-img-top text-center" src="/storage/proizvodi.uploads/{{ $proizvodis->image }} "alt="Card image cap">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h2 class="card-title text-center font-weight-bold">{{$proizvodis->title}}</h2>
                         <td><a href="{{$proizvodis->link()}}" class= 'btn btn-light btn-block' >Дознај повеќе</a></td>
                        </div>
                    </div>
                </div>


            @endforeach
            </div>
        </div>
    </div>

@endsection