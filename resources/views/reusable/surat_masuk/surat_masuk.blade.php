<head>
    <title>Surat masuk {{ $surat->nama_kegiatan }}</title>
</head>
<div class="w-[210mm] h-[297mm] mx-auto p-8 bg-white border border-gray-300 shadow-md">
    <div class="grid grid-cols-5">
        <div class="col-span-1">
            <img class="w-20" src="https://getasanbersinar.files.wordpress.com/2016/02/logo-kabupaten-semarang-jawa-tengah.png" />
        </div>
        <div class="text-center col-span-4">
            <h3 class="text-gray-600 text-xl font-sans">DINAS ARSIP DAN PERPUSTAKAAN KOTA SEMARANG</h3>
            <h1 class="text-2xl font-bold font-sans">PEMERINTAH KOTA SEMARANG</h1>
            <h6 class="text-sm font-sans">Jl. Prof. Sudarto No.116, Sumurboto, Kec. Banyumanik, Kota Semarang, Jawa Tengah 50269</h6>
            <h5 class="text-lg font-bold font-sans">Kode Pos: 50269</h5>
        </div>
    </div>
    <div class="text-center mb-4">
        <p class="text-sm">Telepon: 024 7466215 | Email: dinas_arpus@semarangkota.go.id | Whatsapp: +6281222233860</p>
    </div>
    <div class="mt-6">
        <hr class="border-t-4 border-black"/>
        <div class="grid grid-cols-2 mt-4">
            <div>
                <p>Nomor : {{ $surat->nomor_surat }}</p>
                <p>Lampiran : -</p>
                <p>Perihal : Permohonan Pelaksanaan Perpustakaan Keliling</p>
            </div>
            <div class="text-left">
                <p>Semarang, {{ \Carbon\Carbon::parse($surat->jamkerja?->created_at)->translatedFormat('j F Y') }} </p>
                <p>Kepada Yth.:<br /> Kepala Dinas Arsip dan Perpustakaan Kota Semarang</p>
            </div>
        </div>
        <div class="mt-6">
            <p class="indent-8 font-sans">Dengan hormat, Sehubungan dengan program perpustakaan keliling, kami mengajukan permohonan untuk menyelenggarakan kegiatan sebagai berikut:</p>
        </div>
        <div class="mt-4">
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="border px-4 py-2 font-sans">Jenis Informasi</th>
                        <th class="border px-4 py-2 font-sans">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Tanggal</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->jamkerja?->tgl }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Jam Mulai</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->jamkerja?->jam_mulai }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Jam Akhir</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->jamkerja?->jam_akhir }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Lokasi</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->lokasi?->nama_lokasi }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Latitude</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->lokasi?->latitude }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Longitude</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->lokasi?->longtitude }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Radius</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->lokasi?->radius }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Nama Kegiatan</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->nama_kegiatan }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Penanggung Jawab</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->nama_PJ }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Jabatan PJ</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->jabatan_PJ }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Tanda Tangan PJ</td>
                        <td class="border px-4 py-2 font-sans"><img src="{{ $surat->ttd_PJ }}" class="w-24" /></td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">Narahubung</td>
                        <td class="border px-4 py-2 font-sans">{{ $surat->narahubung }}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border px-4 py-2 font-sans">QR Validasi</td>
                        <td class="border px-4 py-2 font-sans">
                            {{ QrCode::size(200)->generate('http://127.0.0.1:8000/admin/surats/'.$surat->id.'/view-surat') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            <p class="font-sans">Demikian untuk menjadikan perhatian dan atas perhatiannya kami ucapkan terima kasih.</p>
        </div>
    </div>
</div> 