@extends('layoutMaster.layoutProduct')
@section('title')
Liên Hệ
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/paymoney.css')}}">
<link rel="stylesheet" href="{{asset('css/lienhe.css')}}">

@endsection
@section('directional')
    <a> Đăng Ký Thành Viên Mới</a>
@endsection
@section('container')
<style>
.box_message i{
    cursor: pointer;
    font-size: 1.8rem;
}

</style>
<div class="product_items_special">
    <div class="container_paymoney">
        <div class="grid wide">
            <form class="needs-validation" method="POST"  name="frmthanhtoan" onsubmit="return validator_Form_pay()">
                @csrf
               
                    @if(!empty($username))
                          <h2 class="alert-message alert-danger" class="l-6 m-6 c-12"> Tài Khoảng "{{$username}}" đã tồn tại</h2>
                    @endif
    
                <div class="row container_paymoney_ifm">
                    <div class="l-6 m-6 c-12">
                        <div class="container_paymoney_ifm_header">
                            <h1 class="container_paymoney_ifm_header-head">ĐĂNG Ký TÀI KHOẢN</h1>
                            <h5 class="container_paymoney_ifm_header-body">Bạn đã có tài khoảng chưa? Bấm vào đây để
                                <strong style="font-size: 1.6rem;"><a href="{{route('account.login')}}"> Đăng Nhập</a></strong>
                            </h5>
                        </div>
                        <aside class="row">
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Họ và Tên</legend>
                                   <input type="text"  minlength="5" required placeholder="Nhập họ và tên ..." type="text" class="form-control" name="kh_fullname" id="kh_fullname" value="@if(!empty($fullname)){{$fullname}}@endif">
                                        
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>  
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Tài Khoảng</legend>
                                    <input required type="text" placeholder="Nhập username..."
                                        class="form-control" name="kh_username" minlength="5" id="kh_username" value="">
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Email</legend>
                                    <input required type="email" placeholder="Nhập email..."
                                        class="form-control" name="kh_email" minlength="6" id="kh_email" value="@if(!empty($email)){{$email}}@endif"> 
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Mật Khẩu</legend>
                                    <input required type="password" minlength="6" placeholder="Nhập password...." class="form-control"
                                        name="kh_password" id="kh_password" value=""><i class="fa-regular fa-eye-slash view_password"></i>
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div> 
                            <div class="box_message box_message_repassword  l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Mật lại Khẩu</legend>
                                    <input required type="password" placeholder="Nhập lại password...." class="form-control"
                                        name="kh_repassword" id="kh_repassword" value=""><i class="fa-regular fa-eye-slash view_password"></i>
                                </fieldset>
                                <span class="meassage" for="kh_ten"></span>
                            </div>     
                                        
                        </aside>
                       
                            <button class="btn btn-success l-3" onclick="validator_Form_pay()" type="submit" name="btnDatHang">Đăng ký</button>
                         
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
                                        <a href="mailto:namph2102@gmail.com">polufreshh@gmail.com

                                        </a>
                                    </div>
                                </div>																			
                                
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
<script>
loading('Chờ chút nhé ...');
validator_Form_pay();
function error_input(element, classerror, meassage = '') {
    element.querySelector(classerror).classList.add('error');
    element.querySelector('.meassage').innerText = meassage;
}
function remove_error(element, classerror) {
    element.querySelector(classerror).classList.remove('error');
    element.querySelector('.meassage').innerText = '';
}

function validator_Form_pay() {
    let list_box_message = $$('.box_message');
    list_box_message.forEach(item => {
    });
    list_box_message.forEach(item => {
        let input_item = item.querySelector('input');
        input_item.addEventListener('blur', function (e) {
            if (!e.target.value) {
                error_input(item, 'fieldset', 'Trường này không được để trống!');
            }
            else {
                remove_error(item, 'fieldset');
            }
        });
        input_item.addEventListener('input', function (e) {
            remove_error(item, 'fieldset');
        });
    });
    let kh_password=$('#kh_password');
    let kh_repassword=$('#kh_repassword');
    if(kh_password.value && kh_repassword.value){
        if(kh_password.value===kh_repassword.value){
            loading('Xử Lý Dữ Liệu !');
            return true;
        }
        else{
            error_input($('.box_message_repassword'),'fieldset','Mật khẩu không trùng khớp');
        }
    }
    let view_passwords=document.querySelectorAll('.view_password');
    for (let view of view_passwords ){
         view.onclick=function(){
             console.log();
             let input_view=this.closest('.box_message').querySelector('input');
             if(input_view.getAttribute('type')=='text'){
                 this.className="";
                 this.classList.add('fa-regular','fa-eye-slash');
                input_view.setAttribute('type', 'password');
             }else{
                this.className="";
                 this.classList.add('fa-regular','fa-eye');
                input_view.setAttribute('type', 'text');
             }
            
         }
    }
  
    return false;
}

</script>
@endsection
