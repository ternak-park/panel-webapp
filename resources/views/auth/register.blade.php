<x-app>

    <body class="border-top-wide border-teal d-flex flex-column">
        <script src="{{ asset('assets/js/demo.min.js?1667333929') }}"></script>
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center mb-4">
                    <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/logo2.webp') }}"
                            height="36" alt=""></a>
                </div>
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Create new account</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf <!-- CSRF Token -->

                            <!-- Name Field -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Full Name" name="name" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Username Field -->
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" placeholder="Username" name="username" value="{{ old('username') }}"
                                    required autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Email Address" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Field with Eye Icon -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" name="password" required
                                        autocomplete="new-password">
                                    <span class="input-group-text">
                                        <a href="#" class="link-secondary toggle-password" title=""
                                            data-bs-toggle="tooltip">
                                            <!-- Eye Closed Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye-closed"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" style="display:block;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="3" y1="3" x2="21" y2="21" />
                                                <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" />
                                                <path
                                                    d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.666 1.167 -1.333 2.167 -2 3m-2 2a9.55 9.55 0 0 1 -2 1" />
                                                <path
                                                    d="M5.824 5.835a14.646 14.646 0 0 0 -3.824 5.165c2.667 4.667 6 7 10 7c.856 0 1.68 -.11 2.464 -.322" />
                                            </svg>

                                            <!-- Eye Open Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye-open"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" style="display:none;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="2" />
                                                <path
                                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirm"
                                    placeholder="Confirm Password" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>

                            <!-- Daerah Field -->
                            <div class="mb-3">
                                <label class="form-label">Daerah</label>
                                <select id="daerah" class="form-control @error('daerah') is-invalid @enderror"
                                    name="daerah" required>
                                    <option value="" disabled selected>Pilih Daerah</option>
                                    <option value="wonosalam" {{ old('daerah') == 'wonosalam' ? 'selected' : '' }}>
                                        Wonosalam</option>
                                    <option value="purwakarta" {{ old('daerah') == 'purwakarta' ? 'selected' : '' }}>
                                        Purwakarta</option>
                                    <option value="cilegon" {{ old('daerah') == 'cilegon' ? 'selected' : '' }}>Cilegon
                                    </option>
                                    <option value="lainnya" {{ old('daerah') == 'lainnya' ? 'selected' : '' }}>Lainnya
                                    </option>
                                </select>
                                @error('daerah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-footer">
                                <button type="submit" class="btn btn-teal w-100">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center text-muted mt-3">
                    Already have an account? <a href="{{ route('login') }}" tabindex="-1">Login</a>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const togglePasswordBtn = document.querySelector('.toggle-password');
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('password-confirm');
                const eyeOpenIcon = document.querySelector('.icon-eye-open');
                const eyeClosedIcon = document.querySelector('.icon-eye-closed');

                togglePasswordBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        confirmPasswordInput.type = 'text';
                        eyeOpenIcon.style.display = 'block';
                        eyeClosedIcon.style.display = 'none';
                    } else {
                        passwordInput.type = 'password';
                        confirmPasswordInput.type = 'password';
                        eyeOpenIcon.style.display = 'none';
                        eyeClosedIcon.style.display = 'block';
                    }
                });
            });
        </script>

        <!-- Libs JS -->
        <script src="{{ asset('assets/js/tabler.min.js?1667333929') }}"></script>
        <script src="{{ asset('assets/js/demo.min.js?1667333929') }}"></script>

    </body>
</x-app>
@if (session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif
