@extends('main')

@section('title', trans('app.list_pizza'))

@section('content')



    <div class="container">
        <table class="table-bordered">
            <tr>
                <th class="col-md-2">Client phone number</th>
                <th class="col-md-2">Ingredients</th>
                <th class="col-md-2">Calories</th>
            </tr>

            @foreach($all_pizzas as $pizza)
                <tr>
                    <td class="col-md-2">{{$pizza['name']}}</td>
                    <td class="col-md-2">

                        <ul>
                            <li>{{$pizza['ground']['name']}}</li>
                            <li>{{$pizza['cheese']['name']}}</li>

                            @foreach($pizza['ingridients_connections'] as $key => $connection)

                                <li>{{($connection['ingridient']['name'])}}</li>

                            @endforeach
                        </ul>

                    </td>
                    <td class="col-md-2">{{$pizza['calories']}} kcal</td>
                </tr>
            @endforeach

        </table>
    </div>



@endsection
