<?php
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\ProgrammingType;

function service($id)
{
    $data = Service::where('id',$id)->first();
    if($data){
   return $data->title;
 }
 return false;
   
}

function servicetype($id)
{
   $data = ServiceType::where('id',$id)->first();
    if($data){
   return $data->title;
 }
 return false;
   
}

function programming_type($id)
{
   $data = ProgrammingType::where('id',$id)->first();
    if($data){
   return $data->title;
 }
 return false;
   
}

function convertSize($size, $precision = 2)
{
    if ( $size > 0 ) {
        $size = (int) $size;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    }
    return $size;
}