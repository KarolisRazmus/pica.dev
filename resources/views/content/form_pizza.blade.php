@extends('main')

@section('title', trans('app.form_pizza'))

@section('content')

    @if(sizeOf($data['ingridients']) != 3)
        <h4 style="color:red">Pasirinkite tris ingredientus!</h4>
    @endif
    @if(isset($name))
        <h4 style="color:green">{{$name}} sukurta sėkmingai!</h4>
    @endif


    {!! Form::open(['url' => route('create.pizza')]) !!}

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name')!!}<br/>

    {!! Form::label('ground', 'Ground') !!}
    {{Form::select('ground',$grounds)}}<br/>

    {!! Form::label('cheese', 'Cheese') !!}
    {{Form::select('cheese',$cheeses)}}


    <ul>
    @foreach($ingridients as $key => $ingridient)
            <li>{{Form::label($ingridient, $ingridient)}}
                {{Form::checkbox('ingridients[]', $key)}}</li>
        @endforeach
    </ul>

    {!! Form::submit('Add Pizza!') !!}

    {!! Form::close() !!}


    {{--{!! Form::open(['url' => route('create.cheese')]) !!}--}}

    {{--{!! Form::label('addcheese', ' Add your favorite cheese to the list!  Name') !!}--}}
    {{--{!! Form::text('addcheese')!!}--}}

    {{--{!! Form::label('calories', 'Calories') !!}--}}
    {{--{!! Form::text('calories')!!}--}}

    {{--{!! Form::submit('Add Cheese!') !!}--}}
    {{--{!! Form::close() !!}--}}


@endsection
