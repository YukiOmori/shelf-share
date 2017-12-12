@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        書籍の情報を入力
    </div>

    <div class="panel-body">
        <form action="{{url('books')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <div class="form-group">
                <div>
                    <label for="item-name">タイトル</label>
                    <input type="text" name="item_name" id="book-name"/>
                </div>
    
                <div>
                    <label for="author">著者</label>
                    <input type="text" name="author" id="author"/>
                </div>
                
                <div>
                    <label for="publisher">出版社</label>
                    <input type="text" name="publisher" id="publisher"/>
                </div>
    
                <div>
                    <label for="published">発行日</label>
                    <input type="date" name="published" id="published"/>
                </div>
                
                <div>
                    <label for="store">預け先店舗</label>
                    <select name="store" id="store">
                        <option value="Omotesando">表参道店</option>
                        <option value="Jiyugaoka">自由が丘店</option>
                        <option value="Shibuya">渋谷店</option>
                        <option value="Shibuya">東京店</option>
                    </select>
                </div>
                
                
                <div>
                    <label for="item_img">書籍の写真</label>
                    <input type="file" name="item_img" id="item_img"/>
                </div>
            </div>
            @include('common.errors')

            <button class="btn btn-primary" type="submit">
                シェアする
            </button>

    </div>
</div>
@endsection