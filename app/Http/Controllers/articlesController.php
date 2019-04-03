<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\manuscriptModel;
use App\models\editorialModel;
use App\models\teamModel;
use App\models\newsModel;
use App\models\feedbackModel;
use App\models\manuscriptFiguresModel;
use App\models\manuscriptAuthorsModel;
use App\models\registeredUsers;
use App\models\paperStatusTrackModel;
use App\Mail\approveNotificationMail;

use Auth;
use Hash;
use Mail;
class articlesController extends Controller
{
    //
    public function isLoggedInCheck()
    {
        if(!$user  = \Auth::user())
            return redirect("login")->send();
    }
    public function viewPublishedArticles()
    {
        $this->isLoggedInCheck();
        $publishedArticles = manuscriptModel::where('status', 'published')->get();
        return view('articles.published', compact('publishedArticles'));
    }
    public function redirectToPublishedPage()
    {
        return redirect('articles/published')->send();
    }
    public function searchPublishedAritcle(Request $searchForm)
    {
        $this->isLoggedInCheck();
        $searchForm->validate([
            'search_value' => 'required|string|min:4'
        ]);

        $publishedArticles = manuscriptModel::where('status', 'published')->with(['authors'=>function($q) use ($searchForm){
            // global $searchForm;
            $q->where('a_email', 'like', '%'.$searchForm->search_value.'%')
            ->orWhere('a_firstName', 'like', '%'.$searchForm->search_value.'%')
            ->orWhere('a_secondName', 'like', '%'.$searchForm->search_value.'%');
        }])->where([['title', 'like', '%'.$searchForm->search_value.'%'],['status','=', 'published']])
        ->orWhere([['abstract', 'like', '%'.$searchForm->search_value.'%'],['status','=', 'published']])
        ->orWhere('submitter', 'like', '%'.$searchForm->search_value.'%')->where('status','=', 'published')->get();

        return view('articles.published', compact('publishedArticles'));
    }
    public function viewDeativatedArticles()
    {
        $this->isLoggedInCheck();

        $articles = manuscriptModel::where('status', 'inactive')->get();

        return view('articles.inactive', compact('articles'));
    }
    public function topublish()
    {
    	//***********************************//
        #### ARTICLES READY FOR PUBLICATION ###
        //***********************************//	
        $this->isLoggedInCheck();
    	$articles = manuscriptModel::where([
    		['status', '=', 'under review']])->get();
    	// $figures = $articles->figures;
    	// $articles = manuscriptModel->get;
    	return view('articles.active', compact('articles'));
    }
    public function toApprove()
    {
        //***********************************//
        #### ARTICLES READY TO APPROVE  ###
        //***********************************// 
        $this->isLoggedInCheck();
    	$articles = manuscriptModel::where([
    		['status', '=', 'submitted']])->get();
    	// $figures = $articles->figures;
    	// $articles = manuscriptModel->get;
    	return view('articles.toapprove', compact('articles'));
    }
    public function resent()
    {
        
        //***********************************//
        #### ARTICLES RESENT FOR MODIFYING ###
        //***********************************// 
        $this->isLoggedInCheck();
        $articles = manuscriptModel::where([
            ['status', '=', 'resent']])->get();
        // $figures = $articles->figures;
        // $articles = manuscriptModel->get;
        return view('articles.resent', compact('articles'));
    }
    public function rejected()
    {
        
        //***********************************//
        #### ARTICLES THAT ARE REJECTED ###
        //***********************************// 
        $this->isLoggedInCheck();
        $articles = manuscriptModel::where([
            ['status', '=', 'rejected']])->get();
        // $figures = $articles->figures;
        // $articles = manuscriptModel->get;
        return view('articles.rejected', compact('articles'));
    }
    public function index()
    {
    	// $feedback = feedbackModel::all();
        // return view("welcome");
        $this->isLoggedInCheck();
    	$published = manuscriptModel::where('status', "published")->get()->count();
    	$submitted = manuscriptModel::where('status', "submitted")->get()->count();
    	$rejected = manuscriptModel::where('status', "rejected")->get()->count();
    	$resent = manuscriptModel::where('status', "resent")->get()->count();
    	$activemember = editorialModel::where('ed_status', 'active')->count();
    	$activeteams = teamModel::where('status', 'active')->count();
    	$activeteams = newsModel::where('update_status', 'active')->count();
    	$unreadfeedback = feedbackModel::where('replied_status', 'false')->count();
        $registeredUsers = registeredUsers::all()->count();
    	$articlesDetails = (object)[
    		'submitted' => $submitted,
    		'published' => $published,
    		'rejected' => isset($rejected) ? $rejected : 0,
    		'resent' => isset($resent) ? $resent : 0,
    		'activemember' => isset($activemember) ? $activemember : 0,
    		'activeteams' => isset($activeteams) ? $activeteams : 0,
    		'livenews' => isset($livenews) ? $livenews : 0,
    		'unreadfeedback' => isset($unreadfeedback) ? $unreadfeedback : 0,
            'registeredUsers' => $registeredUsers
    	];
    	// return view('index', compact('articlesDetails'));
        return view("index", compact('articlesDetails'));


    }

    public function viewArticle($token)
    {
        // $article = manuscriptModel::where('manToken', $token)->get();
        $this->isLoggedInCheck();
        $article = $this->findArticle("manToken", $token);
        return view('articles.viewArticle', compact('article'));
    }

    public function approveArticle($token)
    {
        $this->isLoggedInCheck();
        $article = $this->findArticle("manToken", $token);
        $intendedStatus = 'Approve Article';
        if($article == null | $article->count() <= 0)
            return view("articles.notfound");
        $manCAuthor = manuscriptAuthorsModel::where('a_email', $article[0]->c_author)->get();
        
        // $this->checkStatus($article, $manCAuthor);
        if($article[0]->status !== "submitted")
            return view('articles.actions.notallowed', compact('article', 'intendedStatus'));
        
        return view("articles.actions.approve", compact('article', 'manCAuthor'));
    }
    public function publishArticle($token)
    {
        $this->isLoggedInCheck();
        $intendedStatus = "Publish Article";
        $article = $this->findArticle("manToken", $token);
        if($article == null | $article->count() <= 0)
            return view("articles.notfound");
        $manCAuthor = manuscriptAuthorsModel::where('a_email', $article[0]->c_author)->get();
        if($article[0]->status !== "under review")
            return view('articles.actions.publish', compact('article', 'intendedStatus'));
        
        return view("articles.actions.publish", compact('article', 'manCAuthor'));
     
    }
    public function rejectArticle($token)
    {
        $this->isLoggedInCheck();
        $intendedStatus = 'Reject Article';
        $article = $this->findArticle("manToken", $token);
        if($article == null | $article->count() <= 0)
            return view("articles.notfound");
        $manCAuthor = manuscriptAuthorsModel::where('a_email', $article[0]->c_author)->get();
        if($article[0]->status !== "under review" && $article[0]->status !== "submitted")
            return view('articles.actions.notallowed', compact('article', 'intendedStatus'));
        
        return view("articles.actions.reject", compact('article', 'manCAuthor'));
     
    }
    public function resendArticle($token)
    {
        $this->isLoggedInCheck();
        $intendedStatus = 'Resend article';
        $article = $this->findArticle("manToken", $token);
        if($article == null | $article->count() <= 0)
            return view("articles.notfound");
        $manCAuthor = manuscriptAuthorsModel::where('a_email', $article[0]->c_author)->get();
        if($article[0]->status !== "under review" && $article[0]->status !== "submitted")
            return view('articles.actions.notallowed', compact('article', 'intendedStatus'));

        return view("articles.actions.resend", compact('article', 'manCAuthor'));
     
    }

    protected function findArticle($key, $value)
    {
        return manuscriptModel::where($key, $value)->get();
    }


    public function doApproveArticle(Request $approveForm)
    {
        
        $this->isLoggedInCheck();
        $isvalid = $approveForm->validate([
            'adminPassword' => 'required',
            'adminCaptcha' => 'required|captcha',
            'articleToken' => 'required'
        ]);
        $intendedStatus = 'under review Article';
        $article = $this->findArticle("manToken", $approveForm->articleToken);
        $manCAuthor = manuscriptAuthorsModel::where('a_email', $article[0]->c_author)->get();
        
        if($article == null | $article->count() <= 0)
            return view("articles.notfound");
        
        if($article[0]->status !== "submitted")
            return view('articles.actions.notallowed', compact('article', 'intendedStatus'));
        $user = Auth::user();
        
        if(!Hash::check($approveForm->adminPassword, $user->password))
        {
            $approveForm->session()->put('articleError', 'The admin password provided is not correct');
        }
        else
        {
            try
            {
                manuscriptModel::whereId($article[0]->id)->update(['status' => 'under review']);
                paperStatusTrackModel::create([
                    'j_id'=>$article[0]->id,
                    'whochanged_id' => $user->id,
                    'status' => 'under review'
                ]);
                Mail::to($article[0]->submitter)->send(new approveNotificationMail($article));
                $approveForm->session()->put('success');
                return view('articles.actions.publish', compact('article', 'manCAuthor'));
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                $approveForm->session()->put('articleError', $e->getMessage());
            }
            catch(\Exception $e)
            {
                $approveForm->session()->put('articleError', $e->getMessage());
            }

        }
        return view('articles.actions.approve', compact('article', 'manCAuthor'));
    }

    
    public function checkStatus($article, $manCAuthor='')
    {
        if($article[0]->status === "under review")
            return view('articles.actions.publish', compact('article', 'manCAuthor'));
        else if($article[0]->status === 'deleted')
            return view('articles.notfound');
        else if($article[0]->status === 'resent')
            return view('articles.resent');
        else if($article[0]->status === 'rejected')
            return view('articles.rejected');
    }
}
