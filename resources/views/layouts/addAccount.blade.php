@extends('layoutAdmin.layoutAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('admincss/add.css')}}">
@endsection
@section('title')
Thêm tài khoảng
@endsection

@section('cssinline')
    <style>
        .form_create_table tr:hover {
             background-color: transparent;
        }
        .form_create_table tr{
            margin: 8px 0;
        }

    </style>
@endsection
@section('adminContainer') 
<div class="container_content">
    <h3 class="container_content-products">Add Member</h3>
    <form class="form_create_profile" method="POST" action="{{route('admin.showAddAccount')}}" enctype="multipart/form-data">
        @csrf
        <table class="form_create_table">
            <tr>
                <td class="forn_create_head">User Name *</td>
                <td><input required type="text" name="username" placeholder="Tên đăng nhập" id="username">
                </td>
            </tr>
            <tr>
                <td class="forn_create_head">Full Name *</td>
                <td><input required type="text" name="fullname" placeholder="Họ và tên: " id="fullname" value="{{empty($fullname)?'':$fullname}}">
                </td>
            </tr>
            <tr>
                <td class="forn_create_head">Phone *</td>
                <td><input required type="number" name="phone" id="phone" value="{{empty($phone)?'':$phone}}"
                        placeholder="Nhập phone:"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Email *</td>
                <td><input required type="email" name="email" id="email" value="{{empty($email)?'':$email}}"
                        placeholder="Nhập Email:"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Password *</td>
                <td><input required type="text" name="password" min="1" id="password" value="{{empty($password)?'':$password}}"
                        placeholder="Nhập password:"></td>
            </tr>
            <tr >
                <td class="forn_create_head">File Avata *</td>
                <td>
                    <div class="content_upload_img">
                        <label for="mypicture">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Avata Preview</h4>
                            <img style="border-radius: 0px;"  name="uploadToFile" class="uploadimg" src="" alt="" hidden>
                        </label>
                        <input type="file" hidden id="mypicture" name="fileImage">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="forn_create_head">Major </td>
                <td>
                    <select style="width: 100%; font-size:18px; padding:8px 12px;" value="{{empty($level)?'':$level}}" name="level" id="">
                        <option value="member" >Member</option>
                        <option value="admin">Admin </option>
                        <option value="manager">Manager</option>
                    </select>
                </td>
            </tr> 
            <tr>

            </tr>
        </table>
        <div class="container_footer ">
            <button type="submit" name="create_form">Create Product</button>
            <button type="button" id="back_user" value="2"><a href="{{route('admin.account')}}">Come Back</a></button>
        </div>
    </form>
</div>
@endsection 
@section('js')
      <script>
  var upload = document.querySelector('#mypicture');
    let content_upload_img = document.querySelector('.content_upload_img .uploadimg');
    let form_products = document.querySelector('.form_create_profile');
    upload.addEventListener('change', function (event) {
        uploadedFile = URL.createObjectURL(this.files[0]);
        if (content_upload_img.src == "") {
            content_upload_img.hidden = false;
            content_upload_img.src = uploadedFile;
        }
        else {
            content_upload_img.hidden = false;
            content_upload_img.src = "";
            content_upload_img.src = uploadedFile;
        }
    })

      </script>
@endsection

@section('directory')
> <a href="{{route('admin.account')}}">User Prolife</a> > <a href="#">Add Account</a>
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection