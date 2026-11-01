@php($l = $laporan ?? null)

<div class="field">
    <label for="nama_pelapor">Nama pelapor</label>
    <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor', $l?->nama_pelapor) }}">
    @error('nama_pelapor') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="no_hp">No. HP</label>
    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $l?->no_hp) }}" placeholder="081234567890">
    @error('no_hp') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="lokasi">Lokasi / alamat kejadian</label>
    <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $l?->lokasi) }}">
    @error('lokasi') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="kecamatan">Kecamatan</label>
    <select id="kecamatan" name="kecamatan">
        <option value="">-- Pilih kecamatan --</option>
        @foreach (\App\Models\Laporan::KECAMATAN as $kec)
            <option value="{{ $kec }}" @selected(old('kecamatan', $l?->kecamatan) === $kec)>{{ $kec }}</option>
        @endforeach
    </select>
    @error('kecamatan') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="tinggi_air">Tinggi air (cm)</label>
    <input type="number" id="tinggi_air" name="tinggi_air" value="{{ old('tinggi_air', $l?->tinggi_air) }}" min="0">
    @error('tinggi_air') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="tanggal_kejadian">Tanggal kejadian</label>
    <input type="date" id="tanggal_kejadian" name="tanggal_kejadian"
           value="{{ old('tanggal_kejadian', $l?->tanggal_kejadian ? \Carbon\Carbon::parse($l->tanggal_kejadian)->format('Y-m-d') : '') }}">
    @error('tanggal_kejadian') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="keterangan">Keterangan (opsional)</label>
    <textarea id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $l?->keterangan) }}</textarea>
    @error('keterangan') <div class="error">{{ $message }}</div> @enderror
</div>