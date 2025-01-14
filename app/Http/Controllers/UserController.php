<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\UserStatus;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        // Get all users excluding the logged-in user
        $users = User::where('id', '!=', auth()->id())->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles=Role::all();
        return view( 'users.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $user=User::create($request->validated());
        $user->image="/img/users/default.png";
        $user->save();
        $role=Role::find($request->role);
        $roleName=$role->name;
        $user->assignRole($roleName);
        return redirect()->route('users.index')->with('success', value: 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $roles=Role::all();
        $user=User::find($id);

        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {

    // Update user details
    $user = User::find($id);
    $user->update($request->validated());
    $user->name=$request->name;

    //get an remove existing assigned role
    $roles = $user->getRoleNames();
    foreach($roles as $role){
        $user->removeRole($role);
    }

    //assign new role
    $role=Role::find($request->role);
    $roleName=$role->name;
    $user->assignRole($roleName);

    // Redirect with a success message
    return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function destroy(string $id )
    {

        User::destroy($id);


        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    public function toggleStatus(Request $request)
    {

        $user = User::findOrFail($request->user_id);
        // Toggle status
        if ($user->status === UserStatus::ACTIVE) {
            $user->status = UserStatus::DEACTIVE;
        } else {
            $user->status = UserStatus::ACTIVE;
        }
        // Save the user
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.',
        ]);

    }
}
