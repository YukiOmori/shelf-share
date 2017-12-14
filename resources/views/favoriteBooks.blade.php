@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading" id="header-panel">
                <span>お気に入りの書籍</span>
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
                        <th>借人</th>
                        <th>返却日</th>                    
                        <th>&nbsp;</th>
                    </thead>
    @if (count($favorite_books) > 0)                    
                    <tbody>
                        @foreach ($favorite_books as $favorite_book)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$favorite_book->book_id}}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{$favorite_book->item_name}}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>&nbsp;</div>
                                    </td>
                                    <td class="table-text">
                                        <div>&nbsp;</div>
                                    </td>
                                    <td class="table-text">
                                        <div>&nbsp;</div>
                                    </td>
                                    <td class="table-text">
                                        <div>&nbsp;</div>
                                    </td>
                                    <td class="table-text">
                                        <div>&nbsp;</div>
                                    </td>
                                    <td class="table-text">
                                        <div>&nbsp;</div>
                                    </td>
        
                                    <!--お気に入り解除ボタン-->
                                    <td>
                                        <form action="{{url('book/deleteFavorite/'.$favorite_book->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-warning">
                                                <i class="glyphicon glyphicon-star"></i>
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
                </div>
            </div>
        </div>
@endsection