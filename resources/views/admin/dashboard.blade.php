@extends('admin.layouts.index')


@push('css')
    @vite(['resources/sass/app.scss'])
@endpush


@section('content')
    <div class=" custom-pages">
        <div class="title">
            <span>商品種別</span>
        </div>
        <div class="button-list">
            <button class="btn-custom btn btn-primary">商品種別グループ</button>
            <button class="btn-custom btn btn-secondary">商品分類</button>
            <button class="btn-custom btn btn-success">商品</button>
            <button class="btn-custom btn btn-danger">追加</button>
        </div>
        <div>
            <span>該当件数：29件</span>
        </div>

        <table class="tbl_set1 table table-bordered">
            <tbody>
                <tr>
                    <th width="300px">種別名</th>
                    <th width="150px">価格</th>
                    <th width="150px">換金率（％）</th>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=69')">貴金属</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=70')">ブランド</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=71')">金券</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=72')">酒類</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=228')">切手</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=229')">通貨</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=230')">古銭</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=231')">テレカ</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=232')">携帯</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=233')">家電</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=234')">外国切手</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=235')">外国銭</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=237')">カメラ</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=238')">勲章</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=239')">雑貨</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=240')">喫煙具</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=241')">食器</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=242')">骨董品・絵画</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=243')">万年筆・ボールペン</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=244')">タブレット</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=245')">ゲーム機</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=246')">楽器</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=247')">その他</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=248')">時計</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=263')">ジュエリー</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=264')">おもちゃ</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=265')">衣類</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=266')">工具</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
                <tr>
                    <td width="60"><a href="#"
                            onclick="set_win_nm('frame2');win_open('./mm_goods_type_upd.php?goods_type_id=267')">近代金貨（地金）</a>
                    </td>
                    <td width="60"></td>
                    <td width="60"></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    @vite(['resources/js/app.js'])
@endpush
