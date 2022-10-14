@extends('layouts.layout')
@section('content')

<main class="py-4">

    <h4><a href="{{ route ('admin') }}">管理者ページトップへ戻る</a></h4>

    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>場所編集</h4>
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

                <form action="{{ route ('admin.place.edit',['id' => $place[0]['placeid']]) }}" method="post">
                @csrf
                    <label for='placename' class='mt-2'>種目</label>
                    <textarea class='form-control' name='placename' value="">{{ $place[0]['placename'] }}</textarea>

                <!-- ジオコーディング -->
                <label for='lat' class='mt-2'></label>
                    緯度：<input type="text" id="lat" name="lat">
                <label for='lng' class='mt-2'></label>
                    経度：<input type="text" id="lng" name="lng"><br>
                <!-- <a href="http://www.geocoding.jp/">緯度経度を調べる（http://www.geocoding.jp/）</a><br> -->
                <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBaUny4XRpZn6j19805-MeXsPpRR9vcDCY&callback=initMap" async defer></script>
                <script src="{{ asset('/js/getLatLng.js') }}"></script>

                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                    </div>
                </form>
                <input type="text" id="addressInput">
                    <button id="searchGeo" onclick="getLatLng()">緯度経度変換</button><br>
            </div>
        </div>
        


    </div>

</main>

@endsection