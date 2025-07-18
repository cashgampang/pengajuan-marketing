@extends('layouts.parent-layout')

@section('breadcrumb-title', '/ Detail Pengajuan')
@section('page-title', 'Pengajuan Nasabah Luar')

@section('content')
    <style>
        .form-step {
            display: none;
        }

        .form-step-active {
            display: block;
        }
    </style>
    <main id="main" class="main">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="{{ url()->previous() }}" class="btn btn-success btn-sm">Back</a>
                        <h4 class="card-title text-center mt-2 mb-2">Form Detail Pengajuan Pinjaman</h4>
                        <div style="width: 80px;"></div>
                    </div>
                    <div class="card-body">
                        <!-- Step 1: Informasi Nasabah -->
                        <div class="form-step form-step-active">
                            <h5 class="mb-3">Informasi Nasabah</h5>
                            <div class="form-group">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->nama_lengkap }}" readonly>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" id="nik" name="nik" class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->nik }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="no_kk" class="form-label">No KK</label>
                                    <input type="text" id="no_kk" name="no_kk" class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->no_kk }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        {{ $pengajuan->nasabahLuar->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ $pengajuan->nasabahLuar->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->tempat_lahir }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->tanggal_lahir }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_nikah" class="form-label">Status Pernikahan</label>
                                <select name="status_nikah" id="status_nikah" class="form-select">
                                    <option value="">Pilih Status Pernikahan</option>
                                    <option
                                        value="Belum Menikah"{{ $pengajuan->nasabahLuar->status_nikah == 'Belum Menikah' ? 'selected' : '' }}>
                                        Belum Menikah</option>
                                    <option value="Menikah"
                                        {{ $pengajuan->nasabahLuar->status_nikah == 'Menikah' ? 'selected' : '' }}>
                                        Menikah</option>
                                    <option value="Janda/Duda"
                                        {{ $pengajuan->nasabahLuar->status_nikah == 'Janda/Duda' ? 'selected' : '' }}>
                                        Janda/Duda</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="no_hp" class="form-label">Nomor HP/WA</label>
                                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->no_hp }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->email }}" readonly>
                                </div>
                            </div>
                            @php
                                $namaNasabah = str_replace(' ', '-', strtolower($pengajuan->nasabahLuar->nama_lengkap));
                                $folderNasabah = $namaNasabah . '-' . $pengajuan->nasabahLuar->id;
                            @endphp
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                                    <a href="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->foto_ktp) }}?v={{ time() }}"
                                        target="_blank">
                                        <img src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->foto_ktp) }}?t={{ time() }}"
                                            alt="Foto KTP" class="img-thumbnail" style="max-width: 100%; height: auto;">
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <label for="foto_kk" class="form-label">Foto Kartu Keluarga</label>
                                    <br>
                                    <a href="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->foto_kk) }}?v={{ time() }}"
                                        target="_blank">
                                        <img src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->foto_kk) }}?t={{ time() }}"
                                            alt="Foto KTP" class="img-thumbnail" style="max-width: 100%; height: auto;">
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <label for="dokumen_pendukung" class="form-label">Dokumen Pendukung</label>
                                    <br>
                                    @if ($pengajuan->nasabahLuar && $pengajuan->nasabahLuar->dokumen_pendukung)
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalDokumenPendukung">
                                            Lihat PDF
                                        </button>

                                        <div class="modal fade" id="modalDokumenPendukung" tabindex="-1"
                                            aria-labelledby="modalDokumenPendukungLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDokumenPendukungLabel">
                                                            Dokumen Pendukung</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <embed
                                                            src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->dokumen_pendukung ?? '') }}?t={{ time() }}"
                                                            type="application/pdf" width="100%" height="500px">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <span class="form-text">File :
                                            {{ $pengajuan->nasabahLuar->dokumen_pendukung ?? '' }}</span>
                                    @else
                                        <p class="text-danger">File PDF Dokumen Pendukung tidak tersedia.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-primary next-btn">Next</button>
                            </div>
                        </div>

                        <!-- Step 2: Alamat Nasabah -->
                        <div class="form-step">
                            <h5>Alamat Nasabah</h5>
                            <div class="form-group">
                                <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                                <input type="text" id="alamat_ktp" name="alamat_ktp" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->alamatLuar->alamat_ktp ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="kelurahan" class="form-label">Kelurahan</label>
                                    <input type="text" id="kelurahan" name="kelurahan" class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->alamatLuar->kelurahan ?? 'Belum diisi' }}"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="rt_rw" class="form-label">RT/RW</label>
                                    <input type="text" id="rt_rw" name="rt_rw" class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->alamatLuar->rt_rw ?? 'Belum diisi' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->alamatLuar->kecamatan ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="kota" class="form-label">Kabupaten/Kota</label>
                                <input type="text" id="kota" name="kota" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->alamatLuar->kota ?? 'Belum diisi' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->alamatLuar->provinsi ?? 'Belum diisi' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status_rumah" class="form-label">Status Rumah</label>
                                <select id="status_rumah" name="status_rumah" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="kontrak bulanan"
                                        {{ $pengajuan->nasabahLuar->alamatLuar->status_rumah == 'kontrak bulanan' ? 'selected' : '' }}>
                                        Kontrak Bulanan</option>
                                    <option value="kontrak tahunan"
                                        {{ $pengajuan->nasabahLuar->alamatLuar->status_rumah == 'kontrak tahunan' ? 'selected' : '' }}>
                                        Kontrak Tahunan</option>
                                    <option value="milik orang tua"
                                        {{ $pengajuan->nasabahLuar->alamatLuar->status_rumah == 'milik orang tua' ? 'selected' : '' }}>
                                        Milik Orang Tua</option>
                                    <option value="pribadi"
                                        {{ $pengajuan->nasabahLuar->alamatLuar->status_rumah == 'pribadi' ? 'selected' : '' }}>
                                        Milik
                                        Pribadi</option>
                                </select>
                            </div>
                            <div class="form-group" id="kontrak-bulanan-group" style="display: none;">
                                <label for="biaya_perbulan" class="form-label">Biaya Perbulan</label>
                                <input type="number" id="biaya_perbulan" name="biaya_perbulan" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->alamatLuar->biaya_perbulan ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group" id="kontrak-tahunan-group" style="display: none;">
                                <label for="biaya_pertahun" class="form-label">Biaya Pertahun</label>
                                <input type="number" id="biaya_pertahun" name="biaya_pertahun" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->alamatLuar->biaya_pertahun ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="domisili" class="form-label">Alamat Domisili</label>
                                <select id="domisili" name="domisili" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="sesuai ktp"
                                        {{ $pengajuan->nasabahLuar->alamatLuar->domisili == 'sesuai ktp' ? 'selected' : '' }}>
                                        Sesuai KTP
                                    </option>
                                    <option value="tidak sesuai ktp"
                                        {{ $pengajuan->nasabahLuar->alamatLuar->domisili == 'tidak sesuai ktp' ? 'selected' : '' }}>
                                        Tidak
                                        Sesuai KTP</option>
                                </select>
                            </div>
                            <div class="form-group" id="alamat-lengkap-group" style="display: none;">
                                <div class="form-group">
                                    <label for="alamat_domisili" class="form-label">Alamat Lengkap</label>
                                    <textarea name="alamat_domisili" id="alamat_domisili" cols="30" rows="10" class="form-control">{{ $pengajuan->nasabahLuar->alamatLuar->alamat_domisili ?? 'Belum diisi' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rumah_domisili" class="form-label">Status Rumah Domisili</label>
                                    <select id="rumah_domisili" name="rumah_domisili" class="form-select">
                                        <option value="">Pilih</option>
                                        <option value="kontrak bulanan"
                                            {{ $pengajuan->nasabahLuar->alamatLuar->rumah_domisili == 'kontrak bulanan' ? 'selected' : '' }}>
                                            Kontrak Bulanan</option>
                                        <option value="kontrak tahunan"
                                            {{ $pengajuan->nasabahLuar->alamatLuar->rumah_domisili == 'kontrak tahunan' ? 'selected' : '' }}>
                                            Kontrak Tahunan</option>
                                        <option value="milik orang tua"
                                            {{ $pengajuan->nasabahLuar->alamatLuar->rumah_domisili == 'milik orang tua' ? 'selected' : '' }}>
                                            Milik Orang Tua</option>
                                        <option value="pribadi"
                                            {{ $pengajuan->nasabahLuar->alamatLuar->rumah_domisili == 'pribadi' ? 'selected' : '' }}>
                                            Milik
                                            Pribadi</option>
                                    </select>
                                </div>
                                <div class="form-group" id="domisili-bulanan-group" style="display: none;">
                                    <label for="biaya_perbulan_domisili" class="form-label">Biaya Perbulan</label>
                                    <input type="number" id="biaya_perbulan_domisili" name="biaya_perbulan_domisili"
                                        class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->alamatLuar->biaya_perbulan_domisili ?? 'Belum diisi' }}"
                                        readonly>
                                </div>
                                <div class="form-group" id="domisili-tahunan-group" style="display: none;">
                                    <label for="biaya_pertahun_domisili" class="form-label">Biaya Pertahun</label>
                                    <input type="number" id="biaya_pertahun_domisili" name="biaya_pertahun_domisili"
                                        class="form-control"
                                        value="{{ $pengajuan->nasabahLuar->alamatLuar->biaya_pertahun_domisili ?? 'Belum diisi' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lama_tinggal" class="form-label">Lama Tinggal</label>
                                <input type="text" id="lama_tinggal" name="lama_tinggal" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->alamatLuar->lama_tinggal ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="share_loc_link" class="form-label">Share Loc Alamat Nasabah</label>
                                <input type="text" id="share_loc_link" name="share_loc_link" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->alamatLuar->share_loc_link ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="atas_nama_listrik" class="form-label">Rekening Listrik Atas
                                        Nama</label>
                                    <input type="text" class="form-control" name="atas_nama_listrik"
                                        id="atas_nama_listrik"
                                        value="{{ $pengajuan->nasabahLuar->alamatLuar->atas_nama_listrik ?? 'Belum diisi' }}"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="hubungan_rek_listrik">Hubungan dengan Pemilik Rekening Listrik</label>
                                    <input type="text" class="form-control" name="hubungan_rek_listrik"
                                        id="hubungan_rek_listrik"
                                        value="{{ $pengajuan->nasabahLuar->alamatLuar->hubungan ?? 'Belum diisi' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto_meteran_listrik">Foto Meteran Listrik Rumah</label>
                                <br>
                                @if ($pengajuan->nasabahLuar->alamatLuar && $pengajuan->nasabahLuar->alamatLuar->foto_meteran_listrik)
                                    <a href="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->alamatLuar->foto_meteran_listrik) }}?v={{ time() }}"
                                        target="_blank">
                                        <img src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->alamatLuar->foto_meteran_listrik) }}?v={{ time() }}"
                                            alt="Foto KTP" class="img-thumbnail" style="max-width: 100%; height: auto;">
                                    </a>
                                @else
                                    <p class="text-danger">Foto Meteran Listrik tidak tersedia.</p>
                                @endif
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                <button type="submit" class="btn btn-primary next-btn">Next</button>
                            </div>
                        </div>

                        <!-- Step 3: Informasi Pekerjaan -->
                        <div class="form-step">
                            <h5>Informasi Pekerjaan</h5>
                            <div class="form-group">
                                <label for="perusahaan" class="form-label">Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan" id="perusahaan"
                                    value="{{ $pengajuan->nasabahLuar->pekerjaanLuar->perusahaan ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                                <textarea name="alamat_perusahaan" id="alamat_perusahaan" cols="30" rows="10" class="form-control"
                                    readonly>{{ $pengajuan->nasabahLuar->pekerjaanLuar->alamat_perusahaan ?? 'Belum diisi' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="kontak_perusahaan" class="form-label">No Telp Perusahaan</label>
                                <input type="text" class="form-control" name="kontak_perusahaan"
                                    id="kontak_perusahaan"
                                    value="{{ $pengajuan->nasabahLuar->pekerjaanLuar->kontak_perusahaan ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan"
                                    value="{{ $pengajuan->nasabahLuar->pekerjaanLuar->jabatan ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="lama_kerja" class="form-label">Lama Bekerja</label>
                                <input type="text" class="form-control" name="lama_kerja" id="lama_kerja"
                                    value="{{ $pengajuan->nasabahLuar->pekerjaanLuar->lama_kerja ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="status_karyawan" class="form-label">Status Karyawan</label>
                                <select id="status_karyawan" name="status_karyawan" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="tetap"
                                        {{ $pengajuan->nasabahLuar->pekerjaanLuar->status_karyawan == 'tetap' ? 'selected' : '' }}>
                                        Tetap
                                    </option>
                                    <option value="kontrak"
                                        {{ $pengajuan->nasabahLuar->pekerjaanLuar->status_karyawan == 'kontrak' ? 'selected' : '' }}>
                                        Kontrak</option>
                                </select>
                            </div>
                            <div class="form-group" id="div-kontrak" style="display: none;">
                                <label for="lama_kontrak" class="form-label">Lama Kontrak</label>
                                <input type="text" name="lama_kontrak" id="lama_kontrak" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->pekerjaanLuar->lama_kontrak ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="pendapatan_perbulan" class="form-label">Pendapatan Perbulan</label>
                                <input type="number" name="pendapatan_perbulan" id="pendapatan_perbulan"
                                    class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->pekerjaanLuar->pendapatan_perbulan ?? 0 }}"
                                    readonly>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="foto_id_card" class="form-label">Foto ID Card/SKU</label>
                                    <br>
                                    @if ($pengajuan->nasabahLuar->pekerjaanLuar && $pengajuan->nasabahLuar->pekerjaanLuar->id_card)
                                        <a href="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->pekerjaanLuar->id_card) }}?v={{ time() }}"
                                            target="_blank">
                                            <img src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->pekerjaanLuar->id_card) }}?v={{ time() }}"alt="Foto KTP"
                                                class="img-thumbnail" style="max-width: 100%; height: auto;">
                                        </a>
                                    @else
                                        <p class="text-danger">Foto ID Card/SKU tidak tersedia.</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="foto_slip_gaji" class="form-label">Foto Slip Gaji/Mutasi</label>
                                    <br>
                                    @if ($pengajuan->nasabahLuar->pekerjaanLuar && $pengajuan->nasabahLuar->pekerjaanLuar->slip_gaji)
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalSlipGaji">
                                            Lihat PDF
                                        </button>

                                        <div class="modal fade" id="modalSlipGaji" tabindex="-1"
                                            aria-labelledby="modalSlipGajiLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalSlipGajiLabel">Surat
                                                            Pernyataan Penjamin</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <embed
                                                            src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->pekerjaanLuar->slip_gaji) }}?v={{ time() }}"
                                                            type="application/pdf" width="100%" height="500px">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <span class="form-text">File :
                                            {{ $pengajuan->nasabahLuar->pekerjaanLuar->slip_gaji ?? '' }}</span>
                                    @else
                                        <p class="text-danger">File PDF Slip Gaji/Mutasi tidak tersedia.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="norek">No Rekening</label>
                                <br>
                                @if ($pengajuan->nasabahLuar->pekerjaanLuar && $pengajuan->nasabahLuar->pekerjaanLuar->norek)
                                    <a href="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->pekerjaanLuar->norek) }}?v={{ time() }}"
                                        target="_blank">
                                        <img src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->pekerjaanLuar->norek) }}?v={{ time() }}"
                                            alt="Foto No Rekening" class="img-thumbnail"
                                            style="max-width: 100%; height: auto;">
                                    </a>
                                @else
                                    <p class="text-danger">No Rekening tidak tersedia.</p>
                                @endif
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                <button type="submit" class="btn btn-primary next-btn">Next</button>
                            </div>
                        </div>

                        <!-- Step 4: Penjamin Nasabah -->
                        <div class="form-step">
                            <h5>Penjamin Nasabah</h5>
                            <div class="form-group">
                                <label for="hubungan_penjamin" class="form-label">Hubungan Keluarga</label>
                                <select id="hubungan_penjamin" name="hubungan_penjamin" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="orang tua"
                                        {{ $pengajuan->nasabahLuar->penjaminLuar->hubungan_penjamin == 'Orang Tua' ? 'selected' : '' }}>
                                        Orang Tua</option>
                                    <option value="suami"
                                        {{ $pengajuan->nasabahLuar->penjaminLuar->hubungan_penjamin == 'Suami' ? 'selected' : '' }}>
                                        Suami
                                    </option>
                                    <option value="istri"
                                        {{ $pengajuan->nasabahLuar->penjaminLuar->hubungan_penjamin == 'Istri' ? 'selected' : '' }}>
                                        Istri
                                    </option>
                                    <option value="anak"
                                        {{ $pengajuan->nasabahLuar->penjaminLuar->hubungan_penjamin == 'Anak' ? 'selected' : '' }}>
                                        Anak
                                    </option>
                                    <option value="keluarga kandung"
                                        {{ $pengajuan->nasabahLuar->penjaminLuar->hubungan_penjamin == 'Keluarga Kandung' ? 'selected' : '' }}>
                                        Keluarga Kandung</option>
                                    <option value="lainnya"
                                        {{ $pengajuan->nasabahLuar->penjaminLuar->hubungan_penjamin == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_penjamin" class="form-label">Nama Penjamin</label>
                                <input type="text" id="nama_penjamin" name="nama_penjamin" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->penjaminLuar->nama_penjamin ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_penjamin" class="form-label">Pekerjaan Penjamin</label>
                                <input type="text" id="pekerjaan_penjamin" name="pekerjaan_penjamin"
                                    class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->penjaminLuar->pekerjaan_penjamin ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="penghasilan_penjamin" class="form-label">Penghasilan</label>
                                <input type="number" id="penghasilan_penjamin" name="penghasilan_penjamin"
                                    class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->penjaminLuar->penghasilan_penjamin ?? 0 }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_hp_penjamin" class="form-label">No HP/WA</label>
                                <input type="text" id="no_hp_penjamin" name="no_hp_penjamin" class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->penjaminLuar->no_hp_penjamin ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="foto_ktp_penjamin" class="form-label">KTP Penjamin</label>
                                <br>
                                @if ($pengajuan->nasabahLuar->penjaminLuar && $pengajuan->nasabahLuar->penjaminLuar->foto_ktp_penjamin)
                                    <a href="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->penjaminLuar->foto_ktp_penjamin) }}?v={{ time() }}"
                                        target="_blank">
                                        <img src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->nasabahLuar->penjaminLuar->foto_ktp_penjamin) }}?v={{ time() }}"
                                            alt="Foto KTP" class="img-thumbnail" style="max-width: 100%; height: auto;">
                                    </a>
                                @else
                                    <p class="text-danger">Foto KTP Penjamin tidak tersedia.</p>
                                @endif
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                <button type="submit" class="btn btn-primary next-btn">Next</button>
                            </div>
                        </div>

                        <!-- Step 5: Data Tanggungan dan Cicilan Lain -->
                        <div class="form-step">
                            <h5>Data Tanggungan dan Cicilan Lain</h5>
                            <div class="form-group">
                                <label for="kondisi_tanggungan" class="form-label">Kondisi Tanggungan Nasabah</label>
                                <textarea name="kondisi_tanggungan" id="kondisi_tanggungan" cols="30" rows="10" class="form-control">{{ $pengajuan->nasabahLuar->tanggunganLuar->kondisi_tanggungan ?? 'Belum diisi' }}</textarea>
                            </div>

                            <!-- Dropdown Cicilan Lain -->
                            <div class="form-group">
                                <label for="cicilan_lain" class="form-label">Cicilan Lain</label>
                                <select name="cicilan_lain" id="cicilan_lain" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="Ada"
                                        {{ optional($pengajuan->nasabahLuar->pinjamanLainLuar->first())->cicilan_lain == 'Ada' ? 'selected' : '' }}>
                                        Ada
                                    </option>
                                    <option value="Tidak"
                                        {{ optional($pengajuan->nasabahLuar->pinjamanLainLuar->first())->cicilan_lain == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                </select>
                            </div>

                            <!-- Container Form Cicilan -->
                            <div id="cicilan-container" style="display: none;">
                                <!-- Form Pertama -->
                                <div id="dynamic-form-container">
                                    @foreach ($pengajuan->nasabahLuar->pinjamanLainLuar as $index => $cicilan)
                                        <div class="dynamic-form mb-3" id="form-{{ $index }}">
                                            <h6>Form Cicilan Lain {{ $index + 1 }}</h6>
                                            <div class="form-group">
                                                <label for="nama_pembiayaan_{{ $index }}" class="form-label">Nama
                                                    Pembiayaan</label>
                                                <input type="text" id="nama_pembiayaan_{{ $index }}"
                                                    name="nama_pembiayaan[]" class="form-control"
                                                    value="{{ $cicilan->nama_pembiayaan }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="total_pinjaman_{{ $index }}" class="form-label">Total
                                                    Pinjaman</label>
                                                <input type="number" id="total_pinjaman_{{ $index }}"
                                                    name="total_pinjaman[]" class="form-control"
                                                    value="{{ $cicilan->total_pinjaman }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cicilan_perbulan_{{ $index }}"
                                                    class="form-label">Cicilan Perbulan</label>
                                                <input type="number" id="cicilan_perbulan_{{ $index }}"
                                                    name="cicilan_perbulan[]" class="form-control"
                                                    value="{{ $cicilan->cicilan_perbulan }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="sisa_tenor_cicilan_{{ $index }}"
                                                    class="form-label">Sisa Tenor</label>
                                                <input type="number" id="sisa_tenor_cicilan_{{ $index }}"
                                                    name="sisa_tenor_cicilan[]" class="form-control"
                                                    value="{{ $cicilan->sisa_tenor }}">
                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Navigasi -->
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                <button type="submit" class="btn btn-primary next-btn">Next</button>
                            </div>
                        </div>

                        <!-- Step 6: Informasi Kontak Darurat -->
                        <div class="form-step">
                            <h5>Informasi Kontak Darurat</h5>
                            <div class="form-group">
                                <label for="nama_kontak_darurat" class="form-label">Nama Saudara Tidak Serumah</label>
                                <input type="text" name="nama_kontak_darurat" id="nama_kontak_darurat"
                                    class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->kontakDarurat->nama_kontak_darurat ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="hubungan_kontak_darurat" class="form-label">Hubungan</label>
                                <input type="text" name="hubungan_kontak_darurat" id="hubungan_kontak_darurat"
                                    class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->kontakDarurat->hubungan_kontak_darurat ?? 'Belum diisi' }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_hp_kontak_darurat" class="form-label">No HP/WA</label>
                                <input type="text" name="no_hp_kontak_darurat" id="no_hp_kontak_darurat"
                                    class="form-control"
                                    value="{{ $pengajuan->nasabahLuar->kontakDarurat->no_hp_kontak_darurat ?? 'Belum diisi' }}"
                                    readonly>
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                <button type="submit" class="btn btn-primary next-btn">Next</button>
                            </div>
                        </div>

                        <!-- Step 7: Pengajuan Pinjaman -->
                        <div class="form-step">
                            <h5>Informasi Pengajuan Pinjaman</h5>
                            <div class="form-group">
                                <label for="status_pinjaman">Status Pinjaman</label>
                                <select name="status_pinjaman" id="status_pinjaman" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="baru" {{ $pengajuan->status_pinjaman == 'baru' ? 'selected' : '' }}>
                                        Baru</option>
                                    <option value="lama" {{ $pengajuan->status_pinjaman == 'lama' ? 'selected' : '' }}>
                                        Lama</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nominal_pinjaman" class="form-label">Nominal Pinjaman</label>
                                <input type="number" id="nominal_pinjaman" name="nominal_pinjaman" class="form-control"
                                    value="{{ $pengajuan->nominal_pinjaman }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tenor" class="form-label">Jangka Waktu</label>
                                <input type="number" name="tenor" id="tenor" class="form-control"
                                    value="{{ $pengajuan->tenor }}" readonly>
                            </div>
                            <div id="riwayat-pinjaman-group" style="display: none;">
                                <h5>Riwayat Pinjaman</h5>
                                <div class="form-group">
                                    <label for="pinjaman_ke">Pinjaman Ke</label>
                                    <input type="number" name="pinjaman_ke" id="pinjaman_ke" class="form-control"
                                        value="{{ $pengajuan->pinjaman_ke }}">
                                </div>
                                <div class="form-group">
                                    <label for="pinjaman_terakhir">Nominal Pinjaman Terakhir</label>
                                    <input type="number" name="pinjaman_terakhir" id="pinjaman_terakhir"
                                        class="form-control" value="{{ $pengajuan->pinjaman_terakhir }}">
                                </div>
                                <div class="form-group">
                                    <label for="sisa_pinjaman">Sisa Pinjaman</label>
                                    <input type="number" name="sisa_pinjaman" id="sisa_pinjaman" class="form-control"
                                        value="{{ $pengajuan->sisa_pinjaman }}">
                                </div>
                                <div class="form-group">
                                    <label for="realisasi_pinjaman">Realisasi Pinjaman</label>
                                    <input type="text" name="realisasi_pinjaman" id="realisasi_pinjaman"
                                        class="form-control" value="{{ $pengajuan->realisasi_pinjaman }}">
                                </div>
                                <div class="form-group">
                                    <label for="cicilan_perbulan_pinjaman">Cicilan Perbulan Pinjaman</label>
                                    <input type="number" name="cicilan_perbulan_pinjaman" id="cicilan_perbulan_pinjaman"
                                        class="form-control" value="{{ $pengajuan->cicilan_perbulan }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pembiayaan">Jenis Pembiayaan</label>
                                <select name="jenis_pembiayaan" id="jenis_pembiayaan" class="form-select" readonly>
                                    <option value="">Pilih</option>
                                    <option value="BPJS"
                                        {{ $pengajuan->jenis_pembiayaan === 'BPJS' ? 'selected' : '' }}>
                                        BPJS</option>
                                    <option value="SHM"
                                        {{ $pengajuan->jenis_pembiayaan === 'SHM' ? 'selected' : '' }}>
                                        SHM</option>
                                    <option value="BPKB"
                                        {{ $pengajuan->jenis_pembiayaan === 'BPKB' ? 'selected' : '' }}>
                                        BPKB</option>
                                    <option value="UMKM"
                                        {{ $pengajuan->jenis_pembiayaan === 'UMKM' ? 'selected' : '' }}>
                                        UMKM</option>
                                    <option value="SF" {{ $pengajuan->jenis_pembiayaan === 'SF' ? 'selected' : '' }}>
                                        SF</option>
                                    <option value="Kedinasan"
                                        {{ $pengajuan->jenis_pembiayaan === 'Kedinasan' ? 'selected' : '' }}>
                                        Kedinasan</option>
                                    <option value="Kecamatan"
                                        {{ $pengajuan->jenis_pembiayaan === 'Kecamatan' ? 'selected' : '' }}>
                                        Kecamatan</option>
                                </select>
                            </div>
                            <h5>Berkas Jaminan Pengajuan {{ $pengajuan->jenis_pembiayaan }}</h5>
                            <div class="form-group">
                                <label for="foto_bpjs" class="form-label">Jaminan</label>
                                <br>
                                @if ($pengajuan && $pengajuan->berkas_jaminan)
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalFotoBPJS">
                                        Lihat PDF
                                    </button>

                                    <div class="modal fade" id="modalFotoBPJS" tabindex="-1"
                                        aria-labelledby="modalFotoBPJSLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalFotoBPJSLabel">
                                                        File BPJS</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed
                                                        src="{{ asset('storage/dokumen_pendukung_luar/' . $folderNasabah . '/' . $pengajuan->berkas_jaminan) }}?v={{ time() }}"
                                                        type="application/pdf" width="100%" height="500px">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <span class="form-text">File :
                                        {{ $pengajuan->berkas_jaminan ?? '' }}</span>
                                @else
                                    <p class="text-danger">Berkas Jaminan tidak tersedia.</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="catatan_marketing" class="form-label">Catatan Marketing</label>
                                <br>
                                <textarea name="catatan_marketing" id="catatan_marketing" cols="30" rows="10" class="form-control">{{ $pengajuan->catatan_marketing }}</textarea>
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {

            // Event ketika dropdown berubah
            $('#jenis_pembiayaan').on('change', function() {
                const selectedValue = $(this).val();

                // Sembunyikan semua grup form
                $('#bpjs-group').hide();
                $('#shm-group').hide();
                $('#bpkb-group').hide();
                $('#kedinasan-group').hide();

                // Tampilkan form sesuai dengan pilihan
                if (selectedValue === 'BPJS') {
                    $('#bpjs-group').show();
                } else if (selectedValue === 'SHM') {
                    $('#shm-group').show();
                } else if (selectedValue === 'BPKB') {
                    $('#bpkb-group').show();
                } else if (selectedValue === 'Kedinasan') {
                    $('#kedinasan-group').show();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen untuk Status Rumah
            const statusRumahSelect = document.getElementById('status_rumah');
            const kontrakBulananGroup = document.getElementById('kontrak-bulanan-group');
            const kontrakTahunanGroup = document.getElementById('kontrak-tahunan-group');

            // Ambil elemen untuk Alamat Domisili
            const domisiliSelect = document.getElementById('domisili');
            const alamatLengkapGroup = document.getElementById('alamat-lengkap-group');
            const rumahDomisiliSelect = document.getElementById('rumah_domisili');
            const domisiliBulananGroup = document.getElementById('domisili-bulanan-group');
            const domisiliTahunanGroup = document.getElementById('domisili-tahunan-group');

            const statusKaryawanSelect = document.getElementById('status_karyawan');
            const divKontrak = document.getElementById('div-kontrak');

            // cicilan lain
            const cicilanLain = document.getElementById('cicilan_lain');
            const cicilanContainer = document.getElementById('cicilan-container');
            const dynamicFormContainer = document.getElementById('dynamic-form-container');
            const addFormButton = document.getElementById('add-form-button');

            const statusPinjamanSelect = document.getElementById('status_pinjaman');
            const riwayatPinjamanGroup = document.getElementById('riwayat-pinjaman-group');

            function toggleRiwayatPinjaman() {
                if (statusPinjamanSelect.value === 'lama') {
                    riwayatPinjamanGroup.style.display = 'block';
                } else {
                    riwayatPinjamanGroup.style.display = 'none';
                }
            }

            // Fungsi untuk toggle grup berdasarkan Status Rumah
            function toggleStatusRumah() {
                // Sembunyikan semua grup
                kontrakBulananGroup.style.display = 'none';
                kontrakTahunanGroup.style.display = 'none';

                // Tampilkan grup sesuai pilihan
                if (statusRumahSelect.value === 'kontrak bulanan') {
                    kontrakBulananGroup.style.display = 'block';
                } else if (statusRumahSelect.value === 'kontrak tahunan') {
                    kontrakTahunanGroup.style.display = 'block';
                }
            }

            // Fungsi untuk toggle grup berdasarkan Alamat Domisili
            function toggleAlamatDomisili() {
                // Tampilkan atau sembunyikan grup Alamat Lengkap
                if (domisiliSelect.value === 'tidak sesuai ktp') {
                    alamatLengkapGroup.style.display = 'block';
                } else {
                    alamatLengkapGroup.style.display = 'none';
                }
            }

            // Fungsi untuk toggle grup berdasarkan Rumah Domisili
            function toggleRumahDomisili() {
                // Sembunyikan semua grup domisili
                domisiliBulananGroup.style.display = 'none';
                domisiliTahunanGroup.style.display = 'none';

                // Tampilkan grup sesuai pilihan
                if (rumahDomisiliSelect.value === 'kontrak bulanan') {
                    domisiliBulananGroup.style.display = 'block';
                } else if (rumahDomisiliSelect.value === 'kontrak tahunan') {
                    domisiliTahunanGroup.style.display = 'block';
                }
            }

            function toggleStatusKaryawan() {
                if (statusKaryawanSelect.value === 'kontrak') {
                    divKontrak.style.display = 'block';
                } else {
                    divKontrak.style.display = 'none';
                }
            }

            function toggleCicilan() {
                if (cicilanLain.value === 'Ada') {
                    cicilanContainer.style.display = 'block';
                } else {
                    cicilanContainer.style.display = 'none';
                }
            }

            // Function to add a new form dynamically
            function addNewForm() {
                const formCount = dynamicFormContainer.childElementCount;
                const newForm = document.createElement('div');
                newForm.className = 'dynamic-form mb-3';
                newForm.id = `form-${formCount}`;
                newForm.innerHTML = `
                    <h6>Form Cicilan Lain ${formCount + 1}</h6>
                    <div class="form-group">
                        <label for="nama_pembiayaan_${formCount}" class="form-label">Nama Pembiayaan</label>
                        <input type="text" id="nama_pembiayaan_${formCount}" name="nama_pembiayaan[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="total_pinjaman_${formCount}" class="form-label">Total Pinjaman</label>
                        <input type="number" id="total_pinjaman_${formCount}" name="total_pinjaman[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cicilan_perbulan_${formCount}" class="form-label">Cicilan Perbulan</label>
                        <input type="number" id="cicilan_perbulan_${formCount}" name="cicilan_perbulan[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sisa_tenor_cicilan_${formCount}" class="form-label">Sisa Tenor</label>
                        <input type="number" id="sisa_tenor_cicilan_${formCount}" name="sisa_tenor_cicilan[]" class="form-control">
                    </div>
                    <hr>
                `;
                dynamicFormContainer.appendChild(newForm);
            }

            // Panggil fungsi toggle saat halaman dimuat untuk inisialisasi
            toggleRiwayatPinjaman();
            toggleStatusRumah();
            toggleAlamatDomisili();
            toggleRumahDomisili();
            toggleStatusKaryawan();
            toggleCicilan();

            // Tambahkan event listener untuk perubahan dropdown
            statusPinjamanSelect.addEventListener('change', toggleRiwayatPinjaman);
            statusRumahSelect.addEventListener('change', toggleStatusRumah);
            domisiliSelect.addEventListener('change', toggleAlamatDomisili);
            rumahDomisiliSelect.addEventListener('change', toggleRumahDomisili);
            statusKaryawanSelect.addEventListener('change', toggleStatusKaryawan);
            cicilanLain.addEventListener('change', toggleCicilan);
            // Add event listener for the add form button
            addFormButton.addEventListener('click', addNewForm);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const steps = Array.from(document.querySelectorAll('.form-step'));
            const nextBtn = document.querySelectorAll('.next-btn');
            const prevBtn = document.querySelectorAll('.prev-btn');
            let currentStep = 0;

            // Fungsi untuk menampilkan langkah tertentu
            function showStep(stepIndex) {
                steps.forEach((step, index) => {
                    step.classList.toggle('form-step-active', index === stepIndex);
                });
            }

            // Event listener untuk tombol Next
            nextBtn.forEach(button => {
                button.addEventListener('click', () => {
                    const currentFormStep = steps[currentStep];
                    const inputs = currentFormStep.querySelectorAll('input');
                    let isValid = true;

                    // Periksa validitas semua input di langkah saat ini
                    inputs.forEach(input => {
                        if (!input.checkValidity()) {
                            isValid = false;
                            input
                                .reportValidity(); // Menampilkan pesan error bawaan browser
                        }
                    });

                    if (isValid && currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                });
            });

            // Event listener untuk tombol Previous
            prevBtn.forEach(button => {
                button.addEventListener('click', () => {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            // Tampilkan langkah pertama
            showStep(currentStep);
        });
    </script>

@endsection
