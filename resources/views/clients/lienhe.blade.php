@extends('layoutMaster.layoutProduct')
@section('title')
Liên Hệ
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/paymoney.css')}}">
<link rel="stylesheet" href="{{asset('css/lienhe.css')}}">

@endsection
@section('directional')
    <a>Liên Hệ</a>
@endsection
@section('container')
@php
$auther='';
if(!empty($_COOKIE["IDUSER"])){
    $auther=DB::table('users')->where('username',$_COOKIE['IDUSER'])->get();
 if(count($auther)==1){
 $auther=$auther;
 }
 else{
     $auther='0';
    }
  }
@endphp
<div class="product_items_special">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container_paymoney">
        <div class="grid wide">
            @if(!empty($error))
            <h2 class="alert-message alert-danger l-6 m-6 c-12" > {{$error}} </h2>
         @endif
         @if(!empty($message))
        <h2 class="alert-message alert-success l-6 m-6 c-12" > {{$message}} </h2>
            @endif
            <form class="needs-validation" name="frmthanhtoan"  action="{{route('product.lienhe')}}" method="POST">
                @csrf
                <input type="hidden" name="kh_idTaiKhoang" value="@php echo (!empty($auther) )?$auther[0]->id:0; @endphp">
                <div class="row container_paymoney_ifm">
                    <div class="l-6 m-6 c-12">
                        <div class="container_paymoney_ifm_header">
                            <h4 class="container_paymoney_ifm_header-head">Gửi tin nhắn cho chúng tôi</h4>
                            <h5 class="container_paymoney_ifm_header-body">Bạn đã đăng ký chưa? Bấm vào đây để
                                <strong><a href="k#">Đăng Kí</a></strong>
                            </h5>
                        </div>
                        <aside class="row">
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Họ tên</legend>
                                    <input required type="text" value="@php echo (!empty($auther))?$auther[0]->fullname:''; @endphp" placeholder="Nhập họ và tên...."
                                        class="form-control" name="kh_ten" id="kh_ten" value="">
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Email</legend>
                                    <input required type="email" placeholder="Nhập email...." value="@php echo (!empty($auther))?$auther[0]->email:''; @endphp" class="form-control"
                                        name="kh_email" id="kh_email" value="">
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Số Điện Thoại</legend>
                                    <input required type="text" placeholder="Nhập số điện thoại...."
                                      value="@php echo (!empty($auther) && !empty($auther[0]->phone) )?$auther[0]->phone:''; @endphp"  minlength="9"  class="form-control" name="kh_phone" id="kh_phone" value="">
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>
                            <div class="textarea_container l-12 m-12 c-12 ">
                                <fieldset class="">
                                    <legend>Nội Dung Liên Hệ</legend>
                                    <textarea required name="content" id="" rows="6" placeholder="Nội dung liên hệ...."></textarea>
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>


                        </aside>
                        <button class="btn btn-success l-3" type="submit" name="btnDatHang">Gửi liên hệ</button>
                    </div>

                    <div class="l-6 m-6 c-0 contact">
                                               
                            <div class="item  lienhe_container">		
                                <div class="lienhe_container_item">
                                    <i class="fa fa-map-marker"></i> 
                                    <div class="info">
                                        <label>Địa chỉ liên hệ</label>
                                        200/34 C12 Tô Ký, Phường Đông Hưng Thuận, Quận 12, Tp.HCM
                                    </div>
                                </div>
                                
                                <div class="lienhe_container_item">
                                    <i class="fa fa-phone"></i> 
                                    <div class="info">
                                        <label>Số điện thoại</label>
                                        <a href="tel:0877669990">0877 669 990</a>
                                        <p>Thứ 2 - Chủ nhật: 9:00 - 18:00</p>
                                    </div>
                                </div>
                                
                                                            
                                <div class="lienhe_container_item"><i class="fa fa-envelope"></i> 
                                    <div class="info">
                                        <label>Email</label>
                                        <a href="mailto:polyfreshh@gmail.com">polyfresh@gmail.com
                                        </a>
                                    </div>
                                </div>																			
                                
                            </div>

                    </div>
                </div>
            </form>
        </div>

    </div>
    <div style="margin:20px 12px;">
        <iframe style="width:100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15674.135174448746!2d106.64092014682515!3d10.84694525159291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529a2a4989fc9%3A0xda4b1890aef14087!2zUmF1IEPhu6cgUXXhuqMtVHLDoWkgQ8OieSBOaOG6rXAgS2jhuql1IEdPTEQgRlJFU0ggR8OyIFbhuqVw!5e0!3m2!1svi!2s!4v1663568789118!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<script src="../js/lienhe.js"></script>
@endsection
