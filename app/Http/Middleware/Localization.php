<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = Session::get('language', config('app.locale'));
        $english    = config('app.language.en');
        $vietnamese = config('app.language.vi');
        switch ($language) {
            case $english:
                $language = $english;
                break;
            default:
                $language = $vietnamese;
        }
        App::setLocale($language);

        return $next($request);
    }
}
