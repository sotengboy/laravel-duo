@extends('layouts.layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users table</h6>
                </div>
                <div class="card-body p-4">
                    <p class="card-title">Edit User {{$user->name}}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$user->name}}" />
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$user->email}}" />
                                <label>Function</label>
                                <input class="form-control" name="function" value="{{$user->function}}" />
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="active">Aktif</option>
                                    <option value="inactive">Non Aktif</option>
                                </select>
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                @if($user->image != '')
                                <img src="/users/{{$user->image}}" width="150px" />
                                @endif
                                <input type="submit" class="btn btn-primary btn-lg mt-3" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection