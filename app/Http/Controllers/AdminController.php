<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function showDashboard(){
        $lengthAccount=DB::table('users')->count();
        $lengthdonhang=DB::table('thanhtoan')->count();
        $lengthSanpham=DB::table('sanpham')->count();
        $doanhthu = DB::table('thanhtoan')->sum('paymoney');
        $group=DB::table('sanpham')
        ->rightJoin('donhang','donhang.maSanPham',"=",'sanpham.maSanPham')
        ->select(DB::raw('count(*) as maLoaiHang'))
        ->groupBy('sanpham.maLoaiHang')->get();
       
        $arr=[];
        if(!empty($group)){
            foreach($group as $amount)
            {
              $arr[]=$amount->maLoaiHang;
            }
        }
        else $arr=[0,0,0,0,0];
        $json_table=json_encode( $arr);
        return view('layouts.dashboard',compact('lengthAccount','lengthdonhang','lengthSanpham','doanhthu','json_table'));
    }
    public function showAccount(Request $request){
      
        $message='';
        // chỉnh sửa và xóa username
        if(!empty($request->delete)){
            $username=$request->delete;
            $avata=DB::table('users')->where('username',$username)->get()[0]->avata;
            if(strpos($avata,'avata')){
                $root=public_path('avata');           
                $link= substr($avata,strpos($avata,'avata')+strlen('avata'),strlen($avata)-strpos($avata,'avata/'));
                $link_merger=  $root. $link;
                if(file_exists($link_merger)){
                    unlink($link_merger);
                }
            }
          
            if($_COOKIE['IDUSER']== $username)
            setcookie('IDUSER', 0, time() + (86400 * 30)*30, "/");
            DB::table('users')
             ->where('username',$username)
             ->delete();
             $message="Xóa thành công tài khoảng ".$username;
             
             if(!empty(DB::table('thanhtoan')->where('username',$username))){
                $maThanhToan=DB::table('thanhtoan')
                ->where('username',$username)
                ->get(['maThanhToan']);
               
                foreach($maThanhToan as $item){
                    DB::table('donhang')
                    ->where('maThanhToan',$item->maThanhToan)
                    ->delete();
                }
               DB::table('thanhtoan')
                ->where('username',$username)
                ->delete();
                
             }        
        }
        $status=DB::table('users')->where('status',1)->count();
        $count_user=$users=DB::table('users')->count();
        $users=DB::table('users')->paginate(5);
        return view('layouts.account',compact('users','message','status','count_user'));
    }      
    //Show  Thay đổi thông tin acc ount
    public function showchangeAccount($username){
        $users=DB::table('users')->where('username',$username)->get()[0];
       return view('layouts.changeMember',compact('users'));
    }
    // GET Thay đổi thông tin acc ount
       public function getChangeaccount(Request $request){
           $message="Cập nhập thông tinh thành công !";
           $username=$request->username;
           $phone=$request->phone;
           $fullname=$request->fullname;
           $password=md5(trim($request->password));
           $email=$request->email;
           if(!empty($fullname)){
            DB::table('users')->where('username',$username)->update(['fullname'=>$fullname]);
           }
           if(!empty($phone)){
            DB::table('users')->where('username',$username)->update(['phone'=>$phone]);
           }
           if(!empty($password)){
            DB::table('users')->where('username',$username)->update(['password'=>$password]);
           }
           if(!empty($email)){
            DB::table('users')->where('username',$username)->update(['email'=>$email]);
           }
       
        $users=DB::table('users')->where('username',$username)->get()[0];
        return view('layouts.changeMember',compact('users','message'));
    }
    //Show form tìm kiếm thành viên
    public function showfindmember(){
        return view('layouts.findmember');
    }
    public function handlefindMember(Request $request){
        $username=$request->username;
        $phone=$request->phone;
        $email=$request->email;
        $users=[];
        $message='Không tìm thấy thông tin !';
        if(!empty($username)){
            $users=DB::table('users')->where('username',$username)->get();
            $message='Đã tìm thấy thông tin Username : '.$username;
        }
        if(!empty($phone)){
            $users=DB::table('users')->where('phone',$phone)->get();
            $message='Đã tìm thấy thông tin Phone : '.$phone;
        }
        if(!empty($email)){
            $users=DB::table('users')->where('email',$email)->get();
            $message='Đã tìm thấy thông tin Email : '.$email;
        }
        return view('layouts.findmember',compact('users','message'));
    }

    //Show thêm tài khoảng mới

    public function showAddAccount(){
        return view('layouts.addAccount');
    }
    public function getAddAccount(Request $request){
        $message='';
        $username=$request->username;
        $checkUsername =DB::table('users')->where('username',$username)->count();
        $phone=trim($request->phone);
        $email=trim($request->email);
        $fullname=trim($request->fullname);
        $password=trim($request->password);
        $level=trim($request->level);
        if($checkUsername>0){
            $message="Username: ".$username." Đã tồn tại ! ";
            return view('layouts.addAccount',compact('message','fullname','password','phone','email','level'));
        }
        $avata='';
        if ($request->hasFile('fileImage')) {
            $avata=$request->file('fileImage');
            $id=uniqid() . '_' . uniqid() . '_' .($avata->getClientOriginalName());
            $avata->move('avata', $id);
           $linkAvata=$_SERVER['HTTP_ORIGIN'] . '/avata/'.$id;
           $avata=$linkAvata;
        }
        //hash password up database
        $password=md5(trim($request->password));
        if(!empty($username) && !empty($email)){
            if(!empty($avata)){
                DB::table('users')->insert([
                    'username'=>$username,
                    'fullname'=>$fullname,
                    'phone'=>$phone,
                    'email'=>$email,
                    'password'=>$password,
                    'level'=>$level,
                    'avata'=>$avata
                    ]
                );
            }
            else{
                DB::table('users')->insert([
                    'username'=>$username,
                    'fullname'=>$fullname,
                    'phone'=>$phone,
                    'email'=>$email,
                    'password'=>$password,
                    'level'=>$level,
                    ]
                );
            }
           
        }
        $message='Thêm tài khoảng: '.$username.' thành Công';
        return view('layouts.addAccount',compact('message'));
    }
}
