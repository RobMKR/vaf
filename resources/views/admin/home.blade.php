@extends('layouts.admin_layout')

@section('title', 'Admin Panel - Home')

@section('main')
    @parent
    @section('main_title', 'Admin Panel Home')
    @section('main_info', 'Shown Categories and Last 10 Pictures In Each Category')
    <div class="accordion">
        <div class="accHeader clearAfter">
            <h3>Category X</h3>
            <div class="accRigh">
                <p>Category TYpe</p>
            </div>
        </div>
        
        <div class="accContent">
            <div class="picture-block">
                <img class="img-loader"/>
                <div class="img-info">
                    
                </div>
            </div>
        </div>
    </div>
@endsection