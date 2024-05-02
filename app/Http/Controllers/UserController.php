<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDatatable;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        view()->share('page_title', 'Admin User List');
        $this->middleware('auth');
       $this->middleware('role_or_permission:admin_user.create', ['only' => ['create', 'store']]);
       $this->middleware('role_or_permission:admin_user.update', ['only' => ['edit', 'update']]);
       $this->middleware('role_or_permission:admin_user.view', ['only' => ['index', 'show']]);
       $this->middleware('role_or_permission:admin_user.delete', ['only' => ['destroy']]);
        $roles = Role::pluck('name','id')->toArray();
        view()->share('roles', $roles);
    }

    public function index()
    {
        $users=User::paginate(15);
        return view('user.index')->with('users', $users);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $input = $request->only('name', 'email', 'status', 'password');
        $checkUserExist = User::where('email', trim($input['email']))->exists();
        if ($checkUserExist) {
            throw ValidationException::withMessages([
                'email' => [__('This Email has already been taken.')],
            ]);
        }
        $input['status'] = $request->filled('status') ? 1 : 0;
        $input['password'] = Hash::make($request->password);
        $input['admin_type'] = 'super_admin';
        $userInserted = DB::table('users')->insert($input);
        if ($userInserted) {
            $user = User::where('email', $input['email'])->first();
            if ($request->filled('role')) {
                $role = Role::find($request->get('role'));
                if ($role) {
                    $user->assignRole([$role->id]);
                }
            }
        }
        return redirect()->route('users.index')->with('success', $user->firstname . ' New User Added Successfully');
    }

    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $users = User::with('roles')->where('id', $id)->first();
        return view('user.edit', [
            'users' => $users
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(UserRequest $request, $id)
    {

        $input = $request->only('firstname','lastname', 'email', 'status');
        if($request->missing('status')){
            $input['status'] = 0;
        } else {
            $input['status'] = 1;
        }
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }
        $user = User::find($id);
        $input['admin_type'] = 'super_admin';
        $user->update($input);
        $user->roles()->detach();
        if($request->filled('role')){
            $role = Role::find($request->get('role'));
            if(!empty($role)){
                $user->assignRole([$request->get('role')]);
            }
        }
        return redirect()->route('users.index')->with('success', $user->firstname . ' User Updated Successfully');
        // return redirect()->back()->with('success', $user->firstname.'User Updated Successfully');
    }

    public function show($id)
    {
        $users = User::find($id);
        if (empty($users)) {
            throw ValidationException::withMessages([
                'error' => [__('Admin User is not found')],
            ]);
        }
        return view('user.show', ['users' => $users]);
    }

    /**
     * Delere user by admin
     *
     *
     * */
    public function destroy($id)
    {
        $user = User::find($id);
        $name = $user->firstname;
        if (!empty($user)) {
            $user->delete();
            return redirect()->back()->with('success','User Deleted Successfully');
        }
        return redirect()->back()->with('success','Unable to find user');
    }

    /**
     * Delete the user's account from profile section.
     */
    public function deleteAccount(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/login');
    }
}
