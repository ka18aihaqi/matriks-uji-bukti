<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Monitoring Perekaman Surat') }}
        </h2>
    </x-slot>
    {{-- @if(session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="text-red-600">{{ session('error') }}</div>
    @endif --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                        {{-- Tombol Aksi --}}
                        <form method="POST" action="{{ route('dashboard.bulkAction') }}" id="bulkActionForm" class="w-full sm:w-auto">
                            @csrf
                            <div class="flex gap-2">
                                <!-- Tombol Hapus -->
                                <button type="button" id="deleteBtn" onclick="submitBulkAction('delete')" name="action" value="delete"
                                    class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-sm font-medium rounded 
                                        hover:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-300 
                                        disabled:opacity-50"
                                    disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v2H9V4a1 1 0 011-1z" />
                                    </svg>
                                    Delete
                                </button>

                                <!-- Tombol Export -->
                                <button type="button" id="exportBtn" onclick="submitBulkAction('export')" name="action" value="export"
                                    class="inline-flex items-center px-3 py-2 bg-green-200 text-sm text-green-700 rounded hover:bg-green-300 disabled:opacity-50"
                                    disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 4v12" />
                                    </svg>
                                    Export
                                </button>
                            </div>
                        </form>

                        {{-- Filter Form (GET) --}}
                        <form method="GET" action="{{ route('dashboard') }}" id="filterForm" class="w-full sm:w-auto">
                            <div class="relative max-w-xs">
                                <!-- Icon Search -->
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103 10.5a7.5 7.5 0 0013.65 6.15z" />
                                    </svg>
                                </div>

                                <!-- Input -->
                                <input
                                    type="text"
                                    name="q"
                                    value="{{ request('q') }}"
                                    placeholder="Search recorded letters"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>
                        </form>
                        
                    </div>
                    
                    {{-- Tabel Data --}}
                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-1 py-2 text-center text-xs">
                                        <input id="selectAll" type="checkbox" class="border-gray-300 rounded px-1" title="Select All"> All
                                    </th>

                                    <th class="px-1 py-2 text-center text-xs">No</th>
                                    <th class="px-1 py-2 text-left text-xs">Nama Wajib</th>
                                    <th class="px-1 py-2 text-left text-xs">NPWP</th>
                                    <th class="px-1 py-2 text-left text-xs">Tahun Pajak</th>
                                    <th class="px-1 py-2 text-left text-xs">Nomor SP2</th>

                                    <th class="px-1 py-2 text-left text-xs">Pos Uji</th>
                                    <th class="px-1 py-2 text-left text-xs">Jenis Bukti</th>
                                    <th class="px-1 py-2 text-left text-xs">Dokumen Sumber</th>
                                    <th class="px-1 py-2 text-left text-xs">Metode dan Teknik</th>

                                    <th class="px-1 py-2 text-left text-xs">Supervisor</th>

                                    <th class="px-1 py-2 text-left text-xs">Tanggal</th>
                                    <th class="px-1 py-2 text-left text-xs">Perekam</th>
                                    <th class="px-1 py-2 text-center text-xs">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach($data as $index => $item)
                                <tr>
                                    <td class="px-4 py-2 text-center text-xs">
                                        <input type="checkbox" 
                                            class="row-checkbox" 
                                            name="ids[]" 
                                            value="{{ $item->id }}"
                                            data-nama="{{ $item->nama_wajib_pajak }}"
                                            data-npwp="{{ $item->npwp }}"
                                            data-tahun="{{ $item->tahun_pajak }}"
                                            data-sp2="{{ $item->nomor_sp2 }}"
                                            data-supervisor="{{ $item->supervisor }}">
                                    </td>
                                    <td class="px-1 py-2 text-center text-xs">{{ $index + 1 }}</td>
                                    <td class="px-1 py-2 text-left text-xs">{{ $item->nama_wajib_pajak }}</td>
                                    <td class="px-1 py-2 text-left text-xs">{{ $item->npwp }}</td>
                                    <td class="px-1 py-2 text-left text-xs">{{ $item->tahun_pajak }}</td>
                                    <td class="px-1 py-2 text-left text-xs">{{ $item->nomor_sp2 }}</td>

                                    <td class="px-1 py-2 text-left text-xs break-words whitespace-normal">
                                        {{ $item->posUji->nama ?? '-' }}
                                    </td>
                                    <td class="px-1 py-2 text-left text-xs break-words whitespace-normal">
                                        {{ $item->jenisBukti->jenis ?? '-' }}
                                    </td>
                                    <td class="px-1 py-2 text-left text-xs break-words whitespace-normal">
                                        {{ $item->dokumenSumber->dokumen ?? '-' }}
                                    </td>
                                    <td class="px-1 py-2 text-left text-xs break-words whitespace-normal">
                                        {{ $item->metode->metode ?? '-' }} / {{ $item->teknik->teknik ?? '-' }}
                                    </td>

                                    <td class="px-1 py-2 text-left text-xs">{{ $item->supervisor }}</td>
                                    <td class="px-1 py-2 text-left text-xs">{{ $item->updated_at->format('d-m-Y') }}</td>
                                    <td class="px-1 py-2 text-left text-xs">{{ $item->perekam  }}</td>
                                    <td class="px-1 py-2 text-center text-xs">
                                        <!-- Edit -->
                                        <a href="{{ route('perekaman.edit', $item->id) }}"
                                        class="text-blue-600 inline-flex items-center hover:underline transition-transform transform hover:scale-110 active:scale-95">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('perekaman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 inline-flex items-center hover:underline transition-transform transform hover:scale-110 active:scale-95">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v2H9V4a1 1 0 011-1z" />
                                                </svg>
                                            </button>
                                        </form>

                                        <!-- Export / Download -->
                                        <a href="{{ route('dashboard.exportPdf', $item->id) }}"
                                        class="text-green-600 inline-flex items-center hover:underline transition-transform transform hover:scale-110 active:scale-95"
                                        title="Download PDF">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 4v12" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
