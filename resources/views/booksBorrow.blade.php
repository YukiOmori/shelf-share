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
                        <th>イメージ</th>
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
                                <div>{{$book->owner}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->return_date}}</div>
                            </td>
                            <!--返却ボタン-->
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#returnModal{{$book->id}}">返却する</button>
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

@foreach($books as $book)
    <div class="modal fade" id="returnModal{{$book->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">借りる内容を確認してください</h4>
          </div>
          <form action="{{url('books/deleteBorrower')}}" method="POST">
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
                  <label>返却日</label>
                  <span>{{$book->return_date}}</span>
              </div>
            
              @include('common.errors')
              <div class="modal-footer">
                    <input type="hidden" name="id" value="{{$book->id}}"/>
                    <button type="submit" class="btn btn-primary">返却手続きを完了する</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">閉じる</button>
               </div>
           </form>
        </div>
      </div>
</div>
@endforeach

@endsection