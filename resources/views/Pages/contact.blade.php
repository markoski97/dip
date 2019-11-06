@extends ('main')

@section('title','Kontakt')


@section('create-content')

    <div class="container">
            <div class="col-md-12 col-sm-18">
                <h1 class="text-center" id="contact">Контакт</h1>
                <p class="text-center">За сите прашања или коментари можете да не контактирате преку формуларот во продолжение.</p>

             
                <form action="{{ url('contact') }}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label name="imeprezime">Име и Презиме:</label>
                        <input id="imeprezime" name="imeprezime" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="number">Телефон:</label>
                        <input id="number" name="number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject">Прашање:</label>
                        <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message">Порака:</label>
                        <textarea id="message" name="message" class="form-control"></textarea>

                    </div>
                    <input type="submit" value="Испрати" class="btn btn-success btn-block">

                </form>

            </div>
        @extends('html-parts._googlemaps')
        @extends ('html-parts._podgooglemaps')
        </div>
    <hr class="my-4">


@endsection