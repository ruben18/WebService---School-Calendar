{!! Form::open(['url'=>'auth/login', 'method'=>'POST']) !!}
    {!! Form::label('email') !!}
    {!! Form::text('email','email') !!}</br>
    {!! Form::label('password') !!}
    {!! Form::password('password') !!}</br>
    {!! Form::submit('Login') !!}
{!! Form::close() !!} <a href="{{URL('auth/register')}}">Register</a>