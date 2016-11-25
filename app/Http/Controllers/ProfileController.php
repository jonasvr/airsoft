<?php

namespace App\Http\Controllers;

use App\classe;
use App\geweren;
use App\SubClass;
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
     * @var classe
     */
    protected $class;

    /**
     * @var SubClass
     */
    protected $subclass;
    /**
     * ProfileController constructor.
     * @param User $user
     * @param geweren $geweer
     */
    public function __construct(User $user, geweren $geweer, classe $classe, SubClass $subClass)
    {
        $this->user = $user;
        $this->geweer = $geweer;
        $this->class = $classe;
        $this->subclass = $subClass;
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
        $cla = $this->class->all();
        $subs = $this->subclass->all();
        foreach ($subs as $key => $sub){
            $types[$sub['id']] = $cla[$sub['class_id']-1]['type'] . " - " . $sub['type'];
        }

        $data = [
            'subclasses' => $types,
        ];

        return view('profile.functions.addMaterial',$data);
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
        $new = $this->geweer->create($data);
        return redirect()->route('profile');
    }
}
