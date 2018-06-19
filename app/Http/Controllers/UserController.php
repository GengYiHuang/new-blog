<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\User;
use App\Entities\Post;
use App\Entities\Message;
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
    public function message($id)
    {
        $messages = Message::where('send_to', $id)->get();
        return view('messages.index', ['messages' => $messages]);
    }
    public function messageShow($id)
    {
        $message = Message::find($id);
        if (!$message->read) {
            $message->update([
                'read' => 1
            ]);
        }
        return view('messages.show', ['message' => $message]);
    }
    public function messageReply($id)
    {
        $message = Message::find($id);
        $title = $message->title;
        $send_to = $message->uid;
        return view('messages.create', ['title' => $title, 'send_to' => $send_to]);
    }
    public function messageCreate($id)
    {
        return view('messages.create', ['title' => '', 'send_to' => $id]);
    }
    public function messageStore(Request $request, $id)
    {
        $message = Message::create([
            'uid' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'send_to' => $id,
            'read' => 0,
        ]);
        return redirect()->route('message.index', Auth::user()->id)->with("message", "success");
    }
}
