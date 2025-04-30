<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Manage My Money</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset ('admin/css/tailwind.output.css')}}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset ('admin/js/init-alpine.js') }}"></script>
  </head>
  <body>
    <form method="POST" action="{{ route('login') }}">
    @csrf

      <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div
          class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
        >
          <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
              <img
                aria-hidden="true"
                class="object-cover w-full h-full dark:hidden"
                src="{{asset ('admin/img/login-office.jpeg') }}"
                alt="Office"
              />
              <img
                aria-hidden="true"
                class="hidden object-cover w-full h-full dark:block"
                src="{{asset ('admin/img/login-office-dark.jpeg')}}"
                alt="Office"
              />
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
              <div class="w-full">
                <h1
                  class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
                >
                  Login
                </h1>
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">{{ __('Email Address') }}</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                  />
                </label>
                @error ('email')
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                  <svg class="shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                  </svg>
                  <div>
                    <strong>{{ $message }}</strong>
                  </div>
                </div>
                @enderror
                
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Password</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="password" required 
                    autocomplete="current-password"
                    id="password"

                    type="password"
                  />
                </label>

                <!-- You should use a button here, as the anchor is only used for the example  -->
                <div class="flex justify-end mb-4 relative z-10">
                    <button  
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit" class="btn btn-primary" >
                    {{ __('Login') }}
                    </button>|
            
                </div>

                <hr class="my-8" />

                <p class="mt-4">
                  @if (Route::has('password.request'))
                      <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                         href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
                </p>
                <p class="mt-1">
                  <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                      href="{{ route('register') }}">
                      {{ __('create account') }}
                  </a>

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>

