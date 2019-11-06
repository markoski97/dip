@extends ('main')
@section('title','Proizvodi-show')


@section('create-content')


    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-8">

                @if(!$proizvodi)
                    <div>
                        <h1>No resoults</h1>
                    </div>
                @else
                    <h1>{{ $proizvodi->title }}</h1>
                    <p class="lead">{{$proizvodi->body}}</p>
                    <img src="/storage/proizvodi.uploads/{{ $proizvodi->image }}"/>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{date('M j, Y H:i',strtotime($proizvodi->created_at))}}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Last Updated:</dt>
                        <dd>{{date('M j, Y H:i',strtotime($proizvodi->updated_at))}}</dd>
                    </dl>
                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('proizvodi.edit',$proizvodi->id)}}"
                               class="btn btn-primary btn-block">EDIT</a>

                        </div>

                        <div class="col-sm-6">

                            {!!Form::open(['route'=>['proizvodi.destroy',$proizvodi ->id],'method'=>'DELETE','enctype'=>"multipart/form-data"])!!}

                            {!!Form::submit('DELETE',['class'=>'btn btn-danger btn-block'])!!}

                            {!!Form::close()!!}
                        </div>
                    </div>


                </div>


            </div>
            @endif
        </div>
    </div>





@endsection