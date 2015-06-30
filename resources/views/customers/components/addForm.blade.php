@extends('components.app.template.form')

@section('components.app.template.form.content')
    {!! Form::open(['route'=>'addCustomer']) !!}
    {!! Form::text('name',Input::old('name'),['placeholder'=>'name']) !!}
    {!! Form::text('phone',Input::old('phone'),['placeholder'=>'phone']) !!}
    {!! Form::text('address',Input::old('address'),['placeholder'=>'address']) !!}
    {!! Form::submit('Add',['name'=>'addCustomer']) !!}
    {!! Form::close() !!}
@endsection
