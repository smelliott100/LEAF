<?php
/*
 * As a work of the United States government, this project is in the public domain within the United States.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class GetDbAPI
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
        $visn = $request->route('visn');
        if (strpos($visn, "api") === 0) {
            $visn = substr($visn, 3, strlen($visn) - 3);
        }

        if (!Cache::has($visn))
        {
            print_r("doesn't have it");

            try
            {
                $content = File::get(base_path() . '/LEAF/' . $visn . '/db_config.php');
            }
            catch (Illuminate\Contracts\Filesystem\FileNotFoundException $exception)
            {
                die('File does not exist');
            }

            $cfg = json_decode($content);
            // print_r("<div class='row'><div class='col'><b>database name:</b> ". $cfg->db_name . "</div></div>");
            $request->session()->put('db_name', $cfg->db_name);
            // print_r($content);
            $routes[$visn] = $cfg->db_name;

            Cache::forever($visn, $cfg->db_name);
        }
        else
        {
            // print_r("<div class='row'><div class='col'><b>database name:</b> ". Cache::get($visn) . "</div></div>");
            // print_r(Cache::get($visn));
            $request->session()->put('db_name', Cache::get($visn));
        }


        return $next($request);
    }
}
