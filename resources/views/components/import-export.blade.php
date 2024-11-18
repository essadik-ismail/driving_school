<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center color-dark fw-500">
                    {{ trans('app.import_title') }}
                </div>
                <div class="card-body">
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="file" class="form-label">Choose Excel File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        @if (!empty($foreignKeys))
                            @foreach ($foreignKeys as $foreignKey)
                                <div class="form-group mb-3">
                                    <label for="{{ $foreignKey['name'] }}"
                                        class="form-label">{{ $foreignKey['name'] }}</label>
                                    <select class="form-select" id="{{ $foreignKey['name'] }}"
                                        name="foreign_keys[{{ $foreignKey['name'] }}]">
                                        <option value="">Choose an Item</option>
                                        @foreach (app($foreignKey['model'])::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->{$foreignKey['field']} }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        @endif
                        <button type="submit" class="btn btn-outline-primary btn-icon w-100">
                            <i class="fa-solid fa-file-import"></i>
                            Import Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
