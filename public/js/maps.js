function initMap(){

    // Detail.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
    map = document.getElementById("map");

    //マーカー表示データ
    const markerData = [
        {
            "name": "東京辰巳国際水泳場",
            "type": "tathumi",
            "lat": 35.647646488594,
            "lng": 139.81898596507,
            "address": "東京都江東区辰巳２丁目８−１０",
        },
        {
            "name": "横浜国際プール",
            "type": "yokokoku",
            "lat": 35.56411581772,
            "lng": 139.59448361616,
            "address": "神奈川県横浜市都筑区北山田7丁目3番地1号",
        },
        {
            "name": "アクアティクスセンター",
            "type": "aquatiqs",
            "lat": 35.6514136,
            "lng": 139.8128706,
            "address": "東京都江東区辰巳２丁目２−１",
        }
    ]
}