<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Users</title>
</head>

<body>
    @include('Auth.navbar')
    <a style="margin: 10px 0 0 10px" href="{{ route('All_Users') }}" class="btn btn-success float-left">Back</a>
    <form action="{{ route('Store_User') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container" style="margin-top: 20px">
            <div class="input-block">
                <label for="">User Name</label> <br>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                    id="" placeholder="User Name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">E-Mail</label> <br>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                    id="" placeholder="E-mail">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Type</label> <br>
                <select name="type" id="" class="form-control @error('type') is-invalid @enderror">
                    <option value="" disabled selected>Select</option>
                    <option value="admin">Admin</option>
                    <option value="it.dbh">IT</option>
                    <option value="hr.dbh">HR</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Password</label> <br>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                    id="" placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <button type="submit" class="btn btn-primary mt-5">Add User</button>
        </div>
    </form>
</body>

</html>
