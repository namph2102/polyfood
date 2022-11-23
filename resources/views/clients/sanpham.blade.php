@extends('layoutMaster.layoutProduct')
@section('title')
    - Sản Phẩm - {{$title}}
@endsection
@section('css')

@endsection
@section('directional')
    <a href="{{route('product.sanpham')}}">Sản Phẩm</a> <i class="fa-solid fa-angle-right"></i><a href="">{{$title}}</a>
@endsection
@section('container')
<div class="product_items_special">
    <div class="grid wide">
        <!-- Điều hướng -->
        <div class="product_items_directional l-12 c-12 m-12">
            <!--Tiêu đề cho trang-->
            <div class="direce_page_heading">
                <h1>Sản Phẩm</h1>
            </div>
            <!--End Tiêu đề cho trang-->
            <div class="fillter_product">
                <span class="fillter_product_notice hidden_onmoblie ">
                    Hiển thị một kết quả duy nhất
                </span>
                <select name="fillter_product_find" class="fillter_product_find">
                    <option value="">Thứ tự mặc định</option>
                    <option value="price_cre">Giá tăng dần</option>
                    <option value="price_dcr">Giá giảm dần</option>
                    <option value="name_cre">Tên tăng dần</option>
                    <option value="name_dcr">Tên giảm dần</option>
                </select>
            </div>
        </div>
        <!--End Điều hướng -->
        <div class="product_list_container">
            <div class="product_list_menu_direction l-3 m-4 c-0">
                <div class="catetory_menu">
                    <div class="catetory_menu_head">
                        <h2>Danh mục sản phẩm</h2>
                    </div>
                    @php
            $list_danhmuc=DB::table('loaihang')->get();
            @endphp

                    <ul class="catetory_menu_body">
                        @foreach($list_danhmuc as $danhmuc)
                        <li><a href="{{route('product.sanpham.tungloai')}}/{{$danhmuc->maLoaiHang}}">{{$danhmuc->tenLoaiHang}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="catetory_menu catetory_menu_fill_border">
                    <div class="catetory_menu_head">
                        <h2>Lọc theo giá</h2>
                    </div>
                    <div class="catetory_menu_body catetory_menu_body_fillter">
                        <br>
                        <input type="range" name="" class="input_fillter" min="0" max="100" value="100">
                        <div class="catetory_menu_fillter">
                            <button class="btn btn-secondary">Lọc</button>
                            <div class="catetory_menu_fillter_price">
                                <span>Giá</span> <span class="prict_min"> 0đ </span> -
                                <span class="prict_max">400,990đ</span>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="catetory_menu">
                    <div class="catetory_menu_head">
                        <h2>Sản phẩm Hot</h2>
                    </div>
@php
 function RandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
   
@endphp
                    <ul class="catetory_menu_body catetory_menu_body_list_top">
                        @foreach ($list_Sp_Hot as $item)
                        <li><a href="{{route('product.gochitiet')}}/{{RandomString(6)}}{{$item->maSanPham}}-{{RandomString(10)}}{{$item->soLuong>0?1:0}}-{{RandomString(10)}}{{$item->maLoaiHang}}-{{RandomString(10)}}">
                            <img src="{{$item->imageSanPham}}"
                                alt="{{$item->imageSanPham1}}">
                            <div class="catetory_menu_body_top_item">
                                <div class="top_item_name">
                                    {{$item->tenSanPham}}
                                </div>
                                <div class="top_item_price">
                                    {{number_format($item->priceSale)}} đ
                                </div>
                            </div>
                        </a>
                    </li>
                        @endforeach
                       
                    </ul>
                </div>
                <script>
                    
                </script>
            </div>
            <div class=" product_list_items l-9 m-8 c-12">
                <!-- Show sản phẩm here -->                                                                
                <div class="product_item l-3 m-4 c-6">
                    <div class="product_item_content">
                        <a href="#"> <img
                                src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                alt=""></a>
                        <div class="product_item-des">
                            <p class="product_item-des_name">
                                Khoai Mỳ
                            </p>
                            <p class="product_item-des_price">
                                <span>42,756đ</span><del>62,150đ</del>
                            </p>
                        </div>
                        <button class="btn chose_buy"><i class="fa-solid fa-bag-shopping"></i> Chọn Mua</button>
                        <!-- <button class="btn see_cart hide"> Xem giỏ hàng <i
                                class="fa-solid fa-arrow-right-long"></i></button> -->
                        <div class="product_item-saleoff_modal">
                            - <span>5</span> %
                        </div>
                        <input type="hidden" value="product_id">
                        <input type="hidden" value="product_price">
                    </div>
                </div>            
            </div>             
        </div>
        <!--Payge Here-->
        <div class="page_list l-12 m-12 c-12 ">
            <div class="page_list_container">

               {!! $phantrang->links() !!}

               
            </div>
         </div>
          <!--End Payge Here-->
    </div>

</div>
@endsection
    
@php

        $listphantrang=[];
        foreach($phantrang as $item) {
        $listphantrang[]=[
        'id'=> $item->maSanPham,
        'img'=> $item->imageSanPham,
        'name'=> $item->tenSanPham,
        'price_sale'=> (int)$item->priceSale,
        'price_orgin'=> (int)$item->priceOrigin,
        'des'=> $item->maLoaiHang,
        'status'=> ($item->soLuong>0)?1:0,
        'kind'=> $item->maLoaiHang,
    ];}
    $listapiSanpham=[];
        foreach($apiSanpham as $item) {
        $listapiSanpham[]=[
        'id'=> $item->maSanPham,
        'img'=> $item->imageSanPham,
        'name'=> $item->tenSanPham,
        'price_sale'=> (int)$item->priceSale,
        'price_orgin'=> (int)$item->priceOrigin,
        'des'=> $item->maLoaiHang,
        'status'=> ($item->soLuong>0)?1:0,
        'kind'=> $item->maLoaiHang,
    ];}

    $phantrang=[];
    $apiSanpham=[];
    $phantrang=json_encode($listphantrang);
    $apiSanpham=json_encode($listapiSanpham);

@endphp
@section('api')
<script>
    api='<?php echo $apiSanpham; ?>';
    api=JSON.parse(api);
    phantrang='<?php echo $phantrang; ?>';
    phantrang=JSON.parse(phantrang);
  
</script> 

@endsection

@section('js')
<script src="{{asset('js/sanpham.js')}}">
    
</script>
@endsection




