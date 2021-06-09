<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Komentar;

class ForumController extends Controller
{
    public function index(){
        $forum = Forum::orderBy('created_at', 'desc')->paginate(10);
        return view('forum.index', compact(['forum']));
    }

    public function create(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]);
        $forum = Forum::create($request->all());
        return redirect()->back()->with('sukses', 'Post berhasil dibuat');
    }

    public function view(Forum $forum){
        return view('forum.view', compact(['forum']));
    }

    public function postkomentar(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Komentar::create($request->all());
        return redirect()->back()->with('sukses', 'Komentar berhasil ditambahkan');
    }

    public function delete($id)
    {
        $komentar=Komentar::where('forum_id',$id)->delete();
        $forum = \App\Models\Forum::find($id);
        $forum->delete();
        return redirect('forum')->with('sukses', 'Post berhasil dihapus!');
    }

    public function delete_komentar($id)
    {
        $komentar=Komentar::where('id',$id)->delete();
        $komentar=Komentar::where('parent', $id)->delete();
        return redirect()->back()->with('sukses', 'Komentar berhasil dihapus!');
    }

    public function delete_komentar2($id)
    {
        $komentar=Komentar::where('id',$id)->delete();
        return redirect()->back()->with('sukses', 'Komentar berhasil dihapus!');
    }
}