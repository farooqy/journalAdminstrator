<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\newsModel;
use Auth;
class newsController extends Controller
{
    //

    public function isLoggedInCheck()
    {
        if(!$user  = \Auth::user())
            return redirect("login")->send();
    }
    public function showEditor()
    {
        $this->isLoggedInCheck();
    	return view('newspage.editor');
    }
    public function saveNews(Request $newsForm)
    {
        $this->isLoggedInCheck();
    	$newsForm->validate([
            'newsTitle' => 'required|string|min:20',
    		'newsEditor' => 'required|string|max:300|min:100'
    	]);

    	$newsModel = new newsModel;
        $newsModel->updated_user = Auth::user()->email;
        $newsModel->update_title = $newsForm->newsTitle;
        $newsModel->update_text = $newsForm->newsEditor;
        $newsModel->update_status = 'active';
        $newsModel->update_time = time();
        $newsModel->update_token = hash('md5', time());
        $newsModel->updated_user_id = Auth::user()->id;
        $newsModel->save();

        session()->flash('success', 'news Added');
        return view('newspage.editor');
    	
    }
    public function showNewsList()
    {
        $newsList = newsModel::where('update_status', 'active')->orderBy('update_time', 'desc')->get();

        return view('newspage.newsList', compact('newsList'));
    }
    public function markNewsInactive($newsId)
    {
        $newsExist = newsModel::where([['update_id', '=', $newsId],['update_status', '=', 'active']])->get();
        if($newsExist === null || count($newsExist) <= 0)
        {
            session()->flash('error', 'News you are trying to deactivate doesn\'t exist, or is already inactive');
        }
        else
        {
            newsModel::where('update_id', $newsId)->update(['update_status'=>'inactive']);
            session()->flash('success', 'successfuly deactivated news');
        }

        $newsList = newsModel::where('update_status', 'active')->get();
        return view('newspage.newsList', compact('newsList'));
    }
}
