<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Models\DiscussionReply;
use App\Models\ReplyLike;
use App\Notifications\NewReply;
use App\Notifications\NewTopic;
use Telegram\Bot\Laravel\Facades\Telegram;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $forum = Forum::find($id);
        $forums = Forum::latest()->get();

        return view('client.new-topic', compact('forums','forum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $notify = 0;

        if ($request->notify && $request->notify =='on') {
            $notify = 1;
        }

        $topic = new Discussion();
        $topic->title = $request->title;
        $topic->desc = $request->desc;
        $topic->forum_id = $request->forum_id;
        $topic->user_id = auth()->id();
        $topic->notify = $notify;
        $topic->save();

        $latestTopic = Discussion::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {

            $admin->notify(new NewTopic($latestTopic));
        }

        toastr()->success('Discussion Started successfully!');
        return back();
    }


    /**
     * Save reply to the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, $id)
    {
        $reply = new DiscussionReply();
        $reply->desc = $request->desc;
        $reply->user_id = auth()->id();
        $reply->discussion_id = $id;
        $reply->save();

        $latestReply = DiscussionReply::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {

            $admin->notify(new NewReply($latestReply));
        }

        toastr()->success('Reply saved successfully!');
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Discussion::find($id);
        
        if($topic){
            $topic->increment("views", 1);
        }
        return view('client.topic', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updates(){

        $upadtes = Telegram::getUpdates();

        dd($upadtes);
    }

    public function remove($id){

        $discussion = Discussion::find($id);
        $discussion->delete();
        toastr()->success('Reply saved successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = DiscussionReply::find($id);
        $reply->delete();
        toastr()->error('Reply Deleted successfully!');
        return back();
    }

    public function like($id)
    {
        $reply = DiscussionReply::find($id);
        $user_id = $reply->user_id;
        $liked = ReplyLike::where('user_id', '=', auth()->id())->where('reply_id', '=', $id)->get();
// dd($liked)
        if (count($liked) > 0) {
            toastr()->error('You are already liked the reply !');
            return back();
        }

        $reply_like = new ReplyLike();
        $reply_like->$user_id = auth()->id();
        $reply_like->reply_id = $id;
        $reply_like->save();
        $owner = User::find($user_id);
        $reply->increment('likes', 1);
        $owner->increment('rank',10);
        toastr()->success('Like saved successfully!');
        return back();
    }

    public function dislike($id)
    {
        $reply = DiscussionReply::find($id);
        $user_id = $reply->user_id;

        $liked = ReplyLike::where('user_id', '=', auth()->id())->where('reply_id', '=', $id)->get();

        if (count($liked) > 0) {
            toastr()->error('You are already liked the reply !');
            return back();
        }

        $reply_like = new ReplyLike();
        $reply_like->$user_id = auth()->id();
        $reply_like->reply_id = $id;
        $reply_like->save();
        $owner = User::find($user_id);
        $reply->increment('likes', 1);
        $owner->increment('rank',10);
        toastr()->success('Like saved successfully!');
        return back();
    }

}
