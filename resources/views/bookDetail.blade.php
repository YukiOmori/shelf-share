@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        書籍の詳細
    </div>

    <div class="panel-body">     
        <div class="form-group originized-form">
            <div>
                <label for="item_img">イメージ</label>
                <div class="content" id="book-img"><img src="../upload/{{$book->item_img}}" width="200"></img></div>
            </div>

            <div>
                <label for="item-name">タイトル</label>
                <div class="content">{{$book->item_name}}</div>
            </div>

            <div>
                <label for="item-name">著者</label>
                <div class="content">{{$book->author}}</div>
            </div>
            <div>
                <label for="item-name">出版社</label>
                <div class="content">{{$book->publisher}}</div>
            </div>
            <div>
                <label for="item-name">発行日</label>
                <div class="content">{{$book->published}}</div>
            </div>
            <div>
                <label for="item-name">所有者</label>
                <div class="content">{{$book->owner}}</div>
            </div>
            <div>
                <label for="item-name">店舗</label>
                <div class="content">{{$book->store}}</div>
            </div>
            <div>
                <label for="author">借人</label>
                <div class="content">{{$book->borrower}}</div>
            </div>
            <div>
                <label for="publisher">返却日</label>
                <div class="content">{{$book->return_date}}</div>
            </div>
            
        </div>
    </div>
</div>

@endsection