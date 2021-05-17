@extends('layouts.front.base')

@section('content')
@livewire('front.state-component', ['slug'=>$slug])
@endsection