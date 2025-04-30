<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kas n Manage</title>
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
                Kategori
            </h2>
            <!-- General elements -->
            <form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data" role="form">
            @csrf

              <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
              >
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Kategori</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Masukkan Nama Kategori Untuk Kas anda"
                    name="nama_kategori"
                    type="text"
                    value="{{ $kategori->nama_kategori }}"
                    disabled
                    required
                  />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
                  <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3"
                    placeholder="Deskripsi Kategori"
                    name="deskripsi"
                    disabled
                    required
                  > {{ $kategori->deskripsi }} </textarea>
                </label>

                <div class="flex mt-6 text-sm">

                

                <div class="flex justify-end mb-4 relative z-10">
                    <a href="{{ route('kategori.index') }}"
                    class="px-4 py-2 text-sm font-semibold text-white bg-purple-600 rounded-md shadow hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" class="btn btn-primary" name="save" >
                        Back
                    </a>

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
