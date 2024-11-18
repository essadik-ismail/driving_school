<div class="form-group {{ $col ?? '' }} mt-3">
    <label for="id{{ $name }}"> {{ $name }} </label>
    <input type="file" class="form-control-file" id="id{{ $name }}" name="{{ $name }}" />
    @if ($errors->get($name))
        <div class="alert alert-danger mt-2">
            @foreach ($errors->get($name) as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>
