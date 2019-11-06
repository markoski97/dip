@extends ('main')

@section('title','Laminat-show')

@section('create-content')

    <div class="container-fluid padding">
        <div class="col-md-12">
            <div class="panel panel-default">

                @if(!$laminat)
                    <div class="text-center">
                        <h1>Нема таков ламинат</h1>
                    </div>
                @else
                    <div class="panel-body">
                        <div class="col-md-4">
                            <ul class="list-group">
                                <h2 class="text-center">Додатни информации:</h2>
                                <li class="list-group-item">Име:{{ $laminat->title }}</li>
                                <li class="list-group-item">Дебелина:{{ $laminat->debelina }}</li>
                                <li class="list-group-item">Boja:{{ $laminat->boja}}</li>
                                <li class="list-group-item">Класа на отпорност:{{ $laminat->klasanaotpornost}}</li>
                                <li class="list-group-item">Систем на греејне:{{ $laminat->sistemnagreejne }}</li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="list-group">
                                <img src="/storage/laminat/{{ $laminat->image }}"/>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        @auth
            <div class="col-md-4 offset-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Креирано на:</dt>
                        <dd>{{date('M j, Y H:i',strtotime($laminat->created_at))}}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Последна промена:</dt>
                        <dd>{{date('M j, Y H:i',strtotime($laminat->updated_at))}}</dd>
                    </dl>
                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('laminat.edit',$laminat->id)}}" class="btn btn-primary btn-block">Промени
                                Ламинат</a>

                        </div>

                        <div class="col-sm-6">

                            {!!Form::open(['route'=>['laminat.destroy',$laminat->id],'method'=>'DELETE','enctype'=>"multipart/form-data"])!!}

                            {!!Form::submit('Избриши',['class'=>'btn btn-danger btn-block'])!!}

                            {!!Form::close()!!}
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        @endif
    </div>
@endsection