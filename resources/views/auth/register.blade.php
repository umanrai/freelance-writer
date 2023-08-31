@include('frontend.layout.partials.header')

{{--<main role="main" class="col-md-12" style="margin-top: 10px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleROLE" class="col-md-4 col-form-label text-md-right">Register As</label>

                            <div class="col-md-6">
                            <input id="exampleROLE" type="radio" name="role_id" value="{{ \App\Misc\Role::ROLE_WRITER }}" {{ (old('role_id') ?? null) == \App\Misc\Role::ROLE_WRITER ? 'checked' : '' }}> {{ \App\Misc\Role::ROLE_WRITER_SLUG }}
                            <input  id="exampleROLE"    type="radio" name="role_id" value="{{ \App\Misc\Role::ROLE_CLIENT }}" {{ (old('role_id') ?? null) == \App\Misc\Role::ROLE_CLIENT ? 'checked' : '' }}> {{ \App\Misc\Role::ROLE_CLIENT_SLUG }}
                            </div>
                            @if($errors->has('role_id'))
                                <div class="error">{{ $errors->first('role_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>--}}

<main>
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                            </div>

                            <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}"
                                  novalidate>
                                @csrf

                                <div class="form-group col-12 ">
                                    <label for="name" class="col-form-label ">{{ __('First Name') }}</label>

                                    <div>
                                        <input id="name" type="text"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               name="first_name" value="{{ old('first_name') }}" required
                                               autocomplete="first_name" autofocus>

                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="name" class="col-form-label">{{ __('Last Name') }}</label>

                                    <div>
                                        <input id="name" type="text"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               name="last_name" value="{{ old('last_name') }}" required
                                               autocomplete="last_name" autofocus>

                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                                    <div>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required
                                               autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-12 ">
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>

                                    <div>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="password-confirm"
                                           class="col-form-label">{{ __('Confirm Password') }}</label>

                                    <div>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="exampleROLE" class="col-form-label ">Register As :</label>

                                    <div>
                                        <input id="exampleROLE" type="radio" name="role_id"
                                               value="{{ \App\Misc\Role::ROLE_WRITER }}" {{ (old('role_id') ?? null) == \App\Misc\Role::ROLE_WRITER ? 'checked' : '' }}> {{ \App\Misc\Role::ROLE_WRITER_SLUG }}
                                        <input id="exampleROLE" type="radio" name="role_id"
                                               value="{{ \App\Misc\Role::ROLE_CLIENT }}" {{ (old('role_id') ?? null) == \App\Misc\Role::ROLE_CLIENT ? 'checked' : '' }}> {{ \App\Misc\Role::ROLE_CLIENT_SLUG }}
                                    </div>
                                    @if($errors->has('role_id'))
                                        <div class="error">{{ $errors->first('role_id') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>

                            <div class="col-12">
                                <p class="mb-2">
                                    have an account? <a class="btn btn-link" href="{{ route('login') }}">Log-in</a>
                                </p>

                            </div>

                            {{--<div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                    <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Register</button>
                            </div>--}}

                        </div>
                    </div>

                    <div class="credits">
                        Designed by <a href="/">Freelancer</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

