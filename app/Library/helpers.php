<?php
//function getLocationInfo($only = ['city'])
//{
//    $location = geoip()->getLocation()->toArray();
//    return $only ? array_only($location,$only) : $location;
//}

function words($text, $length = 40){//words??
//    return substr(strip_tags($text), 0,$length);
    $text = strip_tags($text);
    preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,$length}/", $text, $matches);
    return $matches[0];
}

function initSEO($title=false, $description=false, $image=false, $keywords=false, $og=false, $twitter=false){

    if($title){
        SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);//OpenGraph??
        Twitter::setTitle($title);//??
    }
    if($description){//$description??
        SEOMeta::setDescription($description);
        OpenGraph::setDescription($description);
        Twitter::setDescription($description);
    }
    if($keywords){//??
        SEOMeta::setKeywords($keywords);
    }
    if($image){//??
        OpenGraph::addImage($image);
        Twitter::addImage($image);
    }
    //SEOMeta::setCanonical('https://codecasts.com.br/lesson');

//    OpenGraph::setUrl(URL::current());
//    OpenGraph::addProperty('type', $og['type']);
    //OpenGraph::addImage([],[])

//    Twitter::setUrl(URL::current());
//    Twitter::setSite('@techblog');
    //Twitter::setImage();
}