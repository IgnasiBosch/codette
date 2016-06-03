<?php

namespace App\Http\Controllers;

use DOMDocument;
use DOMXPath;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $randomProblemNumber = rand(1, 552);
        $url = 'https://projecteuler.net/problem=' . $randomProblemNumber;
        $problem = $this->scrapePage($url);
        return view('home', array('url' => $url, 'language' => $this->getRandomLanguage(), 'problem' => $problem, 'randomProblemNumber' => $randomProblemNumber));
    }

    private function scrapePage($url)
    {
        $html = file_get_contents($url);
        $page = new DOMDocument();
        libxml_use_internal_errors(TRUE);

        if (!empty($html)) {
            $page->loadHTML($html);
            libxml_clear_errors();
            $page_xpath = new DOMXPath($page);
            $problem = $page_xpath->query('//div[@class="problem_content"]');
            return $page->saveHTML($problem->item(0));
        }
    }

    private function getRandomLanguage()
    {
        $languages = [
            'javaScript',
            'Java',
            'Python',
            'Ruby',
            'PHP',
            'C++',
            'C',
            'Shell',
            'R',
            'Go',
            'Perl',
            'Scala',
            'Haskell',
            'Lua',
            'Julia',
            'Erlang',
            'Clojure',
            'Groovy'
        ];

        return $languages[array_rand($languages)];
    }
}
