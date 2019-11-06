@extends ('main')

@section('title','Akcii-show')


@section('create-content')



    <div class="row">
        <div class="col-md-8">

            @if(!$galerija)
                <div>
                    <h1>No resoults</h1>
                </div>
            @else
                <h1>{{ $galerija->title }}</h1>

                <img src="/storage/Galeryuploads/{{ $galerija->image }}"class="w-100"/>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{date('M j, Y H:i',strtotime($galerija->created_at))}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{date('M j, Y H:i',strtotime($galerija->updated_at))}}</dd>
                </dl>
                <hr>

                    <div class="col-sm-6">

                        {!!Form::open(['route'=>['galerija.destroy',$galerija->id],'method'=>'DELETE','enctype'=>"multipart/form-data"])!!}

                        {!!Form::submit('DELETE',['class'=>'btn btn-danger btn-block'])!!}

                        {!!Form::close()!!}
                    </div>
                </div>


            </div>
        @endif
    </div>
@endsection