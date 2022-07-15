@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.signup')
@endsection
@section('content')

<style>
    .auth-page-content {
    margin-top: -50px;
}
    </style>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index" class="d-inline-block auth-logo">
                                    <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="27">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Crear nueva cuenta</h5>
                                    <p class="text-muted">Regístrate en iProfits</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate method="POST"
                                        action="{{ route('register') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="useremail"
                                                placeholder="Enter email address" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor, ingrese su correo
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Usuario <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" id="username"
                                                placeholder="Enter username" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor, ingrese su usuario
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dni" class="form-label">DNI / Cédula    <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('dni') is-invalid @enderror"
                                                name="dni" value="{{ old('dni') }}" id="dni"
                                                placeholder="Ingrese DNI / Cédula" required>
                                       
                                            <div class="invalid-feedback">
                                                El DNI ingresado ya se encuentra registrado en otra cuenta.
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="userpassword" class="form-label">Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="userpassword" placeholder="Enter password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor, ingrese su contraseña
                                            </div>
                                        </div>
                                        <div class=" mb-4">
                                            <label for="input-password">Confirm Password</label>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" id="input-password"
                                                placeholder="Enter Confirm Password" required>
                                                <div class="invalid-feedback">
                                                    Por favor, ingrese su correo
                                                </div>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                        <!--
                                        <div class=" mb-4">
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                                name="avatar" id="input-avatar" required>
                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="">
                                                <i data-feather="file"></i>
                                            </div>
                                        </div>
                                    -->
                                    <div class="mb-4">
                                        Usuario referidor: <b>{{ request()->referral }}</b>
                                        <input name="ref" class="form-control @error('ref') is-invalid @enderror" type="hidden" value="{{ request()->referral }}">
                                        
                                            <div class="invalid-feedback">
                                                Error, el referido no existe
                                            </div>
                                    </div>
                                        <div class="mb-4">
                                            <p class="mb-0 fs-12 text-muted fst-italic">Al registrarse acepta los términos de iProfit <a href="#"
                                                    class="text-primary text-decoration-underline fst-normal fw-medium">Leer</a></p>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">REGISTRARME</button>
                                        </div>

                                        
                                    </form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Ya tienes una cuenta ? <a href="auth-signin-basic"
                                    class="fw-semibold text-primary text-decoration-underline"> Login </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
@endsection
