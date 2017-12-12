@extends('layouts.app')

@section('content')

    @if (count($books) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                借入書籍一覧
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thread>
                        <th>タイトル</th>
                        <th>著者</th>
                        <th>出版社</th>
                        <th>所有店舗</th>
                        <th>所有者</th>
                        <th>返却日</th>                        
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thread>
                    
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td class="table-text">
                                <div>{{$book->item_name}}</div>
                                <!--<div><img src="upload/{{$book->item_img}}" width="100"></img></div>-->
                            </td>
                            <td class="table-text">
                                <div>{{$book->author}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->publisher}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->store}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->owner}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->return_date}}</div>
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