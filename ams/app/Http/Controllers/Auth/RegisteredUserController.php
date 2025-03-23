<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\HomeAddress;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\State;
use App\Models\District;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $states = State::all(); // Retrieve all states from the database
        $districts = District::all(); // Retrieve all districts from the database
        return view('auth.register', compact('states', 'districts'));
        // folder resources> .. > auth > register.blade.php
    }

    public function getDistricts(Request $request, $stateId)
    {
        $districts = District::where('state_id', $stateId)->get()->map(function ($districts) {
            return [
                'id' => $districts->id,
                'name' => $districts->name,
            ];
        });
        return response()->json($districts);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mycard_number' => ['required', 'regex:/[0-9]{12}/'],
            'phone_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
            'address_line1' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'regex:/[0-9]/', 'digits:5'],
            'district' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'students.*.sname' => ['required', 'string', 'max:255'],
            'students.*.mykid_number' => ['required', 'regex:/[0-9]{12}/'],
            'students.*.sbirth_date' => ['required', 'string', 'max:255'],
            'students.*.age' => ['required', 'string', 'max:255'],
            'students.*.gender' => ['required', 'string', 'max:255'],
            'students.*.class_of' => ['required', 'integer'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Store the user data
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mycard_number' => $request->mycard_number,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Retrieve the district and state names
        $districtId = $request->input('district');
        $stateId = $request->input('state');

        $district = District::find($districtId);
        $state = State::find($stateId);

        // Store the home address data
        $homeAddress = HomeAddress::create([
            'user_id' => $user->id,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'post_code' => $request->post_code,
            'district' => $district->name,
            'state' => $state->name,
        ]);

        foreach ($validatedData['students'] as $student) {
            Student::create([
                'user_id' => $user->id,
                'sname' => $student['sname'],
                'mykid_number' => $student['mykid_number'],
                'sbirth_date' => $student['sbirth_date'],
                'age' => $student['age'],
                'gender' => $student['gender'],
                'class_of' => $student['class_of'],
            ]);
        }

        // Handle the user registration event
        event(new Registered($user));

        //  Log in the user after registration
        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
