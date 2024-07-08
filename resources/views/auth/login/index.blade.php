@extends('auth.layout.app')
@section('content')
    <div class="max-w-464-px mx-auto w-100">
        <div>
            <a href="index.html" class="mb-40 max-w-290-px">
                <img src="assets/images/logo.png" alt="">
            </a>
            <h4 class="mb-12">Sign In to your Account</h4>
            <p class="mb-32 text-secondary-light text-lg">Welcome back! please enter your detail</p>
        </div>
        <form action="{{ route('auth.store') }} " method="POST">
            @csrf
            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="mage:email"></iconify-icon>
                </span>
                <input type="email" name='email'
                    class="form-control  @error('email') is-invalid @enderror h-56-px bg-neutral-50 radius-12"
                    placeholder="Email">
                @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="position-relative mb-20">
                <div class="icon-field">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                    </span>
                    <input type="password" name='password'
                        class="form-control  @error('password') is-invalid @enderror h-56-px bg-neutral-50 radius-12"
                        id="your-password" placeholder="Password">
                    @error('password')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <span
                    class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                    data-toggle="#your-password"></span>
            </div>


            <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                Sign In</button>
            <div class="mt-32 text-center text-sm">
                <p class="mb-0">Don’t have an account? <a href="sign-up.html" class="text-primary-600 fw-semibold">Sign
                        Up</a></p>
            </div>

        </form>
    </div>
@endsection
