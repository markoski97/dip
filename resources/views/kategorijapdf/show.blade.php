@extends ('main')

@section('title','PDF-show')


@section('create-content')



    <div class="container-fluid padding text-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(!$pdf)
                        <div>
                            <h1>No resoults</h1>
                        </div>
                    @else
                        <h1>{{ $pdf->title }}</h1>
                        <iframe src="{{ $link }}" width="100%" height="500px">
                        </iframe>
                </div>

                @endif
            </div>
        </div>

        @auth
            <div class="col-md-12">
                <div class="col-md-4  offset-md-4 text-center">
                    <div class="well text-center">
                        <dl class="dl-horizontal">
                            <dt>Created At:</dt>
                            <dd>{{date('M j, Y H:i',strtotime($pdf->created_at))}}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Last Updated:</dt>
                            <dd>{{date('M j, Y H:i',strtotime($pdf->updated_at))}}</dd>
                        </dl>
                        <hr>

                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{route('pdf.edit',$pdf->id)}}" class="btn btn-primary btn-block">EDIT</a>

                            </div>

                            <div class="col-sm-6">

                                {!!Form::open(['route'=>['pdf.destroy',$pdf->id],'method'=>'DELETE','enctype'=>"multipart/form-data"])!!}

                                {!!Form::submit('DELETE',['class'=>'btn btn-danger btn-block'])!!}

                                {!!Form::close()!!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection