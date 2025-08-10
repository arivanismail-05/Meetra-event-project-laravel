<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class RegisteredUserController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){
            $data = Admin::query();
            return DataTables::of($data)->addIndexColumn()
            ->make(true);
        }
        return view('admin.auth.index');
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

       
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($admin));

        Auth::guard('admin')->login($admin);

        return redirect(route('admin.auth.index', absolute: false));
    }

     public function edit(string $id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.auth.register', compact('data'));

    }

public function update(Request $request, string $id)
    {

       $data =  $request->validate([
            'email' => 'required|email|string|unique:admins,email,'.$request->auth.'|max:224',
        ]);
        Admin::findOrFail($id)->update($data);
        return redirect()->route('admin.auth.index');

    }

   
    public function destroy(string $id)
    {
       Admin::findOrFail($id)->delete();
        return redirect()->route('admin.auth.index');

    }



    
}
