@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Add Games</h4>

        <div class="row">
            @include('notif')
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Tambah Game</h5>
                    <div class="card-body">
                        {{-- display error --}}
                        {{-- @if($errors->any())
                            {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
                        @endif --}}


                        <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class='mb-4'>
                                <label for="name" class="form-label">title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Game title" aria-describedby="defaultFormControlHelp" />
                                @error('title')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-4'>
                                <label for="text" class="form-label">description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="game description" aria-describedby="email" />
                                    @error('description')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-4'>
                                <label for="text" class="form-label">genre</label>
                                <input type="text" class="form-control" id="genre" name="genre"
                                    placeholder="game genre" aria-describedby="text" />
                                @error('genre')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-4'>
                                <label for="text" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto"
                                    placeholder="game genre" aria-describedby="text" />
                                @error('foto')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <input type='submit' class='btn btn-primary' value="Save" id="save"
                                    name="save" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
