@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mt-4">
        <a href="{{url('add-data')}}" class="btn btn-success mb-3">Add Data</a>
        @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{Session::get('msg')}}
        </div>
        @endif
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" colspan="2"> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key=>$value)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td><a href="{{url('/edit-data/'.$value->id)}}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{url('/delete-data/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?');">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>
</div>
@endsection