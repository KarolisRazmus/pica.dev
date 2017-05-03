@extends('main')

@section('title', trans('app.form_pizza'))

@section('content')

    @if(sizeOf($data['ingridients']) > 3)
        <h4 style="color:red">Pasirinkite ne daugiau nei tris ingredientus!</h4>
    @endif

    @if(isset($name))
        <h4 style="color:green">{{$name}} sukurta sėkmingai!</h4>
    @endif

    {{--@if(!$name === null)--}}
        {{--<h4 style="color:red">EEEE.. pamirsai telefona!</h4>--}}
    {{--@endif--}}



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


@endsection
