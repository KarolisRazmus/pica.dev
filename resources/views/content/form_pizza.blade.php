@extends('main')

@section('title', trans('app.form_pizza'))

@section('content')

    @if(isset($name))
        <div>{{$name}} sukurta sėkmingai!</div>
    @endif


    {!! Form::open(['url' => route('create.pizza')]) !!}

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name')!!}<br/>

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email') !!}<br/>

    {!! Form::label('phone', 'Phone') !!}
    {!! Form::text('phone') !!}<br/>

    {{Form::select('city',$cities)}}<br/>

    <ul>
        @foreach($hobbies as $key => $hobby)
            <li>{{Form::label($hobby, $hobby)}}
                {{Form::checkbox('hobbies[]', $key)}}</li>
        @endforeach
    </ul>

    {!! Form::submit('Add Person!') !!}

    {!! Form::close() !!}

@endsection
