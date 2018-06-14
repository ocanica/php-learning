<?php


class FetchImages {

    protected $provider;
    protected $query;
    protected $images;

    public function __construct($provider) {
        $this->provider = $provider;
    }

    public function fetchImages (String $query) {
        $this->query = $query;

        $curl = curl_init(); // initial curl resource
        $url = $this->provider.$this->query; // concatenate provider url and query string

        curl_setopt($curl, CURLOPT_URL, $url); // set option for curl transfer - fetch url data
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // allow https sites to be transfered
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // return results of the transfer

        $result = curl_exec($curl); // execure curl function passing declare resource as an argument

        /*  perform a regex match on $result using the pattern determined in the first argument
            and saving the result in the $matches variable */
        preg_match_all("!https://images-eu.ssl-images-amazon.com/images/I/[^\s]*?._AC_US218_.jpg!", $result, $matches);

        $this->images = array_values(array_unique($matches[0]));

        curl_close($curl);
    }

    public function displayImages () {
       foreach ($this->images as $image) {
            echo "<div style='float: left; margin: 10 0 0 0l'>";
            echo "<img src='{$image}'><br/>";
            echo "</div>";
       } 
    }
}



// $curl = curl_init(); 

// $search_query = 'shield captain';
// $url = "https://www.amazon.co.uk/s/field-keywords={$search_query}";

// curl_setopt($curl, CURLOPT_URL, $url); //set option for curl transfer - fetch url
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // allow https site to be transfered
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // return results of transfer

// $result = curl_exec($curl); //excute curl function passing declare resource as an argument

// /* perform a regex match on result using the pattern as the first argument 
// and saving the result in the $matches variable */
// preg_match_all("!https://images-eu.ssl-images-amazon.com/images/I/[^\s]*?._AC_US218_.jpg!", $result, $matches); 

// $images = array_values(array_unique($matches[0])); //remove dubplicate values from the array

// foreach ($images as $image) {
//     echo "<div style='float: left; margin: 10 0 0 0l'>";
//     echo "<img src='{$image}'><br/>";
//     echo "</div>";
// }

// curl_close($curl);