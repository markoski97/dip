@extends('main')

@section('title','laminat-create')

@section('create-content')


        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Laminat</h1>
            <hr>
            <form method="POST" enctype="multipart/form-data" action="{{ route('laminat.store') }}">
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
                    <label name="debelina">Debelina:</label>
                    <select class="form-control" type="select" name="debelina">
                        <option>8</option>
                        <option>10</option>
                        <option>12</option>

                        class="form-control{{$errors->has('debelina') ? 'is-invalid' : ''}}"
                        value="{{ old('debelina') }}"
                        autocomplete="debelina" autofocus></select>
                    @if($errors->has('debelina'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('debelina') }}</strong>
                            </span>

                    @endif
                </div>

                <div class="form-group">
                    <label name="klasanaotpornost">Klasa na Otpornost:</label>
                    <select class="form-control" type="text" name="klasanaotpornost">
                        <option>AC3</option>
                        <option>AC4</option>
                        <option>AC5</option>

                        class="form-control{{$errors->has('klasanaotpornost') ? 'is-invalid' : ''}}"
                        value="{{ old('klasanaotpornost') }}"
                        autocomplete="klasanaotpornost" autofocus></select>
                    @if($errors->has('klasanaotpornost'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('klasanaotpornost') }}</strong>
                            </span>

                    @endif

                    <div class="form-group">
                        <label name="boja">Boja:</label>
                        <select class="form-control" type="text" name="boja">
                            <option>Светла</option>
                            <option>Средна</option>
                            <option>Темна</option>
                            class="form-control{{$errors->has('boja') ? 'is-invalid' : ''}}"
                            value="{{ old('boja') }}"
                            autocomplete="boja" autofocus></select>
                        @if($errors->has('boja'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('boja') }}</strong>
                            </span>

                        @endif
                    </div>

                    <div class="form-group">
                        <label name="sistemnagreejne">Sistem na Greejne:</label>
                        <select class="form-control" type="text" name="sistemnagreejne">

                            <option>Подржува</option>
                            <option>Неподржува</option>
                            class="form-control{{$errors->has('sistemnagreejne') ? 'is-invalid' : ''}}"
                            value="{{ old('sistemnagreejne') }}"
                            autocomplete="sistemnagreejne" autofocus></select>
                        @if($errors->has('sistemnagreejne'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('sistemnagreejne') }}</strong>
                            </span>

                        @endif
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Post Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @if($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('image') }}</strong>
                            </span>

                        @endif


                    </div>
                </div>
                <input type="submit" value="Креирај нов ламинат" class="btn btn-success btn-lg btn-block">

            </form>




@endsection