// googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
function initMap() {

    //辰巳
    // Detail.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
    map = document.getElementById("map");
    // 辰巳の緯度経度
    let tathumiinter = {lat: 35.647646488594, lng: 139.81898596507};
    // オプションを設定
    opt = {
        zoom: 13, //地図の縮尺を指定
        center: tathumiinter, //センターを辰巳に指定
    };
    // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
    mapObj = new google.maps.Map(map, opt);

    marker = new google.maps.Marker({
        // ピンを差す位置を決めます。
        position: tathumiinter,
	// ピンを差すマップを決めます。
        map: mapObj,
	// ホバーしたときに「tathumiinter」と表示されるようにします。
        title: 'tathumiinter',
    });

}

    //横国
    // map = document.getElementById("map");
    // let yokokoku = {lat: 35.647646488594, lng: 139.81898596507};
    // opt = {
    //     zoom: 13,
    //     center: yokokoku,
    // };
    // mapObj = new google.maps.Map(map, opt);
    // marker = new google.maps.Marker({
    //     position: yokokoku,
    //     map: mapObj,
    //     title: 'yokokoku',
    // });