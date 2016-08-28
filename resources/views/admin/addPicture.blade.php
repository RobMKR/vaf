@extends('layouts.admin_layout')

@section('title', 'Admin Panel - Add Picture')

@section('css_js')
    {!! HTML::script('js/jquery.cropit.js') !!}
@endsection

@section('main')
    @parent
    @section('main_title', 'Admin Panel - Add Picture')
    @section('main_info', 'Select Category and add picture in it')
    <div class="addPictures">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="image-editor">
            <input type="file" name="source" class="cropit-image-input">
            <div class="cropit-preview"></div>
            <div class="image-size-label">
                Resize image
            </div>
            <input type="range" class="cropit-image-zoom-input">
        </div>
        {!! Form::open(['method' => 'post']) !!}
            {!! Form::hidden('source', '', array('class'=>'source_hidden')) !!}
            <div class="field pt30">
               {!! Form::text('name', '', array('placeholder'=>'Picture Name')) !!}
            </div>
            <div class="field pt30">
               {!! Form::text('description', '', array('placeholder'=>'Picture Description')) !!}
            </div>
            <div class="field">
                {!! Form::select('category', $categories , Input::old('type'), array('placeholder' => 'Select Category')) !!}
            </div>
            <div class="formBtn">
                {!! Form::submit('Add Category', array('class' => 'btn brownBtn')) !!}
           </div>
        {!! Form::close() !!}
    </div>
    
@endsection

@section('end_script')
    <script>
        $(function() {
            $('.image-editor').cropit({
                type: 'image/jpeg'
            });
        });
        $('form').submit(function(e){
            if($('.source_hidden').val() == ''){
                e.preventDefault();
                var imageData = $('.image-editor').cropit('export');
                $('.source_hidden').val(imageData);
                $('.addPictures form').submit();
            }
        });
    </script>
@endsection