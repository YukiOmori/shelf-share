@extends('layouts.app')

@section('content')

        <div class="panel panel-default">
            <div class="panel-heading" id="header-panel">
                <span>シェアされている書籍</span>
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
                        <th>ステータス</th>
                        <th>&nbsp;</th>
                    </thead>
    @if (count($books) > 0)                    
                    <tbody>
                        @foreach ($books as $book)

                        <tr>
                            <td>
                                <div><img src="upload/{{$book->item_img}}" width="100"></img></div>
                            </td>
                            <td class="table-text">
                                <div><a href="{{url('booksdetail/'.$book->id)}}">{{$book->item_name}}</a></div>
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
                                <div>{{$book->borrower}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->return_date}}</div>
                            </td>
                            <!--借りるボタン-->
                            <td>
                            @if ($book->return_date == '')
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#borrowModal{{$book->id}}">借りる</button>
                            @else
                                返却待ち
                            @endif

                            </td>
                            
                            <!--お気に入りボタン-->
                            <td>
                                <form action="{{url('book/addFavorite')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="book_id" value="{{$book->id}}"/>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
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
                        {{$totalCount}}件中
                        {{1 + $pagination_num * ($books->Currentpage() - 1)}}-
                        {{$pagination_num * ($books->Currentpage() - 1) + $currentCount}}件を表示
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        {{$books->links()}}
                    </div>
                </div>
            </div>
        </div>
@foreach($books as $book)
    <div class="modal fade" id="borrowModal{{$book->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">借りる内容を確認してください</h4>
          </div>
          <form action="{{url('books/addBorrower')}}" method="POST">
            {{csrf_field()}}
              <div class="modal-body">
                  <label>タイトル</label>
                  <span>{{$book->item_name}}</span>
              </div>
              
              <div class="modal-body">
                  <label>著者</label>
                  <span>{{$book->author}}</span>
              </div>

              <div class="modal-body">
                  <label>出版社</label>
                  <span>{{$book->publisher}}</span>
              </div>

              <div class="modal-body">
                  <label>発行日</label>
                  <span>{{$book->published}}</span>
              </div>

              <div class="modal-body">
                  <label>所有者</label>
                  <span>{{$book->owner}}</span>
              </div>

              <div class="modal-body">
                  <label>店舗</label>
                  <span>{{$book->store}}</span>
              </div>

              <div class="modal-body">
                  <label>借入期間</label>
                  <input type="date" name="start_date" required/>〜<input type="date" name="return_date" required/>
              </div>
            
              @include('common.errors')
              <div class="modal-footer">
                    <input type="hidden" name="id" value="{{$book->id}}"/>
                    <input type="hidden" name="borrower_id" id="borrower_id" value="{{Auth::user()->id}}"/>
                    <input type="hidden" name="borrower" id="borrower" value="{{Auth::user()->name}}"/>
                    <button type="submit" class="btn btn-primary">借りる</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">閉じる</button>
               </div>
           </form>
        </div>
      </div>
</div>
@endforeach


@endsection