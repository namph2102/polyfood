@extends('profile.layoutprofile')
@section('directional')
<a href="">Account</a><i class="fa-solid fa-angle-right"></i> <a href="">Thay đổi mật khẩu</a>
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
    <h1 class="profile_container_body-head">ĐỔI MẬT KHẨU</h1>
    <p class="profile_container_body-head-des">Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí</p>
    <form id="form_profile" action="{{route('account.changepassword')}}" onsubmit="return validate_profile();" method="POST">
        @csrf
        <input type="hidden" name="username" value="{{!empty($user)?$user[0]->username:''}}">
        <label for="passwordold" title="Nhập mật khẩu cũ">
            <h2>Mật khẩu cũ *</h2>
            <div class="box_input">
                <input type="password" required name="passwordold"   id="passwordold"   value="">
            </div>
        </label>
        <label for="password" title="Nhập mật khẩu muốn thay thế">
            <h2>Mật khẩu mới *</h2>
            <div class="box_input">
                <input type="password" required  minlength="8" name="password" id="password" value=""> 
                
            </div>
        </label>
        <label for="passwordr" title="Nhập lại mật khẩu muốn thay thế">
            <h2>Xác nhận mật khẩu *</h2>
            <div class="box_input">
                <input type="password" required name="passwordr" id="passwordr" value="">           
            </div>
        </label>
        <button  onsubmit="validate_submit()" class="btn btn-primary btn_submit">Đặt lại mật khẩu</button>
    </form>
    
</div>

@endsection
@section('jsvip')   

     <script>
        
        loading('Đang chờ phẩn hồi....!');
            validate_profile();
            function validate_profile(){
                if($('#password').value!== $('#passwordr').value){
                    modal('Đổi mật khẩu','Thông báo','Mật khẩu không trùng khớp',1000);
                    return false;
                }
                return true;
            }
            
        </script>

@endsection