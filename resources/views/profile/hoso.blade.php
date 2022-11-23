@extends('profile.layoutprofile')
@section('directional')
<a href="">Account</a><i class="fa-solid fa-angle-right"></i> <a href="">Hồ sơ</a>
@endsection
@section('container')
{{--  Xuất ra Thông Báo --}}
@section('message')
@if(!empty($message))
<h2 style="color: rgba(255,255,255,0.87);" class="alert-teal alert-message ">{{$message}}  </h2>
@endif
@endsection
{{--  end Xuất ra Thông Báo --}}
<div class="profile_container_body l-6 m-6 c-12">
    <h1 class="profile_container_body-head">Hồ Sơ Của Tôi</h1>
    <p class="profile_container_body-head-des">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
    <form id="form_profile" action="{{route('account.profile')}}" onsubmit="return validate_profile();" method="POST">
        @csrf
        <label for="username">
            <h2>Tên Đăng Nhập</h2>
            <div class="box_input">
                <input type="text" name="username" readonly value="@php echo (!empty($user))?$user[0]->username:''@endphp">
            </div>
        </label>

        <label for="fullname">
            <h2>Họ và tên</h2>
            <div class="box_input">
                <input type="text" required readonly name="fullname" id="fullname" value="@php echo (!empty($user))?$user[0]->fullname:''@endphp"> 
                <button id="btn_update_fullname" class="btn btn-success">Edit</button>
            </div>
        </label>

        <label for="email">
            <h2>Email</h2>
            <div class="box_input">
                <input type="email" required readonly name="email" id="email" value="@php echo (!empty($user))?$user[0]->email:''@endphp">
                <button id="btn_update_email" class="btn btn-success">Edit</button>
            </div>
        </label>

        <label for="phone">
            <h2>Số Điện thoại</h2>
            <div class="box_input">
                <input type="text" required readonly name="phone" id="phone" value="@php echo (!empty($user))?(!empty($user[0]->phone)?'0'.$user[0]->phone:''):''@endphp"><button id="btn_update_phone" class="btn btn-success">Edit</button>
            </div>
        </label>
        <button onclick="formsubmit()"  disabled class="btn btn-primary btn_submit">Lưu cập nhập</button>
    </form>
    
</div>
<form method="POST" enctype="multipart/form-data" action="{{route('account.uploadfile')}}" class="profile_container_right l-3 m-6 c-12">
    @csrf
    <h2>Thay đổi Avata</h2>
    <input type="text" hidden name="username" value="@php echo (!empty($user))?$user[0]->username:''@endphp">
    <div class="profile_container_right_content">
        <img id="upload" src="@php echo (!empty($user))?$user[0]->avata:''@endphp" alt="">
        
    </div>
    <label for="UpLoadFile" style="display: block"  class="container_UpLoadFile">
        Chọn ảnh   
    </label>
    <input  hidden type="file" name="upLoadFile" id="UpLoadFile" required="true" >
    <button style="margin: 12px 0;" class="btn btn-danger">Thay đổi</button>
</form>
@endsection
@section('jsvip')

     <script>
        loading('Đang chờ phẩn hồi....!');
            validate_profile();
            function update(Element){
                Element.removeAttribute('readonly');
                Element.focus();
                $('.btn_submit').removeAttribute('disabled');
            }
            function validate_profile(){
              
                let btn_update_phone=$('#btn_update_phone');
                let btn_update_email=$('#btn_update_email');
                let btn_update_fullname=$('#btn_update_fullname');
                btn_update_phone.onclick=function(){
                    update($('#phone'));
                }
                btn_update_email.onclick=function(){
                    update($('#email'));
                }
                btn_update_fullname.onclick=function(){
                    update($('#fullname'));
                }          
                return false;
            }
            let phone=$('#phone').value;
             let email= $('#email').value;
             let fullname=$('#fullname').value;
            function formsubmit(){
                if($('#fullname').value && $('#phone').value && $('#email').value){
                    if($('#phone').value !=phone ||$('#email').value!=email || $('#fullname').value!=fullname){
                        $('#form_profile').submit();
                    }
                    else{
                       
                    }
                }
               
                return false;
            }
            let myPic=document.querySelector('#UpLoadFile');
            myPic.addEventListener('change',function(e){
                document.querySelector('#upload').src=URL.createObjectURL(myPic.files[0]);
                console.log(myPic.files)
            });
        
        </script>

@endsection