@extends('layouts.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">High Stock Items</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Low Stock Items</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Most Selling Items</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Least Selling Items</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

    

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Items List
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Total Quantity</th> 
                            <th>Status</th>
                            <th>Supplier</th>
                            <th>Date Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name ?? 'N/A' }}</td>
                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                            <td>
                                @if($product->picture)
                                    <img src="{{ asset('storage/'.$product->picture) }}" width="100" height="100" alt="Product Image">
                                @else
                                    <p>No image available</p>
                                @endif
                            </td>
                            <td>RS. {{ $product->price }}</td>
                            <td>
                                {{ $totalStocks[$product->id] ?? 0 }} Units
                            </td>
                            <td>
                                <div style="display: inline-block; width: 80px; height: 20px; 
                                     border-radius: 10%; 
                                     background-color: {{ $totalStocks[$product->id] ?? 0 ? 'green' : 'red' }}; 
                                     color: white; text-align: center; line-height: 20px; font-size: 15px;">
                                    {{$totalStocks[$product->id] ?? 0 ? 'Available' : 'Unavailable' }}
                                </div>
                            </td>
                            <td>
                                @foreach($stocks->where('product_id', $product->id) as $stock)
                                    <p>{{ $stock->supplier }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach($stocks->where('product_id', $product->id) as $stock)
                                    <p>{{ $stock->date_of_addition }}</p>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                    
                   
                </table>
            </div>
        </div>
    </div>
</main>
@endsection