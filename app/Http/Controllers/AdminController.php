<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function admin() {
        return view('admin/admin');
    }
    public function pages() {
        return view('admin/pages');
    }
    public function clients() {

        $users = User::all();

        return view('admin/users', [
            'users' => $users
        ]);
    }
    public function editProfile($id) {

        $user = User::findOrFail($id);
        $name = $user->name;
        $email = $user->email;
        $roleid = ($user->role) ? $user->role : false;
        $role = ($roleid) ? $user->role->name : 'Пользователь';

        return view('admin/editacc', [
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'id' => $id
        ]);
    }
    public function editProfileSave(Request $req, $id) {

        $user = User::findOrFail($id);
        $user->name = ($req->input('name') == null) ? $user->name : $req->input('name');
        $user->email = ($req->input('email') == null) ? $user->email : $req->input('email');
        $user->role_id = ($req->input('role') == null) ? $user->role_id : $req->input('role');

        $user->save();

        return redirect()->route('editprofile', $id);
    }
}
