@extends ('main')
@section('title','laminat-index')


@section('create-content')
    <div class="container-fluid padding">
        <div class="row padding">
            @auth
                <div class="col-md-2 offset-10">

                    <a href="{{route("laminat.create")}}" class="btn btn-info">Креирај нов ламинат</a>
                </div>
            @endauth
            <div class="col-md-12" id="laminat">
                <div class="container text-center">
                    <strong>Сеуште размислувате за поставување на ламинат?Нашите стручнаци се тука да ви помогнат при
                        изборот на ламинат.</strong>
                    <p>Ламинат е една од најпопуларните подн облоги,која се каректеризира како
                        функционална,економска,издржлива и трајна подна облога.
                        Во нашиот салон нудиме повеќе од 100 модели,со што можете да изберете ламинат во склад со вашите
                        желби и потреби.
                        Бидејќи ламинатот е изработен за издржливост можете да бидете сигурни дека нема да се
                        изгреби,вдлабни или свитка,можете да одберете ламинат
                        со различна класа на отпорност AC3,AC4,AC5(се онесува на домашна,полукомерцијална и комерцијална
                        употреба)во обзир земајки го
                        очекуваното употребување на истото.Ламинатот се поставува брзо и едноставно.Идеален е за брзо
                        реновирање на вашиот дом.
                        Одлуката за користење на ламинат ви овозможува минимално вложување со максимален ефект.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
            @include('laminat.partials._filters')
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($laminat->count())
                            @each('laminat.partials._laminat',$laminat,'laminats')


                        @else
                            Нема таков ламинат!
                        @endif

                    </div>

                </div>
                <div class="text-center">{{$laminat->appends(request()->query())->links()}}</div>
            </div>
        </div>
    </div>

@endsection













  {{--  <div class="container-fluid padding">
        <div class="row padding">
            @foreach($laminat as $laminati)

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="/storage/laminat/{{ $laminati->image }} " alt="Card image cap">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h4 class="card-title font-weight-bold text-center">{{$laminati->title}}</h4>
                            <a href="{{url('laminat/'.$laminati->id)}}" class="btn  btn-light btn-block">Дознај
                                повеќе</a>

                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        <div class="text-center">
            {!! $laminat->links()!!}

        </div>
@endsection
--}}
