@extends('layouts.app')

@section('content')
    <div style="text-align: center">
        <h2>Relatório Geral</h2>

        <table>
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
        </table>
    </div>
@endsection
