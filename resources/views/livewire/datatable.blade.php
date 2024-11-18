<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="contact-breadcrumb">
                <div class="breadcrumb-main add-contact justify-content-sm-between">
                    <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center add-contact__title justify-content-center me-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title">{{ trans('app.view_all') }}
                                </h4>
                                <span class="sub-title ms-sm-25 ps-sm-25"></span>
                            </div>
                            <div class="action-btn mt-sm-0 mt-15">
                                <a href="{{ !empty($addRoute) ? route($addRoute) : '#' }}"
                                    class="btn px-20 btn-primary ">
                                    <i class="las la-plus fs-16"></i> {{ trans('app.add_new') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-main__wrapper">

                        <form action="/" onsubmit="return false"
                            class="d-flex align-items-center add-contact__form my-sm-0 my-2">
                            <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg">
                            <input type="search" class="form-control me-sm-2 border-0 box-shadow-none"
                                id="search-input" placeholder="{{ trans('app.search') }}">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center color-dark fw-500">
                    <span>{{ $title ?? '' }}</span>

                    <!-- Export Buttons -->
                    <div class="d-flex gap-2">
                        <!-- Export CSV Button with Success Color -->
                        <button class="btn btn-outline-success btn-icon btn-sm" wire:click="exportCSV"
                            title="Export CSV">
                            <i class="fa-solid fa-file-csv"></i>
                        </button>

                        <!-- Export Excel Button with Warning Color -->
                        <button class="btn btn-outline-warning btn-icon btn-sm" wire:click="exportExcel"
                            title="Export Excel">
                            <i class="fa-solid fa-file-excel"></i>
                        </button>

                        <!-- Export PDF Button with Danger Color -->
                        {{-- <button class="btn btn-outline-danger btn-icon btn-sm" wire:click="exportPDF"
                            title="Export PDF">
                            <i class="fa-solid fa-file-pdf"></i>
                        </button> --}}
                    </div>
                </div>


                <div class="card-body">
                    <div class="userDatatable global-shadow border-light-0 w-100">
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless" id="dataTable">
                                <thead>
                                    <tr>
                                        @foreach ($heads as $item)
                                            <th scope="col" class="text-start">
                                                {{ $item->title ?? $item['title'] }}
                                            </th>
                                        @endforeach
                                        <th scope="col" class="text-center dt-no-sorting">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($data)
                                        @foreach ($data as $row)
                                            <tr>
                                                @foreach ($heads as $head)
                                                    <td>
                                                        {{ $row->{$head->data ?? $head['data']} }}
                                                    </td>
                                                @endforeach

                                                <td class="text-end">
                                                    <div class="d-flex justify-content-end">
                                                        <a class="btn"
                                                            href="{{ !empty($editRoute) ? route($editRoute, $row->id) : '#' }}">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <button class="btn delete-btn" data-id="{{ $row->id }}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                        <button id="row-{{ $row->id }}"
                                                            wire:click="delete({{ $row->id }})"
                                                            style="display: none;"></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>

                            <!-- Rows Per Page Selector and Pagination -->
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <!-- Rows per Page Selector -->
                                <div>
                                    <label for="rowsPerPage" class="me-2">{{ trans('app.rows_per_page') }} </label>
                                    <select name="rowsPerPage" id="rowsPerPage"
                                        class="form-select d-inline-block w-auto" wire:model="perPage">
                                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>

                                <!-- Pagination -->
                                <div class="mt-5">
                                    @isset($data)
                                        {{ $data->links('vendor.pagination.bootstrap-5') }}
                                    @endisset
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Search Functionality
    document.getElementById('search-input').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
        });
    });

    //for delete button
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        const row = document.getElementById('row-' + id);
                        if (row) row.click();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    });
</script>