<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Mail;
use App\models\manuscriptAuthorsModel;
use App\models\manuscriptModel;
use App\models\publishedArticlesModel;
use App\models\paperStatusTrackModel;
use App\Mail\publishNotificationMail;
class publishController extends Controller
{
    //
    public function isLoggedInCheck()
    {
        if(!$user  = \Auth::user())
            return redirect("login")->send();
    }
    protected function findArticle($key, $value)
    {
        return manuscriptModel::where($key, $value)->get();
    }
    public function deactivateArticle($manToken)
    {
        $article = manuscriptModel::where([['status', '=', 'published'], ['manToken', '=', $manToken]])->get();
        if($article === null)
        {
            return view('articles.notfound');
        }
        else
        {
            manuscriptModel::where('manToken', $manToken)->update(['status' =>'inactive']);

            return redirect('articles/published')->send();
        }
    }
    public function activateArticle($manToken)
    {
        $article = manuscriptModel::where([['status', '=', 'published'], ['manToken', '=', $manToken]])->get();
        if($article === null)
        {
            return view('articles.notfound');
        }
        else
        {
            manuscriptModel::where('manToken', $manToken)->update(['status' =>'published']);

            return redirect('articles/published')->send();
        }
    }
    public function doPublishArticle(Request $approveForm)
    {
        $this->isLoggedInCheck();
        $isvalid = $approveForm->validate([
            'adminPassword' => 'required',
            'adminCaptcha' => 'required|captcha',
            'articleToken' => 'required',
            'articleReasonFile' => ['required','file','mimes:doc,docx,pdf,zip']
        ]);
        $intendedStatus = 'Publish Article';
        $article = $this->findArticle("manToken", $approveForm->articleToken);
        $manCAuthor = manuscriptAuthorsModel::where('a_email', $article[0]->c_author)->get();
        
        if($article == null | $article->count() <= 0)
            return view("articles.notfound");
        
        if($article[0]->status !== "under review")
            return view('articles.actions.notallowed', compact('article', 'intendedStatus'));
        $user = Auth::user();
        $failed = true;
        if(!Hash::check($approveForm->adminPassword, $user->password))
        {
            $approveForm->session()->put('articleError', 'The admin password provided is not correct');
        }
        else
        {
            $fextension = $approveForm->file('articleReasonFile')->getClientOriginalExtension();
            $filename = time().'_jtmb_scimazon.'.$fextension;
            $fileDirectory = env('APP_ROOT')."/uploads/publishes/".hash('md5',$article[0]->submitter);

            if(file_exists($fileDirectory) === false)
            {
                if(mkdir($fileDirectory,0765,true) === false)
                {
                    $approveForm->session()->put('articleError','Failed to create folder for reason file ');
                    return view('articles.actions.publish', compact('article', 'manCAuthor'));
                }
            }

            if(!$approveForm->file('articleReasonFile')->move($fileDirectory.'/', $filename))
            {
                $approveForm->session()->put('articleError','Failed to upload reason file to the folder');
                return view('articles.actions.publish', compact('article', 'manCAuthor'));
            }

            try
            {

                publishedArticlesModel::create([
                    "j_id" => $article[0]->id,
                    "j_man_num" => $article[0]->man_num,
                    "j_url" => env('APP_URL').'uploads/publishes/'.hash('md5',$article[0]->submitter).'/'.$filename,
                    "j_time" => time(),
                    "j_by" => Auth::user()->email
                ]);
                manuscriptModel::whereId($article[0]->id)->update(['status' => 'published']);
                paperStatusTrackModel::create([
                    'j_id'=>$article[0]->id,
                    'whochanged_id' => $user->id,
                    'status' => 'published'
                ]);
                Mail::to($article[0]->submitter)->send(new publishNotificationMail($article));
                $approveForm->session()->put('success');
                return view('articles.viewArticle', compact('article'));
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                $approveForm->session()->put('articleError', $e->getMessage());
            }

        }
        return view('articles.actions.publish', compact('article', 'manCAuthor'));
    }
}
