@extends('layout')

@section('content')

<div class="container">
    <div>
        <div class="card">
            <div class="p-2">
                <h4>Lists of all the variations</h4>
                @foreach ($variations as $variation)
                    <a class="btn btn-sm mb-2 btn-outline-dark">{{ $variation->name }}</a> |
                @endforeach
            </div>
        </div>

        <div class="mt-4">
            <form  method="POST" action="{{ route('variations.store') }}" enctype="multipart/from-data">
                @csrf
                    <div>
                        <div class="h4">Add a new variation</div>
                            <input name="name" type="text" class="form-control" placeholder="Tin / Bottle" value="{{ old('name', $variation->name ?? null) }}" required>
                    </div>
                    
                <button type="submit" class="mt-4 btn btn-sm col-12 btn-outline-primary">Add Variation</button>
            </form>
        </div>
    </div>
</div>


@endsection