<div class="row">

    <div class="col-md-12">

        @if (auth()->user()->isClient())

            @php
                $isEditable = isset($article) && $article->writer_id === 0;
            @endphp

            @if ($isEditable || !isset($article))
            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>

                <select class="form-control" name="category_id" id="category_id">

                    <option disabled selected> Select Category</option>

                    @php

                        $selectedCategory = old('category_id') ?? $article->category_id ?? 0;

                    @endphp

                    @foreach($data['categories'] as $category)
                        <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach

                </select>

                @if($errors->has('category_id'))
                    <div class="error">{{ $errors->first('category_id') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Tag</label>

                <select class="form-control" name="tag_id" id="tag_id">

                    <option disabled selected> Select Tag</option>

                    @php

                        $selectedTag = old('tag_id') ?? $article->tag_id ?? 0;

                    @endphp

                    @foreach($data['tags'] as $tag)
                    <option value="{{ $tag->id }}"  {{ $selectedTag == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach

                </select>

                @if($errors->has('tag_id'))
                    <div class="error">{{ $errors->first('tag_id') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input name="title" value="{{ old('title') ?? $article->title ?? null  }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Enter Title">
                @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="price">Body:</label>
                <textarea name="body" rows="7"  id="body" class="form-control">{{ old('body') ?? $article->body ?? null }}</textarea>
                @if($errors->has('body'))
                    <div class="error">{{ $errors->first('body') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="price">I will be paying :</label>
                <input name="wages" type="number" class="form-control" min="1" max="5000" value="{{ old('wages') ?? $article->wages ?? 0 }}">
                @if($errors->has('wages'))
                    <div class="error">{{ $errors->first('wages') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <input type="radio" name="status" value="1" {{ (old('status') ?? $article->status ?? null) == 1 ? 'checked' : '' }}> Yes
                <input type="radio" name="status" value="0" {{ (old('status') ?? $article->status ?? null) == 0 ? 'checked' : '' }}> No
                @if($errors->has('status'))
                    <div class="error">{{ $errors->first('status') }}</div>
                @endif
            </div>

            @endif
        @endif

        @if(isset($article) && !auth()->user()->isClient())
                <ul>
                    <li>
                        <b>Title</b> : {{ $article->title }}
                    </li>
                    <li>
                        <b>Body</b> : {{ $article->body }}
                    </li>
                    <li>
                        <b>Slug</b> : <a href="{{ url('article/'. $article->slug) }}" target="_blank">{{ url('article/'. $article->slug) }}</a>
                    </li>
                    <li>
                        <b>Wage</b> : $.{{ $article->wages }}
                    </li>
                    <li>
                        <b>Status</b> : <span class="badge badge-{{ $article->status ? 'primary' : 'danger' }}">
                                {{ $article->status ? 'Active' : 'InActive' }}
                            {{--                                Ternary Operator--}}
                            </span>
                    </li>
                </ul>
        @endif


        @if (auth()->user()->isWriter())
                <div class="form-group">
                    <label for="price">Content for Article</label>
                    <textarea name="description" rows="15"  id="body" class="form-control">{{ old('description') ?? $article->description ?? null }}</textarea>
                    @if($errors->has('description'))
                        <div class="error">{{ $errors->first('description') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <input type="radio" name="is_completed_by_writer" value="1" {{ (old('is_completed_by_writer') ?? $article->is_completed_by_writer ?? null) == 1 ? 'checked' : '' }}> Publish
                    <input type="radio" name="is_completed_by_writer" value="0" {{ (old('is_completed_by_writer') ?? $article->is_completed_by_writer ?? null) == 0 ? 'checked' : '' }}> Draft
                    @if($errors->has('is_completed_by_writer'))
                        <div class="error">{{ $errors->first('is_completed_by_writer') }}</div>
                    @endif
                </div>
            @endif

        @if (auth()->user()->isAdmin())
        <div class="form-group">
            <label for="exampleInputEmail1">Assign to Writer</label>

            <select class="form-control" name="writer_id" id="writer_id">

                <option disabled selected> Select Writer</option>

                @php

                    $selectedWriter = old('writer_id') ?? $article->writer_id ?? 0;

                @endphp

                @foreach($data['writers'] as $writerId => $writer)
                    <option value="{{ $writerId }}" {{ $selectedWriter == $writerId ? 'selected' : '' }}>{{ $writer }}</option>
                @endforeach

            </select>

            @if($errors->has('writer_id'))
                <div class="error">{{ $errors->first('writer_id') }}</div>
            @endif
        </div>
        @endif

            @php
                $isEditable = isset($article) && $article->writer_id === 0;
            @endphp

            @if ($isEditable || !isset($article) || $article->writer_id === auth()->id())

                <input type="hidden" name="prompt_title" value="{{ $article->title }}">
                <input type="hidden" name="prompt_desc" value="{{ $article->body }}">

                <button class="btn btn-secondary generate-using-ai">Generate  Using AI</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            @endif

            @if (auth()->user()->isClient() && isset($article))

{{--                @if ($isEditable || !isset($article) || auth()->user()->isAdmin())--}}
{{--                <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                @else--}}
{{--                   --}}
{{--                @endif--}}
                    @if ($article->writer_id !== 0 && $article->is_completed_by_writer === 0)
                        <h4>The Article has been assigned to Writer.</h4>
                    @elseif ($article->is_completed_by_writer === 1)
                        <h4>The article has already been completed.</h4>

                        <hr>

                        {{ $article->description }}

                    @endif
                @endif
    </div>

</div>
