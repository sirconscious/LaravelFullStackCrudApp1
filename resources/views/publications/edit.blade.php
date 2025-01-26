@vite('resources/css/app.css')
<h1>Modifier  une publication</h1>
<div class="max-w-md mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
    <form action="{{route('publications.update',$publication->id)}}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">title:</label>
            <input type="text" value="{{old("title",$publication->title)}}" name="title" id="title" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        @error('title')
           <span class="text-sm text-red-600">
               {{$message}}       
        </span>
        @enderror
       
        <div>
            <label for="body" class="block text-sm font-medium text-gray-700">Body:</label>
            <textarea name="body" id="body" rows="5" class="w-full mt-1 px-3 py-2 border
             border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500
              focus:border-blue-500">{{old("title",$publication->body)}}</textarea>
        </div>
        @error('body')
        <span class="text-sm text-red-600">
            {{$message}}       
     </span>    @enderror
        
            <div class="">
                <img src="{{asset("storage/".$publication->image)}}" alt="">
            </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
            <input type="file" name="image" id="image" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        @error('image')
        <span class="text-sm text-red-600">
            {{$message}}       
     </span>    @enderror
        <div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Submit
            </button>
        </div>

    </form>
</div>
