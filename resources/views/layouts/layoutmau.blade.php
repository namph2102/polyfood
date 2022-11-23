@extends('layoutAdmin.layoutAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('admincss/chart.css')}}">
@endsection
@section('title')

@endsection


@section('adminContainer')
@endsection 
@section('js')
      
@endsection

@section('directory')
<a href="#">User Prolife</a> > <a href="#">Find Member</a>
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection