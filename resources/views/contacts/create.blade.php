<x-layout>
    <div class="container">

        <h1>Create contacts</h1>

        <form action="{{ route('contacts.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="name" class="form-control" name="name" id="name" placeholder="John Edwards">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="+7 (999) 999-99-99">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Your Address</label>
                <input type="address" class="form-control" name="address" id="address" placeholder="Los angeles">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Add Contact</button>
            </div>
        </form>

    </div>
</x-layout>