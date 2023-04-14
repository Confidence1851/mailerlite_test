<h4>Add Subscriber</h4>
<form action="{{ route('subscribers.store') }}" method="post">
    @csrf
    <div class="mt-2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" required class="form-control" value="{{ old('name') }}"
                placeholder="John Doe">
            @error('name')
                <div class="">
                    <small class="text-danger">{{ $message }}</snall>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" required class="form-control" value="{{ old('email') }}"
                placeholder="john@mail.com">
            @error('email')
                <div class="">
                    <small class="text-danger">{{ $message }}</snall>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Country</label>
            <input type="text" name="country" required class="form-control" value="{{ old('country') }}"
                placeholder="Canada">
            @error('country')
                <div class="">
                    <small class="text-danger">{{ $message }}</snall>
                </div>
            @enderror
        </div>
        <div class="mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </div>
</form>
