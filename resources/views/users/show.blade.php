@extends('layout')

@section('content')
    
<div class="container">
    <a href="" class="">{{ $user->id }} / {{ $user->name }}</a>


    <div class="card">
        <table class="">
            <thead>
                <th scope="col">test</th>
                <th scope="col">test</th>
            </thead>

            <tbody>
                @foreach ($soldItems as $items)
                    <tr>
                        <td><a href="text-dark" class="">{{ $items->created_at }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>        
</div>
@endsection
