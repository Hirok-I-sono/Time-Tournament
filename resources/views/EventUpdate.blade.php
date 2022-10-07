@extends('layouts.layout')
@section('content')

<main class="py-4">

    <h4><a href="{{ route ('admin') }}">管理者ページトップへ戻る</a></h4>

    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>種目編集</h4>
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

                <form action="{{ route ('admin.event.edit',['id' => $event[0]['eventid']]) }}" method="post">
                @csrf
                    <label for='eventname' class='mt-2'>種目</label>
                    <textarea class='form-control' name='eventname' value="">{{ $event[0]['eventname'] }}</textarea>
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

@endsection