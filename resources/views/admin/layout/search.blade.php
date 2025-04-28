<form action="{{ url(Request::segment(1) . '/' . Request::segment(2)) }}" method="get">
    <div class="row">
        <div class="col-md-3">
            <select name="filter_by" id="filter_by" class="form-control" onchange="changeFilterInput()">
                <option value="">-- Pilih Filter --</option>
                <option value="id" {{ request()->filter_by == 'id' ? 'selected' : '' }}>ID</option>
                <option value="judul_pengaduan" {{ request()->filter_by == 'judul_pengaduan' ? 'selected' : '' }}>Judul Pengaduan</option>
                <option value="latest_pendampingan" {{ request()->filter_by == 'latest_pendampingan' ? 'selected' : '' }}>Status Pendampingan</option>
                <option value="tahun" {{ request()->filter_by == 'tahun' ? 'selected' : '' }}>Tahun</option>

                @if(!Auth::user()->hasRole('pendampingdinas'))
                <option value="pendamping_id" {{ request()->filter_by == 'pendamping_id' ? 'selected' : '' }}>Pendamping</option>
                @endif
            </select>
        </div>

        <div class="col-md-5" id="text_search">
            <input type="text" name="search" class="form-control" placeholder="Masukkan Kata Pencarian..." value="{{ request()->search ?? '' }}">
        </div>

        <div class="col-md-5" id="pendamping_search" style="display: none;">
            <select name="pendamping_id" class="form-control">
                @if(!Auth::user()->hasRole('pendampingdinas'))

                <option value="">-- Pilih Pendamping --</option>
                @php
                    $pendampings = \App\Models\User::role('pendampingdinas')->pluck('name', 'id');
                @endphp
                @foreach ($pendampings as $id => $name)
                    <option value="{{ $id }}" {{ request()->pendamping_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
                @endif

            </select>
        </div>


        <div class="col-md-5" id="year_search" style="display: none;">
            <select name="year" class="form-control">
                <option value="">-- Pilih Tahun --</option>
                @php
                    $years = \App\Models\Pengaduan::selectRaw('YEAR(created_at) as year')
                        ->groupBy('year')
                        ->orderBy('year', 'desc')
                        ->pluck('year');
                @endphp
                @foreach ($years as $year)
                    <option value="{{ $year }}" {{ request()->year == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-dark">
                Cari
            </button>
        </div>
    </div>
</form>

<script>
function changeFilterInput() {
    let filter = document.getElementById('filter_by').value;
    if (filter === 'tahun') {
        document.getElementById('year_search').style.display = 'block';
        document.getElementById('text_search').style.display = 'none';
    } else {
        document.getElementById('year_search').style.display = 'none';
        document.getElementById('text_search').style.display = 'block';
    }
}

// Panggil pas halaman pertama kali dibuka
changeFilterInput();


function changeFilterInput() {
    let filter = document.getElementById('filter_by').value;

    if (filter === 'tahun') {
        document.getElementById('year_search').style.display = 'block';
        document.getElementById('pendamping_search').style.display = 'none';
        document.getElementById('text_search').style.display = 'none';
    } else if (filter === 'pendamping_id') {
        document.getElementById('pendamping_search').style.display = 'block';
        document.getElementById('year_search').style.display = 'none';
        document.getElementById('text_search').style.display = 'none';
    } else {
        document.getElementById('text_search').style.display = 'block';
        document.getElementById('year_search').style.display = 'none';
        document.getElementById('pendamping_search').style.display = 'none';
    }
}

</script>
