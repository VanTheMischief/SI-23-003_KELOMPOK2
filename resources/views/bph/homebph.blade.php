<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/homeBph.css') }}">
</head>
<body>
	@include('partials.bphNav')

	<div class="head-container">
		<h1 class="welcome">
			Welcome Back, {{ $name }}
		</h1>
		<h1 class="greetings">
			Rekap Event yang sukses di selenggarakan
		</h1>
	</div>

	<div class="rekap-container">
    <h2 class="rekap-title">Rekap Event yang Sudah Selesai</h2>

    @if(count($events ?? []) === 0)
        <div class="alert alert-info">
            Belum ada event yang dibuat.
        </div>
    @else
        <div class="rekap-card-container">
            @foreach($events as $event)
                @if(\Carbon\Carbon::parse($event->tanggal)->lt(\Carbon\Carbon::today()))
                    <div class="rekap-card">
                        <div class="rekap-header">{{ $event->nama_event }}</div>
                        <div class="rekap-body">
                            <p>Jumlah anggota: {{ $event->jmlh_max }}</p>
                            <p>Lokasi: {{ $event->lokasi }}</p>
                            <p>Tanggal: {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F') }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>



</body>

@include('partials.bphfoot')
