@extends('site.base')

@section('content')
<section id="register" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h4>
                <i class="fas fa-user-plus"></i> Register</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                @csrf
                  <div class="form-group">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="password2">Password</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="password">Confirm Password</label>
                  <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <input type="submit" value="Register" class="btn btn-secondary btn-block">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
