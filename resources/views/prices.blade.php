@extends('layout')

@section('content')

<div class="container">

    @foreach ($prices as $price )
        <a>{{ $total = $price->price + ($price->value)}}</a>
        <br>
        {{-- <a>{{ $price->price - ($price->value)}}</a> --}}
        {{-- <a>{{ $price->id }}</a> --}}
        <br>
        {{-- <a>{{ $total }}</a> --}}
        <br>
        <a>{{ $price->value }}</a>
        <br>
        {{-- <a>{{ $price->oper }}</a> --}}
    @endforeach
    
    <form method="POST" action="{{ route('prices.store') }}">
        @csrf
        <div class="form-group">
            <label>Price</label>
            <input name="price" type="number" class="form-control" placeholder="1234" value="{{ old('price' , $price->price ?? null) }}" required>
        </div>
        
        <div class="form-group">
            <label>Value</label>
            <input name="value" type="number" class="form-control" placeholder="1234" value="{{ old('value' , $price->value ?? null) }}" required>
        </div>

        <div class="form-group">
            <label>Oper</label>
            <input name="oper" type="text" class="form-control" placeholder="+-*/" value="{{ old('oper' , $price->oper ?? null) }}" required>
        </div>

        <button class="btn btn-sm w-100 mt-4 btn-outline-dark" type="submit">Submit</button>
    </form>

</div>

@endsection