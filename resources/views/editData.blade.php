@extends('layouts.app')

@section('content')

<div class="row mt-4">
    <div class="col-md-12">
        <a href="{{url('/')}}" class="btn btn-success mb-2">Show Data</a>
        <form action="{{url('/update-data/'.$data->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Enter your name" value="{{$data->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="Enter your email" value="{{$data->email}}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
@endsection