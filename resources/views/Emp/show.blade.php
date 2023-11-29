<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Employee</title>
</head>

<body>
    @include('Auth.navbar')
    @include('Emp.success')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container" style="margin-top: 20px">
            <div class="input-block">
                <label for="">Employee Name</label> <br>
                <input class="form-control" type="text" name="name" id="" value="{{ $employee->name }}"
                    disabled>
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">National_ID</label> <br>
                <input class="form-control" type="text" name="National_ID" id=""
                    value="{{ $employee->National_ID }}" disabled>
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Department</label> <br>
                <input class="form-control" type="text" name="department_id" id=""
                    value="{{ $employee->department->name }}" disabled>
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Salary</label> <br>
                <input class="form-control" type="text" name="salary" id="" value="{{ $employee->salary }}"
                    disabled>
                <br> <br>
            </div>

            <div class="input-block">
                <label>Upload Photo</label> <br>
                <img style="border-radius: 15px" src="{{ asset("/storage/$employee->image") }}" alt=""
                    width=150px> <br> <br>
            </div>
        </div>
    </form>
</body>

</html>
