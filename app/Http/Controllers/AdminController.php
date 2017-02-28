<?php

namespace App\Http\Controllers;

use App\geweren;
use Illuminate\Http\Request;
use App\User;
use App\classe;

class AdminController extends Controller
{
    /**
     * @var User
     */
    protected $users;

    /**
     * @var geweren
     */
    protected $geweren;
    public function __construct(user $users, geweren $geweren)
    {
        $this->users = $users;
        $this->geweren = $geweren;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function overview()
    {
        $data = [
            'users' => $this->users->all(),
            'geweren' => $this->geweren->Unchecked()->get(),
        ] ;

        return view('admin.overview',$data);
    }

    public function armor($id,$approve)
    {
//        dd($approve);
        $this->geweren->find($id)->update(['checked'=>$approve]);
//       dd( $this->geweren->find($id));

        return back();
    }
}
