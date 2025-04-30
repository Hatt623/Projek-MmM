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

</head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
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
                    Dompet
                    </h2>

                    @if (session('success'))
                        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 ml-2 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" onclick="document.getElementById('alert-3').remove()" aria-label="Close">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    @endif

                    <div class="flex justify-end mb-4 relative z-10">
                        <a
                            href="{{ route('dompet.create') }}"
                            class="px-4 py-2 text-sm font-semibold text-white bg-purple-600 rounded-md shadow hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        >
                            Add
                        </a>
                    </div>
                    
                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                            >
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama dompet</th>
                            <th class="px-4 py-3">Saldo</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                        >
                        @php $no = 1; @endphp 
                        @foreach ($dompet as $data)

                            <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3" 
                                <div>
                                    <p class="font-semibold"> {{ $no++ }} </p>
                                </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                            <p> {{ $data->nama_dompet }} </p>  
                            </td>

                            <td class="px-4 py-3 text-sm">
                              <p> {{number_format ($data->saldo) }} </p>
                            </td>  

                            <td class="px-4 py-3 text-sm">
                              <p> {{ $data->created_at }} </p>
                            </td>  
                            
                            <!-- Action -->
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">

                                <a href="{{route ('dompet.edit', $data->id)}}"

                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit"
                                >
                                    <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    >
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                    ></path>
                                    </svg>
                                </a>

                                <a href="{{route ('dompet.show', $data->id)}}"

                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Show"
                                >
                                    <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    >
                                    <path
                                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                    ></path>
                                    </svg>
                                </a>
                                
                                <form action="{{ route('dompet.destroy', $data->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"

                                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                      aria-label="Delete"
                                  >
                                      <svg
                                      class="w-5 h-5"
                                      aria-hidden="true"
                                      fill="currentColor"
                                      viewBox="0 0 20 20"
                                      >
                                      <path
                                          fill-rule="evenodd"
                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                          clip-rule="evenodd"
                                      ></path>
                                      </svg>
                                    </button>
                                </form>

                                </div>
                            </td>
                            <!-- Action -->

                            
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
                <!-- Akhir content -->

              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
