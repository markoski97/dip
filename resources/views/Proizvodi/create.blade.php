@extends ('main')
@section('title','Proizvodi-create')


@section('create-content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            <form method="POST" enctype="multipart/form-data" action="{{ route('proizvodi.store') }}">
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


                <div class="form-group">
                    <label name="body">Body:</label>
                    <textarea id="body" type="text" name="body"
                              class="form-control{{$errors->has('body') ? 'is-invalid' : ''}}"
                              value="{{ old('body') }}"
                              autocomplete="body" autofocus> </textarea>
                    @if($errors->has('body'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('body') }}</strong>
                            </span>

                    @endif
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label" >Post Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('image') }}</strong>
                            </span>

                    @endif


                </div>

                <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">

            </form>
        </div>
    </div>





    @endsection