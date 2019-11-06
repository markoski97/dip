@extends ('main')

@section('title','Akcii-edit')

@section('create-content')
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-12">
                {!! Form::model($laminat, ['route' => ['laminat.update', $laminat->id],'method'=>'PUT','enctype'=>"multipart/form-data" ]) !!}
                <div class="container-fluid padding">
                    <div class="row padding">
                        <div class="col-md-8">
                            {{ Form::label('title', 'Title:') }}
                            {{ Form::text('title', null, ["class" => 'form-control']) }}

                            {{ Form::label('debelina', 'Debelina:') }}
                            {{ Form::select('debelina', array('8'=>'8', '10'=>'10', '12'=>'12'), null, ["class" => 'form-control']) }}

                            {{ Form::label('boja', 'Boja:') }}
                            {{ Form::select('boja',array('Светла'=>'Светла','Средна'=>'Средна','Темна'=>'Средна') ,null, ["class" => 'form-control']) }}


                            {{ Form::label('klasanaotpornost', 'Klasa na otpornost:') }}
                            {{ Form::select('klasanaotpornost',array('AC3'=>'AC3','AC4'=>'AC4','AC5'=>'AC5') ,null, ["class" => 'form-control']) }}

                            {{ Form::label('sistemnagreejne', 'Sistem na Greejne') }}
                            {{ Form::select('sistemnagreejne', array('Подржува'=>'Подржува','Неподржува'=>'Неподржува'),null, ["class" => 'form-control']) }}

                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('image', null, ["class" => 'form-control']) }}


                        </div>
                        <div class="col-md-4">
                            <div class="well">
                                <dl class="dl-horizontal">
                                    <dt>Креирано на:</dt>
                                    <dd>{{date('M j, Y H:i',strtotime($laminat->created_at))}}</dd>
                                </dl>

                                <dl class="dl-horizontal">
                                    <dt>Променето на:</dt>
                                    <dd>{{date('M j, Y H:i',strtotime($laminat->updated_at))}}</dd>
                                </dl>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{route('laminat.show',$laminat->id)}}"
                                           class="btn btn-danger btn-block">Откажи</a>

                                    </div>

                                    <div class="col-sm-6">
                                        {{Form::submit('Зачувајги промените',['class'=>'btn btn-success btn-block',])}}

                                    </div>
                                </div>


                            </div>


                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>






@endsection