<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;




class ChangePasswordController extends Controller
{
	public function index()
	{

		return view('change_password');
	}


	public function store(ChangePasswordRequest $request)
	{
		if (Hash::check($request->old_password, \Auth::user()->password)){
			$user = new User;
			$user->where('id', '=', \Auth::user()->id)->update(['password' => bcrypt($request->password)]);
			Flash::success("Se ha cambiado la contraseña de forma exitosa!");
			return redirect()->route('password.change.index');
		}
		else
		{
			Flash::error("La contraseña anterior no es correcta");
			return redirect()->route('password.change.index');
		}			
	}
}

