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
                        <h5 class="card-title mb-0">Tables {{ $title }}</h5>
                        <a href="{{ route('todolist.create') }}" class="btn btn-primary btn-sm float-end">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border-primary-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tugas</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_todolist as $todolist)
                                        <tr>
                                            <td>{{ $todolist->id }}</td>
                                            <td>{{ $todolist->tugas }}</td>
                                            <td>
                                                {{ $todolist->deskripsi }}
                                            </td>
                                            <td>{{ $todolist->tanggal }}</td>
                                            <td>
                                                <a href="{{ route('todolist.edit', $todolist->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('todolist.destroy', $todolist->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                        value="{{ route('todolist.destroy', $todolist->id) }}"
                                                        class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                                <a href="{{ route('todolist.show', $todolist->id) }}"
                                                    class="btn btn-warning btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- card end -->
            </div>
        </div>

    </div>
@endsection
