<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use App\Utilities\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('type')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $user = User::create(
            [
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                'status'   => 1,
                'type'     => Constants::USERTYPES['Admin'],
            ]
        );
        return 'User Created!!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function editPassword($id)
    {
        $user = User::find($id);

        return view('users.editpassword', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:3|confirmed',
        ]);
        $user = User::find($id);

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return 'Password Updated!';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return 'Updated !';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == Auth::user()->id) {
            return 'you can\'t delete your self';
        }
        $user = User::find($id);
        $user->delete();

        return 'User deleted';
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);

        $user->status = 1;
        $user->save();

        return trans('main.labels.activated');
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);

        $user->status = 0;
        $user->save();

        return trans('main.labels.deactivated');
    }

    public function editMyPassword()
    {
        $user = Auth::user();
        return view('users.editmypassword', compact('user'));
    }

    public function updateMyPassword(Request $request, $id)
    {
        if (!Hash::check($request->oldpassword, Auth::user()->password)) {
            return response()->json(['error' => 'Old password don\'t match database'], 422);
        }
        $this->validate($request, [
            'password' => 'required|min:3|confirmed',
        ]);
        $user = User::find($id);

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return 'Password Updated!';
    }

    public function tokens()
    {
        return view('users.tokens');
    }
}
