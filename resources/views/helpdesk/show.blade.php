@extends('header')

@section('title', 'Detail Laporan')


<div class="container mt-4">
    <!-- Notifikasi Sukses -->
    <div class="alert alert-success text-white text-center" role="alert">
        <strong>✅ SUKSES</strong> TERIMAKASIH TELAH MELAKUKAN PENGADUAN, PENGADUAN ANDA AKAN SEGERA KAMI TINDAK LANJUTI
    </div>

    <!-- Nomor Laporan -->
    <div class="text-center">
        <h3 class="font-weight-bold">NOMOR LAPORAN ANDA ({{ $reporting->id }})</h3>
        <p>Silakan diingat atau dicatat untuk pengecekan berikutnya</p>
    </div>

    <!-- Konten Laporan -->
    <div class="row">
        <!-- Status Laporan -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">STATUS LAPORAN</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm small-text">
                        <tr>
                            <th>Pelapor</th>
                            <td>{{ $reporting->reporter }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $reporting->division }}</td>
                        </tr>
                        <tr>
                            <th>Telp</th>
                            <td>{{ $reporting->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Keluhan</th>
                            <td>{{ $reporting->complaint }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $reporting->category->information ?? 'Kategori tidak ditemukan' }}</td>
                        </tr>
                        <tr>
                            <th>Unit</th>
                            <td>{{ $reporting->unit->unit ?? 'Unit tidak ditemukan' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $reporting->status }}</td>
                        </tr>
                        <tr>
                            <th>Penanganan</th>
                            <td class="{{ $reporting->handling ? '' : 'text-danger' }}">
                                {{ $reporting->handling ?? 'Not set' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Petugas</th>
                            <td class="{{ $reporting->staff ? '' : 'text-danger' }}">
                                {{ $reporting->staff ?? 'Not set' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Close Date</th>
                            <td class="{{ $reporting->close_date ? '' : 'text-danger' }}">
                                {{ $reporting->close_date ?? 'Not set' }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Foto Laporan -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">FOTO LAPORAN</h5>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('assets/img/uploads/' . $reporting->photo) }}" alt="Foto Laporan" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <a href="/helpdesk" class="btn btn-primary mb-3">
        ← Kembali ke Dashboard
    </a>
</div>
