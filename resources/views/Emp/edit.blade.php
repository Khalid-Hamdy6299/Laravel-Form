<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employee</title>
</head>

<body>
    @include('Auth.navbar')
    <form action="{{ route('Update_Emp', ['id' => $employee->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container" style="margin-top: 20px">
            <div class="input-block">
                <label for="">Employee Name</label> <br>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                    id="" value="{{ $employee->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">National_ID</label> <br>
                <input class="form-control @error('National_ID') is-invalid @enderror" type="text" name="National_ID"
                    id="" value="{{ $employee->National_ID }}">
                @error('National_ID')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Department</label> <br>
                <select name="department_id" id=""
                    class="form-control @error('department_id') is-invalid @enderror">
                    <option value="{{ $employee->department_id }}" disabled selected>{{ $employee->department->name }}
                    </option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Salary</label> <br>
                <input class="form-control @error('salary') is-invalid @enderror" type="text" name="salary"
                    id="" value="{{ $employee->salary }}">
                @error('salary')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label>Upload Photo</label> <br>
                <img style="border-radius: 15px" src="{{ asset("/storage/$employee->image") }}" alt=""
                    width=120px> <br> <br>
                <input class="form-control text-white @error('image') is-invalid @enderror" type="file"
                    name="image" id="">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Employee</button>
        </div>
    </form>
</body>

</html>
