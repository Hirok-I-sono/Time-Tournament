@extends('layouts.layout')
@section('content')

大会名編集テキスト<br>
変更ボタン<br>
<main class="py-4">

    <h4><a href="{{ route ('admin') }}">管理者ページトップへ戻る</a></h4>

    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>大会名編集</h4>
            </div>
            <div class="card-body">
                <form action="{{ route ('admin.tour.edit',['id' => $tour[0]['tourid']]) }}" method="post">
                @csrf
                    <label for='tourname' class='mt-2'>大会名</label>
                    <textarea class='form-control' name='tourname' value=""></textarea>
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection