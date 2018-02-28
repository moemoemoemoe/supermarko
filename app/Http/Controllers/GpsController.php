<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gpi;
use Session;
class GpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function save_tracking($email,$lat,$long,$adress)
    {

$gpis = new Gpi();
$gpis->email  = $email;
$gpis->lat  = $lat;
$gpis->long  = $long;
$gpis->adress  = $adress;
try {
    $gpis->save();
    return "[{".'"status":'.'"Uploaded Successfully"'."}]"; 
    
} catch (Exception $e) {

    return "[{".'"status":'.'"Error on Save please Try again"'."}]";
}


        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_xml()
    {
        $email = Session::get('d_email');

        $data = Gpi::select('lat','long','adress','created_at')->orderBy('id','DESC')->where('email',$email)->whereDate('created_at','=', date('Y-m-d'))->get();
  //    header("Content-type: text/xml");
  //    echo "<markers>\n";

  // // Iterate through the rows, printing XML nodes for each
 // for($i=0;$i<count($data);$i++){
  //   // ADD TO XML DOCUMENT NODE
  //   echo '<marker ';
  //   echo 'lat="' . $data[$i]->lat . '" ';
  //   echo 'lng="' . $data[$i]->long . '" ';
  //    echo 'adress="' . $data[$i]->adress . '" ';
  //   echo 'datetime="' . $data[$i]->created_at . '" ';
  //   echo "/>\n";
  // }

  // // End XML file
  // echo '</markers>';
         $xml = new \XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('markers');
    foreach($data as $user) {
        $xml->startElement('marker');
        $xml->writeAttribute('lat', $user->lat);
        $xml->writeAttribute('lng', $user->long);
        $xml->writeAttribute('adress', $user->adress);
        $xml->writeAttribute('datetime', $user->created_at);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view_map($email)
    {
Session::put('d_email',$email);
        return view('admin.gps.gps_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
