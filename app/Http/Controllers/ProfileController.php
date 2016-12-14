<?php

namespace App\Http\Controllers;

use App\geweren;
use App\Http\Requests\editProfileReqeust;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * ProfileController constructor.
     * @param User $user
     * @param geweren $geweer
     */
    public function __construct(User $user, geweren $geweer)
    {
        $this->user = $user;
        $this->geweer = $geweer;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main()
    {
        $geweren = $this->geweer->UserAll(Auth::id())->SubClasses()->get();
        $data = [
            'geweren' => $geweren,
            'user' => Auth::user(),
        ];

        return view('profile.main', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit()
    {
        return view('profile.functions.edit');
    }

    /**
     * @param editProfileReqeust $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(editProfileReqeust $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->user->where('id',Auth::id())->update($data);

        return redirect()->route('profile')->with('success', 'Profile updated!');
    }
}