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