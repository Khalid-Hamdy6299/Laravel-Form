<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
</head>

<body>
    @include('Auth.navbar')
    @include('Emp.success') <br>
    <h2 style="color: rgb(100, 100, 162); margin-bottom: 40px">Welcome, {{ Auth::user()->name }}</h2>
    <a href="{{ route('Add_Emp') }}" class="btn btn-success float-right">Add Employee</a>
    @if (Auth::user()->type->name === 'Admin')
        <a style="margin-left: 25px;" href="{{ route('All_Users') }}" class="btn btn-success float-right">All Users</a>
    @endif

    <form action="{{ route('Search_Emp') }}" method="get" class="d-flex" role="search">
        @csrf
        <input class="me-3" name="key" value="{{ old('key') }}" type="search" placeholder="Search"
            aria-label="Search">
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>National_ID</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $employee->name }}</td>
                    <td style="width: 400px">{{ $employee->National_ID }}</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td><img style="border-radius: 15px" src="{{ asset("/storage/$employee->image") }}"
                            alt="No Photo Yet" srcset="" width=40px></td>
                    <td>
                        <a href="{{ route('Edit_Emp', ['id' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                        @if (Auth::user()->type === 'admin' || Auth::user()->type === 'it.dbh')
                            <form action="{{ route('Delete_Emp', ['id' => $employee->id]) }}" method="post"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Do you want to delete.?')">Delete</button>
                            </form>
                        @endif
                        <a href="{{ route('Show_Emp', ['id' => $employee->id]) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
<div class='d-flex justify-content-center mx-auto'>
    {{ $employees->links() }}
</div>
