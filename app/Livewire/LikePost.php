<?php
//
//namespace App\Livewire;
//
//use App\Models\Like;
//use Livewire\Component;
//
//class LikePost extends Component
//{
//    public $post_id;
//
//    public bool $isLiked;
//
//    public function mount($post_id)
//    {
//        $this->post_id = $post_id;
//
//        if (Like::where('post_id', $this->post_id)->where('user_id', auth()->id())->exists()) {
//            $this->isLiked = true;
//        }
//    }
//
//    public function like()
//    {
//        $like = Like::firstOrCreate(['post_id' => $this->post_id, 'user_id' => auth()->id()]);
//
//        $this->isLiked = true;
//        if (! $like->wasRecentlyCreated) {
//            $like->delete();
//
//            $this->isLiked = false;
//        }
//
//    }
//
//    public function render()
//    {
//        return view('livewire.like-post', ['likes' => Like::where('post_id', $this->post_id)->count()]);
//    }
//}
