<x-layout>
    <div class="container">
        <h1>View all contacts here</h1>
        <div class="mb-3">
           <div class="row">
               <div class="col-md-12">
                    <form action="{{ route('contacts.index') }}" method="GET">
                        <div class="d-flex">
                            <input type="text" class="form-control" name="search" placeholder="Search by name or email" value="{{ request()->input('search') }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
           </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th><a href="{{ route('contacts.index', ['sort' => 'name', 'direction' => request()->input('direction') == 'asc' ? 'desc' : 'asc']) }}">Name Sort By {{  request()->input('sort') ? request()->input('direction') : 'asc'}}</a></th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th><a href="{{ route('contacts.index', ['sort' => 'created_at', 'direction' => request()->input('direction') == 'asc' ? 'desc' : 'asc']) }}">Created At sort by {{  request()->input('sort') ? request()->input('direction') : 'asc'}}</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $contacts as $contact )
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ $contact->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-layout>