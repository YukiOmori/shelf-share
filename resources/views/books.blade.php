@extends('layouts.app')

@section('content')

<div class="panel-body">
    @include('common.errors')
    
    <form action="{{url('books')}}" method="POST" class="form-horizontal">
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
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-plus"></i>Save
                </button>
            </div>
        </div>
    </form>
    
    @if (count($books) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                現在の本
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thread>
                        <th>
                            本一覧
                        </th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thread>
                    
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <!--タイトル-->
                            <td class="table-text">
                                <div>{{$book->item_name}}</div>
                            </td>
                            <!--更新ボタン-->
                            <td>
                                <form action="{{url('booksedit/'.$book->id)}}" method="POST">
                                    {{csrf_field()}}
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </button>
                                </form>
                            </td>
                            <!--削除ボタン-->
                            <td>
                                <form action="{{url('book/'.$book->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    
                                    <button type="submit" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        {{$books->links()}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    
</div>

@endsection