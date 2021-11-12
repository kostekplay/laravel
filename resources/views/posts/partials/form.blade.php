<div class="form-group">
    <label for="title">Title</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', optional($post ?? null)->title) }}">
</div>
@error('title')
    <div>{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="content" name="content">{{ old('content', optional($post ?? null)->content) }}</textarea>
</div>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif