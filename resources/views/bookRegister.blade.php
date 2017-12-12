@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        書籍の情報を入力
    </div>

    <div class="panel-body">
        <form action="{{url('books')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <div class="formgroup">
                <label for="item-name" class="col-sm-3control-label">タイトル</label>
                <div class="col-ms-6">
                    <input type="text" name="item_name" id="book-name" class="form-control"/>
                </div>
    
                <label for="author" class="col-sm-3control-label">著者</label>
                <div class="col-ms-6">
                    <input type="text" name="author" id="author" class="form-control"/>
                </div>
    
                <label for="publisher" class="col-sm-3control-label">出版社</label>
                <div class="col-ms-6">
                    <input type="text" name="publisher" id="publisher" class="form-control"/>
                </div>
    
                <label for="published" class="col-sm-3control-label">発行日</label>
                <div class="col-ms-6">
                    <input type="date" name="published" id="published" class="form-control"/>
                </div>
    
                <label for="item_img" class="col-sm-3control-label">書籍の写真</label>
                <div class="col-ms-6">
                    <input type="file" name="item_img" id="item_img" class="form-control"/>
                </div>
            </div>
            @include('common.errors')

            <button class="btn btn-primary" type="submit">
                シェアする
            </button>

    </div>
</div>
@endsection