@if($errors->count() > 0)
    <div class="alert alert-danger">
        <ul>    
            @foreach($errors->messages() as $error)
                <li>{{ $error[0] }}</li>
            @endforeach
        </ul>
    </div>
@endif
@csrf
<div class="form-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name"
        @if(isset($contact))
            value="{{ $contact->name }}"
        @else
            value="{{ old('name') }}"
        @endif
    >
</div>
<div class="form-group">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email"
        @if(isset($contact))
            value="{{ $contact->email }}"
        @else
            value="{{ old('email') }}"
        @endif
    >
</div>
<div class="form-group">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" id="phone"
        @if(isset($contact))
            value="{{ $contact->phone }}"
        @else
            value="{{ old('phone') }}"
        @endif
    >
</div>