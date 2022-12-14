@extends('layouts.layout')
@section('content')

仮作成<br>
名前編集<br>
違反、管理者設定<br>
変更
<div class="container py-4">

    <h4><a href="{{ route ('admin') }}">管理者ページトップへ戻る</a></h4>
    
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>ユーザー編集</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('admin.data.edit',['user' => $data['id']]) }}" method="post">
                        @csrf

                        <!-- メモ、写真アップロード -->
                        <label for='name' class='mt-2'>メモ</label>
                            <textarea class='form-control' name='name'></textarea>
                        <div class='row justify-content-center'>
                            <button type='submit' class='btn btn-primary w-25 mt-3'>変更</button>
                        </div> 
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection