@extends('layouts.main')

@section('content')
<select name="category_id" class="form-select w-auto cat_id m-2" >
    <option value="-1">All Categories</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ request()->get('category') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>
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
  <!-- Button trigger modal -->
  <div class="m-2">
    <div class="d-flex justify-content-end align-items-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Product
        </button>
    </div>
    <form action="{{ route('search.products') }}" method="GET" class="col-3">
        <div class="form-group">
            <input type="search" name="search" id="search" class="form-control" placeholder="Search Category or Product here......" value="">
        </div>
        <button class="btn btn-primary m-2">Search</button>
    </form>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder" id="exampleModalLabel">ADD NEW PRODUCT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf

                        <!-- Product Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Brand -->
                        <div class="col-md-6">
                            <label for="brand" class="form-label">Product Brand</label>
                            <input type="text" name="brand" class="form-control" id="brand" required>
                            @error('brand')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Category -->
                        <div class="col-md-12">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" name="category" class="form-select" >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Image -->
                        <div class="col-md-12">
                            <label for="picture" class="form-label">Product Image</label>
                            <input type="file" name="picture" class="form-control" id="picture" accept="image/*">
                            @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                      

                        <!-- Price -->
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price" step="0.01" required>
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Description -->
                        <div class="col-12">
                            <label for="description" class="form-label">Product Description</label>
                            <textarea class="form-control" name="description" id="description" rows="6" placeholder="Enter the description of the product here..." required></textarea>
                            @error('description')
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

    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder" id="exampleModalLabel">EDIT PRODUCT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="" method="put" enctype="multipart/form-data" class="row g-3">
                        @csrf

                        <!-- Product Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Brand -->
                        <div class="col-md-6">
                            <label for="brand" class="form-label">Product Brand</label>
                            <input type="text" name="brand" class="form-control" id="brand" required>
                            @error('brand')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Category -->
                        <div class="col-md-12">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" name="category" class="form-select" >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Image -->
                        <div class="col-md-12">
                            <label for="picture" class="form-label">Product Image</label>
                            <input type="file" name="picture" class="form-control" id="picture" accept="image/*">
                            @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Stock -->
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Added Stock</label>
                            <input type="number" name="stock" class="form-control" id="stock" required>
                            @error('stock')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price" step="0.01" required>
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Description -->
                        <div class="col-12">
                            <label for="description" class="form-label">Product Description</label>
                            <textarea class="form-control" name="description" id="description" rows="6" placeholder="Enter the description of the product here..." required></textarea>
                            @error('description')
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
       
        <h1 class="my-4">Products List</h1>
    
        <table class="table table-striped">
            <thead>
                <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Brand</th>
                        <th scope="col">Product Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                </tr>
            </thead>
            
                <tbody>

                    @php
                        $counter = 1; 
                    @endphp
                     @if(session('products'))
                     <ul>
                         @foreach(session('products') as $product)
                         <tr>
                            <td>{{ $counter++ }}</td> 
                            
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                            <td>
                                @if($product->picture)
                                    <img src="{{ asset('storage/'.$product->picture) }}" width="100" height="100" alt="Product Image">
                                @else
                                    <p>No image available</p>
                                @endif
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                {{ $totalStocks[$product->id] ?? 0 }}
                            </td>
                            <td>
                                <div style="display: inline-block; width: 80px; height: 20px; 
                                     border-radius: 10%; 
                                     background-color: {{ $totalStocks[$product->id] ?? 0 ? 'green' : 'red' }}; 
                                     color: white; text-align: center; line-height: 20px; font-size: 15px;">
                                    {{$totalStocks[$product->id] ?? 0 ? 'Available' : 'Unavailable' }}
                                </div>
                            </td>
                            <td><a href="{{url('/product/delete/')}}/{{$product->id}}"><button class="btn btn-danger">Delete</button></a></td>
                        </tr>
                         @endforeach
                     </ul>
                 @else
                     @foreach ($products as $product)
                    <tr>
                        <td>{{ $counter++ }}</td> 
                        
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>
                            @if($product->picture)
                                <img src="{{ asset('storage/'.$product->picture) }}" width="100" height="100" alt="Product Image">
                            @else
                                <p>No image available</p>
                            @endif
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            {{ $totalStocks[$product->id] ?? 0 }}
                        </td>
                        <td>
                            <div style="display: inline-block; width: 80px; height: 20px; 
                                 border-radius: 10%; 
                                 background-color: {{ $totalStocks[$product->id] ?? 0 ? 'green' : 'red' }}; 
                                 color: white; text-align: center; line-height: 20px; font-size: 15px;">
                                {{$totalStocks[$product->id] ?? 0 ? 'Available' : 'Unavailable' }}
                            </div>
                        </td>
                        <td><a href="{{url('/product/delete/')}}/{{$product->id}}"><button class="btn btn-danger">Delete</button></a></td>
                   
                    </tr>
                    @endforeach
                 @endif
                    {{-- @foreach ($products as $product)
                    <tr>
                        <td>{{ $counter++ }}</td> 
                        
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>
                            @if($product->picture)
                                <img src="{{ asset('storage/'.$product->picture) }}" width="100" height="100" alt="Product Image">
                            @else
                                <p>No image available</p>
                            @endif
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            {{ $totalStocks[$product->id] ?? 0 }}
                        </td>
                        <td>
                            <div style="display: inline-block; width: 80px; height: 20px; 
                                 border-radius: 10%; 
                                 background-color: {{ $totalStocks[$product->id] ?? 0 ? 'green' : 'red' }}; 
                                 color: white; text-align: center; line-height: 20px; font-size: 15px;">
                                {{$totalStocks[$product->id] ?? 0 ? 'Available' : 'Unavailable' }}
                            </div>
                        </td>
                        <td><a href="{{url('/product/delete/')}}/{{$product->id}}"><button class="btn btn-danger">Delete</button></a></td>
                   
                    </tr>
                    @endforeach --}}
                </tbody>
            
        </table>
    
      
    </div>
  

  </div>

  <script>

        let categories = document.querySelector(".cat_id");
        categories.addEventListener("change",function(e){
            let category = e.target.value;
            window.location.href = `http://127.0.0.1:8000/products?category=${category}`;
        }); 

  </script>



@endsection
