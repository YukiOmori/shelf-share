@extends('layouts.app')

@section('content')

        <div class="panel panel-default">
            <div class="panel-heading" id="header-panel">
                <span>貸出書籍一覧</span>
                <input type="text" class="search-query span3" id="search" placeholder="Search">
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thread>
                        <th>イメージ</th>
                        <th>タイトル</th>
                        <th>著者</th>
                        <th>出版社</th>
                        <th>所有店舗</th>
                        <th>借人</th>
                        <th>返却日</th>                        
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                    </thread>
                @if (count($books) > 0)
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>
                                <div><img src="../upload/{{$book->item_img}}" width="100"></img></div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->item_name}}</div>
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
                                <div>{{$book->borrower}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->return_date}}</div>
                            </td>
                            <td>
                                <form action="{{url('/booksedit/'.$book->id)}}" method="POST">
                                    {{csrf_field()}}
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </button>
                                </form>
                            </td>
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
                @else
                     <tbody>
                        <tr>
                            <td>該当のデータがありません。</td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                        </tr>
                    </tbody>
                @endif
                </table>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        {{$books->links()}}
                    </div>
                </div>
            </div>
        </div>
@endsection