@extends('main')

@section('title', trans('app.form_pizza'))

@section('content')

    <div class="container">

    @if(isset($error))
        <h4 style="color:red">{{ $error['message'] }}</h4>
    @endif

    @if(isset($comment))
        <h4 style="color:red">{{ $comment['message'] }}</h4>
    @endif


    {!! Form::open(['url' => route('create.pizza')]) !!}

    {!! Form::label('name', 'Write your phone number') !!}
    {!! Form::text('name')!!}<br/>

    {!! Form::label('ground', 'Ground') !!}
    {{Form::select('ground',$grounds)}}<br/>

    {!! Form::label('cheese', 'Cheese') !!}
    {{Form::select('cheese',$cheeses)}}<br/>


    @foreach($ingridients as $key => $ingridient)<br/>

    {{Form::checkbox('ingridients[]', $key)}}
    {{Form::label($ingridient, $ingridient)}}

    @endforeach
    <br/><br/>

    {!! Form::submit('Add Pizza!') !!}

    {!! Form::close() !!}

    </div>

@endsection
