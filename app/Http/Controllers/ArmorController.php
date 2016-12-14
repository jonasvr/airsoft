<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArmorRequest;
use Illuminate\Http\Request;
use App\User;
use App\geweren;
use App\classe;
use App\SubClass;
use Auth;

class ArmorController extends Controller
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
     * @param ArmorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAdd(ArmorRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = Auth::id();
        $new = $this->geweer->create($data);
        return redirect()->route('profile')->with('success', 'Armor updated!');
    }

    public function getArmor($id)
    {
        $armor = $this->geweer->ArmorType($id)->get();
        $data = [
          'armor' => $armor
        ];


        return view('profile.armor.overview',$data);



    }
}
