@extends('admin.layout.app')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">{{ $title }}</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Investment</li>
            </ul>
        </div>

        <div class="row gy-4">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> {{ $title }}</h5>
                    </div>
                    <form action="{{ route('todolist.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <label class="form-label">Tugas</label>
                                    <input type="text" name="tugas" value="{{ old('tugas') }}"
                                        placeholder="Enter a tugas..."
                                        class="form-control  @error('tugas') is-invalid @enderror">
                                    @error('tugas')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror" rows="4" cols="50"
                                        placeholder="Enter a description...">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Input Date</label>
                                    <input type="date" name="tanggal"
                                        class="form-control  @error('tanggal') is-invalid @enderror">
                                    @error('tanggal')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex">
                                <a href="{{ route('todolist.index') }}" class="btn btn-warning me-3">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div><!-- card end -->
            </div>
        </div>

    </div>
@endsection
