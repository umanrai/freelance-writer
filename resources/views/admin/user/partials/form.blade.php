<div class="row">
        <div class="col-sm-4">
            <div class="form-group">
    <label for="firstName">First Name</label>
    <input name="first_name" type="text" value="{{ old('first_name') ?? $user->first_name ?? null }}" class="form-control" name="firstName" placeholder="Enter first name">
    @if($errors->has('first_name'))
    <div class="error">{{ $errors->first('first_name') }}</div>
@endif
  </div>

        </div>
        <div class="col-sm-4">
        <div class="form-group">
    <label for="middleName">Middle Name</label>
    <input type="text" name="middle_name" value="{{ old('middle_name') ?? $user->middle_name ?? null  }}" class="form-control" name="middleName" placeholder="Enter middle name">
  </div>
    </div>
  <div class="col-sm-4">
  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" name="last_name" value="{{ old('last_name') ?? $user->last_name ?? null  }}" class="form-control" name="lastName" placeholder="Enter last name">
  </div>
     </div>
       </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" value="{{ old('email') ?? $user->email ?? null  }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputAddress1">Phone address</label>
    <input name="phone" value="{{ old('phone') ?? $user->phone ?? null  }}" type="number" class="form-control" id="exampleInputAddress1" placeholder="Enter phone">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    @if($errors->has('phone'))
    <div class="error">{{ $errors->first('phone') }}</div>
@endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    @if($errors->has('password'))
    <div class="error">{{ $errors->first('password') }}</div>
@endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    @if($errors->has('password_confirmation'))
    <div class="error">{{ $errors->first('password_confirmation') }}</div>
@endif
  </div>

<div class="form-group">
    <label for="exampleInputPassword1">Role</label>


    <select name="role_id" id="role_id" class="form-control">
        <option disabled selected> Select Role</option>

        @php

            $selectedRole = old('role_id') ?? $user->role_id ?? 0;

        @endphp

        @foreach($data['roles'] as $id => $role)
            <option value="{{ $id }}" {{ $selectedRole == $id ? 'selected' : '' }}>{{ $role }}</option>
        @endforeach

    </select>

    @if($errors->has('password_confirmation'))
        <div class="error">{{ $errors->first('password_confirmation') }}</div>
    @endif
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
