@include('partials.bphNav')

<div class="container mt-5">
    <h2 class="mb-4">Daftar Event yang Dibuat</h2>

    @if(session('Success'))
        <div class="alert alert-success">
            {{ session('Success') }}
        </div>
    @endif

    @if(count($events) === 0)
        <div class="alert alert-info">
            Belum ada event yang dibuat.
        </div>
    @else
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama Event</th>
                <th>Ketua Pelaksana</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Kuota</th>
                <th>Jumlah Saat Ini</th>
                <th>Dana Dibutuhkan</th>
                <th>Dana Terpakai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ $event->ketuplak }}</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $event->jmlh_max }}</td>
                    <td>{{ $event->jmlh_saat_ini }}</td>
                    <td>Rp {{ $event->dana_dibutuhkan }}</td>
                    <td>Rp {{ $event->dana_terpakai  }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@include('partials.bphfoot')