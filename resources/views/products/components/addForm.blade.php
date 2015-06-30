@extends('components.app.template.form')

@section('components.app.template.form.content')

    {!! Form::open(['route'=>'addProduct']) !!}
    {!! Form::text('name',Input::old('name')) !!}
    {!! Form::text('description',Input::old('description')) !!}
    {!! Form::submit('Add Product',['name'=>'addProduct']) !!}
    {!! Form::close() !!}

@endsection