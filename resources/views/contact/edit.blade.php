@extends('layout.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="card col-sm-6 ">
                <div class="card-header d-flex justify-content-between bg-success text-light">
                    <h4>Edit Contact Data</h4>
                    <a href="{{ route('contacts.index') }}" class="btn btn-outline-success border border-light text-light">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter name" name="name" value="{{ $contact->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Enter email" name="email" value="{{ $contact->email }}">
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="Enter phone" name="phone" value="{{ $contact->phone }}">
                            @error('phone')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="comment">Address:</label>
                            <textarea class="form-control my-2" rows="5" id="comment" name="address" value="{{ $contact->address }}">{{ $contact->name }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
