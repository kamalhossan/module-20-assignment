<x-layout>
    <div class="container">

        <h1>Edit contact by ID</h1>

        <form action="{{ route('contacts.update', $contacts->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $contacts->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="name" class="form-control" name="name" id="name" value="{{ $contacts->name }}" placeholder="{{ $contacts->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $contacts->email }}" placeholder="{{ $contacts->email }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="{{ $contacts->phone }}" placeholder="{{ $contacts->phone }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Your Address</label>
                <input type="address" class="form-control" name="address" id="address" value="{{ $contacts->address }}" placeholder="{{ $contacts->address }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Update</button>
            </div>
        </form>

    </div>
</x-layout>