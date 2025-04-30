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

    <!-- SwiperJS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

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
                    Total Dompet yang ada
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  {{$totaldompet}}
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
                    Total Dana
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    {{number_format ($totalsaldo)}}
                  </p>
                </div>
              </div>
            </div>

            <!-- Main -->

            <div class="grid gap-6 mb-8 md:grid-cols-2">
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                  Dompet
                </h4>
                <div
                  class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400 mb-8"
                >
                <!-- Dompet --> 
                 @foreach ($dompet as $data)
                  <div class="card">
                    <p class="card-title">{{$data->nama_dompet}}</p>
                    <p class="balance">RP. {{number_format ($data->saldo)}}</p>
                    <p class="account">
                      <svg
                        width="20"
                        height="20"
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                      >
                        <rect width="22" height="16" x="1" y="4" rx="2" ry="2"></rect>
                        <path d="M1 10h22"></path>
                      </svg>
                      Account: **** **** **** 1234
                    </p>
                    <div class="buttons">
                      <a href="{{ route('transaksi.create') }}" class="button button-transfer">
                        <svg
                          width="16"
                          height="16"
                          fill="none"
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                        >
                          <path d="M7 17l9.2-9.2M17 17V7H7"></path>
                        </svg>
                        Transfer
                      </a>
                    </div>
                    <svg
                      class="dollar-sign"
                      width="40"
                      height="40"
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      viewBox="0 0 24 24"
                    >
                      <path d="M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                  </div>
                @endforeach
                
                <!-- akhir dompet -->
                    
              </div>

              </div>
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
                  <!-- Chart legend -->
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                    <span>Pemasukkan</span>
                  </div>

                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                    <span>Pengeluaran</span>
                  </div>

                </div>
              </div>
            </div>
          <!-- Akhir main -->

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
              <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>         
                      <tr class="text-xl font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <td align=center colspan=6>
                          RIWAYAT TRANSAKSI
                        </td>
                      </tr>
                    </thead>
                  <thead>
                      <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                      >
                      <th class="px-4 py-3">No</th>
                      <th class="px-4 py-3">Deskripsi</th>
                      <th class="px-4 py-3">Jumlah</th>
                      <th class="px-4 py-3">Tipe Transaksi</th>
                      <th class="px-4 py-3">Dompet</th>
                      <th class="px-4 py-3">Tanggal transaksi</th>
                      </tr>
                  </thead>
                  <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  @php $no = 1; @endphp 
                  @foreach ($transaksi as $data)

                      <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3" 
                          <div>
                              <p class="font-semibold"> {{ $no++ }} </p>
                          </div>
                          </div>
                      </td>

                      <td class="px-4 py-3 text-sm">
                      <p> {{ $data->deskripsi }} </p>  
                      </td>

                      <td class="px-4 py-3 text-sm">
                        <p> {{number_format ($data->jumlah)}} </p>
                      </td>  

                      <td class="px-4 py-3 text-sm">
                        <p> {{$data->tipe_transaksi}} </p>
                      </td>  

                      <td class="px-4 py-3 text-sm">
                        <p> {{ $data->dompet->nama_dompet }} </p>
                      </td>  

                      <td class="px-4 py-3 text-sm">
                        <p> {{ $data->created_at }} </p>
                      </td>  
                      
                      </tr>
                    @endforeach
                  </tbody>
                  </table>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >

              </div>
            </div>
            <!-- Akhir table -->
          </div>

        </main>
      </div>
    </div>
  </body>
</html>
