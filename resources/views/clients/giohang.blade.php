@extends('layoutMaster.layoutProduct')
@section('title')
Giỏ Hàng
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/bag.css')}}">
@endsection
@section('directional')
    <a>Giỏ Hàng</a>
@endsection
@section('container')
<div class="product_items_special">
    <div class="grid wide">
       <div class="display_flex_wrap">
        <table class="table_product_list_cart l-9 m-9 c-12">
            <caption>Giỏ hàng</caption>
            <thead>
                <tr class="table_heading">
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
            </thead>
       
            <tbody class="cart_bag_list_item">
                 <tr>
                    <td class="table_product_cart_item">
                        <a class="product_cart_item_img" href="#">
                            <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                alt="" />
                            <div class="product_box_item_ifm">
                                <div class="cart_box-des-name">
                                    Bưởi siêu to khổng lồ ngon nha haha haha haha adas adasd
                                </div>
                                <div class="product_box_item_name-origin">
                                    Hải sản
                                </div>
                            </div>
                        </a>
                    </td>
                    <td class="product_box_item_ifm-price">
                        120,015 đ
                    </td>
                    <td class="product_box_item_ifm-btn_controller">
                        <button class="btn_ifm_bag"><i class="fa-solid fa-minus"></i></button> <span
                            class="product_box_item_ifm-amount">1</span> <button class="btn_ifm_bag"><i
                                class="fa-solid fa-plus"></i></button>
                    </td>
                    <td class="product_box_item_ifm-total">
                        125,125 đ
                    </td>
                    <td class="product_box_item_ifm-close">
                        <button><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr> 
            </tbody>
        </table>

        <div class="box_bill_pay l-3 m-3 c-12">
            <div class="box_bill_pay_container">
                <div class="box_bill_pay-head ">đơn hàng của bạn</div>
                <div class="box_bill_pay-body">
                    <div class="box_bill_pay-body_flex">
                        <span class="box_bill_pay-subtotal">Tổng phụ</span><span class="box_bill_pay-subtotal_coin">125,125 đ</span>
                    </div>
                    <div class="box_bill_pay-body_flex">
                        <span class="box_bill_pay_vat">VAT</span><span class="box_bill_pay-subtotal_vat">5 %</span>
                    </div>
                </div>
                <div class="box_bill_pay-body_total">
                    <ul>
                        <li>Phí vận chuyển sẽ được tính ở trang thanh toán.</li>
                        <li>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</li>
                    </ul>
                    <div class="box_bill_pay-body_flex margin_top_bottom">
                        <span class="box_bill_pay-total">Tạm Tính</span><span class="box_bill_pay-total_coin">125,125 đ</span>
                    </div>
                </div>
                <button class="btn btn-danger"><a href="{{route('product.thanhtoan')}}">Đặt hàng</a></button>
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

    <script src="../js/bag.js"></script>
@endsection
