@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-4-desktop is-6-tablet">
                <div class="card">
                    <div class="card-header has-background-primary">
                        <p class="card-header-title has-text-white is-centered">
                            Login
                        </p>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="password" name="password" placeholder="********" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <button class="button is-primary is-fullwidth">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
