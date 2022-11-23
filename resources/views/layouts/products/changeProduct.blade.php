@extends('layoutAdmin.layoutAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('admincss/add.css')}}">
@endsection
@section('title')
Thay đổi sản phẩm
@endsection

@section('cssinline')
    <style>
        .form_create_profile{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between
        }
        .container_footer{
            width: 100%;
        }
        .form_create_table tr:hover {
             background-color: transparent;
        }
        .form_create_table tr{
            margin: 8px 0;
        }
        tr td input[type="number"]{
            letter-spacing: 2px
        }
        .box_sub-img{
            display: flex;
            justify-content: space-between;
        }
        .content_upload_img-sub{
            border: 1px dashed yellow;
            width: 30%;
            font-size: 12px;
            position: relative;
        }
        .content_upload_img-sub label{
            display: flex;
            height: 100px;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            text-align: center;

        } 
        .content_upload_img-sub img{
            width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
        }
        .box_see_image{
            display: flex;
            justify-content: space-between;
        }
        .box_see_image img{
            border-radius: 0px;
        }
    </style>
@endsection
@section('adminContainer') 
<div class="container_content">
    <h3 class="container_content-products">Change Product</h3>

    <form class="form_create_profile" method="POST" action="{{route('admin.postchangeProduct')}}"  enctype="multipart/form-data">
        <input type="text" hidden name="maSanPham" value="{{$maSanPham}}">
        <table class="form_create_table">
            <tr>
                <td class="forn_create_head">Name *</td>
                <td><input required type="text" name="fullname" placeholder="Tên sản phẩm: " id="fullname" value="{{$sanphamIFM->tenSanPham}}"> 
                </td>
            </tr>         
            <tr>
                <td class="forn_create_head">PriceSale *</td>
                <td><input required type="number" name="PriceSale" min="1000" id="PriceSale"  value="{{$sanphamIFM->priceSale}}"
                        placeholder="Nhập giá bán:"></td>
            </tr>
            <tr>
                <td class="forn_create_head">PriceOrigin *</td>
                <td><input required type="number" name="PriceOrigin" min="0" id="PriceOrigin"  value="{{$sanphamIFM->priceOrigin}}"
                        placeholder="Nhập giá gốc:"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Amount *</td>
                <td><input required type="text" name="amount" min="1" id="amount" value="{{$sanphamIFM->soLuong}}" 
                        placeholder="Nhập password:"></td>
            </tr>
            <tr >
                <td class="forn_create_head"> Main Image *</td>
                <td>
                    <div class="content_upload_img">
                        <label for="mypicture">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Main Image</h4>
                            <img style="border-radius: 0px;"  name="uploadToFile" class="uploadimg" src="" alt="" hidden>
                        </label>
                        <input type="file" hidden id="mypicture" name="fileImage">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="forn_create_head">Loại Hàng </td>
                <td>
                @php
                    $list_danhmuc=DB::table('loaihang')->get();
                @endphp

                    <select style="width: 100%; font-size:16px; padding:4px 8px;" value="{{$sanphamIFM->tenLoaiHang}}" name="maLoaiHang" id="">
                        <option value="{{$sanphamIFM->maLoaiHang}}">{{$sanphamIFM->tenLoaiHang}}</option>
                        
                        @foreach($list_danhmuc as $danhmuc)
                        <option value="{{$danhmuc->maLoaiHang}}">{{$danhmuc->tenLoaiHang}}</option>
                        @endforeach
                    </select>
                </td>
            </tr> 
        </table>

        <table class="form_create_table">
           
            <tr>
                <td class="forn_create_head">Description *</td>
                <td><textarea name="moTa" placeholder="Mô tả sản phẩm:" value="{{$sanphamIFM->moTa}}" id="" style="width: 100%; color:wheat;" rows="8">{{$sanphamIFM->moTa}}</textarea></td>
            </tr>
            <tr>
                <td class="forn_create_head">Image *</td>
                <td><div class="box_see_image">
                    <img src="{{$sanphamIFM->imageSanPham}}" alt="">
                    <img src="{{$sanphamIFM->imageSanPham1}}" alt="">
                    <img src="{{$sanphamIFM->imageSanPham2}}" alt="">
                    <img src="{{$sanphamIFM->imageSanPham3}}" alt="">    
                </div></td>
            </tr>
            <tr >
                <td class="forn_create_head">Sub Image *</td>
                <td class="box_sub-img">
                    <div class="content_upload_img-sub">
                        <label for="mypicture1">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Sub Image</h4>
                            <img style="border-radius: 0px;"  name="uploadToFile1" class="uploadimg1" src="" alt="" hidden>
                        </label>
                        <input type="file" hidden  id="mypicture1" name="fileImage1">
                    </div>
                    <div class="content_upload_img-sub">
                        <label for="mypicture2">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Sub Image</h4>
                            <img style="border-radius: 0px;"  name="uploadToFile2" class="uploadimg2" src="" alt="" hidden>
                        </label>
                        <input type="file" hidden id="mypicture2" name="fileImage2">
                    </div>
                    <div class="content_upload_img-sub">
                        <label for="mypicture3">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Sub Image</h4>
                            <img style="border-radius: 0px;"  name="uploadToFile3" class="uploadimg3" src="" alt="" hidden>
                        </label>
                        <input type="file" hidden id="mypicture3" name="fileImage3">
                    </div>
                </td>
            </tr>   
        </table>
        <div class="container_footer">
            @csrf
            <button type="submit" name="create_form">Change Product</button>
            <button type="button" id="back_user" value="2"><a href="{{route('admin.showAllProduct')}}">Come Back</a></button>
        </div>
    </form>
</div>
@endsection 
@section('js')
      <script>
            let form_products = document.querySelector('.form_create_profile');
          function showImg(label,uploadimgoflable){
            let upload = document.querySelector(label);
            let content_upload_img = document.querySelector(uploadimgoflable);
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
    });
          }
          showImg('#mypicture','.content_upload_img .uploadimg');
          showImg('#mypicture1','.content_upload_img-sub .uploadimg1');
          showImg('#mypicture2','.content_upload_img-sub .uploadimg2');
          showImg('#mypicture3','.content_upload_img-sub .uploadimg3');

      </script>
@endsection

@section('directory')
> <a href="{{route('admin.showAllProduct')}}">Products</a> > <a href="#">Change Product</a>
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection