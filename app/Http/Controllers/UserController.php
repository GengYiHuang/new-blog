<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\User;
use App\Entities\Post;
use Auth;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $posts = Post::where('uid', $id)->get();
        return view('users.index', ['user' => $user, 'posts' => $posts]);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $avatar = $request->file('avatar');
        if($avatar) {
            $type = explode('/', $avatar->getClientMimeType())[1];
            $name = '/avatar/'.$id.'.'.$type;
            $avatar->move('avatar', $name);
            $image = $name;
            User::find($id)->update([
                'avatar' => $image,
            ]);
        }
        User::find($id)->update([
            'nickname' => $request->nickname ?: '',
            'sex' => $request->sex ?: '',
            'birthday' => $request->birthday ?: '',
            'constellation' => $request->constellation ?: '',
            'selfintro' => $request->selfintro ?: '',
        ]);
        return redirect()->route('user.index', $id);
    }
}
