@include('partials.bphNav')
<div class="container mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tambahEvent.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="nama_event" class="form-label">Nama Event</label>
            <input type="text" class="form-control" id="nama_event" name="nama_event">
        </div>
        <div class="mb-3">
            <label for="penyelenggara" class="form-label">Penyelenggara</label>
            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="{{ $ukm->nama_ukm ?? 'Tidak Ditemukan' }}" readonly disabled>
        </div>
        <div class="mb-3">
            <label for="ketuplak" class="form-label">Ketua pelaksana</label>
            <input type="text" class="form-control" id="ketuplak" name="ketuplak">
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi">
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
        </div>
        <div class="mb-3">
            <label for="jmlh_max" class="form-label">Jumlah maximum</label>
            <input type="number" class="form-control" id="jmlh_max" name="jmlh_max">
        </div>
        <div class="mb-3">
            <label for="dana_butuh" class="form-label">Dana yang dibutuhkan</label>
            <input type="text" class="form-control" id="dana_butuh" name="dana_butuh">
        </div>
        <div class="mb-3">
            <label for="dana_terpakai" class="form-label">Dana yang terpakai</label>
            <input type="text" class="form-control" id="dana_terpakai" name="dana_terpakai">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-success" id="submit" name="submit" value="submit">
        </div>
    </form>
</div>


@include('partials.bphfoot')