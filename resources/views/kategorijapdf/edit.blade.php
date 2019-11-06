@extends ('main')

@section('title','Pdf-edit')

@section('create-content')
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-12">
                {!! Form::model($pdf, ['route' => ['pdf.update', $pdf->id],'method'=>'PUT','enctype'=>"multipart/form-data" ]) !!}
                <div class="container-fluid padding">
                    <div class="row padding">
                        <div class="col-md-8">
                            {{ Form::label('title', 'Title:') }}
                            {{ Form::text('title', null, ["class" => 'form-control']) }}


                            {{ Form::label('file', 'File') }}
                            {{ Form::file('pdf', null, ["class" => 'form-control']) }}


                        </div>
                        <div class="col-md-4">
                            <div class="well">
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
                                        <a href="{{route('pdf.show',$pdf->id)}}"
                                           class="btn btn-danger btn-block">Cancel</a>

                                    </div>

                                    <div class="col-sm-6">
                                        {{Form::submit('Save Changes',['class'=>'btn btn-success btn-block',])}}

                                    </div>
                                </div>


                            </div>


                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>






@endsection