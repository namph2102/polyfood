@extends('layoutAdmin.layoutAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('admincss/table.css')}}">
@endsection
@section('cssinline')
<style>
table{
        width: 100%;
        text-align: center;
}
table th,table tr{
  font-size: 1.2rem;
} 

.major h5{
    text-align: center;

}
table h5{
    text-align: center;
}
.form_create_table tr:hover {
    background-color: transparent;
}
</style>
@endsection
@section('title')
Quản lý danh mục Sản phẩm
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection
@section('adminContainer')
<div class="container_content">
    <h2 class="container_content-name">Catetory</h2>
    <h4 class="container_content-des">
        <form  id="form" class="form_create_table form_create_profile" onsubmit="return validate()" action="{{route('admin.catelory')}}" method="POST" >
            @csrf
           <table class="form_create_table">
           
            @if (!empty($input_chagne))
            <tr>
                <td class="forn_create_head"> Old Cateroty*</td>
                <td><input type="text" name="danhmucold" id="danhmuc" value="{{$nameDanhMuc->tenLoaiHang}}" ></td>
            </tr>
            <tr>
                <td class="forn_create_head"> Add name Cateroty*</td>
                <td><input type="text" name="danhmucnew" id="danhmuc"></td>
            </tr>
            @else    
            <tr>
                <td class="forn_create_head"> Add name Cateroty*</td>
                <td><input type="text" name="danhmuc" id="danhmuc" placeholder="Thêm mới danh mục ..."></td>
            </tr>
            @endif
           </table>
        <table>
            <tr>
                <th>Mã loại Hàng</th>
                <th>Tên Loại Hàng</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach ($list_danhmuc as $danhmuc)
            <tr>
                <td>{{$danhmuc->maLoaiHang}}</td>
                <td>{{$danhmuc->tenLoaiHang}}</td>
                <td><a href="?change={{$danhmuc->maLoaiHang}}"><i
                    class="fa-solid fa-pen-to-square"></i></a></td>
                <td style="text-align: center"><a href="?delete={{$danhmuc->maLoaiHang}}"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
            @endforeach
         
          

        </table>
        <div class="container_footer">
            <button type="submit" onclick="validate()" id="find_user"  value="2">Add Catetory</button>
            <button type="button" id="back_user" value="2"><a href="{{route('admin.account')}}">Come Back</a></button>
        </div>
    </form>
   


</div>
@endsection

@section('directory')
> <a href="{{route('admin.account')}}">Products </a> > <a href="#">Catelory</a>
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection

@section('js')
<script>
    function validate(){
    if(!$('#danhmuc').value){
        alert('Nhập thông tin kìa Admin!');
    }
   else return true;
    return false;
}
   
</script>
@endsection 