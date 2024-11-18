<div class="row">
    <!-- Left Column -->
    <div class="col-12 col-sm-8">
        <!-- Category Selection and Search Input in One Line -->
        <div class="mb-4 custom-card p-4 shadow-sm rounded">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Select Category:</label>
                    <select wire:model="category" id="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="search" class="form-label">Search Products:</label>
                    <input type="text" wire:model="search" id="search" class="form-control" placeholder="Search for a product..." />
                </div>
            </div>
        </div>

        <!-- Product List -->
        <div class="mb-4 custom-card p-4 shadow-sm rounded">
            <h5 class="mb-3">Products</h5>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body">
                                <h6 class="card-title">{{ $product->product_name }}</h6>
                                <p class="card-text">Price: {{ $product->pricePerUnit }} USD</p>
                                <button wire:click="addProducts({{ $product->id }})" class="btn btn-primary">
                                    <i class="material-icons">add_shopping_cart</i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Selected Products List -->
        <div class="mb-4 custom-card p-4 shadow-sm rounded">
            <h5 class="mb-3">Selected Products</h5>
            <table class="table table-striped">
                <tbody>
                    @foreach ($selectedProduct as $selected)
                        <tr>
                            <td>{{ $selected['product']?->product_name ?? $selected['product']['product_name'] }}</td>
                            <td>
                                <input type="number"
                                    wire:model="quantities.{{ $selected['product']->id ?? $selected['product']['id'] }}"
                                    class="form-control" min="1" />
                            </td>
                            <td>
                                <button
                                    wire:click="confirmProduct({{ $selected['product']->id ?? $selected['product']['id'] }})"
                                    class="btn btn-success btn-sm">Confirm</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Confirmed Products -->
        <div class="mb-4 custom-card p-4 shadow-sm rounded">
            <h5 class="mb-3">Confirmed Products</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productconfirmed as $p)
                        <tr>
                            <td>{{ $p['inventory']['product_name'] }}</td>
                            <td>{{ $p['quantity'] }}</td>
                            <td>{{ $p['inventory']['pricePerUnit'] * $p['quantity'] }} USD</td>
                            <td>
                                <button wire:click="notconfirmed({{ $p['inventory']['id'] }})"
                                    class="btn btn-danger btn-sm">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column (Customer Selection) -->
    <div class="col-12 col-sm-4">
        <div class="mb-4 custom-card p-4 shadow-sm rounded">
            <h5>Select Customer</h5>
            <select wire:model="selectedCustomer" class="form-select mb-3">
                <option value="">Select Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Payment Section -->
        <div class="mb-4 custom-card p-4 shadow-sm rounded">
            <h5>Discount</h5>
            <input type="number" wire:model="discount" class="form-control" placeholder="Enter Discount..." />
        </div>

        <!-- Total Calculation -->
        <div class="mb-4 custom-card p-4 shadow-sm rounded">
            <h5>Total: {{ $this->calculateTotal() }} USD</h5>
        </div>

        <div>
            <button wire:click="pay" class="btn btn-primary btn-lg w-100">Pay</button>
        </div>
    </div>
</div>
