<?php
namespace alfredog1976\Maptive;

use GuzzleHttp\Client;

class Maptive{
    
    const MAX_TRIES = 10;
    
    protected $key;
    protected $map_id;
    protected $no_exceptions;
    
    public function __construct($key, $map_id, $no_exceptions=false) {
        $this->key = $key;
        $this->map_id = $map_id;
        $this->no_exceptions = $no_exceptions;
    }
    
    public function add($c_array){
        $url = "https://fortress.maptive.com/ver4/classes/api/v1.0/markers";
        
        $query_array = array('key' => $this->key,'map_id' => $this->map_id);
        
        for ($x=0; $x<count($c_array); $x++)
        {
            $column_key = 'column_' . $x;
            $query_array[$column_key] = $c_array[$x];
        }
        
        if ($this->no_exceptions == true)
            $client = new Client(['http_errors' => false]);
        else
            $client = new Client();
        $request = $client->request('POST', $url, [
            'query' => $query_array    
        ]);
        
        return json_decode($request->getBody(), true);
        
    }
    
    public function addSpecificCols($c_array){
        $url = "https://fortress.maptive.com/ver4/classes/api/v1.0/markers";
        
        $query_array = array('key' => $this->key,'map_id' => $this->map_id);
        
        foreach ($c_array as $key => $value)
        {
            $column_key = 'column_' . $key;
            $query_array[$column_key] = $value;
        }
        
        //print_r($query_array);
        
        if ($this->no_exceptions == true)
            $client = new Client(['http_errors' => false]);
        else
            $client = new Client();
        $request = $client->request('POST', $url, [
            'query' => $query_array    
        ]);
        
        return json_decode($request->getBody(), true);
        
    }
    
    public function update($index, $column, $column_value){
        $url = "https://fortress.maptive.com/ver4/classes/api/v1.0/markers";
        
        $query_array = array('key' => $this->key,'map_id' => $this->map_id);

        if ($this->no_exceptions == true)
            $client = new Client(['http_errors' => false]);
        else
            $client = new Client();
        $request = $client->request('PUT', $url, [
            'query' => [
                'key' => $this->key,
                'map_id' => $this->map_id,
                'index_col' => $index,
                $column => $column_value
            ]    
        ]);
        
        return json_decode($request->getBody(), true);
        
    }
    
    public function updateSpecificCols($index, $c_array){
        $url = "https://fortress.maptive.com/ver4/classes/api/v1.0/markers";
        
        $query_array = array('key' => $this->key,'map_id' => $this->map_id, 'index_col' => $index);
        
        foreach ($c_array as $key => $value)
        {
            $column_key = 'column_' . $key;
            $query_array[$column_key] = $value;
        }
        
        //print_r($query_array);

        if ($this->no_exceptions == true)
            $client = new Client(['http_errors' => false]);
        else
            $client = new Client();
        $request = $client->request('PUT', $url, [
            'query' => $query_array    
        ]);
        
        return json_decode($request->getBody(), true);
        
    }
    
    public function delete($index){
        $url = "https://fortress.maptive.com/ver4/classes/api/v1.0/markers";

        if ($this->no_exceptions == true)
            $client = new Client(['http_errors' => false]);
        else
            $client = new Client();
        $request = $client->request('DELETE', $url, [
            'query' => [
                'key' => $this->key,
                'map_id' => $this->map_id,
                'index_col' => $index,
            ]    
        ]);
        
        return json_decode($request->getBody(), true);
        
    }
    
    public function patch(){
        $url = "https://fortress.maptive.com/ver4/classes/api/v1.0/markers";
        
        if ($this->no_exceptions == true)
            $client = new Client(['http_errors' => false]);
        else
            $client = new Client();
        $request = $client->request('PATCH', $url, [
            'query' => [
                'key' => $this->key,
                'map_id' => $this->map_id,
            ]    
        ]);
        
        return json_decode($request->getBody(), true);
        
    }
}

?>

