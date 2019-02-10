<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\manuscriptModel;
use App\models\editorialModel;
use App\models\teamModel;
use App\models\newsModel;
use App\models\feedbackModel;
use App\Models\manuscriptFiguresModel;
use App\Models\registeredUsers;
class articlesController extends Controller
{
    //
    public function topublish()
    {
    	//these are also approved articles after status of submitted	
    	$articles = manuscriptModel::where([
    		['status', '=', 'under review']])->get();
    	// $figures = $articles->figures;
    	// $articles = manuscriptModel->get;
    	return view('articles.active', compact('articles'));
    }
    public function toApprove()
    {
    	//these are also approved articles after status of submitted
    	$articles = manuscriptModel::where([
    		['status', '=', 'submitted']])->get();
    	// $figures = $articles->figures;
    	// $articles = manuscriptModel->get;
    	return view('articles.toapprove', compact('articles'));
    }
    public function resent()
    {
        //these are also approved articles after status of submitted
        $articles = manuscriptModel::where([
            ['status', '=', 'resent']])->get();
        // $figures = $articles->figures;
        // $articles = manuscriptModel->get;
        return view('articles.resent', compact('articles'));
    }
    public function rejected()
    {
        //these are also approved articles after status of submitted
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
        $article = manuscriptModel::where('manToken', $token)->get();
        return view('articles.viewArticle', compact('article'));
    }

    
}
