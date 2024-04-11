<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use App\Models\stars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;
use Symfony\Component\Console\Input\Input;

class MainController extends Controller
{
    public function home(){
        $titles = new Title();
        $users = new User();
        $stars = new stars();
        if(Auth::check()){
            return view('home', [
                'titles' => $titles->all(),
                'users' => $users,
                'stars' => $stars->where('author_id', Auth::user()->id)->get()
            ]);
        }else{
            return view('home', [
                'titles' => $titles->all(),
                'users' => $users
            ]);
        }
    }

    public function my(){
        $titles = new Title();
        $users = new User();
        if(!Auth::check())
            return view('home');

        return view('acc', [
            'users'=> $users,
            'titles' => $titles->all()->where('author_id', Auth::user()->id)
        ]);
    }

    public function user($id){
        $titles = new Title();
        $users = User::find($id);
        $stars = new stars();

        return view('user', [
            'stars' => $stars->where('author_id', Auth::user()->id)->get(),
            'users'=> $users,
            'titles' => $titles->all()->where('author_id', $id)
        ]);
    }

    public function fav_open(){
        $titles = new Title();
        $users = new User();
        $stars_table = new stars();
        if(!Auth::check())
            return view('home');
        $stars = $stars_table->all()->where('author_id', Auth::user()->id);



        return view('fav', [
            'titles' => $titles->all(),
            'users' => $users,
            'stars' => $stars
        ]);
    }

    public function login(){
        return view('login');
    }

    public function reg(){
        return view('reg');
    }

    public function reg_proc(Request $request){
        $valid = $request->validate([
            'login' => 'required|min:3|max:9',
            'email' => 'required|min:4|max:100',
            'password'=> 'required|min:6|max:20',
            'passcheck'=> 'required|min:6|max:20'
        ]);

        if($request->input('password') != $request->input('passcheck'))
            return back()->withErrors([
                'email' => 'Пароли не совпадают Повторите попытку',
            ]);

        $user = new User();
        $user->login = $request->input('login');
        $user->email = $request->input('email');
        $user->password = $request->input('password');


        $user->save();
        Auth::login($user);
        return redirect('/');
    }

    public function newPost(){
        return view('post');
    }

    public function newPost_proc(Request $request){
        $valid = $request->validate([
            'name' => 'required|min:3|max:40',
            'text' => 'required|min:3|max:300',
        ]);

        $title = new Title();
        $title->name = $request->input('name');
        $title->text = $request->input('text');
        $title->author_id = Auth::user()->id;

        $title->save();
        return redirect('/');
    }

    public function login_proc(Request $request){
        $valid = $request->validate([
            'email' => 'required|email|min:4|max:100',
            'password'=> 'required|min:6|max:20',
        ]);

        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        if (Auth::attempt($valid)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Введеные данные не верны Повторите попытку',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function fav($id){
        $star = new stars();
        $star->author_id = Auth::user()->id;
        $star->title_id = $id;

        $star->save();
        return redirect('/');
    }

    public function unfav($id){
        $stars = new stars();
        foreach ($stars->all() as $el) {
            if($el->author_id == Auth::user()->id){
                if($el->title_id == $id)
                $el->delete();
            }
        }


        return redirect()->back();
    }

    public function about_edit(Request $request){
        $valid = $request->validate([
            'text' => 'required|min:4|max:100'
        ]);
        $user = User::find(Auth::user());
        $user[0]->about = $request->input('text');
        $user[0]->save();
        return redirect()->back();
    }

    public function post_delete($id){
        $title = Title::find($id);
        $title->delete();

        return redirect()->back();
    }

    public function post_edit($id){
        $titles = Title::find($id);
        return view('edit_views.post_edit', [
            'title' => $titles
        ]);
    }

    public function post_edit_proc(Request $request){
        $valid = $request->validate([
            'name' => 'required|min:3|max:40',
            'text' => 'required|min:3|max:300',
        ]);

        $title = Title::find($request->input('id'));
        //return dd($title);
        $title->name = $request->input('name');
        $title->text = $request->input('text');

        $title->save();

        return redirect('my');
    }
}

