<div class="form-group {{ $col ?? "" }}  mt-3">
    <label for="{{ $name }}" class="form-label"> {{ $label ?? $name }} </label>
    <textarea 
        class="form-control" 
        id="{{ $name }}" 
        rows="3" 
        name="{{ $name }}" 
        {{ isset($required) ? "required" :'' }}
    >{{ $value ?? "" }}</textarea>
</div>
