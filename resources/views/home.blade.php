@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">チュートリアル</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <ul id="home-list">
                <li>
                    <h3><a href="{{url('/')}}"><i class="fa fa-search" aria-hidden="true"></i>蔵書検索</a></h3>
                    <p>世界中でシェアされている書籍を検索出来ます。</p>
                </li>
                
                <li>
                    <h3><a href="{{url('/books/register')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>書籍登録</a></h3>
                    <p>あなたの書籍を登録して皆とシェアしましょう。<br>貢献度によっては人の書籍を無料で読めるようになります。</p>
                </li>
                
                <li>
                    <h3><a href="{{url('/books/lend')}}"><i class="fa fa-book" aria-hidden="true"></i><i class="fa fa-arrow-right" aria-hidden="true"></i>貸出書籍</a></h3>
                    <p>あなたが皆とシェアしている書籍の一覧です。</p>
                </li>
                <li>
                    <h3><a href="{{url('/books/borrow')}}"><i class="fa fa-book" aria-hidden="true"></i><i class="fa fa-arrow-left" aria-hidden="true"></i>借入書籍</a></h3>
                    <p>あなたが皆から借りている書籍の一覧です。</p>
                </li>
                <li>
                    <h3><a href="{{url('/books/favorite')}}"><i class="fa fa-star" aria-hidden="true"></i>お気に入り</a></h3>
                    <p>検索してお気に入り登録した書籍の一覧です。</p>
                </li>
                <li>
                    <h3><a href="{{url('/books/history')}}"></i><i class="fa fa-history" aria-hidden="true"></i>履歴</a></h3>
                    <p>あなたが借りた書籍の履歴です。</p>
                </li>
            </ul>
        </div>
    </div>
@endsection
