@extends('layout.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-center">
            <div class="card  col-sm-6">

                <div class="card-header d-flex justify-content-between bg-success text-light">
                    <h4>Create Contact</h4>
                    <a href="{{ route('contacts.index') }}"
                        class="btn btn-outline-success border border-light text-light">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Enter email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="phone" class="form-label">Phone: (Optional)</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="Enter phone" name="phone">
                            @error('phone')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="comment">Address: (Optional)</label>
                            <textarea class="form-control my-2" rows="5" id="comment" name="address"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Create</button>
                    </form>
                </div>


            </div>

        </div>
    </div>
@endsection
