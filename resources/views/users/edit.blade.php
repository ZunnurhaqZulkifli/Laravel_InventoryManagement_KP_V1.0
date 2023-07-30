@extends('layout')

@section('content')

    <p class="text-dark">This is where you edit user</p>

    <form method="POST" enctype="multipart/form-data"
        action="{{ route('users.update' , ['user' => $user->id]) }}"
        class="form-horizontal">

        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-4">
                <img src="{{ $user->image ? $user->image->url() : ''  }}" class="img-thumbnail"/>

                <div class="card bg-transparent mt-4">
                    <div class="card-body">
                        <h6 class="text-dark">Upload a different photo</h6>
                        <input class="form-control-file" type="file" name="thumbnail"/>
                    </div>
                </div>
            </div>
            
            <div class="col-8">
                <div class="form-group">
                    <label class="text-dark">Name :</label>
                    <input class="form-control" value="" placeholder="{{ $user->name }}" type="text" disabled />
                </div>

                <div class="form-group">
                    <input type="submit" class="mt-2 btn btn-outline-dark" value="Save Changes"/>
                </div>
            </div>
        </div>

    </form>


@endsection