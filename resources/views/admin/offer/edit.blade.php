@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Offer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('offer.index') }}">Offer list</a></li>
                        <li class="breadcrumb-item active">Edit Offer</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit Offer - {{ $offer->name }}</h3>
                                <a href="{{ route('offer.index') }}" class="btn btn-primary">Bekor Qilish</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-2">
                                </div>
                                <div class="col-12 col-lg-8">
                                    <form action="{{ route('offer.update', $offer->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        <li>{{ $errors->first() }}</li>
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <div class="col-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="position_id">Lavozimi</label>
                                                        <select name="position_id" id="position_id" class="form-control">
                                                            @foreach ($positions as $position)
                                                                <option value="{{ $position->id }}">{{ $position->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="position_gonarar">Ganarar Foizi</label>
                                                        <input type="position_gonarar" name="position_gonarar"
                                                            class="form-control" id="position_gonarar"
                                                            placeholder="Enter position_gonarar"
                                                            value="{{ $offer->position_gonarar }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6" style="width: 160px">
                                                    <div class="form-group">
                                                        <label><strong>Sudyalarni tanlang :</strong></label><br />
                                                        <select class="form-control" name="userIds[]" multiple="">
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}" @if (in_array($user->id, $selectedUserIds)) selected @endif>
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer" style="background-color: white">
                                            <button type="submit"
                                                class="btn btn-lg btn-success float-right">Saqlash</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
