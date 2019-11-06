@extends ('main')

@section('title','Ostanato-show')


@section('create-content')



    <div class="container-fluid padding">
        <div class="row padding">

            <div class="col-md-12">
                <div class="panel panel-default">

                    @if(!$ostanato)
                        <div>
                            <h1>No resoults</h1>
                        </div>
                    @else
                        <div class="panel-body">
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <li class="list-group-item">Наслов:{{ $ostanato->title }}</li>

                                    <textarea class="lead">{{$ostanato->body}}</textarea>
                                </ul>
                            </div>

                            <div class="col-md-8">
                                <div class="list-group">
                                    <img src="/storage/ostanato/{{ $ostanato->image }}"/>
                                </div>

                            </div>
                        </div>
                            @auth
                                <div class="col-md-4 offset-md-4 ">
                                    <div class="well">
                                        <dl class="dl-horizontal">
                                            <dt>Created At:</dt>
                                            <dd>{{date('M j, Y H:i',strtotime($ostanato->created_at))}}</dd>
                                        </dl>

                                        <dl class="dl-horizontal">
                                            <dt>Last Updated:</dt>
                                            <dd>{{date('M j, Y H:i',strtotime($ostanato->updated_at))}}</dd>
                                        </dl>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="{{route('ostanato.edit',$ostanato->id)}}"
                                                   class="btn btn-primary btn-block">EDIT</a>

                                            </div>

                                            <div class="col-sm-6">

                                                {!!Form::open(['route'=>['ostanato.destroy',$ostanato->id],'method'=>'DELETE','enctype'=>"multipart/form-data"])!!}

                                                {!!Form::submit('DELETE',['class'=>'btn btn-danger btn-block'])!!}

                                                {!!Form::close()!!}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                </div>
            </div>
        </div>
                                        @endauth

                            @endif

                </div>

@endsection