<head>
    <title>Surat Masuk - {{ $surat->nama_kegiatan }}</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf-style.css') }}">
</head>
<div class="w-[210mm] h-[297mm] mx-auto p-10 bg-white">
    <!-- Header -->
    <div class="flex items-center border-b-4 border-black pb-4 ">
        <img src="{{ asset('storage/img/logo_smg.png') }}" class="w-16 h-auto"/>
        <div class="text-center flex-1">
            <h2 class="text-lg font-bold">DINAS ARSIP DAN PERPUSTAKAAN KOTA SEMARANG</h2>
            <h3 class="text-md font-semibold">PEMERINTAH KOTA SEMARANG</h3>
            <p class="text-sm">Jl. Prof. Sudarto No.116, Sumurboto, Kec. Banyumanik, Kota Semarang</p>
            <p class="text-sm">Telepon: 024 7466215 | Email: dinas_arpus@semarangkota.go.id</p>
        </div>
    </div>
    <hr class="border-8 border-black">
    <hr class="border-8 border-black">
    <hr class="border-8 border-black">

    <div class="pt-4 text-right">
        <p>Semarang, {{ \Carbon\Carbon::parse($surat->jamkerja?->created_at)->isoFormat('D MMMM YYYY') }}</p>
    </div>

    <!-- Informasi Surat -->
    <div class="mt-6 space-y-1">
        <div class="flex">
            <span class="w-32">Nomor</span> 
            <span>: {{ $surat->nomor_surat }}</span>
        </div>
        <div class="flex">
            <span class="w-32">Lampiran</span> 
            <span>: -</span>
        </div>
        <div class="flex">
            <span class="w-32">Perihal</span> 
            <span>: Permohonan Pelaksanaan Perpustakaan Keliling</span>
        </div>
        <div class="flex">
            <span class="w-32">Kepada Yth</span> 
            <span>: Kepala Dinas Arsip dan Perpustakaan Kota Semarang</span>
        </div>
    </div>

    <!-- pembuka Surat -->
    <div class="mt-6">
        <p class="text-justify indent-8">
            Dengan hormat,  
        Sehubungan dengan program perpustakaan keliling yang bertujuan untuk meningkatkan minat baca masyarakat, 
        kami mengajukan permohonan untuk menyelenggarakan kegiatan perpustakaan keliling sebagai berikut:
        </p>
    </div>

    <!-- Detail Kegiatan -->
    <div class="mt-6 space-y-2">
        <div class="flex">
            <span class="w-32">Tanggal</span>  
            <span>: {{ $surat->jamkerja?->tgl }}</span>
        </div>
        <div class="flex">
            <span class="w-32">Jam Mulai</span>  
            <span>: {{ $surat->jamkerja?->jam_mulai }}</span>
        </div>
        <div class="flex">
            <span class="w-32">Jam Akhir</span>  
            <span>: {{ $surat->jamkerja?->jam_akhir }}</span>
        </div>
        <div class="flex">
            <span class="w-32">Alamat</span>  
            <span>: {{ $surat->lokasi?->nama_lokasi }}</span>
        </div>
        <div class="flex">
            <span class="w-32">Nama Kegiatan</span>  
            <span>: {{ $surat->nama_kegiatan }}</span>
        </div>
        <div class="flex">
            <span class="w-32">Narahubung</span>  
            <span>: {{ $surat->narahubung }}</span>
        </div>
    </div>
    
    <!-- Penutup Surat -->
    <div class="mt-6">
        <p class="text-justify indent-8">
            Demikian permohonan ini kami sampaikan. Besar harapan kami agar permohonan ini dapat disetujui.  
            Atas perhatian dan kerja samanya, kami ucapkan terima kasih.
        </p>
    </div>

    <!-- Tanda Tangan -->
    <div class="mt-4 flex flex-col items-end">
        <div class="text-right">
            <p>{{ $surat->jabatan_PJ }}</p>
        </div><!-- Gambar Tanda Tangan -->
        <div class="mb-2">
            <img src="{{ asset('storage/'.$surat->ttd_PJ) }}" class="w-16 h-16 object-contain" />
        </div>
        <!-- Nama & Jabatan PJ -->
        <div class="text-right">
            <p class=">{{ $surat->nama_PJ }}</p>
        </div>
    </div>


    {{-- <!-- QR Code -->
    <div class="mt-6 text-center">
        <p class="font-semibold">Pindai QR untuk validasi:</p>
        <div class="flex justify-center">
            {{ QrCode::size(200)->generate('http://127.0.0.1:8000/admin/surats/'.$surat->id.'/view-surat') }}
        </div>
    </div> --}}
</div>
