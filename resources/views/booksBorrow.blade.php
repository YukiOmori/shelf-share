@extends('layouts.app')

@section('content')

        <div class="panel panel-default">
            <div class="panel-heading" id="header-panel">
                <span>借入書籍一覧</span>
                <input type="text" class="search-query span3" id="search" placeholder="Search">
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>タイトル</th>
                        <th>著者</th>
                        <th>出版社</th>
                        <th>所有店舗</th>
                        <th>所有者</th>
                        <th>返却日</th>                        
                        <th>&nbsp;</th>
                    </thead>
                @if (count($books) > 0)
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
                            <!--返却ボタン-->
                            <td>
                                <button class="btn btn-primary" id="return-button">
                                    <a>返却する</a>
                                </button>
                            </td>
                        </tr>
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