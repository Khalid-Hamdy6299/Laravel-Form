<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
</head>

<body>
    @include('Auth.navbar')
    <form action="{{ route('Store_Emp') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container" style="margin-top: 20px">
            <div class="input-block">
                <label for="">Employee Name</label> <br>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                    id="" placeholder="Name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">National_ID</label> <br>
                <input class="form-control @error('National_ID') is-invalid @enderror" type="text" name="National_ID"
                    id="" placeholder="National_ID">
                @error('National_ID')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label for="">Department</label> <br>
                <select name="department_id" id=""
                    class="form-control @error('department_id') is-invalid @enderror">
                    <option value="" disabled selected>Select Department</option>
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
                    id="" placeholder="00.0">
                @error('salary')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br> <br>
            </div>

            <div class="input-block">
                <label>Upload Photo</label> <br>
                <input class="form-control text-white @error('image') is-invalid @enderror" type="file"
                    name="image" id="">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-5">Add Employee</button>
        </div>
    </form>
</body>

</html>
