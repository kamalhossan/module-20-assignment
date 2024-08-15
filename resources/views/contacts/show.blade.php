<x-layout>
    <div class="container">
        <h1>Show specific contact</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$contacts->id}}</th>
                    <td>{{ $contacts->name }}</td>
                    <td>{{ $contacts->email }}</td>
                    <td>{{ $contacts->phone }}</td>
                    <td>{{ $contacts->address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layout>