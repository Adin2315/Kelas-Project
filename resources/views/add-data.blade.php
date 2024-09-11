<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ADD DATA</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 75%;">
            @if (session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <h1 style="font-family: Arial, Helvetica, sans-serif; font-weight: 600; text-align: center;">Form Data Mahasiswa</h1>
            <form action="{{ url('/dashboard') }}" method="POST" style="margin: 3rem;">
                @csrf

                <div class="mb-3">
                    <label class="form-label">NRP</label>
                    <input class="form-control" type="text" name="nrp" value="{{ old('nrp') }}" placeholder="Masukkan NRP">
                    @error('nrp') <span class="alert alert-danger">{{ $message }}</span> @enderror
                 </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                    @error('nama') <span class="alert alert-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}"placeholder="name@ecxample.com">
                    @error('email') <span class="alert alert-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary" ">Submit</button>
            </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
