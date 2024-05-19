{{-- Nome da pasta que vai herdar as formatações --}}
@extends('layout')

{{-- Nome que está no yield --}}
@section('layout')

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="{{route('auth')}}" method="post">
            @csrf
            <input type="text" name="email" placeholder="Email" required />
            <br />
            <input type="password" name="password" placeholder="Senha" required />
            <br />
            <input type="submit" value="Login" />
        </form>
    </div>
</body>
    
@endsection
