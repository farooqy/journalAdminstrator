<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\feedbackModel;
class feedbackController extends Controller
{
    //
    public function viewAllFeeds()
    {
    	$feedbackModel = new feedbackModel;

    	$unreadFeeds = $feedbackModel::where('replied_status', 'false')->get();
    	return view('feedback.viewall', compact('unreadFeeds'));
    }
}
