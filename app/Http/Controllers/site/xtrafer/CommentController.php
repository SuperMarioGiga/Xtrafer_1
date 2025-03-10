<?php

namespace App\Http\Controllers\site\xtrafer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\api\CommentModel;
use App\Model\api\BlogModel;

class CommentController extends Controller
{
	public function post(Request $request) {
		$input = $request->all();

		$modelComment = (new CommentModel)->fill($input);

		$modelComment->save();

		$blogModel = BlogModel::find($input['blog_id']);
		$blogModel->count_comments += 1;
		$blogModel->save();

		return redirect()->back();
	}

	public function getByBlog(Request $request, $blogId) {
		return CommentModel::getByBlog($blogId, 0, 10)->toArray();
	}

	public function fetchComment(Request $request){
		$comments = CommentModel::getByBlog($request->get('blogId'), $request->get('offset'), 10);

		return view('site.xtrafer.components.comment_post')->with(['comments' => $comments]);
	}
}
