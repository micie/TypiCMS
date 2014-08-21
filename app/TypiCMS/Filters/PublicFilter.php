<?php
namespace TypiCMS\Filters;

use App;
use Input;
use Config;
use Sentry;
use Request;
use Redirect;

/**
* Public filter
*/
class PublicFilter
{
    
    public function checkLocale()
    {

        // Throw a 404 if website in this language is not online
        $locale = Request::segment(1);
        if (! Config::get('typicms.' . $locale . '.status')) {
            App::abort(404);
        }

        // Throw a 404 if in preview mode without admin user connected
        if (Input::get('preview') and ! Sentry::check()) {
            return Redirect::to(Request::path());
        }

    }

    public function auth()
    {
        if (! Config::get('typicms.authPublic')) {
            return;
        }

        if (! Sentry::check()) {
            if (Request::ajax()) {
                return Response::make('Unauthorized', 401);
            }
            return Redirect::guest(route('login'));
        }
    }
}
