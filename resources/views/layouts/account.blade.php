@extends('layoutAdmin.layoutAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('admincss/chart.css')}}">
@endsection
@section('title')
    Trang tài khoảng
@endsection
@section('directory')
    > <a href="#">User Pofile</a>
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection
@section('adminContainer')
<div class="manager_member">
    <div class="manager_member-head" action="">
        <div>
            <button name="members" class="members" value="2">Members</button>
            <button name="admin" class="admins" value="2">Admin</button>
            <button name="admin" class="allmembers" value="2">All Members</button>
        </div>
        <div style="margin-right: 40px;">
            <h4>Total member: <span>{{$count_user}}</span></h4>
            <h4>Curent used: <span>{{$status}}</span></h4>
        </div>
    </div>
    <form class="manager_member-content">
        <span>Members</span>
        <button name="newaccount" value="2"><a href="{{route('admin.showAddAccount')}}">Add new</a></button>
        <button name="findmember" value="2"><a href="{{route('admin.findmember')}}">Find Members</a></button>
        <button name="export" value="2"><a href="#">Export members(Excel)</a></button>
    </form>

    <form class="form_member">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Major</th>
                    <th colspan="2">Operation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
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
                    <td><a href="?delete={{$user->username}}"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5 class="{{ ($user->status==1)?'online':'offline' }}"><a href="{{$user->username}}">{{ ($user->status==1)?'online':'offline' }}</a></h5>
                    </td>
                </tr>
                @endforeach
                
                {{-- <tr>
                    <td><img src="https://phunugioi.com/wp-content/uploads/2022/03/Avatar-Gau.jpg" alt=""></td>
                    <td>Phạm Hoài Nam</td>
                    <td>+877669990</td>
                    <td>namanhthao59@gmail.com</td>
                    <td class="major">
                        <h5 class="admin">Member</h5>
                    </td>
                    <td><a href=""><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5><a href="">Login</a></h5>
                    </td>
                </tr> --}}
                
            </tbody>
        </table>
    </form>
</div>
<div class="direction_profile">
    {{$users->links()}}
    {{-- <ul>
    <li><a class="active" href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">4</a></li>
    <li><a href="">5</a></li>
    </ul> --}}
</div>
@endsection 

@section('js')
<script>
    (function () {
        let list_acount = document.querySelectorAll('.major');
        if (list_acount) {
            let btn_members = document.querySelector('.members');
            let btn_admin = document.querySelector('.admins');
            let btn_allmember = document.querySelector('.allmembers');
            btn_members.onclick = function () {
                allactive();
                for (let mem of list_acount) {
                    let major = String(mem.innerText).toLowerCase();
                    if (major!='member') {
                        mem.closest('tr').classList.add('hiden');
                    }
                    else {
                        mem.closest('tr').classList.remove('hiden');
                    }
                }
            }
            btn_admin.onclick = function () {
                allactive();
                for (let mem of list_acount) {
                    let major = String(mem.innerText).toLowerCase();
                    if (major!='admin') {
                        mem.closest('tr').classList.add('hiden');
                    }
                    else {
                        mem.closest('tr').classList.remove('hiden');
                    }
                }
            }
            function allactive(){
                for (let mem of list_acount) {
                    mem.closest('tr').classList.remove('hiden');
                }
            }
            btn_allmember.onclick = function () {
                allactive();
            }
        }

    })()
</script>
@endsection
