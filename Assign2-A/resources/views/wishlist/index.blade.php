@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Your Wish List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('wishlist.create') }}"> Add Movie To Wish List</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Movie Title</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->user_name}}</td>
                <td>{{ $product->movie_title}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('wishlist.edit',$product->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['wishlist.destroy', $product->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $products->render() !!}
@endsection