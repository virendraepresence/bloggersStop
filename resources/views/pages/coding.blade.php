@extends('layouts.app')

@section('title', '| Coding')

@section('content')

<div class="col-md-8 col-md-offset-2">

	<a href="/" class="btn btn-default btn-block">Go Back</a><br>

	<h1>Coding and Its Chalenges in Today's World...</h1>

		<div class="well">
			<img src="{{ URL::to('/') }}/images/coding.jpg" style="width:100%; height: 50vh;" >
		</div>


	<p>Human nature looks for more than more and that is a good thing in a way...</p>
	<p>When you hear that anyone can learn the skills they need to become a developer, there’s one important caveat.</p>
        <p> If you’re going to learn to code, you need to be willing to work hard.</p>
        <p>Coding is an attainable skill, but it isn’t easy and there are challenges you’ll encounter along the way.</p>
        <p>We recently asked some of our students – who are now developers – what they found most challenging about learning to code.</p>
        <p>Here are 4 of the major challenges of learning to code that they shared.Whether you’re new to programming or a veteran developer, you will be all too familiar with the lurking presence of Imposter Syndrome when it comes to learning to code. Lacking confidence in your skills is common when you’re new, but honestly, it’s unnecessary. Remember every expert developer was once a beginner and they know how it felt. The tech industry is a welcoming and supportive community where you can find others with more experience who are willing to collaborate or offer guidance (provided you put yourself out there to meet people in tech). As stay-at-home mom and front end developer, Priscilla Lunda, describes “For me, the greatest challenge was the fear and insecurity that held me back in the beginning… That fear and insecurity still creeps up at times and I wonder if I’m good/smart enough to be successful in this field.</p>
        <p> But then I remember that I love coding and every day is an opportunity to continue to learn.”</p>

</div>

@endsection