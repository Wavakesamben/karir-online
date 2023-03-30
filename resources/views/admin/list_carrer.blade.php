@extends('template.layout_admin')

@section('title', 'Karir')

@section('content')
    <div class="my-5">
        <a href="/carrier_4Dm1N_P4n3L/add_carrier"><button class="btn-primary flex gap-2 items-center"><i class="fa fa-plus"></i><span>
                    Tambah Lowongan Kerja</span></button></a>
    </div>
    <div>
        <div class="table-lay">
            <table>
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Lowonngan Kerja
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Penutupan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_loker as $loker)
                        <tr class="bg-gray-100 border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap">
                                <button data-modal-target="modal-detail{{ $loker->id }}"
                                    data-modal-toggle="modal-detail{{ $loker->id }}">{{ $loker->nama_pekerjaan }}</button>
                            </th>
                            <td class="px-6 py-4">
                                {{ date('d F Y', strtotime($loker->deadline)) }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($loker->active == 0)
                                    <span class="text-rose-500 font-semibold">Closed</span>
                                @else
                                    <span class="text-green-500 font-semibold">Open</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right flex gap-3">
                                <a href="/carrier_4Dm1N_P4n3L/carrier/edit/{{ $loker->id }}"
                                    class="font-medium text-primary hover:underline">Edit</a>
                                <div data-modal-target="popup-modal-delete{{ $loker->id }}"
                                    data-modal-toggle="popup-modal-delete{{ $loker->id }}"
                                    class="font-medium text-primary hover:underline cursor-pointer">Delete</div>
                                <div data-modal-target="popup-modal-publish{{ $loker->id }}"
                                    data-modal-toggle="popup-modal-publish{{ $loker->id }}"
                                    class="font-medium text-primary hover:underline cursor-pointer">
                                    @if ($loker->active == 0)
                                        Buka
                                    @else
                                        Tutup
                                    @endif
                                </div>
                            </td>
                        </tr>

                        {{-- modal delete --}}
                        <div id="popup-modal-delete{{ $loker->id }}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                        data-modal-hide="popup-modal-delete{{ $loker->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true"
                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah anda ingin menghapus
                                            lowongan kerja {{ $loker->nama_pekerjaan }}?</h3>
                                        <a href="/carrier_4Dm1N_P4n3L/carrier/delete/{{ $loker->id }}"><button
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Ya, saya yakin
                                            </button></a>
                                        <button data-modal-hide="popup-modal-delete{{ $loker->id }}" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tidak,
                                            batalkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- modal publish --}}
                        <div id="popup-modal-publish{{ $loker->id }}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                        data-modal-hide="popup-modal-publish{{ $loker->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true"
                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500">
                                            @if ($loker->active == 0)
                                                Apakah anda ingin membuka lowongan kerja {{ $loker->nama_pekerjaan }}?
                                            @else
                                                Apakah anda ingin menutup lowongan kerja {{ $loker->nama_pekerjaan }}?
                                            @endif
                                        </h3>
                                        <a href="/carrier_4Dm1N_P4n3L/carrier/publish/{{ $loker->id }}"><button
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Ya, saya yakin
                                            </button></a>
                                        <button data-modal-hide="popup-modal-publish{{ $loker->id }}" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tidak,
                                            batalkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- modal detail --}}
                        <div id="modal-detail{{ $loker->id }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-2xl md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Detail Lowongan kerja {{ $loker->nama_pekerjaan }}
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="modal-detail{{ $loker->id }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class="information">
                                            <h3>Lowongan Kerja:</h3>
                                            <h4>{{ $loker->nama_pekerjaan }}</h4>
                                        </div>
                                        <div class="information">
                                            <h3>Penutupan:</h3>
                                            <h4>{{ date('d F Y', strtotime($loker->deadline)) }}</h4>
                                        </div>
                                        <div class="information">
                                            <h3>Minimal pendidikan:</h3>
                                            <h4>{{ $loker->min_pendidikan }}</h4>
                                        </div>
                                        <div class="information">
                                            <h3>Status:</h3>
                                            <h4>
                                                @if ($loker->active == 0)
                                                    <span class="text-rose-500 font-semibold">Closed</span>
                                                @else
                                                    <span class="text-green-500 font-semibold">Dibuka</span>
                                                @endif
                                            </h4>
                                        </div>
                                        @php
                                            $umum = explode('#', $loker->persyaratan_umum);
                                            $berkas = explode('#', $loker->persyaratan_berkas);
                                        @endphp
                                        <div class="information">
                                            <h3>Persyaratan Umum:</h3>
                                            <ul class="list">
                                                @for ($i = 0; $i < count($umum)-1; $i++)
                                                    <li class="item-list">- {{ $umum[$i] }}</li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <div class="information">
                                            <h3>Persyaratan Berkas:</h3>
                                            <ul class="list">
                                                @for ($j = 0; $j < count($berkas)-1; $j++)
                                                    <li class="item-list">- {{ $berkas[$j] }}</li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                                        <button data-modal-hide="modal-detail{{ $loker->id }}" type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Main modal -->


    </div>
@endsection
