@extends('layouts.main')

@section('content')
{{-- <select name="category_id" class="form-select w-auto cat_id m-2" >
    <option value="-1">All Categories</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ request()->get('category') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select> --}}
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end align-items-end m-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Stock
        </button>
    </div>
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div>
@if(session()->has('success'))  
<div class="alert alert-success">
    <p>{{ session()->get('success') }}</p>
</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</div>
<form action="" class="col-3">
    <div class="form-group">
      <input type="search" name="search" id="search" class="form-control" placeholder="Search Category or Product here......">
    </div>
    <button class="btn btn-primary m-2">Search</button>
</form>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder " id="exampleModalLabel">ADD NEW STOCK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf

                       {{-- <!-- Category Selection -->
                        <div class="col-md-12">
                            <label for="category_id" class="form-label">Select Category</label>
                            <select name="category_id" class="form-control" id="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <!-- Product Selection -->
                        <div class="col-md-12">
                            <label for="product_id" class="form-label">Select Product</label>
                            <select name="product_id" class="form-control" id="product_id" required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-12">
                            <label for="quantity" class="form-label">Number of Stock</label>
                            <input type="number" name="quantity" class="form-control" id="quantity" required>
                            @error('quantity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supplier -->
                        <div class="col-md-6">
                            <label for="supplier" class="form-label">Supplier</label>
                            <input type="text" name="supplier" class="form-control" id="supplier" required>
                            @error('supplier')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date of Addition -->
                        <div class="col-md-6">
                            <label for="date_of_addition" class="form-label">Date of Addition</label>
                            <input type="date" name="date_of_addition" class="form-control" id="date_of_addition" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                            @error('date_of_addition')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="p-2">
        <h1 class="my-4">Added Stock List</h1>
    
        <table class="table table-striped">
            <thead>
                <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Date of Addition</th>
                            <th scope="col">Actions</th>
                </tr>
            </thead>
                <tbody>
                    
                    @php
                        $counter = 1; 
                    @endphp
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{ $stock->product->category->name ?? 'N/A' }}</td>  {{-- $stock['category']['name'] --}}
                            <td>{{ $stock->product->name ?? 'N/A' }}</td>
                            <td>
                                @if($stock->product->picture)
                                    <img src="{{ asset('storage/'.$stock->product->picture) }}" width="100" height="100" alt="Product Image">
                                @else
                                    <p>No image available</p>
                                @endif
                            </td>
                            <td>RS. {{ $stock->product->price }}</td>
                            <td>{{ $stock->quantity }} Units</td>
                            <td>{{ $stock->supplier }}</td>
                            <td>{{ $stock->date_of_addition }}</td>
                            <td>
                                <a href="{{ route('stock.delete', $stock->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    {{-- <script>

        let categories = document.querySelector(".cat_id");
        categories.addEventListener("change",function(e){
            let category = e.target.value;
            window.location.href = `http://127.0.0.1:8000/stock?category=${category}`;
        }); 

  </script> --}}
@endsection

