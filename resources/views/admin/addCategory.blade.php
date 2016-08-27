@extends('layouts.admin_layout')

@section('title', 'Admin Panel - Add Category')

@section('main')
    @parent
    @section('main_title', 'Admin Panel - Add Picture')
    @section('main_info', 'Select Category and add picture in it')
    
    <div class="addCategory">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(['method' => 'post']) !!}
            <div class="field pt30">
               {!! Form::text('name', '', array('placeholder'=>'Category name')) !!}
            </div>
            <div class="field">
                {!! Form::select('type', ['room' => 'Room Furniture', 'piece' => 'Piece Furniture'] , Input::old('type'), array('placeholder' => 'Select Type')) !!}
            </div>
            <div class="formBtn">
                {!! Form::submit('Add Category', array('class' => 'btn brownBtn')) !!}
           </div>
        {!! Form::close() !!}
    </div>
@endsection