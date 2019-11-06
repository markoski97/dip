@section('_cards')
    <div class="text-center"><h1>Акции</h1></div>
    <div class="container-fluid padding">

            <div class="panel panel-default">
                <div class="panel-body">
            @foreach($akcii as $akcija)

                <div class="col-md-3">
                    <div class="card">
                        <a href="{{url('akcii/'.$akcija->id)}}"> <img class="card-img-top" src="/storage/uploads/{{ $akcija->image }} "alt="Card image cap"></a>
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h2 class="card-title font-weight-bold text-center">{{$akcija->title}}</h2>
                            <h2 class="card-title text-center">{{$akcija->price}}</h2>
                            <a href="{{url('akcii/'.$akcija->id)}}" class="btn btn-light btn-block">Дознај Повеќе</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
            </div>
    </div>
@endsection