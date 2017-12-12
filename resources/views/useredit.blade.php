@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('common.errors')
        
        <form action="{{url('users/update')}}" method="POST">
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input class="form-control" type="text" name="name" value="{{$user->name}}"/>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" value="{{$user->email}}"/>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="text" name="password" value="{{$user->password}}"/>
            </div>
          
            <input type="hidden" name="id" value="{{$user->id}}"/>

            {{csrf_field()}}
        </form>
    </div>
</div>

@endsection