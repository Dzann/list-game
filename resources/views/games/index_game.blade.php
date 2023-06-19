@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Games /</span> List
        </h4>
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                @include('notif')
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title text-primary">Halaman games</h5>

                                    <a href="{{ route('games.create') }}">
                                        <button class='btn btn-primary'> Tambah </button>
                                    </a>
                                </div>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>description</th>
                                            <th>genre</th>
                                            <th>foto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($games as $row)
                                            <tr>
                                                <td>{{ $no++ }} </td>
                                                <td>{{ $row->title }}</td>
                                                <td>{{ $row->description }}</td>
                                                <td>{{ $row->genre }}</td>
                                                <td>{{ $row->foto }}</td>
                                                <td>
                                                    <div class='d-flex'>
                                                        <a href="{{ route('games.edit', $row->id) }}">
                                                            <button class='btn btn-primary'>Edit</button>
                                                        </a>
                                                        &nbsp;
                                                        <form onsubmit="return confirm('Anda yakin?')"
                                                            action="{{ route('games.destroy', $row->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class='btn btn-danger'>Delete</button>
                                                        </form>
                                                    </div>


                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan='4'>Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
