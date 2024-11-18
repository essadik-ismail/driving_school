<div class="form-group {{ $col ?? 'col-md-12' }} mt-3">
    <label for="id{{ $name }}">{{ $label ?? ucfirst($name) }}</label>

    <div class="custom-select2-container position-relative">
        <div class="input-group">
            <input type="text" id="{{ $name }}Input" class="form-control custom-select2-search" placeholder="Search ..."
                onkeyup="filterOptions('{{ $name }}')" aria-label="Search for {{ $name }}" aria-describedby="basic-addon1">

            <!-- Dropdown menu -->
            <div id="{{ $name }}OptionsList" class="dropdown-menu w-100 mt-1" style="max-height: 200px; overflow-y: auto; display: none;">
                @isset($data)
                    @foreach ($data as $item)
                        <button class="dropdown-item custom-option-{{ $name }}" type="button" data-value="{{ $item->{$id} }}"
                            onclick="selectOption(this, '{{ $name }}')">
                            {{ $item->{$searchkey} }}
                        </button>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>

    <select id="Select{{ $name }}" class="form-control d-none" name="{{ $name }}">
        <option value="">Select a {{ $label ?? $name }}</option>
    </select>

    @if ($errors->get($name))
        <div class="alert alert-danger mt-2">
            @foreach ($errors->get($name) as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>

<script>
    function filterOptions(selectName) {
        var input = document.getElementById(selectName + 'Input');
        var filter = input.value.toUpperCase();
        var options = document.getElementsByClassName('custom-option-' + selectName);
        var optionsList = document.getElementById(selectName + 'OptionsList');

        // Show the dropdown when typing
        optionsList.classList.add('show');

        for (var i = 0; i < options.length; i++) {
            var txtValue = options[i].textContent || options[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                options[i].style.display = "";
            } else {
                options[i].style.display = "none";
            }
        }

        // Toggle dropdown visibility based on options
        optionsList.style.display = Array.from(options).some(option => option.style.display !== 'none') ? 'block' : 'none';
    }

    function selectOption(option, selectName) {
        var value = option.getAttribute('data-value'); // Get the value from data attribute
        var text = option.innerText; // Get the display text

        // Update the hidden select element
        var select = document.getElementById('Select' + selectName);
        select.innerHTML = `<option value="${value}" selected>${text}</option>`;

        // Update the input field with the selected option
        var input = document.getElementById(selectName + 'Input');
        input.value = text;

        // Set the hidden input value directly
        select.value = value; // Set the value of the hidden select

        // Hide the dropdown
        document.getElementById(selectName + 'OptionsList').classList.remove('show');
        document.getElementById(selectName + 'OptionsList').style.display = 'none'; // Hide the dropdown
    }

    // Show the dropdown when the search input is focused
    document.querySelectorAll('.custom-select2-search').forEach(function(input) {
        input.addEventListener('focus', function() {
            var selectName = this.id.replace('Input', '');
            var optionsList = document.getElementById(selectName + 'OptionsList');
            optionsList.classList.add('show');
            optionsList.style.display = 'block'; // Show the dropdown
        });
    });

    // Hide the dropdown when clicking outside
    document.addEventListener('click', function(e) {
        var customSelectContainers = document.querySelectorAll('.custom-select2-container');
        customSelectContainers.forEach(function(container) {
            if (!container.contains(e.target)) {
                var selectName = container.querySelector('input').id.replace('Input', '');
                var optionsList = document.getElementById(selectName + 'OptionsList');
                optionsList.classList.remove('show');
                optionsList.style.display = 'none'; // Hide the dropdown
            }
        });
    });
</script>

<style>
    .custom-select2-container .dropdown-menu {
        z-index: 1000;
    }
</style>