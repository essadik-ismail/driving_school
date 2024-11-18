<div 
    class="form-group {{ $col ?? '' }} mt-3" 
    style="{{ (!empty($type) && $type == "hidden") ? "display :none;" : "" }}"
>

    <label for="id{{ $name }}"> {!! $label ?? $name  !!} </label>

    <input 
        id="id{{ $name }}" 
        type="{{ $type ?? 'text' }}" 
        name="{{ $name }}"
        value="{{ $value ?? old($name) }}" 
        placeholder="{{ $placeholder ?? $name }}" 
        class="form-control form-control-lg"
        {{ isset($required) ? 'required' : '' }} 
        {{ isset($readonly) ? 'readonly' : '' }} 
    />

    @if ($errors->get($name))
        <div class="alert alert-danger mt-2">
            @foreach ($errors->get($name) as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

</div>