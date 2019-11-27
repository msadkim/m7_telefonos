@extends('layouts.app') @section('content')
<div class="container">
	<div class="row justify-content-center">
	
	@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li> @endforeach
				</ul>
			</div>
			@endif
	
	
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{$post->titol}}</div>

				<div class="card-body">
					<p>{{$post->contingut}}</p>

				</div>
				<p>Autor: {{$post->user->name}}</p>

			</div>


			<div class="card">
				<div class="card-header">Commentaris</div>
				<div class="card">
					@auth
					<div class="card-body">
						<form action="{{route('comments.store')}}" method="post">
							@csrf
							@method("POST")
							<textarea rows="5" cols="50" name="contingut"></textarea>
							<input type="hidden" name="post_id" value="{{$post->id}}">
							<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
							<input type="submit" value="Submit">
						</form>
					</div>
					@endauth
					@guest
					<div class="card-body">
						 <p><a href="{{ route('login') }}">Autenticat si vols escriure</a> comentaris. O crea un compte <a href="{{ route('register') }}">aquí</a>.</p> 
					</div>
 					@endguest
				</div>
				<div class="card-body">
					@foreach ($post->comments as $comment)
					<div class="alert alert-dark" role="alert">
						<div class="row">
							<div class="col col-lg-2">
								<strong>{{ $comment->user->name }}</strong>
							</div>
							<div class="col col-lg-10">{{$comment->contingut}}</div>
						</div>
					</div>

					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
