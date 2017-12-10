@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('common.errors')
        
        <form action="{{url('books/update')}}" method="POST">
            <div class="form-group">
                <label for="item_name">Title</label>
                <input class="form-control" type="text" name="item_name" value="{{$book->item_name}}"/>
            </div>

            <div class="form-group">
                <label for="item_number">Amount</label>
                <input class="form-control" type="text" name="item_number" value="{{$book->item_number}}"/>
            </div>

            <div class="form-group">
                <label for="item_amount">Price</label>
                <input class="form-control" type="text" name="item_amount" value="{{$book->item_amount}}"/>
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
                <input class="form-control" type="text" name="published" value="{{$book->published}}"/>
            </div>
            
            <div class="well sell-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url('/')}}" class="btn btn-link pull-right">
                    <i class="glyphicon glyphicon-backward"></i>Back
                </a>
            </div>
            
            <input type="hidden" name="id" value="{{$book->id}}"/>

            {{csrf_field()}}
        </form>
    </div>
</div>

@endsection