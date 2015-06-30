
@extends('customers.customers_container')

@section('customers.content')

    <div class="row">
        <div class="col-lg-12">
            @include('customers.components.addForm')
        </div>
    </div>
        <?php
            $table = new \App\Zeenom_Helpers\ZeenomSimpleTable($customers);
            $table->draw();
        ?>
@endsection