@extends('layout.app')
@section('content')
    <div class="rounded">
        <div class="text-red px-4">
            <h2 class="text-Success py-3">Contact Managment Application</h2>
            <a href="{{ route('contacts.index') }}" class="btn btn-primary">ReFresh</a>
        </div>
        <div class="p-4 d-flex justify-content-between">
            <!-- Sort area -->
            <div class="d-flex gap-2">
                <label for="Sort" class="py-2">Sort By :</label>
                <div>
                    <select name="sort" class="form-select" id="sort" onchange="sortBy()">
                        <option value="all" {{ request('sort') == 'all' ? 'selected' : '' }}>All</option>
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                        <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Date</option>

                    </select>
                </div>
            </div>
            <!-- Sort area End-->

            <!-- Search area -->
            <div class="col-sm-3">
                <form class="d-flex" action="{{ route('contacts.index') }}" method="get">
                    <input class="form-control me-2" type="text" name="search" placeholder="Search..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary" type="button">Search</button>
                </form>
                <span class="mt3">Search Name OR Email</span>
            </div>
            <!-- Search area End-->
        </div>

        <div class="card">

            <div class="card-header d-flex justify-content-between bg-succecc py-2">
                <div class="d-flex gap-2 align-items-center ">
                    <h4>Contact List</h4>
                    <p class="text-danger font-weight-bold font-size-lg pt-2">Total = {{ count($contact) }}</p>
                </div>
                <div>
                    <a href="{{ route('contacts.create') }}" class="btn btn-outline-success mt-1">Create Contact</a>
                </div>
            </div>

            @if (Session::has('success'))
                <p class="alert alert-success"><strong>Success!</strong> ,{{ Session::get('success') }}</p>
                {{-- @else
                <p class="alert alert-danger"><strong>Error!</strong> ,{{ Session::get('error') }}</p> --}}
            @endif
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># Sl No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @forelse ($contact as $item)
                        <tbody>
                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                </td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('contacts.show', $item->id) }}" class="btn btn-success"> Show</a>
                                    <a href="{{ route('contacts.edit', $item->id) }}" class="btn btn-primary"> Edit</a>
                                    <form action="{{ route('contacts.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('are You Sure Delete')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @empty
                        <p class="alert alert-danger">No Data Found</p>
                    @endforelse
                </table>
            </div>

        </div>
    </div>

    <!-- Sort By JS Code -->
    <script>
        function sortBy() {
            let status = document.getElementById('sort').value;
            if (status == 'all') {
                location.href = "{{ route('contacts.index') }}";
            } else {
                location.href = "/contacts?sort=" + status;
            }
        }
    </script>
@endsection
