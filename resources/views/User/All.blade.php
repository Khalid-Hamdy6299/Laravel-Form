<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>

<body>
    @include('Auth.navbar')
    @include('User.success') <br>
    <a href="{{ route('Add_User') }}" class="btn btn-success float-right">Add User</a>
    <form action="{{ route('Search_User') }}" method="get" class="d-flex" role="search">
        @csrf
        <input class="me-3" name="key" value="{{ old('key') }}" type="search" placeholder="Search"
            aria-label="Search">
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td>
                        <a href="{{ route('Edit_User', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('Delete_User', ['id' => $user->id]) }}" method="post"
                            style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Do you want to delete.?')">Delete</button>
                        </form>
                        <a href="{{ route('Show_User', ['id' => $user->id]) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
{{-- <div class='d-flex justify-content-center mx-auto'>
    {{ $users->links() }}
</div> --}}
