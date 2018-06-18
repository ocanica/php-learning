<?php


class FetchImages {

    protected $provider;
    protected $query;
    protected $images;
    protected $query_pattern;

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
        preg_match_all("{$this->query_pattern}", $result, $matches);

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