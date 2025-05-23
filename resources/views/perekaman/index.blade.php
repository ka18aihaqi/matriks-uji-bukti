<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perekaman Surat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Session Success -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Session Error (Validasi) -->
                    @if ($errors->any())
                        <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded p-4">
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="list-disc ps-5 mt-2 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('perekaman.store') }}" method="POST" class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @csrf

                        <!-- Nama Wajib Pajak -->
                        <div class="relative z-0 w-full group">
                            <input type="text" name="nama_wajib_pajak" id="nama_wajib_pajak" placeholder=" " required
                                class="peer block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" />
                            <label for="nama_wajib_pajak" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-600">Nama Wajib Pajak</label>
                        </div>

                        <!-- NPWP -->
                        <div class="relative z-0 w-full group">
                            <input type="text" name="npwp" id="npwp" placeholder=" " required
                                class="peer block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" />
                            <label for="npwp" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-600">NPWP</label>
                        </div>

                        <!-- Tahun Pajak -->
                        <div class="relative z-0 w-full group">
                            <input type="text" name="tahun_pajak" id="tahun_pajak" placeholder=" " maxlength="4" required
                                class="peer block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" />
                            <label for="tahun_pajak" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-600">Tahun Pajak</label>
                        </div>

                        <!-- Nomor SP2 -->
                        <div class="relative z-0 w-full group">
                            <input type="text" name="nomor_sp2" id="nomor_sp2" placeholder=" " required
                                class="peer block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" />
                            <label for="nomor_sp2" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-600">Nomor SP2</label>
                        </div>

                        <!-- Pos Uji -->
                        <div class="lg:col-span-1">
                            <label for="pos_uji_id" class="block mb-1 text-sm font-medium text-gray-700">Pos/Pos Turunan SPT</label>
                            <select name="pos_uji_id" id="pos_uji_id"
                                class="block w-full border border-gray-300 rounded-md py-2.5 px-3 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" style="text-align: center;">-- Pilih Pos --</option>
                                @foreach ($posUjiOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jenis Bukti -->
                        <div class="lg:col-span-1">
                            <label for="jenis_bukti_id" class="block mb-1 text-sm font-medium text-gray-700">Jenis Bukti</label>
                            <select name="jenis_bukti_id" id="jenis_bukti_id"
                                class="block w-full border border-gray-300 rounded-md py-2.5 px-3 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" style="text-align: center;">-- Pilih Jenis Bukti --</option>
                                @foreach ($jenisBuktiOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->jenis }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dokumen Sumber -->
                        <div class="lg:col-span-1">
                            <label for="dokumen_sumber_id" class="block mb-1 text-sm font-medium text-gray-700">Dokumen Sumber</label>
                            <select name="dokumen_sumber_id" id="dokumen_sumber_id"
                                class="block w-full border border-gray-300 rounded-md py-2.5 px-3 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" style="text-align: center;">-- Pilih Dokumen Sumber --</option>
                                @foreach ($dokumenSumberOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->dokumen }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Metode Pemeriksaan -->
                        <div class="lg:col-span-1">
                            <label for="metode_id" class="block mb-1 text-sm font-medium text-gray-700">Metode Pemeriksaan</label>
                            <select name="metode_id" id="metode_id"
                                class="block w-full border border-gray-300 rounded-md py-2.5 px-3 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" style="text-align: center;">-- Pilih Metode --</option>
                                @foreach ($metodeOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->metode }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Teknik Pemeriksaan -->
                        <div class="lg:col-span-1">
                            <label for="teknik_id" class="block mb-1 text-sm font-medium text-gray-700">Teknik Pemeriksaan</label>
                            <select name="teknik_id" id="teknik_id"
                                class="block w-full border border-gray-300 rounded-md py-2.5 px-3 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" style="text-align: center;">-- Pilih Teknik --</option>
                                @foreach ($teknikOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->teknik }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Temuan Pemeriksaan, Evaluasi Bukti, Kesimpulan, Tindak Lanjut, Catatan Tambahan -->
                        @foreach ([
                            'temuan_pemeriksaan' => 'Temuan Pemeriksaan',
                            'evaluasi_bukti' => 'Evaluasi Bukti',
                            'kesimpulan' => 'Kesimpulan',
                            'tindak_lanjut' => 'Tindak Lanjut',
                            'catatan_tambahan' => 'Catatan Tambahan'
                        ] as $name => $label)
                            <div class="relative z-0 w-full group">
                                <input type="text" name="{{ $name }}" id="{{ $name }}" placeholder=" "
                                    class="peer block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" />
                                <label for="{{ $name }}" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-600">{{ $label }}</label>
                            </div>
                        @endforeach

                        <!-- Supervisor -->
                        <div class="relative z-0 w-full group">
                            <input type="text" name="supervisor" id="supervisor" placeholder=" " required
                                class="peer block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600" />
                            <label for="supervisor" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-600">Supervisor</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="lg:col-span-3 text-center mt-6">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                <i class="fas fa-paper-plane"></i> SAVE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
