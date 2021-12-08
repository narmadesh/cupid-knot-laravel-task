<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class GoogleController extends Controller
{
    //
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){
                $name=explode(' ',$user->getName());
                $saveUser = User::insertGetId(['first_name'=>$name[0],'last_name'=>$name[1],'email'=>$user->getEmail(),'password'=>Hash::make($user->getName().'@'.$user->getId()),'google_id' => $user->getId()]);
                return redirect('/update/'.$saveUser);
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
                return redirect('/loginUser/'.$saveUser->id);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function loginUsingId($id)
    {
        $saveUser = User::where('id',$id)->first();
        request()->session()->put('user',$saveUser);
        return redirect()->route('home');
    }

    public function register(Request $req)
    {
        $inputs=$req->input();
        $saveUser = User::insertGetId(['first_name'=>$inputs['first_name'],'last_name'=>$inputs['last_name'],'email'=>$inputs['email'],'password'=>Hash::make($inputs['password']),'dob'=>$inputs['dob'],'gender'=>$inputs['gender'],'annual_income'=>$inputs['annual_income'],'occupation'=>$inputs['occupation'],'family_type'=>$inputs['family_type'],'manglik'=>$inputs['manglik'],'partner_annual_income'=>$inputs['partner_annual_income'],'partner_occupation'=>$inputs['partner_occupation'],'partner_family_type'=>$inputs['partner_family_type'],'partner_manglik'=>$inputs['partner_manglik']]);
        if($saveUser)
        {
            return redirect('/');
        }
    }

    public function loginUsingEmail(Request $req)
    {
        $saveUser = User::where('email',$req->email)->first();
        if($saveUser)
        {
            if (Hash::check($req->password, $saveUser->password)) {
                $req->session()->put('user',$saveUser);
                return redirect()->route('home');
            }
            else {
                $req->session()->flash('error','Password did not match');
                return redirect('/');
            }
        }
        else
        {
            $req->session()->flash('error','Invalid credentials');
            return redirect('/');
        }
    }

    public function home()
    {
        $user=session()->get('user');
        if($user->partner_manglik=="Both")
        {
            $manglik="'Yes','No'";
        }
        else
        {
            $manglik=$user->partner_manglik;
        }
        if($user->partner_annual_income)
        {
            $income=str_replace(["Rs."," "],'',$user->partner_annual_income);
            $income=explode('-',$income);
            // return $income[1];
        }
        $data=User::where('annual_income','<=',$income[1])->
                    orWhere(function($query) use ($income,$user,$manglik){
                        $query->where('annual_income','>=',$income[0])->whereIn('occupation',[$user->partner_occupation])->whereIn('family_type',[$user->family_type])->whereIn('manglik',[$manglik]);
                    })
        ->get();
        return view('home')->with('data',$data);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function update($id)
    {
        $data = User::where('id',$id)->first();
        return view('update')->with('data',$data);
    }

    public function updateUser(Request $req)
    {
        $inputs=$req->input();
        $occupation='';
        if(isset($inputs['partner_occupation']))
        {
            foreach($inputs['partner_occupation'] as $occ)
            {
                $occupation.=$occ.',';
            }
            $inputs['partner_occupation']=$occupation;
        }
        $family='';
        if(isset($inputs['partner_family_type']))
        {
            foreach($inputs['partner_family_type'] as $occ)
            {
                $family.=$occ.',';
            }
            $inputs['partner_family_type']=$family;
        }
        $saveUser = User::where('id',$inputs['id'])->update(['first_name'=>$inputs['first_name'],'last_name'=>$inputs['last_name'],'email'=>$inputs['email'],'password'=>Hash::make($inputs['password']),'dob'=>$inputs['dob'],'gender'=>$inputs['gender'],'annual_income'=>$inputs['annual_income'],'occupation'=>$inputs['occupation'],'family_type'=>$inputs['family_type'],'manglik'=>$inputs['manglik'],'partner_annual_income'=>$inputs['partner_annual_income'],'partner_occupation'=>$inputs['partner_occupation'],'partner_family_type'=>$inputs['partner_family_type'],'partner_manglik'=>$inputs['partner_manglik']]);
        if($saveUser)
        {
            return redirect('/loginUser/'.$inputs['id']);
        }
    }
}
