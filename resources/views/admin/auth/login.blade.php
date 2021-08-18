@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/signin.css') }}">
@endpush

@section('content')
<main class="form-signin">
  <form method="post" action="{{ route('admin.authenticate') }}">
      @csrf
    <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
@endsection