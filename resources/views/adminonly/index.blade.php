<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage My Money </title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset ('admin/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="{{ asset ('admin/css/tailwind.css') }}" />
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
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Dashboard
            </h2>
            <!-- CTA -->

            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total User yang ada
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  {{$totaluser}}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total Dana Seluruh User
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    {{number_format ($totalsaldo)}}
                  </p>
                </div>
              </div>
            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
              <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>         
                      <tr class="text-xl font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <td align=center colspan=6>
                          Seluruh User 
                        </td>
                      </tr>
                    </thead>
                  <thead>
                      <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                      >
                      <th class="px-4 py-3">No</th>
                      <th class="px-4 py-3">Nama</th>
                      <th class="px-4 py-3">Saldo</th>
                      <th class="px-4 py-3">Dompet</th>
                      <th class="px-4 py-3">Tanggal Pembuatan Akun</th>
                      </tr>
                  </thead>
                  <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  @php $no = 1; @endphp 
                  @foreach($user as $data)

                      <tr class="text-gray-700 dark:text-gray-400">
                    
                      <td class="px-4 py-3" 
                          <div>
                              <p class="font-semibold"> {{ $no++ }} </p>
                          </div>
                          </div>
                      </td>

                      <td class="px-4 py-3 text-sm">
                      <p> {{$data->name}} </p>  
                      </td>
                   
                      <td class="px-4 py-3 text-sm">
                      @foreach($data->dompet as $d)
                          <p>{{ $d->nama_dompet }}</p>
                      @endforeach
                      </td> 

                      <td class="px-4 py-3 text-sm">
                      @foreach($data->dompet as $d)
                          <p>Rp. {{number_format ($d->saldo) }}</p>
                      @endforeach
                      </td>  

                      <td class="px-4 py-3 text-sm">
                        <p> {{$data->created_at}} </p>
                      </td>
                      
                      </tr>
                    @endforeach 
                    
                    
                  </tbody>
                  </table>
              </div>
              <!-- Pagination -->
                <div
                  class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                >
                  <span class="flex items-center col-span-3">
                    Memperlihatkan 5 per data
                  </span>
                  <span class="col-span-2"></span>
                  <!-- Pagination -->
                  <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                      <ul class="inline-flex items-center">
                        <li>
                            {{ $transaksi->links('pagination::tailwind') }}    
                        </li>
                      </ul>
                    </nav>
                  </span>
                </div>
              <!--akhir Pagination -->
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >

              </div>
            </div>
            <!-- Akhir table -->

            <!-- Chart -->

            <div class="grid gap-6 mb-8 md:grid-cols-1">
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                  Chart Dompet
                </h4>
                <canvas id="line"></canvas>
                <div
                  class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                >

                </div>
              </div>
            </div>
          <!-- Akhir Chart -->

          </div>

        </main>
      </div>
    </div>
  </body>
</html>
