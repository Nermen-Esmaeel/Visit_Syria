<?php 

namespace App\Traits;

use App\Models\Comment;

Trait CommentsTrait{


    public function AddComment($selected){
      
        $comment = new Comment();
        $comment->user_id = $selected['user_id'];
        $comment->content = $selected['content'];
        $comment->commentable()->associate($selected);
        $comment->save();
        return $selected;
      
    }


}