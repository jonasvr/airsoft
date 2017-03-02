<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBlogRequest;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * @var Blog
     */
    protected $blog;

    /**
     * BlogController constructor.
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function get()
    {
        $data =[
            'blogs' => $this->blog->OrderBy('id','DESC')->paginate(5),
        ];

        return view('blog.overview', $data);
    }

    public function add()
    {
        return view('blog.create');
    }

    public function create(AddBlogRequest $request)
    {
        $data = $request->all();
        $blog = $this->blog->create($data);

        return redirect(route('blog'));
    }

    public function getUpdate($id)
    {

        $blog = $this->blog->find($id);

        return view('blog.update',['blog'=>$blog]);
    }

    public function postUpdate(AddBlogRequest $request)
    {
        $blog = $this->blog->find($request->id);
        $blog->update($request->all());

        return redirect(route('blog'));
    }
}
