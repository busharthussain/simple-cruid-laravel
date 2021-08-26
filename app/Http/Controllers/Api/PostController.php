<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\PublishPost;
use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class PostController extends Controller
{
    private $message = '';
    private $success = false;

    /**
     * This is used to publish post
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
   public function publishPost(Request $request)
   {
       $data = $request->all();
       $validations = [
           'user_id' => 'required|integer',
           'website_id' => 'required|integer',
           'title' => 'required',
           'description' => 'required'
       ];
       $validator = \Validator::make($data, $validations);
       if ($validator->fails()) {
           $this->message = formatErrors($validator->errors()->toArray());
       } else {
           $user = User::find($data['user_id']);
           $website = Website::find($data['website_id']);
           $this->message = 'User is not found';
           if ($user && $website) {
               $isPostDuplicate = Post::where('title', $data['title'])->first();
               Post::Create($data);
               $emails = $website->users()->select('users.email')->get();
               if ($emails && !$isPostDuplicate) {
                   $emails = $emails->toArray();
                   $emails = array_column($emails, 'email');
                   SendEmailJob::dispatch($emails, $data);
               }
               $this->message = 'Post is published successfully';
               $this->success = true;
           } else {
               $this->message = 'You have invalid data';
           }
       }

       return response()->json(['success' => $this->success, 'message' => $this->message]);
   }
}
