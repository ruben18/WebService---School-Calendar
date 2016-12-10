@if(count($errors)>0)
    @foreach($errors as $error)
        {{$error}}
    @endforeach
@endif

{!! Form::open(['url'=>'auth/register', 'method'=>'POST']) !!}
    {!! Form::label('name') !!}
    {!! Form::text('name') !!}<br>
    {!! Form::label('email') !!}
    {!! Form::text('email') !!}<br>
    {!! Form::label('password') !!}
    {!! Form::password('password') !!}<br>
    {!! Form::label('password confirmation') !!}
    {!! Form::password('password_confirmation') !!}<br>
    {!! Form::submit('Register') !!}
{!! Form::close() !!}