@extends('layouts.app')

@section('content')
<div style="text-align: center">
    <h2>Relatório Geral</h2>
    <h3 style="text-align: left">Tabelas</h3>
    <select name="select" id="1" style="float: left; margin-top:5px">
        @foreach ($tables as $table)
        <option value="{{ $table }}" id="{{ $table }}" onclick="start()" >{{ $table }}</option>
        @endforeach
    </select>

<script>
 function start(){
        document.getElementById('municipios').innerHTML = 1;
        resultArea = document.getElementById('municipios');

        print(lastResultAreaText);
        }
</script>



    <!-- <table>
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Inicial</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($regions as $region)
            <tr>
                <td>{{ $region['name'] }}</td>
                <td>{{ $region['initials'] }}</td>
            </tr>
            @endforeach

        </tbody>
    </table> -->
</div>
@endsection
