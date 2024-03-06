<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\UserLocale;

/*
 * trim phrases in english or arabic
 */
if (!function_exists('trimfy')) {
    function trimfy($value, $limit = 100, $end = ' ...')
    {
        $value = strip_tags($value);

        if (LaravelLocalization::getCurrentLocale() != 'en') {
            return strlen($value) <= $limit
                ? $value
                : mb_substr($value, 0, $limit, 'UTF-8') . $end;
        }

        return mb_strwidth($value, 'UTF-8') <= $limit
            ? $value
            : rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
    }
}

/*
 * slug titles for english or arabic
 */
if (!function_exists('slugfy')) {
    function slugfy($string, $separator = '-')
    {
        $str = trim($string);
        $str = strtolower($str);
        $str = preg_replace('|[^a-z-A-Z\p{Arabic}0-9 _]|iu', '', $str);
        $str = preg_replace('/\s+/', ' ', $str);
        $str = str_replace(' ', $separator, $str);
        $str = $str.rand(0,100000);

        return $str;
    }
}

/*
 * Checks whether a section has been captured yet.
 *
 * https://laravel.io/forum/02-06-2014-check-if-yieldsomething-is-set
 *
 * @param  string  $section
 * @return bool
 */
if (!function_exists('hasSectionFor')) {
    function hasSectionFor($section)
    {
        return array_key_exists($section, app('view')->getSections());
    }
}
/*
 * make translation avail for js
 */
if (!function_exists('transToJs')) {
    function transToJs($file_name, $vendor_path = null)
    {
        $lang_path = resource_path('lang');
        $current = app()->getLocale();
        $fall_back = config('app.fallback_locale');
        $file_name = "$file_name.php";
        $path = $vendor_path ? "$lang_path/vendor/$vendor_path" : $lang_path;
        $res = file_exists("$path/$current/$file_name")
            ? include "$path/$current/$file_name"
            : include "$path/$fall_back/$file_name";

        return json_encode($res);
    }
}

/*
 * translate file size to something understandable
 */
if (!function_exists('bytesToHuman')) {
    function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}

/*
 * helper for quick faker
 */
if (!function_exists('faker')) {
    function faker()
    {
        return \Faker\Factory::create();
    }
}

/*
 * helper for quick carbon
 */
if (!function_exists('carbon')) {
    function carbon($date)
    {
        return new \Carbon\Carbon($date);
    }
}

/*
 * https://tudorbarbu.ninja/remove-empty-array-elements-with-recursive-lambda-in-php-5-3/
 */
if (!function_exists('array_filter_rec')) {
    function array_filter_rec($arr)
    {
        $callback = function ($item) use (&$callback) {
            if (is_array($item)) {
                return array_filter($item, $callback);
            }

            if (!empty($item)) {
                return true;
            }
        };

        return array_filter($arr, $callback);
    }
}
if (!function_exists('str_trim')) {
    function str_trim($text, $limit = 10)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}
function r9_get_locale_session()
{
    return UserLocale::where('session_id', session()->getId())->first();
}

function r9_get_locale()
{
    $session = r9_get_locale_session();
    return $session ? $session->locale : 'en';
}

function get_color_code($name)
{
    return ucwords(config('acc.colors')[$name]);
}

function get_colors()
{
    return \App\Models\Color::get()->sortBy('name');
}
function getCover($product,$place){
    if($place == 'listing' && $product->cover->hasGeneratedConversion('medium')){
        $cover = $product->cover->getUrl('medium');
    }elseif($place == 'single' && $product->cover->hasGeneratedConversion('large')){
        $cover = $product->cover->getUrl('large');
    }elseif ($place == 'cart' && $product->cover->hasGeneratedConversion('small')){
        $cover = $product->cover->getUrl('small');
    }else{
        $cover = $product->cover->getUrl('optimized');
    }
    return asset($cover);

}

function getGalleryImage($item,$place='preview'){
    if($place == 'single' && $item->hasGeneratedConversion('large')){
        $cover = $item->getUrl('large');
    }else{
        $cover = $item->getUrl('optimized');
    }
    return asset($cover);

}

function products_listing_columns()
{
    return "id,title, slug ,regular_price ,sale_price ,discount_percentage ,discount_amount ,cover_url ,quantity ,country_code ,country_name ,is_configured ,is_one_option ,db_is_in_stock as in_stock";
}

function ArabicDate($date) {
    
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = $date; // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date("D", strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = date('d',strtotime($your_date)).' '.$ar_month.' '.date('Y',strtotime($your_date));
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}
function make_links_audio($text){
    return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<div class="audio-player" data-src="$1" >
    <div class="timeline">
        <div class="progress"></div>
    </div>
    <div class="play-container">
        <div class="audio-play-key">
        <img src="'.asset('assets/images/icons/audio-play.png').'" alt="" />
        </div>
        <div class="audio-pause-key">
        <img src="'.asset("assets/images/icons/audio-pause.png").'" alt="" />
        </div>
    </div>
    <div class="timeline-waves" style="background-image: url('. asset("assets/images/backgrounds/wave.png") .')" ></div>
    <div class="time">
        <div class="current">0:00</div>
        <div class="divider">-</div>
        <div class="length">0:00</div>
    </div>
    </div>', $text);
}

function youtube_image($video_url){
    ?>
    
    <?php
    if (!strpos($video_url, 'embed') && strpos($video_url, 'youtu')) {
        if (strpos($video_url, 'v=')) {
            $prefix = 'v=';
            $index = strpos($video_url, $prefix) + strlen($prefix);
            $video_id = substr($video_url, $index);
            $video_id = explode('?', $video_id)[0];
            $video_id = explode('&', $video_id)[0];
        } elseif (strpos($video_url, '.be/')) {
            $prefix = '.be/';
            $index = strpos($video_url, $prefix) + strlen($prefix);
            $video_id = substr($video_url, $index);
        }
        if (isset($video_id)) {
            $embed_link = "https://img.youtube.com/vi/$video_id/hqdefault.jpg";
        } else {
            $embed_link = $video_url;
        }
        return $embed_link;     
    }
   
}

function video($video_url,$slide = 0)
{
   
    if (!strpos($video_url, 'embed') && strpos($video_url, 'youtu')) {
        if (strpos($video_url, 'v=')) {
            $prefix = 'v=';
            $index = strpos($video_url, $prefix) + strlen($prefix);
            $video_id = substr($video_url, $index);
            $video_id = explode('?', $video_id)[0];
            $video_id = explode('&', $video_id)[0];
        } elseif (strpos($video_url, '.be/')) {
            $prefix = '.be/';
            $index = strpos($video_url, $prefix) + strlen($prefix);
            $video_id = substr($video_url, $index);
        } elseif (strpos($video_url, 'list')){
            $prefix = '?list=';
            $index = strpos($video_url, $prefix) + strlen($prefix);
            $video_id = substr($video_url, $index);
        }

        if (isset($video_id) && strpos($video_url, 'list')){
            $embed_link = "https://www.youtube.com/embed/videoseries?list=$video_id";
        }
        elseif (isset($video_id)) {
            $embed_link = "https://www.youtube.com/embed/$video_id?controls=0";
        } else {
            $embed_link = $video_url;
        }
    }
    
    ?>
    <iframe width="1000" height="600" src="<?php echo $embed_link ?: ''; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <?php  
}
