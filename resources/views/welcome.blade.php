<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    @include('head')
</head>
<body>
    @include('navbar')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="shadow bg-white p-4">
                <h4>Login</h4>
                <form method="post" action="/login-user">
                    @csrf
                    <div class="form-group">
                        <label>email *</label>
                        <input type="email" class="form-control" name="email" required/>
                    </div>
                    <div class="form-group">
                        <label>password *</label>
                        <input type="password" class="form-control" name="password" required/>
                    </div>
                    @if(Session::has('error'))
                    <div class="form-group text-danger">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary w-100" value="Login">
                    </div>
                    <div class="text-center my-3">Or</div>
                    <a href="{{ route('google.login') }}" class="btn btn-danger w-100">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                </form>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</body>
</html>