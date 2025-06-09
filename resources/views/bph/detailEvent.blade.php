@include('partials.bphNav')

<div class="container mt-5">
    <h2 class="mb-4">Detail Event</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $event->nama_event }}</h5>
            <p><strong>Ketua Pelaksana:</strong> {{ $event->ketuplak }}</p>
            <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->tanggal)->format('d-m-Y') }}</p>
            <p><strong>Kuota:</strong> {{ $event->jmlh_max }}</p>
            <p><strong>Jumlah Saat Ini:</strong> {{ $event->jmlh_saat_ini }}</p>
            <p><strong>Dana Dibutuhkan:</strong> Rp {{ $event->dana_dibutuhkan }}</p>
            <p><strong>Dana Terpakai:</strong> Rp {{ $event->dana_terpakai }}</p>
            <p><strong>Foto hasil kegiatan</strong><br>
                <img src="{{ asset('storage/'. ($event->foto_hasil ?? '')) }}" style="width: 75px; height: 75px;">
            </p>

            <a href="{{ route('editEvent', $event->id) }}" class="btn btn-warning">
            <i class="fa fa-rotate"></i> Update</a>

            <form action="{{ route('destroyEvent', $event->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                @csrf
                @method('DELETE')
                <br><br>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
            </form>
        </div>
    </div>
</div>

@include('partials.bphfoot')
