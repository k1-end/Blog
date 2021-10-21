<x-app-layout>
	<x-slot name="header">
	</x-slot>
	@if(count($posts) != 0)
		@foreach($posts as $post)
			<div class="py-4 px-8 bg-white shadow-lg rounded-lg my-20">
			  <div>
				<h2 class="text-gray-800 text-3xl font-semibold">{{$post->title}}</h2>
				<p class="mt-2 text-gray-600">{{$post->body}}</p>
			  </div>
			  <div class="flex justify-end space-x-4 mt-4">
				<a href="#" class="text-xl font-medium text-indigo-500">{{\App\Models\User::find($post->user_id)->name}}</a>
				@auth
				@if(auth()->id() == $post->user_id)
					<br>
					<a href="{{url('/posts/'.$post->id.'/edit')}}" class="text-xl font-medium text-indigo-500">Edit</a>
				@endif
				@endauth
			  </div>
			</div>
		@endforeach
	@else
			<p class="m-2">There has been no posts yet!</p>
	@endif
</x-app-layout>
