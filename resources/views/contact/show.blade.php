@extends('layout.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-center align-items-center mt-5 ">
            <div class="card  col-sm-6">
                <div class="card-header d-flex justify-content-between bg-success text-light">
                    <h4>Single Contact Data</h4>
                    <a href="{{ route('contacts.index') }}"
                        class="btn btn-outline-success border border-white text-light">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>:</th>
                                <th>{{ $contact->name }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td>:</td>
                                <td>{{ $contact->phone }}</td>
                            </tr>
                            @if ($contact->address != null)
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td>{{ $contact->address }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td>
                                        <p class="card-text text-danger"><strong>No Address</strong></p>
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td>Date</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }},</td>
                            </tr>
                            <tr>
                                <td>Created At</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }},{{ $contact->created_at->format('d-M-Y - h:m:s A') }}
                                </td>
                            </tr>
                            <tr>
                                <td>Updated At</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($contact->updated_at)->diffForHumans() }},
                                    {{ $contact->updated_at->format('d-M-Y - H:i:s A' ) }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
