@extends('layouts.app')

@section('title', '| Gallery')

@section('content')

<div class="well"><h1>Photos</h1></div>

<div class="well">
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p1.jpg">
		<img src="{{ URL::to('/') }}/images/t1.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p2.jpg">
		<img  src="{{ URL::to('/') }}/images/t2.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p3.jpg">
		<img  src="{{ URL::to('/') }}/images/t3.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p4.jpg">
		<img  src="{{ URL::to('/') }}/images/t4.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p5.jpg">
		<img  src="{{ URL::to('/') }}/images/t5.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p6.jpg" >
		<img src="{{ URL::to('/') }}/images/t6.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p7.jpg">
		<img  src="{{ URL::to('/') }}/images/t7.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p8.jpg" >
		<img  src="{{ URL::to('/') }}/images/t8.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p9.jpg" >
		<img src="{{ URL::to('/') }}/images/t9.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p10.jpg">
		<img src="{{ URL::to('/') }}/images/t10.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p11.jpg">
		<img  src="{{ URL::to('/') }}/images/t11.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p12.jpg">
		<img  src="{{ URL::to('/') }}/images/t12.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p13.jpg">
		<img  src="{{ URL::to('/') }}/images/t13.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p14.jpg">
		<img  src="{{ URL::to('/') }}/images/t14.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p15.jpg" >
		<img src="{{ URL::to('/') }}/images/t15.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p16.jpg">
		<img  src="{{ URL::to('/') }}/images/t16.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p17.jpg">
		<img  src="{{ URL::to('/') }}/images/t17.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p18.jpg">
		<img  src="{{ URL::to('/') }}/images/t18.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p19.jpg">
		<img  src="{{ URL::to('/') }}/images/t19.jpg"></a>
	<a data-fancybox="gallery" href="{{ URL::to('/') }}/images/p20.jpg" >
		<img src="{{ URL::to('/') }}/images/t20.jpg"></a>


</div>


@endsection	