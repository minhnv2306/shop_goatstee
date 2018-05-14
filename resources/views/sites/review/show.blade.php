<li itemprop="review" itemscope="" itemtype="http://schema.org/Review"
    class="comment even thread-even depth-1" id="li-comment-8715">
    <div id="comment-8715" class="comment_container">
        <img alt="" src="#" class="avatar avatar-60 photo" height="60" width="60" itemprop="image">
        <div class="comment-text">
            <div>
                <span>
                    @for ($i = 0; $i < $review->rating; $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                </span>
            </div>
            <p class="meta">{{ $review->author }}</p>
            <div itemprop="description" class="description">
                <p>{{ $review->comment }}</p>
            </div>
            <p> <i> @lang('admin.review.pending') </i></p>
        </div>
    </div>
</li><!-- #comment-## -->
