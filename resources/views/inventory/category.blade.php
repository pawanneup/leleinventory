@extends('layouts.main')

@section('content')
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end align-items-end m-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Category
        </button>
    </div>
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder " id="exampleModalLabel">ADD NEW CATEGORY</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{route('store.category')}}" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf

                        <!-- Category Name -->
                        <div class="col-md-12">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <!-- Category Image -->
                        <div class="col-md-12">
                            <label for="picture" class="form-label">Category Image</label>
                            <input type="file" class="form-control" name="picture" id="picture" accept="image/*">
                            @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Category Description -->
                        <div class="col-12">
                            <label for="description" class="form-label">Category Description</label>
                            <textarea class="form-control" id="description" name="description" rows="6" placeholder="Enter the description of the category here..." required></textarea>
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
                    <h5 class="modal-title fw-bolder " id="exampleModalLabel">EDIT CATEGORY</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data" class="row g-3">
                        @method('PUT')
                        @csrf

                        <!-- Category Name -->
                        <div class="col-md-12">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <!-- Category Image -->
                        <div class="col-md-12">
                            <label for="picture" class="form-label">Category Image</label>
                            <input type="file" class="form-control" name="picture" id="picture" accept="image/*">
                            @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Category Description -->
                        <div class="col-12">
                            <label for="description" class="form-label">Category Description</label>
                            <textarea class="form-control" id="description" name="description" rows="6" placeholder="Enter the description of the category here..." required></textarea>
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
        <h1 class="my-4">Category List</h1>
    
        <table class="table table-striped">
            <thead>
                <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
            </thead>
            
                <tbody>
                    @php
                        $counter = 1; 
                    @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $counter++ }}</td> 
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->picture)
                                <img src="{{ asset('storage/' . $category->picture) }}" width="100" height="100" alt="Category Image">
                            @else
                                <p>No image available</p>
                            @endif
                        </td>  
                        <td>{{ $category->description }}</td>                                              
                        <td>
                            <div style="display: inline-block; width: 80px; height: 20px; 
                                 border-radius: 10%; 
                                 background-color: {{ $category->status == 1 ? 'green' : 'red' }}; 
                                 color: white; text-align: center; line-height: 20px; font-size: 15px;">
                                {{ $category->status == 1 ? 'Available' : 'Unavailable' }}
                            </div>
                        </td>
                        
                        <td><a href="{{url('/category/delete/')}}/{{$category->id}}"><button class="btn btn-danger">Delete</button></a></td>
                        {{-- <td><a href="#"><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button></a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            
        </table>
    
      
    </div>
  

@endsection
