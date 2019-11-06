@extends('main')

@section('title','Pdf-create')
r
@section('create-content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Pdf</h1>
            <hr>
            <form method="POST" enctype="multipart/form-data" action="{{ route('pdf.store') }}">
                @csrf

                <div class="form-group">
                    <label name="title">Title:</label>
                    <input id="title" type="text" name="title"
                           class="form-control{{$errors->has('title') ? 'is-invalid' : ''}}"
                           value="{{ old('title') }}"
                           autocomplete="title" autofocus>
                    @if($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('title') }}</strong>
                            </span>

                    @endif
                </div>

                <div class="row">
                    <label for="pdf" class="col-md-4 col-form-label" >Pdf file:</label>
                    <input type="file" class="form-control-file" id="pdf" name="pdf">
                    @if($errors->has('pdf'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('pdf') }}</strong>
                            </span>

                    @endif


                </div>

                <input type="submit" value="Create pdf" class="btn btn-success btn-lg btn-block">

            </form>
        </div>
    </div>


@endsection