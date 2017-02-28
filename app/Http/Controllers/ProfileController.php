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
    public function getEdit($id)
    {
        $user = $this->user->find($id);
        $data = [
            'user' => $user,
        ];
        return view('profile.functions.edit', $data);
    }

    /**
     * @param editProfileReqeust $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(editProfileReqeust $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if (isset($data['img'])){
            $img = $data['img'];
            unset($data['img']);
        }
        $this->user->where('id',$data['id'])->update($data);

        if(Auth::user()->function_id == 1){
            $redirect = 'admin';
        }else{
            $redirect = 'profile';
        }

        return redirect()->route($redirect)->with('success', 'Profile updated!');
    }
}