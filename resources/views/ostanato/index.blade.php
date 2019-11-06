@extends ('main')
@section('title','ostanato-index')


@section('create-content')
    <div class="container-fluid padding">
        <div class="row padding">


@auth
            <div class="col-md-2 offset-10">

                <a href="{{route("ostanato.create")}}" class="btn btn-info">Креирај Останато</a>
            </div>
    @endauth
    <div class="col-md-12">

        <h4 class="text-center">Производи кои не припаѓаат во ниедна категорија</h4>

    </div>

        </div>
    </div>

    <div class="container-fluid padding">

            <div class="panel panel-default">
                <div class="panel-body">
            @foreach($ostanato as $ostanati)

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="/storage/ostanato/{{ $ostanati->image }} "alt="Card image cap">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h4 class="card-title font-weight-bold text-center">{{$ostanati->title}}</h4>
                            <a href="{{url('ostanato/'.$ostanati->id)}}" class="btn btn-light btn-block">Дознај Повеќе</a>
                        </div>
                    </div>
                </div>

            @endforeach
                </div>
            </div>
    </div>

    <div class="text-center">
        {!! $ostanato->links()!!}

    </div>
@endsection

