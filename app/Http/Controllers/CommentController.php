<?php
namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create($id)
    {
        return view('comment.create', [
            'id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $newPost = BlogComment::create([
            'body' => $request->body,
            'blog_post_id' => $request->post,
            'user_id' => auth()->id(),
        ]);

        return redirect('/blog/' . $request->post);
    }
}
