<?php
  use App\Contact\Partners;
  use App\Contact\Country;
  
  function getPartners($id){
    $partners = Partners::where('c_id', $id)->get();
    return $partners;
  }




  //Image Upload Function
  function image_upload($image_field, $request){
    if($request->hasFile($image_field)){
      try{
        //For File Contents
        $file = $request->file($image_field);
        //Get Just Extension
        $extension = $request->file($image_field)->getClientOriginalExtension();
        //File
        $randomName = rand().'_'.time();
        $fileToUpload = $randomName.'.'.$extension;
        Storage::disk('public')->put('images/'.$fileToUpload, file_get_contents($file));
          
        return $fileToUpload;
    }catch(\Exception $e){
         return redirect()->back()->with('error', $e);
    }    
    }else{
        return $fileToUpload = 'noimage.jpg';
    }
  }

  function thumb($image_field, $request){
    if($request->hasFile($image_field)){
      try{
        //For File Contents
        $file = $request->file($image_field);
        //Get Just Extension
        $extension = $request->file($image_field)->getClientOriginalExtension();
        //File
        $randomName = rand().'_'.time();
        $fileToUpload = $randomName.'.'.$extension;
        Storage::disk('public')->put('images/thumbnail/'.$fileToUpload, file_get_contents($file));
          
        return $fileToUpload;
    }catch(\Exception $e){
         return redirect()->back()->with('error', $e);
    }    
    }else{
        return $fileToUpload = 'noimage.jpg';
    }
  }

  function multiple_image_upload($image_field, $request){

        //For File Contents
        $file = $image_field;
        //Get Just Extension
        $extension = $image_field->getClientOriginalExtension();
        //File
        $randomName = rand().'_'.time();
        $fileToUpload = $randomName.'.'.$extension;
        Storage::disk('public')->put('images/'.$fileToUpload, file_get_contents($file));
        return $fileToUpload;

}

  //Create Itinerary Array Object to save in Database as BLOB
  function itinerary($request){
    $data = [];
    $day = $request->itenerary['day'];
    $title = $request->itenerary['title'];
    $mode = $request->itenerary['mode'];
    $duration = $request->itenerary['duration'];
    $altitude = $request->itenerary['altitude'];
    $count = count($day);
    for($i = 0; $i < $count; $i++){
      if($day[$i] != ''){
        $data[$i]['day'] = stripslashes(strip_tags($day[$i]));
      }
      if($title[$i] != ''){
        $data[$i]['title'] = stripslashes(strip_tags($title[$i]));
      }
      if($mode[$i] != ''){
        $data[$i]['mode'] = stripslashes(strip_tags($mode[$i]));
      }
      if($duration[$i] != ''){
        $data[$i]['duration'] = stripslashes(strip_tags($duration[$i]));
      }
      if($altitude[$i] != ''){
        $data[$i]['altitude'] = stripslashes(strip_tags($altitude[$i]));
      }
    }
    return $data;
  }

  //Create Itinerary Array Object to save in Database as BLOB
  // function departure($request){
  //   $data = [];
  //   $depDate = $request->departures['departure_day'];
  //   $count = count($depDate);
  //   for($i = 0; $i < $count; $i++){
  //     if($depDate[$i] != ''){
  //       $data[$i]['departure_day'] = stripslashes(strip_tags($depDate[$i]));
  //     }
  //   }
  //   return $data;
  // }


  //Encode Array as an JSON Object
  function encodeJsonObjectAsArray($jspara){
    return json_encode($jspara);
  }

  //Decode JSON Object as an Array
  function decodeJsonObjectAsArray($jspara){
    return json_decode($jspara, true);
  }

  //return end date
  function get_departure_date($depart_date, $days_to_add){
    $newdate = date('m/d/Y', strtotime($depart_date. ' + '.$days_to_add.' days'));
    return $newdate;
  }
?>
