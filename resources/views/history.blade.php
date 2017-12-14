@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading" id="header-panel">
                <span>履歴</span>
                <input type="text" class="search-query span3" id="search" placeholder="Search">
            </div>
            @include('common.errors')
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>イメージ</th>
                        <th>タイトル</th>
                        <th>著者</th>
                        <th>出版社</th>
                        <th>所有店舗</th>
                        <th>所有者</th>
                        <th>開始日</th>
                        <th>返却日</th>                    
                    </thead>
    @if (count($history_books) > 0)                    
                    <tbody>
                        @foreach ($history_books as $history_book)
                                <tr>
                                    <td class="table-text">
                                        <div><img src="../upload/{{$history_book->item_img}}" width="100"></img></div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{$history_book->item_name}}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{$history_book->author}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$history_book->publisher}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$history_book->store}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$history_book->owner}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$history_book->borrowed_from}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$history_book->borrowed_to}}</div>
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
                </div>
            </div>
        </div>
@endsection