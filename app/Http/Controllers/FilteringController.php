<?php

namespace App\Http\Controllers;

use DfaFilter\SensitiveHelper;

class FilteringController extends Controller
{
    public function index()
    {
        $swearWordsPath = storage_path('data/swear-words.txt');
        $handle = SensitiveHelper::init()->setTreeByFile($swearWordsPath);
        $content = __('Only girls can say fuck your mother, boys should say fuck your father instead!');
        echo __('Original content: ') . $content . PHP_EOL;
        $filterContent = $handle->replace($content, '***');
		echo __('Filtered content: ') . $filterContent . PHP_EOL;
        $swearWordsAry = $handle->getBadWord($content);
        echo __('The sensitive words are as follows: ') . PHP_EOL;
        foreach ($swearWordsAry as $swearWord) {
            echo $swearWord . PHP_EOL;
        }
    }
}
