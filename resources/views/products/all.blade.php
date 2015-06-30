@extends('products.products')

@section('products.content')

@if(Session::has('helo'))
<div class="alert-box success">
    <h2>{{ Session::get('helo') }}</h2>
</div>
@endif

@if($errors->any())
    <h4>{{ var_dump($errors->all())}}</h4>
    @endif

    @include('products.components.addForm')

<h4>
    @forelse($products as $product)
    <li>
        {{ $product->name }}
        <?php
        $stock = $product->stock;
        if($stock != null)
        {
            var_dump($stock->quantity);
        }
        $customer = $product->customer;
        if($customer != null)
        {
            var_dump($customer->name);
        }
        ?>
    </li>
    @empty
    <p>No Products</p>
    @endforelse
</h4>


@endsection