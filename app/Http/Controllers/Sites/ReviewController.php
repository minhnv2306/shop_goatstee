<?php

namespace App\Http\Controllers\Sites;

use App\Http\Requests\ReviewRequest;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function store(ReviewRequest $request)
    {
        try {
            $attribute = $request->only('rating', 'comment', 'product_id');
            if (Auth::check()) {
                $attribute['author'] = Auth::user()->fullname;
                $attribute['email'] = Auth::user()->email;
            } else {
                if (!empty($request->author) && !empty($request->email)) {
                    $attribute['author'] = $request->author;
                    $attribute['email'] = $request->email;
                } else {
                    return '';
                }
            }
            $review = $this->reviewRepository->create($attribute);

            $data = compact('review');

            return view('sites.review.show', $data);
        } catch (Exception $ex) {
            return '';
        }
    }
}
