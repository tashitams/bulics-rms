<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class StudentLoginController extends Controller
{
	use ThrottlesLogins;

	public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
	}
	
	/**
	 * Max login attempts allowed.
	 */
	public $maxAttempts = 5;

	/**
	 * Number of minutes to lock the login.
	 */
	public $decayMinutes = 3;

    // specify which guard to use
    protected function guard()
    {
        return Auth::guard('student');
    }

	// user index_number to login
	public function username()
    {
        return 'index_no';
    }


    public function showLoginForm()
	{
	    return view('auth.student_login');
	}

	// Validation...
	private function validator(Request $request)
	{
	    // validation rules.
	    $rules = [
	        'index_no'  => 'bail|required|digits:5',
            'password'  => 'bail|required|min:6'
	    ];

	    // custom validation error messages.
	    $messages = [
	        'index_no.required' => 'Index number is required',
            'index_no.digits'   => 'Index number should be number and 5 characters',
            'password.required'     => 'Password is required',
            'password.min'          => 'Password should be minimum 6 characters'
	    ];

	    // validate the request.
	    $request->validate($rules, $messages);
	}

	// Login the student...
	public function login(Request $request)
	{
		$this->validator($request);

		//check if the user has too many login attempts.
		if ($this->hasTooManyLoginAttempts($request)){
			//Fire the lockout event.
			$this->fireLockoutEvent($request);
	
			//redirect the user back after lockout.
			return $this->sendLockoutResponse($request);
		}
	    
	    if(Auth::guard('student')->attempt([
	    	'index_no' => $request->index_no,
	    	'password' => $request->password])) {
	        //Authentication passed...
	        return redirect()
	            ->intended(route('student.home'))
	            ->with('success', 'You are logged in as student');
		}
		
		//keep track of login attempts from the user.
		$this->incrementLoginAttempts($request);

	    //Authentication failed...
	    return redirect()->route('student.login')
	        ->withInput($request->only('index_no'))
	        ->with('error', 'These credentials do not match our records.');
	}


	public function logout(Request $request)
	{
		Auth::guard('student')->logout();
	    return redirect()
		->route('student.login')
		->with('success','You have logged out successfully!');
	}
}
