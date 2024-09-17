@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                            <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif

            @if (\Session::has('update'))
                <div class="alert alert-success">
                            <p>{!! \Session::get('update') !!}</p>
                </div>
            @endif

            @if (\Session::has('delete'))
                <div class="alert alert-success">
                            <p>{!! \Session::get('delete') !!}</p>
                </div>
            @endif

            
          <h5 class="card-title mb-4 d-inline">Products</h5>
          <a  href="{{route('products.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
        
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">product</th>
                <th scope="col">price in $$</th>
                <th scope="col">brand</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                   <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->brand}}</td>
                     <td><a href="{{url('admin/edit-products', $product->id)}}" class="btn btn-warning  text-white text-center ">update</a></td>
                     <td><a href="{{url('admin/delete-products', $product->id)}}" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>  
                @endforeach
             
              
                
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

  @endsection