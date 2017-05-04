@extends('main')

@section('title', trans('app.list_ingridients'))

@section('content')



    <div class="container">
        <table class="table-bordered">
            <tr>
                <th class="col-md-2">Ingridient</th>
                <th class="col-md-2">Popularity</th>
            </tr>

            @foreach($all_ingridients as $ingridient)
                <tr>
                    <td class="col-md-2">{{$ingridient['name']}}</td>
                    <td class="col-md-2">{{sizeof($ingridient['ingridients_connections'])}}</td>

                        {{--<ul>--}}
                            {{--<li>{{$pizza['ground']['name']}}</li>--}}
                            {{--<li>{{$pizza['cheese']['name']}}</li>--}}

                            {{--@foreach($pizza['ingridients_connections'] as $key => $connection)--}}

                                {{--<li>{{($connection['ingridient']['name'])}}</li>--}}

                            {{--@endforeach--}}
                        {{--</ul>--}}

                    {{--</td>--}}
                    {{--<td class="col-md-2">{{$pizza['calories']}} kcal</td>--}}
                {{--</tr>--}}
            @endforeach

        </table>
    </div>



@endsection
