<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\manuscriptModel;
use App\models\editorialModel;
use App\models\teamModel;
use App\models\newsModel;
use App\models\feedbackModel;
use App\Models\manuscriptFiguresModel;
use App\Models\manuscriptAuthorsModel;
use App\Models\registeredUsers;
class articlesController extends Controller
{
    //
    public function isLoggedInCheck()
    {
        if(!$user  = \Auth::user())
            return redirect("login")->send();
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
        if($article == null | $article->count() <= 0)
            return view("articles.notfound");
        else
        {
            $manCAuthor = manuscriptAuthorsModel::where('a_email', $article[0]->c_author)->get();
            return view("articles.actions.approve", compact('article', 'manCAuthor'));
        }
    }
    public function publishArticle($token)
    {
        $this->isLoggedInCheck();
        $article = $this->findArticle("manToken", $token);
        if($article == null | $article->count() <= 0)
            return view("articles.notfound");
        else
        {
            $manCAuthor = manuscriptAuthorsModel::where('a_email', $article[0]->c_author)->get();
            return view("articles.actions.publish", compact('article', 'manCAuthor'));
        }
    }

    protected function findArticle($key, $value)
    {
        return manuscriptModel::where($key, $value)->get();
    }

    
}
