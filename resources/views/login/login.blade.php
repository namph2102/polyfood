@extends('layoutMaster.layoutProduct')
@section('title')
Đăng Nhập
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/paymoney.css')}}">
<link rel="stylesheet" href="{{asset('css/lienhe.css')}}">

@endsection
<style>
    .modal.hide{
    display: none; 
    opacity: 0;
    
}
.modal.hidden{
    display: none; 
    opacity: 0;
}
</style>
@section('directional')
    <a> Đăng nhập tài khoản</a>
@endsection
@section('container')
<style>

</style>
<div class="product_items_special">

    <div class="container_paymoney">
        <div class="grid wide">
            <form class="needs-validation" method="POST" name="frmthanhtoan" onsubmit="return validator_Form_pay()">
                @csrf
                @if(!empty($error))
                          <h2 class="alert-message alert-danger l-6 m-6 c-12" > {{$error}} </h2>
                    @endif
                    
            
                <div class="row container_paymoney_ifm">
                    <div class="l-6 m-6 c-12">
                        <div class="container_paymoney_ifm_header">
                            <h1 class="container_paymoney_ifm_header-head">ĐĂNG NHẬP TÀI KHOẢN</h1>
                            <div class="box_loggin-container" style="margin: 12px 0;">
                              <a href="#!"  class="btn_login">  <img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                               <a href="#!" class="btn_login"> <img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                            </div>
                            <h5 class="container_paymoney_ifm_header-body">Bạn đã đăng ký chưa? Bấm vào đây để
                                <strong style="font-size: 1.6rem;"><a href="{{route('account.regester')}}"> Đăng Kí</a></strong>
                            </h5>
                        </div>
                        <aside class="row">
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Tài Khoảng</legend>
                                    <input required type="text" placeholder="Nhập username..."
                                        class="form-control" name="kh_username" id="kh_username" value="@if(!empty($username)){{$username}}@endif">
                                </fieldset>
                                <span class="meassage"></span>
                            </div>
                            <div class="box_message l-12 m-12 c-12">
                                <fieldset class="">
                                    <legend>Mật Khẩu</legend>
                                    <input required type="password" placeholder="Nhập password...." class="form-control"
                                        name="kh_password" id="kh_password" value=""><i class="fa-regular fa-eye-slash view_password"></i>
                                </fieldset>
                                <span class="meassage"></span>
                            </div> 
                            <div class="box_capcha l-12 m-12 c-12">
                                <div class="capcha">
                                    54412s
                                </div>   
                                <input style="padding: 8px 4px;font-size:1.4rem;margin:8px 0;" type="text" class="capcha_put" placeholder="Nhập mã capcha ...">
                                <br>
                                <code style="font-size: 1.4rem;" class="meassage"> </code>
                            </div>                            
                        </aside>
                        <button class="btn btn-success l-3" type="submit" name="btnDatHang">Đăng Nhập</button>
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
                                        <a href="mailto:polyfreshh@gmail.com">polyfreshh@gmail.com

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
        
        validator_Form_pay();
function error_input(element, classerror, meassage = '') {
    element.querySelector(classerror).classList.add('error');
    element.querySelector('.meassage').innerText = meassage;
}
function remove_error(element, classerror) {
    element.querySelector(classerror).classList.remove('error');
    element.querySelector('.meassage').innerText = '';
}
let btn_logins=document.querySelectorAll('.btn_login');
btn_logins.forEach(btn=>{
    btn.onclick=function(){
        modal('Thông báo','Hệ thống login','Hiện tại chúng tôi chưa phát tiển chức năng này',2000);
    }
})
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
    if (XacthucCapcha()){
        if(kh_username.value && kh_username.value){ 
        loading('Chờ chút nhé ...');
        return true;
    }
    }

    let view_passwords=document.querySelectorAll('.view_password');
    for (let view of view_passwords ){
         view.onclick=function(){

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
let capcha=$('.capcha');
capcha.innerText=makeid(6);
function XacthucCapcha(){
    let capcha_put=$('.capcha_put')
    if(capcha_put.value){
        if(capcha_put.value.trim().toLowerCase()==capcha.innerText.toLowerCase()){
            $('.box_capcha .meassage').innerText="";
            return true;
        }
        else{
            $('.box_capcha .meassage').innerText="Mã Capcha không Chính Xác";
            setTimeout(() => {
                capcha.innerText=makeid(6);
            }, 1500);
           
            return false;
        }
    }
    
    return false;
}



</script>
@endsection
