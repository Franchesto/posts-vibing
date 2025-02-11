 <div class="py-10">

     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
                 @foreach($posts as $post)
                     <div class="border-b pb-4 mb-4">
                         <p>{{ $post->message }}</p>
                     </div>
                 @endforeach
             </div>
         </div>
     </div>
 </div>

