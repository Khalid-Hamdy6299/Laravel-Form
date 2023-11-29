<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show User</title>
</head>

<body>
    @include('Auth.navbar')
    @include('Emp.success')

    <a style="margin: 10px 0 0 10px" href="{{ route('All_Users') }}" class="btn btn-success float-left">Back</a>

    <div class="container" style="margin-top: 20px">
        <div class="input-block">
            <label for="">User Name</label> <br>
            <input class="form-control" type="text" name="name" id="" value="{{ $user->name }}"
                disabled>
            <br> <br>
        </div>

        <div class="input-block">
            <label for="">E-Mail</label> <br>
            <input class="form-control" type="text" name="email" id="" value="{{ $user->email }}"
                disabled>
            <br> <br>
        </div>

        <div class="input-block">
            <label for="">Type</label> <br>
            <input class="form-control" type="text" name="type" id="" value="{{ $user->type }}"
                disabled>
            <br> <br>
        </div>


    </div>
</body>

</html>
