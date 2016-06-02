<?php

namespace App\Http\ViewComposers;

use App\Notice;
use Illuminate\Contracts\View\View;

class NoticeComposer
{
    protected $notice;

    public function __construct(Notice $notice)
    {
        $this->notice = $notice->orderBy('created_at', 'desc')->first();
    }

    public function compose(View $view)
    {
        $view->with('notice', $this->notice);
    }



}