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

    public function add()
    {
        return view('blog.create');
    }

    public function create(AddBlogRequest $request)
    {
        $data = $request->all();
        $blog = $this->blog->create($data);

        return 'success';
    }
}
