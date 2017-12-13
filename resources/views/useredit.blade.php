@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        ユーザー情報を編集
    </div>
    <div class="panel-body">   
        <form action="{{url('users/update')}}" method="POST">
        {{csrf_field()}}
            <div class="form-group" id="user-setting-form">
                <div>
                    <label for="name">ユーザー名</label>
                    <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}"/>
                </div>
            
                <div>
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}"/>
                </div>

            </div>
            @include('common.errors')
            
            <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
            <!--TODO: パスワード変更出来るようにしたい-->
            <!--<input type="hidden" name="password" value="{{Auth::user()->password}}"/>-->
            @include('common.errors')
            <button type="submit" class="btn btn-success" id="user-setting-button">修正</button>
        </form>
    </div>
</div>
@endsection