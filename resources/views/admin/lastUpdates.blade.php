@extends('layouts.admin_layout')

@section('title', 'Admin Panel - Last Updates')

@section('main')
    @parent
    @section('main_title', 'Last Updates')
    @section('main_info', 'Shown Photos you have attached in last days')
    <div class="last-updates">
        
    </div>
@endsection