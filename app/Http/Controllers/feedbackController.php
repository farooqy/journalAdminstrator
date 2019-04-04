<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\feedbackModel;
use App\models\feedbackReplyModel;
use App\Mail\feedback\feedbackMailer;
use Auth, Mail;
class feedbackController extends Controller
{
    //
    public function isLoggedInCheck()
    {
        if(!$user  = \Auth::user())
            return redirect("login")->send();
    }
    public function viewAllFeeds()
    {
    	$this->isLoggedInCheck();
    	$feedbackModel = new feedbackModel;

    	$unreadFeeds = $feedbackModel::where('replied_status', 'false')->get();
    	return view('feedback.viewall', compact('unreadFeeds'));
    }

    public function viewFeedback($feedbackId)
    {
    	$this->isLoggedInCheck();
    	$feedbackModel = new feedbackModel;
    	$feedback = $feedbackModel::where('id', $feedbackId)->get();
    	if($feedback === null)
    	{
    		return view("feedback.notfound");
    	}
    	else
    	{
    		return view("feedback.viewFeedback", compact('feedback'));
    	}
    }
    public function replyToFeedBack(Request $feedbackForm)
    {
    	$this->isLoggedInCheck();
    	$feedbackForm->validate([
    		'feedbackContent' => 'required|string|min:20',
    		'targetFeedback' => 'required|integer'
    	]);
    	$feedback = feedbackModel::where('id', $feedbackForm->targetFeedback)->get();
    	if($feedback === null)
    		return view('feedback.notfound');

    	$replyModel = new feedbackReplyModel;
    	$replyModel->replied_by = Auth::user()->id;
    	$replyModel->feedback_id = $feedback[0]->id;
    	$replyModel->replied_content = $feedbackForm->feedbackContent;
    	
    	// $replyContent = str_replace("\n", '&nbsp ', );
    	Mail::to($feedback[0]->email)->send(new feedbackMailer($feedbackForm->feedbackContent));
    	feedbackModel::where('id', $feedbackForm->targetFeedback)->update(['replied_status' => 'true']);
    	session()->flash('success', 'Successfully sent reply message');
    	$replyModel->save();

    	return view("feedback.viewFeedback", compact('feedback'));
    }
    public function feedbackReadView()
    {
    	$this->isLoggedInCheck();
    	$feedbackModel = new feedbackModel;

    	$readFeedbacks = $feedbackModel::where('replied_status', 'true')->get();
    	return view('feedback.readFeedBack', compact('readFeedbacks'));
    }

    public function viewReplies($feedbackId)
    {
    	$this->isLoggedInCheck();
    	$feedbackReplyModel = new feedbackReplyModel;
    	$feedbackReplies = $feedbackReplyModel::where('feedback_id', $feedbackId)->get();

    	if($feedbackReplies === null)
    	{
    		return view('feedback.notfound');
    	}
    	else
    	{
    		return view('feedback.viewReplies', compact('feedbackReplies'));
    	}
    }
}
