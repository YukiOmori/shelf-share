@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        書籍の詳細
    </div>

    <div class="panel-body">        

        <div class="form-group">
            <label for="item_name">Title</label>
            <span class="form-control">{{$book->item_name}}</span>
        </div>

    </div>
</div>

@endsection