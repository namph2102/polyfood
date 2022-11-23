@extends('layoutMaster.layoutProduct')
@section('title')
  Thanh Toán
@endsection
@section('css')
<link rel="stylesheet" href="../css/paymoney.css" >
@endsection
@section('directional')
    <a>Thanh Toán</a>
@endsection
@section('container')
<style>
    aside .box_message{
        margin: 4px 0;
    }
</style>
<div class="product_items_special">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container_paymoney">
        <div class="grid wide">
            <form class="needs-validation" id="mySelect" name="frmthanhtoan" onsubmit=" return myFunction()" method="POST" action="{{route('product.donhang')}}" >
                @csrf
                <input type="hidden" name="username" value="{{$username}}">

                <div class="text-center">
                    <h2>Lưu ý</h2>
                    <em class="lead" style="font-size: 1.4rem;">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.
                    </em>
                </div>

                <div class="row container_paymoney_ifm">
                    <div class="l-8 m-8 c-12">
                        <div class="container_paymoney_ifm_header">
                            <h4 class="container_paymoney_ifm_header-head">Thông tin khách hàng</h4>
                            <h5 class="container_paymoney_ifm_header-body">Bạn đã đăng ký chưa? Bấm vào đây để
                                <strong><a href="{{route('account.regester')}}">Đăng Kí</a></strong></h5>
                        </div>
                        <aside class="row">
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Họ tên</legend>
                                    <input required type="text" placeholder="Nhập họ và tên...." class="form-control" name="kh_ten" id="kh_ten"
                                        value="{{$fullname}}">
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>
                            <div class="box_message l-7 m-7 c-6">
                                <fieldset class="">
                                    <legend>Email</legend>
                                    <input required type="email" placeholder="Nhập email...." class="form-control" name="kh_email" id="kh_email"
                                        value="{{$email}}">
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>
                            <div class="box_message l-4 m-4 c-6 ">
                                <fieldset class="">
                                    <legend>Số Điện Thoại</legend>
                                    <input required type="text" placeholder="Nhập số điện thoại...." class="form-control" name="kh_phone" id="kh_phone"
                                        value="{{$phone=='0'?'':'0'.$phone}}">
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>địa chỉ</legend>
                                    <input required type="text" placeholder="Nhập số nhà đường...." class="form-control position_diachi" name="kh_address" id="kh_address"
                                        value="{{$thon}}">
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>  
                                                      
                            <div class="l-4 m-4 c-6 ">
                                <fieldset class="">
                                    <legend>Tỉnh /Thành phố</legend>
                                    <select required name="" value="{{!empty($tinh)?$tinh:''}}" id="address_tinh">
                                        <option value="{{!empty($tinh)?$tinh:''}}">{{!empty($tinh)?$tinh:''}}</option>
                                    </select>
                                    <input type="hidden" class="position_tinh" name="kh_address_tinh" value="{{!empty($tinh)?$tinh:''}}">      
                                </fieldset>
                                <span class="meassage"></span>
                            </div>
                            <div class="l-4 m-4 c-6 box_padding_aside">
                                <fieldset class="">
                                    <legend>Huyện /Quận</legend>
                                    <select required name="" value="{{!empty($huyen)?$huyen:''}}" id="address_huyen">
                                        <option value="{{!empty($huyen)?$huyen:''}}">{{!empty($huyen)?$huyen:'Huyện /Quận'}}</option>
                
                                    </select> 
                                    <input type="hidden"class="position_huyen" name="kh_address_huyen" value="{{!empty($huyen)?$huyen:''}}">                                                                         
                                </fieldset>
                                <span class="meassage"></span>
                            </div>
                            <div class="l-4 m-4 c-6 ">
                                <fieldset class="">
                                    <legend>Xã /Thị Trấn</legend>
                                    <select required name="" value="{{!empty($xa)?$xa:''}}" id="address_xa">
                                        <option value="{{!empty($xa)?$xa:''}}">{{!empty($xa)?$xa:'Xã /Thị Trấn'}}</option>
                                      
                                    </select>
                                    <input type="hidden"class="position_xa" name="kh_address_xa" value="{{!empty($xa)?$xa:''}}">
                                </fieldset>
                                <span class="meassage"></span>
                            </div>
                            <!-- Tọa độ vị trí , nơi ở của customer-->
                            <input type="hidden" class="position_latitude" name="latitude" value="0" >   
                            <input type="hidden" class="position_longitude" name="longitude" value="0"> 
                            <input type="hidden" class="total_ship" name="total_ship" value="0" >   
                            <input type="hidden" class="total_vat" name="total_vat" value="0"> 
                            <input type="hidden" class="total_paymoney" name="total_paymoney" value="0">
                             <!--end  Tọa độ vị trí , nơi ở của customer-->
                        </aside>
                        <article>
                            <h4 class="container_paymoney_ifm_header-head">Hình thức thanh toán</h4>
                            <div class="l-12 m-12 c-12 ">
                                <div class="custom-control custom-radio">
                                    <input id="httt-1" name="httt_ma" class="httt_ma httt_ma_tienmat"  type="radio" class="custom-control-input"
                                        required="" value="Thanh Toán Tại Nhà">
                                    <label class="custom-control-label"  for="httt-1">Thanh toán khi nhận hàng</label>
                                    <div class="container_ifm_howtopay hidden">
                                        <span>
                                            <Address> Địa Chỉ: {{$thon}} {{','. $xa}} {{','. $huyen}} {{','. $tinh}}</Address></span>
                                            
                                    </div>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="httt-2" name="httt_ma" class="httt_ma"   type="radio" class="custom-control-input"
                                        required="" value="Chuyển Khoảng">
                                    <label class="custom-control-label" for="httt-2">Chuyển khoản ngân hàng</label>
                                    <div class="container_ifm_howtopay hidden ">
                                        <span>Ngân hàng Aribank Chi nhánh Đại Dương</span><br>
                                        <span>Tên: Phạm Hoài Nam</span><br>
                                        <span>STK: 5009205143321</span><br>
                                        <span>Nội Dung Chuyển Khoảng: <span class="maChuyenKhoang"></span></span>
                                    </div>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="httt-3" name="httt_ma" class="httt_ma" type="radio" class="custom-control-input"
                                        required="" value="Ví coin">
                                    <label class="custom-control-label" for="httt-3">Ví FreshCoin</label>
                                    <div class="container_ifm_howtopay ship_code_chose hidden">
                                       <span class="address_ship">Số dư</span>:
                                       <span><em class="price_ship_address">0 đ</em></span>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <button class="btn btn-success" type="submit" id="dathang">Đặt hàng</button>
                        </article>
                    </div>


                    <div class="l-4 m-4 c-12 subprice-price">
                        <h4 class="subprice-price_container">
                            <div class="text-muted container_paymoney_ifm_header-head">Giỏ hàng</div>
                            <div class="badge badge-secondary badge-pill">2</div>
                        </h4>
                        <ul class="list-group ul_container">

                            {{-- <input type="hidden" name="donhang[1]" value="2">
                            <li class="list-group-item">
                                <div class="l-8 m-6 c-6">
                                    <h6 >Apple Ipad 4 Wifi 16GB adas asdasd as asd asdasasdasd</h6>
                                    <small>11800000 x 2</small>
                                </div>
                                <span class="total_item_paymoney">23600000</span>
                            </li> --}}
                        </ul>


                        <div class="input-group_container">
                            <div class="input-group_total_money-pay">                                
                                <div class="input-group_total_money-pay_head subtotal_code">
                                        Tạm Tính
                                </div>
                               <div class="input-group_total_money-pay-body subtotal_code_value">
                                  0 đ
                               </div>
                            </div>
                            <div class="input-group_total_money-pay">                                
                                <div class="input-group_total_money-pay_head ship_code">
                                        Chi phí ship
                                </div>
                               <div class="input-group_total_money-pay-body ship_code_value">
                                  0 đ
                               </div>
                            </div>
                            <div class="input-group_total_money-pay">                                
                                <div class="input-group_total_money-pay_head vat_code">
                                    VAT
                                </div>
                               <div class="input-group_total_money-pay-body vat_value">
                                     10 %
                               </div>
                            </div>
                            <div class="input-group_total_money-pay">
                                <div class="input-group_total_money-pay_head ">
                                    Thành Tiền
                                </div>
                               <div class="input-group_total_money-pay-body total_value">
                                   125,123 đ
                               </div>
                            </div>
                
                           
                        </div>
                        <div class="input-group_total_money-pay row">
                            <button type="submit" id="dathang_fast" class="btn btn-danger l-4 m-5 c-12">Đặt hàng</button>
                            <button type="submit" class="btn btn-teal l-6 m-8 c-12"><a href="{{route('product.giohang')}}">Xem giỏ hàng</a></button>
                           
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End block content -->
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
<script src="../js/paymoney.js"></script>
@endsection
