@extends ('main')
@section('title','Akcii-index')


@section('create-content')
    <div class="container-fluid padding">


             <div class="col-md-12" id="akcii">

                 <h4 class="text-center">Во продолжение можете да ги видите сите производи кои се на попуст/акција.</h4>

             </div>
    @auth
            <div class="col-md-2 offset-10">

                 <a href="{{route("akcii.create")}}" class="btn btn-info">Креирај нова акција</a>
            </div>
    @endauth

</div>
    </div>

<div class="container-fluid padding">

        <div class="panel panel-default">
            <div class="panel-body">
    @foreach($akcii as $akcija)

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="/storage/uploads/{{ $akcija->image }} "alt="Card image cap">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h2 class="card-title font-weight-bold text-center ">{{$akcija->title}}</h2>
                            <h2 class="card-title text-center ">{{$akcija->price}}</h2>
                            <a href="{{url('akcii/'.$akcija->id)}}" class="btn btn-light">Дознај повеќе</a>

                        </div>
                    </div>
                </div>

    @endforeach

</div>
</div>
    </div>
    <div class="text-center">
        {!! $akcii->links()!!}

    </div>
    @endsection

