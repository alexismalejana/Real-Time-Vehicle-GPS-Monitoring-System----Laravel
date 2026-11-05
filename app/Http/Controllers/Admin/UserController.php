<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $data['getRecordStatus'] = User::getRecordStatus();
        return view('admin.users.list',$data);
    }

    public function add()
    {
        return view('admin.users.add');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'position' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:12',
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.users.add')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->position = $validated['position'];
        $user->password = Hash::make($validated['password']);
        $user->created_by = Auth::user()->id;
        $user->save();

        return redirect()->route('admin.users.list')->with('success', 'A new account has been created!');
    }

    public function edit($id)
    {
        try {
            $decodedId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }

        $data['getSingleRecord'] = User::getSingleRecord($decodedId);
        return view('admin.users.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $user = User::getSingleRecord($id);

        if (!$user) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'role' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', $id)->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->position = $validated['position'];
        $user->role = $validated['role'];
        $user->status = $validated['status'];
        $user->save();

        return redirect()->route('admin.users.list')->with('success', 'The record has been updated!');
    }

    public function delete($id)
    {
        $user = User::getSingle($id);

        if (!empty($user)) {
            Gate::authorize('delete-user');
            $user->delete();
            return redirect()->route('admin.users.list')->with('success', 'The record has been deleted!');
        }

        return redirect()->route('admin.users.list')->with('error', 'User record not found.');
    }

    public function forceLogout($id)
    {
        $user = User::findOrFail($id);
        $user->increment('session_version');
        return redirect()->route('admin.users.list')->with('success','The user account has been forcibly logged out!');
    }

    public function myprofile()
    {
        $data['myprofile'] = User::findOrFail(Auth::id());
        return view('admin.myprofile.myprofile',$data);
    }

    public function myprofile_update(Request $request)
    {

        $myprofile = User::findOrFail(Auth::id());

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $myprofile->id,
            'experience' => 'required|string',
            'skills' => 'required|string|max:500',
            'checked' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();

            $randomStr = $myprofile->id . Str::random(20);

            $filename = strtolower($randomStr) . '.' . $ext;

            $uploadPath = public_path('uploads/users/myprofile');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);

            $myprofile->image = $filename;
        }

        $myprofile->name = $request->name;
        $myprofile->email = $request->email;
        $myprofile->experience = $request->experience;
        $myprofile->skills = $request->skills;
        $myprofile->checked = $request->checked;
        $myprofile->save();

        return redirect()->route('admin.myprofile.myprofile')->with('success', 'Your profile has been updated!');
    }
}
