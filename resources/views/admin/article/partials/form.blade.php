<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" value="{{ old('title') ?? $article->title ?? null  }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Enter Title">
            @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="price">Body:</label>
            <textarea name="body" rows="15"  id="body" class="form-control">{{ old('body') ?? $article->body ?? null }}</textarea>
            @if($errors->has('body'))
                <div class="error">{{ $errors->first('body') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <input type="radio" name="status" value="1" {{ (old('name') ?? $article->status ?? null) == 1 ? 'checked' : '' }}> Yes
            <input type="radio" name="status" value="0" {{ (old('name') ?? $article->status ?? null) == 0 ? 'checked' : '' }}> No
            @if($errors->has('status'))
                <div class="error">{{ $errors->first('status') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
