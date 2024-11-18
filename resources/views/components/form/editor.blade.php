<div class="form-group {{ $col ?? '' }} mt-3">
    <label for="editor" class="form-label"> {!! $label ?? $name !!} </label>
    <textarea class="form-control" name="{{ $name }}" id="editor" rows="10">
        {!! $value ?? '' !!}
    </textarea>
</div>
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.0.0/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 300,
        plugins: 'advlist autolink lists link image charmap preview anchor code',
        toolbar_mode: 'floating',
    });
</script>
