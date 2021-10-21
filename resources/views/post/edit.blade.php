<x-app-layout>
	<x-slot name="header">
	</x-slot>

	<form class="w-full max-w-sm" id="edit_form" method="post" action="{{url('posts/'.$post->id)}}">
	@csrf
	@method('PUT')
	<div class="md:flex md:items-center mb-6">
		<div class="md:w-1/3">
		  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-title">
			Title
		  </label>
		</div>
		<div class="md:w-2/3">
		  <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-title" type="text" name="title" value="{{$post->title}}">
		</div>
	  </div>
	  <div class="md:flex md:items-center mb-6">
		<div class="md:w-1/3">
		  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-content">
			Content
		  </label>
		</div>
		<div class="md:w-2/3">
		  <textarea  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-content" rows="5" name="content">{{$post->body}}
		  </textarea>
		</div>
	  </div>
	  <div class="md:flex md:items-center">
		<div class="md:w-1/3"></div>
		<div class="md:w-2/3">
		  <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
			Update
		  </button>
		</div>
	  </div>
	  
	</form>
	<form class="w-full max-w-sm" id="delete_form" method="post" action="{{url('posts/'.$post->id)}}">
	@csrf
	@method('DELETE')
	<div class="md:flex md:items-center my-10">
		<div class="md:w-1/3"></div>
		<div class="md:w-2/3">
		  <button class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
			Delete
		  </button>
		</div>
	</div>
	</form>
	
</x-app-layout>
