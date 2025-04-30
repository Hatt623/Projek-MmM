<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage My Money</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset ('admin/css/tailwind.output.css') }}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset ('admin/js/init-alpine.js') }}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="{{ asset ('admin/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset ('admin/js/charts-pie.js') }}" defer></script>
</head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- sidebar -->
        @include('layouts.part.sidebar')
      <!-- sidebar -->

      <!-- Backdrop -->
      <div class="flex flex-col flex-1 w-full">

<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <!-- Navbar -->
        @include('layouts.part.navbar')
          <!-- Akhir Navbar -->
        </header>
        <main class="h-full overflow-y-auto">
          
        <!-- Content -->
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                dompet
            </h2>

            @if (count($errors) > 0)
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                  <svg class="shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                  </svg>
                  <span class="sr-only">Danger</span>
                  <div>
                    <span class="font-medium">Ensure that these requirements are met:</span>
                    @foreach ($errors->all() as $error)
                      <li> {{ $error }} </li>
                    @endforeach
                  </div>
                </div>
            @endif

            <!-- General elements -->
            <form action="{{ route('dompet.update', $dompet->id) }}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            @method('PUT')

              <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
              >
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama dompet</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan Nama Dompet Anda"
                    name="nama_dompet"
                    type="text"
                    value="{{ $dompet->nama_dompet }}"
                    required
                  />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Saldo</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan Saldo Awal anda"
                    name="saldo"
                    value="{{ $dompet->saldo }}"
                    type="number"
                    required
                  />
                </label>

                <div class="flex mt-6 text-sm">

                

                <div class="flex justify-end mb-4 relative z-10">
                    <button  
                    class="px-4 py-2 text-sm font-semibold text-white bg-purple-600 rounded-md shadow hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" class="btn btn-primary" name="save" >
                      save
                    </button>|
            
                </div>

              </form>
        
              </div>
            </div>
            </div>
          </div>
        </main>
        <!-- Akhir content -->

            <!-- Charts -->
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
