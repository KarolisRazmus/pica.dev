@extends('main')

@section('title', trans('app.form_pizza'))

@section('content')

    @if(isset($error))
        <h4 style="color:red">{{ $error['message'] }}</h4>
    @endif

    @if(isset($comment))
        <h4 style="color:red">{{ $comment['message'] }}</h4>
    @endif

    {{--@if(isset($data))
        @if((sizeOf($data['ingridients'])) > 3)
            <h4 style="color:red">Pasirinkote {{sizeOf($data['ingridients'])}} ingredientus, prasome pasirinkite ne
                daugiau nei tris!</h4>
        @elseif(($data['ingridients']) === null)
            <h4 style="color:red">Pasirinkite bent viena ingredienta!</h4>
        @endif
    @endif



    @if(!isset($data['name']))
        <h4 style="color:red">EEEE.. pamirsai telefona!</h4>
    @elseif(($name != null))
        <h4 style="color:red">Pica sukurta, susisieksime su Jumis tel: {{$name}}!</h4>
    @endif


--}}
    {{--@elseif($data['name'])--}}
    {{--<h4 style="color:green">{{$data['name']}} sukurta sėkmingai!</h4>--}}




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
