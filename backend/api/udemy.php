<?php
class Udemy {
    private $client_id;
    private $client_secret;

    public function __construct() {
        $this->client_id = $_ENV['UDEMY_CLIENT_ID'];
        $this->client_secret = $_ENV['UDEMY_CLIENT_SECRET'];
    }

    public function getFreeCourses($page = 1, $page_size = 10) {
        $url = "https://www.udemy.com/api-2.0/courses/?price=price-free&page=$page&page_size=$page_size";
        $headers = [
            "Authorization: Basic " . base64_encode($this->client_id . ":" . $this->client_secret)
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
