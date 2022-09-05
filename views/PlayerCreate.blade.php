@extends('layouts.layout')
@section('content')

<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>選手登録</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('player.create')}}" method="post">
                @csrf
                    <label for='playername' class='mt-2'>選手名</label>
                    <textarea class='form-control' name='playername' value=""></textarea>
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</main>

@endsection