<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" value="{{ old('name') ?? $category->name ?? null  }}" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Enter name">
            @if($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <input type="radio" name="status" value="1" {{ (old('name') ?? $category->status ?? null) == 1 ? 'checked' : '' }}> Yes
            <input type="radio" name="status" value="0" {{ (old('name') ?? $category->status ?? null) == 0 ? 'checked' : '' }}> No
            @if($errors->has('status'))
                <div class="error">{{ $errors->first('status') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
