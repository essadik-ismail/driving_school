<x-form.card>
    <x-slot name="header">
        {{ $title ?? '' }}
    </x-slot>
    <x-slot name="body">
        <form class="row" method="{{ $method ?? 'post' }}" action="{{ $action }}" enctype="multipart/form-data">
            @csrf

            @isset($heads)
                @foreach ($heads as $head)
                    @if ($head->forIndex)
                        @php
                            continue;
                        @endphp
                    @endif
                    @switch($head->type)
                        @case('text')
                            <div class="form-group {{ $head->col ?? 'col-12 col-sm-12' }} mt-3"
                                style="{{ !empty($head->type) && $head->type == 'hidden' ? 'display:none;' : '' }}">
                                <label for="id{{ $head->data }}">
                                     {{ $head->title }} {{ empty($head->required)? '' : '(*)' }}
                                </label>
                                <input id="id{{ $head->data }}" type="{{ $head->type }}" name="{{ $head->data }}"
                                    value="{{ $data->{$head->data} ?? old($head->data) }}"
                                    placeholder="{{ $head->placeholder ?? $head->data }}" class="form-control form-control-lg"
                                    {{ isset($head->required) && $head->required ? 'required' : '' }}
                                    {{ isset($head->readonly) && $head->readonly ? 'readonly' : '' }} />

                                @if ($errors->get($head->data))
                                    <div class="alert alert-danger mt-2">
                                        @foreach ($errors->get($head->data) as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @break

                        @case('number')
                            <div class="form-group {{ $head->col ?? 'col-12 col-sm-12' }} mt-3"
                                style="{{ !empty($head->type) && $head->type == 'hidden' ? 'display:none;' : '' }}">
                                <label for="id{{ $head->data }}"> 
                                    {{ $head->title }} {{ empty($head->required)? '' : '(*)' }}
                                 </label>
                                <input id="id{{ $head->data }}" type="{{ $head->type }}" name="{{ $head->data }}"
                                    value="{{ $data->{$head->data} ?? old($head->data) }}"
                                    placeholder="{{ $head->placeholder ?? $head->data }}" class="form-control form-control-lg"
                                    {{ isset($head->required) && $head->required ? 'required' : '' }}
                                    {{ isset($head->readonly) && $head->readonly ? 'readonly' : '' }} />

                                @if ($errors->get($head->data))
                                    <div class="alert alert-danger mt-2">
                                        @foreach ($errors->get($head->data) as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @break

                        @case('email')
                            <div class="form-group {{ $head->col ?? 'col-12 col-sm-12' }} mt-3"
                                style="{{ !empty($head->type) && $head->type == 'hidden' ? 'display:none;' : '' }}">
                                <label for="id{{ $head->data }}"> 
                                    {{ $head->title }} {{ empty($head->required)? '' : '(*)' }}
                                 </label>
                                <input id="id{{ $head->data }}" type="{{ $head->type }}" name="{{ $head->data }}"
                                    value="{{ $data->{$head->data} ?? old($head->data) }}"
                                    placeholder="{{ $head->placeholder ?? $head->data }}" class="form-control form-control-lg"
                                    {{ isset($head->required) && $head->required ? 'required' : '' }}
                                    {{ isset($head->readonly) && $head->readonly ? 'readonly' : '' }} 
                                    />

                                @if ($errors->get($head->data))
                                    <div class="alert alert-danger mt-2">
                                        @foreach ($errors->get($head->data) as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @break

                        @case('select')
                            @if (is_array($head->options))
                                <div class="form-group {{ $head->col ?? 'col-12 col-sm-12' }} mt-3"
                                    style="{{ !empty($head->type) && $head->type == 'hidden' ? 'display:none;' : '' }}">
                                    <label for="id{{ $head->data }}"> 
                                        {{ $head->title }} {{ empty($head->required)? '' : '(*)' }}
                                         </label>
                                    <select id="mySelect" class="form-control form-control-lg {{ $head->col ?? 'col-12 col-sm-12' }}" name="{{ $head->data }}">
                                        @foreach ($head->options as $option)
                                            <option value="{{ $option }}"> {{ $option }} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->get($head->data))
                                        <div class="alert alert-danger mt-2">
                                            @foreach ($errors->get($head->data) as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @break

                        @case('textarea')
                            <div class="form-group {{ $head->col ?? 'col-12 col-sm-12' }}  mt-3">
                                <label for="{{ $head->data }}" class="form-label"> {{ $head->title ?? $head->data }}
                                    {{ empty($head->required) ? '' : '(*)' }} </label>
                                <textarea class="form-control" id="{{ $head->data }}" rows="3" name="{{ $head->data }}"
                                    {{ empty($head->required) ? '' : 'required' }}>{{ $data->{$head->data} ?? old($head->data) }}</textarea>
                            </div>
                        @break

                    @endswitch
                @endforeach
            @endisset

            {!! $slot !!}

            <x-form.submit />
        </form>
    </x-slot>
</x-form.card>