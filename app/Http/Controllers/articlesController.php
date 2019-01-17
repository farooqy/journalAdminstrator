<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\manuscriptModel;
use App\models\editorialModel;
use App\models\teamModel;
use App\models\newsModel;
use App\models\feedbackModel;
class articlesController extends Controller
{
    //
    public function topublish()
    {
    	// $feedback = feedbackModel::all();
    	$published = manuscriptModel::where('status', "published")->get()->count();
    	$submitted = manuscriptModel::where('status', "submitted")->get()->count();
    	$rejected = manuscriptModel::where('status', "rejected")->get()->count();
    	$resent = manuscriptModel::where('status', "resent")->get()->count();
    	$activemember = editorialModel::where('ed_status', 'active')->count();
    	$activeteams = teamModel::where('status', 'active')->count();
    	$activeteams = newsModel::where('update_status', 'active')->count();
    	$unreadfeedback = feedbackModel::where('replied_status', 'false')->count();
    	$articlesDetails = (object)[
    		'submitted' => $submitted,
    		'published' => $published,
    		'rejected' => isset($rejected) ? $rejected : 0,
    		'resent' => isset($resent) ? $resent : 0,
    		'activemember' => isset($activemember) ? $activemember : 0,
    		'activeteams' => isset($activeteams) ? $activeteams : 0,
    		'livenews' => isset($livenews) ? $livenews : 0,
    		'unreadfeedback' => isset($unreadfeedback) ? $unreadfeedback : 0,
    	];
    	return view('index', compact('articlesDetails'));

    }
}
