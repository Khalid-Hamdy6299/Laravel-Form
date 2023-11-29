<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>

<body>
    @include('Auth.navbar')
    <a style="margin: 10px 0 0 10px"href="{{ route('All_Users') }}" class="btn btn-success float-left">Back</a>
    <form action="{{ route('Update_User', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container" style="margin-top: 20px">
            <div class="input-block">
                <label for="">User Name</label> <br>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                    id="" value="{{ $user->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Email</label> <br>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                    id="" value="{{ $user->email }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Type</label> <br>
                <select name="type" id="" class="form-control @error('type') is-invalid @enderror">
                    <option disabled selected value="{{ $user->id }}">{{ $user->type }}</option>
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
                <input class="form-control" type="password" name="password" id="">
                <br> <br>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update user</button>
        </div>
    </form>
</body>

</html>
