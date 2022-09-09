@extends('layouts.app')

@section('title',$meta['title'])
@section('meta_keywords',$meta['keywords'])
@section('meta_description',$meta['description'])

@section('content')

<div class="va-page-strip-tag">
    <ul>
        <li> <a href="{{url('/')}}">Home</a> </li>
        <li>/ &nbsp; {{ $result['title'] }} </li>
    </ul>
</div> 


<div class="va-terns-condition-wrapper">
    <h2>{{ $result['title'] }}</h2>
    <div class="terms-content">
        <?php echo $result['description']; ?>
    </div>
</div>



@endsection
