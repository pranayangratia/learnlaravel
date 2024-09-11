<form method="POST" action="{{route('profile.update')}}">
    @csrf
    @method('PUT')
   <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
   </div>
   <div class="d-flex w-full  justify-content-center">
    <button type="submit" class="btn btn-primary ">Submit</button>
</div>
</form>                