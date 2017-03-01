<?php

namespace App\Http\Controllers;

use App\geweren;
use App\Http\Requests\editProfileReqeust;
use App\Status;
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
     * @var Status
     */
    protected $status;

    /**
     * ProfileController constructor.
     * @param User $user
     * @param geweren $geweer
     */
    public function __construct(User $user, geweren $geweer, Status $status)
    {
        $this->user = $user;
        $this->geweer = $geweer;
        $this->status = $status;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main()
    {
        $geweren = $this->geweer->where('user_id',auth::id())->where('checked',1)->get();
        $data = [
            'notifications' => $geweren,
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


        $statussen = $this->status->all();
        foreach ($statussen as $key => $status){
            $statussen[$key] = [$status->id => $status->status];
        }

        $data = [
            'user' => $user,
            'status' => $statussen,
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