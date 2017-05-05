@extends('main')

@section('title', trans('app.form_pizza_edit'))

@section('content')

    <div class="container">

    @if(isset($error))
        <h4 style="color:red">{{ $error['message'] }}</h4>
    @endif

    @if(isset($comment))
        <h4 style="color:red">{{ $comment['message'] }}</h4>
    @endif



    {!! Form::open(['url' => route('update.pizza', $pizza['id'])]) !!}

    {!! Form::label('name', 'Write your phone number') !!}
    {!! Form::text('name', $pizza['name'])!!}<br/>

    {!! Form::label('ground', 'Ground') !!}
    {{Form::select('ground',$grounds, $pizza['ground'])}}<br/>

    {!! Form::label('cheese', 'Cheese') !!}
    {{Form::select('cheese',$cheeses, $pizza['cheese'])}}<br/>


        @foreach($ingridients as $key => $ingridient)<br/>

            @if (in_array($key, $pizza_ingridients))
                {{Form::checkbox('ingridients[]', $key, true)}}
                {{Form::label($ingridient, $ingridient)}}
            @else
                {{Form::checkbox('ingridients[]', $key)}}
                {{Form::label($ingridient, $ingridient)}}
            @endif

        @endforeach

    <br/><br/>

    {!! Form::submit('Update Pizza!') !!}

    {!! Form::close() !!}

    </div>

@endsection
