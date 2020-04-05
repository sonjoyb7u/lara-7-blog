@extends('layouts.front-master')

@section('title')
    Home Page | Laravel Blog
@endsection

@section('content')

<h2>This is Home Page</h2>

<br>

@for($i=0; $i<10; $i++)

    @if($i == 4)
        @break
    @endif

    {{ $i+1 }}
    <br>

@endfor

<br>

@php($num = 100)

@if($num >= 80 && $num <= 100)
        {{ "A+" }}
    @elseif($num >= 75 && $num <= 79)
        {{ "A" }}
    @elseif($num >= 70 && $num <= 74)
        {{ "A-" }}
    @elseif($num >= 65 && $num <= 69)
        {{ "B+" }}
    @else
        {{ "Input valid Number!" }}
@endif

<br>

Id = {{ $id }}
<br>
Name = {{ $name }}
<br>
Data = <br>
@foreach($datas as $data)
    @if($loop->first == 1 || $loop->last == 1)
        <p style="color: green; font-weight: bold">{{ $data['Id']. ' '.$data['Name'].' '.$data['Dept'].' '.$data['Gender'].' '.$data['Age'] }}</p>
    @else
        <p>{{ $loop->iteration }}. {{ $data['Id']. ' '.$data['Name'].' '.$data['Dept'].' '.$data['Gender'].' '.$data['Age'] }}</p>
    @endif
    <br>
@endforeach

@endsection
