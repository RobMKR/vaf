@extends('layouts.admin_layout')

@section('title', 'Admin Panel - Home')

@section('main')
    @parent
    @section('main_title', 'Admin Panel Home')
    @section('main_info', 'Shown Categories and Last 10 Pictures In Each Category')
    @foreach($categories as $_category)
        <div class="accordion">
            <div class="accHeader clearAfter">
                <h3>{{$_category->name}}</h3>
                <div class="accRigh">
                    <p>{{ucwords($_category->type)}} Furniture</p>
                </div>
            </div>

            <div class="accContent">
                @foreach($pics[$_category->id] as $_pic)
                <div class="picture-block">
                    <img alt="{{$_pic->description}}" src="{{$_pic->source}}"class="img-loader" width="200"/>
                    <div class="img-info">
                        <ul>
                            <li class="name">Pic name: {{$_pic->name}}</li>
                            <li class="created">Created: {{$_pic->created_at}}</li>
                            <li class="description">Description: {{$_pic->description}}</li>
                            <li class="edit">Edit Pic</li>
                            <li class="delete">Delete Pic</li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection