 <div class="py-10">

     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
                 <livewire:create-post />
                 @foreach($posts as $post)
                     <div class="border-b pb-4 mb-4 bg-gray-200 rounded">
                         <address class="flex items-center mb-6 not-italic">
                             <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white mt-2 ml-2">
                                 <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->user->name }}">
                                 <div>
                                     <a href="#" rel="author" class="text-xl font-bold text-black">{{ $post->user->name }}</a>
                                     <div class="inline-flex">
                                        <livewire:edit-post :post_id="$post->id" />
                                     </div>
                                     <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at }}</p>
                                 </div>
                             </div>
                         </address>
                         <p class="ml-3">{{ $post->message }}</p>
                     </div>
                 @endforeach
             </div>
         </div>
     </div>
 </div>

