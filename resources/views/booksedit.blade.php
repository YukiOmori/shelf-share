@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        書籍の情報を入力
    </div>

    <div class="panel-body">        
        <form action="{{url('books/update')}}" method="POST">
            <div class="form-group">
                <label for="item_name">Title</label>
                <input class="form-control" type="text" name="item_name" value="{{$book->item_name}}"/>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input class="form-control" type="text" name="author" value="{{$book->author}}"/>
            </div>

            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input class="form-control" type="text" name="publisher" value="{{$book->publisher}}"/>
            </div>
            
            <div class="form-group">
                <label for="published">Published At</label>
                <input class="form-control" type="datetime" name="published" value="{{$book->published}}"/>
            </div>
            
            @include('common.errors')
            
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url('/')}}" class="btn btn-warning">Cancel</a>
            </div>
            
            <input type="hidden" name="id" value="{{$book->id}}"/>

            {{csrf_field()}}
        </form>
    </div>
</div>

@endsection