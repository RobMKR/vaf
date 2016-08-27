<!DOCTYPE html>
<html>
    <head>
        <title>VAF Admin Panel</title>
        {!! HTML::style('css/admin.css') !!}
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    </head>
    <body>
        <!-- Start Reset Password Form Section -->

	<section class="centerForm resetPass">
            <div class="formTitle">
                <h1>Sign in</h1>
            </div>
            <span class="line mt30"></span>
            {!! Form::open(['method' => 'post']) !!}
                <div class="field pt30">
                   {!! Form::text('username', '', array('placeholder'=>'Username')) !!}
                </div>
                <div class="field">
                    {!! Form::password('password', array('placeholder'=>'Password')) !!}
                </div>
                <div class="formBtn">
                    {!! Form::submit('Sign In', array('class' => 'btn brownBtn')) !!}
               </div>
            {!! Form::close() !!}
	</section>

	<!-- End Reset Password Form Section -->
    </body>
</html>