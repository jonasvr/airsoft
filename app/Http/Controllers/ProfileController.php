<?php

namespace App\Http\Controllers;

use App\geweren;
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
        $geweren = $this->geweer->UserAll(Auth::id())->get();
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
     * request is al aangemaakt -> controle uitvoeren en aanpassen
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->user->where('id',Auth::id())->update($data);

        return redirect()->route('profile');
    }

    public function getAdd()
    {
        return view('profile.functions.addMaterial');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAdd(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = Auth::id();
        $this->geweer->create($data);

        return redirect()->route('profile');
    }
}
