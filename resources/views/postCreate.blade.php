<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.6 form validation example</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container">

    <h1>Laravel 5.6 form validation example</h1>

    @if(Session::has('success'))

        <div class="alert alert-success">

            {{ Session::get('success') }}

            @php

                Session::forget('success');

            @endphp

        </div>

    @endif



    <form method="POST" action="{{ url('post') }}">

        {{ csrf_field() }}

        <div class="form-group">

            <label>title:</label>

            <input type="text" value="{{ old('title') }}" name="name" class="form-control" placeholder="Name">

            @if ($errors->has('title'))

                <span class="text-danger">{{ $errors->first('title') }}</span>

            @endif

        </div>

        <div class="form-group">

            <label>body:</label>

            <input type="password" name="password" class="form-control" placeholder="Password">

            @if ($errors->has('body'))

                <span class="text-danger">{{ $errors->first('body') }}</span>

            @endif

        </div>



        <div class="form-group">

            <button class="btn btn-success btn-submit">Submit</button>

        </div>

    </form>

</div>

</body>

</html>