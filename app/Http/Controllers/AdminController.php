<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * @var User
     */
    protected $users;
    public function __construct(user $users)
    {
        $this->users = $users;
    }

    public function overview()
    {
        $users = $this->users->all();
        $data = [
            'users' => $users,
        ] ;

        return view('admin.overview',$data);
    }
}
