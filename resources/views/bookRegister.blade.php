@extends('layouts.app')

@section('content')
<div class="panel-body">
    @include('common.errors')
    
    <form action="{{url('books')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
        
        <div class="formgroup">
            <label for="item-name" class="col-sm-3control-label">タイトル</label>
            <div class="col-ms-6">
                <input type="text" name="item_name" id="book-name" class="form-control"/>
            </div>

            <label for="item_number" class="col-sm-3control-label">数量</label>
            <div class="col-ms-6">
                <input type="text" name="item_number" id="item_number" class="form-control"/>
            </div>

            <label for="item_amount" class="col-sm-3control-label">定価（税別）</label>
            <div class="col-ms-6">
                <input type="text" name="item_amount" id="item_amount" class="form-control"/>
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
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-plus"></i>Save
                </button>
            </div>
        </div>
    </form>

@endsection