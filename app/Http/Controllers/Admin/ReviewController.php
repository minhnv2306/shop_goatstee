<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Repositories\Contracts\ReviewInterfaceRepository;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    protected $reviewRepository;

    public function __construct(ReviewInterfaceRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function index()
    {
        $attribute = [
            'id',
            'author',
            'comment',
            'rating',
            'product_id',
            'created_at',
            'approved',
        ];
        $reviews = $this->reviewRepository->getAll($attribute);

        $data = compact('reviews');

        return view('admin.review.index', $data);
    }

    public function update(Review $review)
    {
        try {
            if ($review->approved == Review::HIDDEN) {
                $review->approved = Review::APPROVED;
            } else {
                $review->approved = Review::HIDDEN;
            }
            $review->save();

            return redirect()->route('reviews.index')
                ->with('message', trans('admin.review.success_update'));
        } catch (Exception $ex) {
            return redirect()->route('reviews.index')
                ->with('error', $ex->getMessage());
        }
    }
}
