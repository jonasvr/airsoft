<?php

namespace App\Http\Controllers;

use App\geweren;
use App\User;
use Auth;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * @var User
     */
    protected $user;


    /**
     * @var geweren
     */
    protected $geweer;

    /**
     * MemberController constructor.
     * @param User $user
     * @param geweren $geweer
     */
    public function __construct(User $user, geweren $geweer)
    {
        $this->user = $user;
        $this->geweer = $geweer;
    }

    public function members()
    {
        $users = $this->user->where('id','<>',Auth::id())->get();
        $data = [
            'users' => $users,
        ];

        return view('members.overview',$data);
    }

    public function get($id)
    {
//        $geweren = $this->geweer->UserAll($id)->get();
        $data = [
//            'geweren' => $geweren,
        'notifications' => null,
            'user' => $this->user->where('id',$id)->first(),
        ];

        return view('profile.main', $data);
    }
}
