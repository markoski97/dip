@extends ('main')

@section('title','Akcii-show')


@section('create-content')



    <div class="container-fluid padding">


        <div class="col-md-12">
            <div class="panel panel-default">

                @if(!$akcii)
                    <div>
                        <h1>No resoults</h1>
                    </div>
                @else
                    <div class="panel-body">
                        <div class="col-md-4">
                            <ul class="list-group">
                                <h2 class="text-center">Додатни информации:</h2>
                                <li class="list-group-item">Име:{{ $akcii->title }}</li>
                                <li class="list-group-item">Цена:{{ $akcii->price }}</li>
                                <textarea class="lead">{{$akcii->body}}</textarea>
                            </ul>

                        </div>

                        <div class="col-md-8">
                            <div class="list-group">
                                <img src="/storage/uploads/{{ $akcii->image }}"/>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
        @auth
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Креирано на:</dt>
                        <dd>{{date('M j, Y H:i',strtotime($akcii->created_at))}}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Последна промена на:</dt>
                        <dd>{{date('M j, Y H:i',strtotime($akcii->updated_at))}}</dd>
                    </dl>
                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('akcii.edit',$akcii->id)}}" class="btn btn-primary btn-block">Промени</a>

                        </div>

                        <div class="col-sm-6">

                            {!!Form::open(['route'=>['akcii.destroy',$akcii->id],'method'=>'DELETE','enctype'=>"multipart/form-data"])!!}

                            {!!Form::submit('Избриши',['class'=>'btn btn-danger btn-block'])!!}

                            {!!Form::close()!!}
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>

@endsection