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

    public function create()
    {
        $data = [
            'classes' => $this->DropPrep( $this->class->all() ),
            'subclasses' => $this->DropPrep( $this->subclass->all() ),
        ];

        return view('profile.functions.addMaterial',$data);
    }

    /**
     * @param ArmorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(ArmorRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = Auth::id();
        if (isset($data['img'])){
            $img = $data['img'];
            $img_name = rand(1000,9999). "-" . $img->getClientOriginalName();
            $data['img'] = $img_name;
            $img->move('armor-pics/', $img_name);
        }
        $this->geweer->create($data);

        if(isset($img)){
            return view('profile.functions.crop',['image'=>"armor-pics/".$img_name,'redirect'=>'profile']);
        }

        return redirect()->route('profile')->with('success', 'Armor updated!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArmor($id,$user_id)
    {
        $armor = $this->geweer->ArmorType($id)
                            ->where('user_id',$user_id)
                            ->get();
        $data = [
          'armor' => $armor
        ];

        return view('profile.armor.overview',$data);
    }


    public function edit($id)
    {
        $data = [
                'geweer' => $this->geweer->find($id),
                'classes' => $this->DropPrep( $this->class->all() ),
                'subclasses' => $this->DropPrep( $this->subclass->all() ),
            ];

        return view('profile.functions.editMaterial', $data);
    }

    public function update(ArmorRequest $request)
    {
        $data = $request->all();
        $id = $data['id'];
        unset($data['id']);

        if (isset($data['img'])){
            $img = $data['img'];
            $img_name = rand(1000,9999). "-" . $img->getClientOriginalName();
            $data['img'] = $img_name;
            $img->move('armor-pics/', $img_name);
        }

        if(Auth::user()->role = 'admin'){
            $data['checked'] = 2;
        }else{
            $data['checked'] = 0;
        }

        $this->geweer->find($id)->update($data);

        if(isset($img)){
            return view('profile.functions.crop',['image'=>"armor-pics/".$img_name,'redirect'=>'profile']);
        }

        $data = [
            'armor' => $this->geweer->find($id),
        ];

        if(Auth::user()->role = 'admin'){
            return redirect('/admin');
        }else{
            return view('profile.armor.armor',$data);
        }

    }


    public function DropPrep($classes)
    {
        foreach ($classes as $key => $class){
            $classes[$key] = [$class->id => $class->type];
        }

        return $classes;
    }
}
