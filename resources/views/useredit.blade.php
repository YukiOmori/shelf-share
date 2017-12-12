@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('common.errors')
        
        <form action="{{url('users/update')}}" method="POST">
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}"/>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}"/>
            </div>

            <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
            <!--TODO: パスワード変更出来るようにしたい-->
            <!--<input type="hidden" name="password" value="{{Auth::user()->password}}"/>-->
            
            <div class="well sell-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url('/')}}" class="btn btn-link pull-right">
                    <i class="glyphicon glyphicon-backward"></i>Back
                </a>
            </div>

            {{csrf_field()}}
        </form>
    </div>
</div>

@endsection