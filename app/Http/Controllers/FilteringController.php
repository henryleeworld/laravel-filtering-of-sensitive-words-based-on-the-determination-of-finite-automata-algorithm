<?php

namespace App\Http\Controllers;

use DfaFilter\SensitiveHelper;

class FilteringController extends Controller
{
    public function index()
    {
        $swearWordsPath = public_path('data/swear-words.txt');
        $handle = SensitiveHelper::init()->setTreeByFile($swearWordsPath);
        $content = '只有女生可以罵幹你娘，男生你給我喊幹你爸！';
        echo '原始內容：' . $content . PHP_EOL;
        $filterContent = $handle->replace($content, '***');
		echo '過濾後內容：' . $filterContent . PHP_EOL;
        $swearWordsAry = $handle->getBadWord($content);
        echo '髒話如下：' . PHP_EOL;
        foreach ($swearWordsAry as $swearWord) {
            echo $swearWord . PHP_EOL;
        }
    }
}
