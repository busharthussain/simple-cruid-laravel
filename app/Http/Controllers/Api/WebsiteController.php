<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    private $message = '';
    private $success = false;

    /**
     * this is used to subscribe website
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Request $request)
    {
        $data = $request->all();
        $validations = [
            'user_id' => 'required|integer',
            'website_id' => 'required|integer',
        ];
        $validator = \Validator::make($data, $validations);
        if ($validator->fails()) {
            $this->message = formatErrors($validator->errors()->toArray());
        } else {
            $user = User::find($data['user_id']);
            $website = Website::find($data['website_id']);
            $this->message = 'User is not found';
            if ($user && $website) {
                $result = $user->websites()->where('websites.id', $data['website_id'])->exists();
                if(empty($result)) {
                    $user->websites()->attach($data['website_id']);
                    $this->message = 'You have successfully subscribed to website';
                } else {
                    $this->message = 'You have already subscribed to website';
                }
                $this->success = true;
            } else {
                $this->message = 'You have invalid data';
            }
        }

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }
}
