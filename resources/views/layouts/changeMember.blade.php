@extends('layoutAdmin.layoutAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('admincss/chart.css')}}">
@endsection
@section('title')
    Thay đổi thông tin User
@endsection
@section('cssinline')
<style>
     :root {
    --bg: #1E1E2E;
    --text-color: rgba(255,255,255,0.97);
    --head-bg: #303259;
    --bg-input: #221d52;
    --bg-sidebar: antiquewhite;
    --text-sidebar: #81747f;
    --text-sidebahv: #FFFF00;
}

body {
    background-color: var(--bg);
}
.form_create_table tr{
    height: 42px;
}
.container_content-comback i {
    font-size: 36px;
    color: white;
    border-radius: 50px;
    margin-top: 12px;
}

.container_content-comback i:hover {
    color: #f5c85e;
}

.container_content-des {
    font-size: 16px;
    margin: 8px 0;

}

.container_home {
    height: 52px;
    padding: 0 32px;

}

.home_content .home {
    color: var(--text-color);
    padding: 0 32px;
}

.forn_create_head {
    font-size: 14px;
    text-align: right;
    padding-right: 32px;
    color: var(--text-color);
}

.form_create_profile input {
    width: 320px;
    padding: 8px 12px;
    font-size: 14px;
    border: none;
    background-color: var(--bg-input);
    border-radius: 4px;
    color: rgba(255, 255, 255, 0.97);
    box-shadow: 1px 1px 4px #211d42;
}

.form_create_profile input:focus {
    outline: 1px solid rgb(197, 60, 128);
}

.form_create_profile section {
    padding: 4px 12px;
    width: 300px;
}

.container_footer {
    margin-top: 40px;
    padding: 0px 24px;
    border: 2px solid #ad7a7a;
    box-shadow: 1px 0px 4px 3px #a59a5e;
    padding-left: 4px;
    display: flex;
    align-items: center;
}

.container_footer button {
    padding: 8px 16px;
    border: none;
    outline: none;
    background-color: #dbae43;
    color: var(--text-color);
    font-size: 16px;
    font-weight: bold;
    border-radius: 4px;
    cursor: pointer;
    margin: 12px;


}

.container_footer button:hover {
    opacity: 0.9;
}
form .form_create_table tr:hover{
    background-color:transparent;
}
</style>
@endsection
@section('directory')
> <a href="#">User Prolife</a> > <a href="#">Change Member</a>
@endsection

@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection
@section('adminContainer')
<div class="container_content">
    <h2 class="container_content-name">Change Imformation User</h2>
    <h4 class="container_content-des">
        Email & password    
    </h4>
    <form class="form_create_profile" onsubmit="return validate()" method="POST"  action="{{route('admin.changeAccount')}}">
        @csrf
        <table class="form_create_table" >  
            <tr>
                <td class="forn_create_head">Username *</td>
                <td><input type="text" name="username" readonly id="username" value="{{$users->username}}"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Full Name *</td>
                <td><input type="text" name="fullname" id="fullname" value="{{$users->fullname}}"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Phone *</td>
                <td><input type="phone" name="phone" id="phone" value="{{empty($users->phone)?"":'0'.$users->phone}}"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Email *</td>
                <td><input type="email" name="email" id="email" value="{{$users->email}}"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Password *</td>
                <td><input type="text" name="password" id="password"></td>
            </tr>
            
           
        </table>
        <div class="container_footer">
            <button type="submit" onclick="validate()"  value="2">Change User</button>
            <button type="button"><a href="{{route('admin.account')}}">Come Back</a></button>
        </div>
       
    </form>
</div>
@endsection 
@section('js')
<script>
    function validate(){
        if($('#password').value && $('#fullname').value  && $('#email').value){
            return true;
        }
        else{
            alert('Điền thiếu thông tin kìa Admin');
        }
        
        return false;
}
</script>
@endsection
