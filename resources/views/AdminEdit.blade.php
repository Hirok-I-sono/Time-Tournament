@extends('layouts.layout')
@section('content')

エラー文、ユーザー名にする

<div class="container py-4">

    <h4><a href="{{ route ('admin') }}">管理者ページトップへ戻る</a></h4>
    
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>ユーザー編集</h4>
            </div>
            <div class="card-body">

                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{$message}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                
                <form action="{{ route('admin.data.edit',['user' => $data['id']]) }}" method="post">
                    @csrf
                    <label for='name' class='mt-2'>ユーザー名</label>
                        <textarea class='form-control' name='name' value="">{{ $data['name'] }}</textarea>
                        ロール設定
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>変更</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection