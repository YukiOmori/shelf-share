@extends('layouts.app')

@section('content')

        <div class="panel panel-default">
            <div class="panel-heading" id="header-panel">
                <span>シェアされている書籍</span>
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
                        <th>借人</th>
                        <th>返却日</th>                        
                        <th>&nbsp;</th>
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
                                <div>{{$book->borrower}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->return_date}}</div>
                            </td>
                            <!--借りるボタン-->
                            <td>
                                <button type="button" class="btn btn-primary" id="borrow-button"  data-toggle="modal" data-target="#borrowModal{{$book->id}}">
                                    <a>借りる</a>
                                </button>
                            </td>
                            
                            <div class="modal fade" id="borrowModal{{$book->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">借りる内容を確認してください</h4>
                                  </div>
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
                                      <input type="date" name="start_date"/>〜<input type="date" name="return_date"/>
                                  </div>
                                
                                  @include('common.errors')
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-dismiss="modal">借りる</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">閉じる</button>
                                    <form type="hidden" action="{{url('/books/edit')}}" method="POST">
                                        {{csrf_field()}}
                                        
                                    </form>

                                   </div>
                                </div>
                              </div>
                            </div>
                            <!--お気に入りボタン-->
                            <td>
                                <form action="{{url('book/'.$book->id)}}" method="POST">
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