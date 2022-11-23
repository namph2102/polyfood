@extends('layoutMaster.layoutProduct')
@section('title')
    Sản Phẩm
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/tintuc.css')}}">
@endsection
@section('directional')
    <a>Tin Tức</a>
@endsection
@section('container')
<div class="product_items_special">
    <div class="grid wide">
        <div class="product_items_directional l-12 c-12 m-12">
            <div class="direce_page_heading">
                <h1>Tin Tức</h1>
            </div>
        </div>
        <div class="product_list_container">
            <div class="product_list_menu_direction l-3 m-4 c-0">
                <div class="catetory_menu">
                    <div class="catetory_menu_head">
                        <h2>Danh mục sản phẩm</h2>
                    </div>
                    <ul class="catetory_menu_body">
                        <li><a href="#">Rau củ</a></li>
                        <li><a href="#">Hải sản</a></li>
                        <li><a href="#">Trái Cây</a></li>
                        <li><a href="#">Đồ uống</a></li>
                        <li><a href="#">Thịt Trứng</a></li>
                    </ul>
                </div>

                <div class="catetory_menu">
                    <div class="catetory_menu_head">
                        <h2>Tin Tức Nổi Bật</h2>
                    </div>
                    <ul class="catetory_menu_body catetory_menu_body_list_top">
                        <li><a href="{{route('product.sanphamchitiet',['id'=>'MHANA','slug'=>'NASS'])}}">
                                <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                    alt="">
                                <div class="catetory_menu_body_top_item">
                                    <p class="tintuc_name_hot">
                                        Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                        Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                    </p>
                                    <div class="top_item_price">
                                        23/15/2022
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#">
                            <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                alt="">
                            <div class="catetory_menu_body_top_item">
                                <p class="tintuc_name_hot">
                                    Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                    Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                </p>
                                <div class="top_item_price">
                                    23/15/2022
                                </div>
                            </div>
                        </a>
                    </li>
                    <li><a href="#">
                        <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                            alt="">
                        <div class="catetory_menu_body_top_item">
                            <p class="tintuc_name_hot">
                                Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                            </p>
                            <div class="top_item_price">
                                23/15/2022
                            </div>
                        </div>
                    </a>
                </li>
                    </ul>
                </div>

            </div>
            <div class=" l-9 m-8 c-12">
              <h2 class="tintuc_heading">Tin tức <span> ( Có tất cả 8 bài viết )</span></h2>
                <ul class="catetory_menu_body catetory_menu_body_list_top tintuc_item_container">
                    <li><a href="#">
                            <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                alt="" class="l-3 m-4 c-5"/>
                            <div class="catetory_menu_body_top_item l-9 m-8 c-7">
                                <p class="tintuc_name_hot_menu">
                                    Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                    Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                </p>
                                
                                <div class="top_item_price">
                                    23/15/2022
                                </div>
                                <p class="tintuc_name_hot_des">
                                    Tự trồng rau trong thùng xốp tại nhà là sự lựa chọn của rất nhiều gia đình trong thành phố bởi phương pháp trồng rau đơn giản, dễ trồng, dễ quản lý, an toàn và tiện lợi. Nhưng người...
                                </p>
                            </div>
                        </a>
                    </li>
                    <li><a href="#">
                        <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                            alt="" class="l-3 m-4 c-5"/>
                        <div class="catetory_menu_body_top_item l-9 m-8 c-7">
                            <p class="tintuc_name_hot_menu">
                                Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                               
                            </p>
                            
                            <div class="top_item_price">
                                23/15/2022
                            </div>
                            <p class="tintuc_name_hot_des">
                                Tự trồng rau trong thùng xốp tại nhà là sự lựa chọn của rất nhiều gia đình trong thành phố bởi phương pháp trồng rau đơn giản, dễ trồng, dễ quản lý, an toàn và tiện lợi. Nhưng người...
                            </p>
                        </div>
                    </a>
                </li>
            
                </ul>
                <div class="page_list l-12 m-12 c-12 ">
                   <div class="page_list_container">
                    <a class="ative" href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                   <a href="#"> <i class="fa fa-angle-right"></i></a>
                   </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@php
$listapiSanpham=[];
foreach($apiSanpham as $item) {
$listapiSanpham[]=[
'id'=> $item->maSanPham,
'img'=> $item->imageSanPham,
'name'=> $item->tenSanPham,
'price_sale'=> $item->priceSale,
'price_orgin'=> $item->priceOrigin,
'des'=> $item->maLoaiHang,
'status'=> ($item->soLuong>0)?1:0,
'kind'=> $item->maLoaiHang,
];} 
$apiSanpham=json_encode($listapiSanpham);
@endphp
@section('api')
<script>
    api='<?php echo $apiSanpham; ?>';
    api=JSON.parse(api);
</script> 
@endsection
@section('js')

@endsection
