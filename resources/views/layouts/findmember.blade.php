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
Tìm Kiếm thành viên
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection
@section('adminContainer')
<div class="container_content">
    <h2 class="container_content-name">Find Imformation User</h2>
    <h4 class="container_content-des">
        Email & password </h4>
        <form  id="form" class="form_create_table form_create_profile" onsubmit="return validate()" action="{{route('admin.findmember')}}" method="POST" >
            @csrf
           <table class="form_create_table">
           <tr>
                <td class="forn_create_head">UserName *</td>
                <td><input type="text" name="username" id="username" value="{{empty($user)?'':$user->username}}"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Phone *</td>
                <td><input type="number" name="phone" id="phone" value="{{empty($user)?'':'0'.$user->phone}}"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Email *</td>
                <td><input type="email" name="email" id="email" value="{{empty($user)?'':$user->email}}"></td>
            </tr>
           </table>
        <table>
            <tr>
                <th>Image</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Major</th>
                <th colspan="2">Operation</th>
                <th>Action</th>
            </tr>

            @if(!empty($users))
            @foreach($users as $user)
                <tr>
                    <td><img src="{{$user->avata}}" alt=""></td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td class="major">
                        <h5 class="{{$user->level}}">{{$user->level}}</h5>
                    </td>
                    <td><a href="{{route('admin.changeAccount')}}-{{$user->username}}"><i
                        class="fa-solid fa-pen-to-square"></i></a></td>
                    <td style="text-align: center"><a href="?delete={{$user->username}}"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5 class="{{ ($user->status==1)?'online':'offline' }}"><a href="{{$user->username}}">{{ ($user->status==1)?'online':'offline' }}</a></h5>
                    </td>
                </tr>
            @endforeach
            @endif
          
        </table>
        <div class="container_footer">
            <button type="submit" onclick="validate()" id="find_user"  value="2">Find User</button>
            <button type="button" id="back_user" value="2"><a href="{{route('admin.account')}}">Come Back</a></button>
        </div>
    </form>
   


</div>
@endsection

@section('directory')
> <a href="{{route('admin.account')}}">User Prolife</a> > <a href="#">Find Member</a>
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection

@section('js')
<script>
    function validate(){
        if(!$('#username').value && !$('#phone').value && !$('#email').value){
        alert('Nhập thông tin kìa Admin!');
    }
    else{
        return true;
    }
    return false
}
   
</script>
@endsection 