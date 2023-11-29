@extends('Auth.layout')

@section('title')
    Login
@endsection

@section('content')
    <div class="container w-50">

        <h1 class="text-center mt-5">Login To Your Account</h1> <br> <br>
        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
        <form action="{{ route('Store_Login') }}" method="POST">
            @csrf
            <!-- Email input -->
            <div>
                <label for="" style="margin-bottom:10px">Email</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="email" aria-label="Email" aria-describedby="addon-wrapping" name="email"
                        class="form-control @error('email') is-invalid @enderror" />
                </div>
            </div>
            <br>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" name="password" id="form2Example2" class="form-control" />
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">

                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="form-control btn btn-primary btn-block mb-4">Sign in</button>

    </div>
    </form>
@endsection
