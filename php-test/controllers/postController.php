<?php
class postController extends controller {

    public function show(){
        $this->loadModel('post');
        
       $post = $this->database->getSingle(4);
echo $post;
        $post = [
            'title' => 'day la tieu de bai viet',
            'content' => 'day la noi dung bai viet',
        ];
        $this->loadView('postDetail', $post);
    }
}
?>