<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LOGIN</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #fbf8f8;">
        <div class="card position-absolute top-50 start-50 translate-middle" style="width: 26rem; height: 24rem; box-shadow: 2px 2px 2px 2px #f6f4f4;">
            <h2 style="text-align: center; margin-top: 2rem;">Login</h2>

            @if (session ('status'))
                <div class="alert alert-info" role="alert">{{ session ('status') }}</div>
            @endif

            @if ($errors->any())
            
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" style="margin: 1.5rem;">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Username</label>
                    <input type="text" name="uname" class="form-control" id="exampleInputText" placeholder="Username">
                    @error('uname') <span class="alert alert-danger">{{ $message }}</span> @enderror
                 </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="passw" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @error('passw') <span class="alert alert-danger">{{ $message }}</span> @enderror
                </div>
                <a href="{{ url('/dashboard') }}" class="btn btn-primary" style="width: 23rem;">Login</a>
                <button type="submit" class="btn btn-secondary" style="width: 23rem; margin-top: 0.5rem;">Register</button>
            </form>
        </div>


    </body>
</html>
