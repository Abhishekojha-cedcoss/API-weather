<?php

use GuzzleHttp\Client;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use GuzzleHttp\Psr7\Request;


/**
 * IndexController class
 */
class IndexController extends Controller
{
    /**
     * indexAction function
     *
     * redirects to the login page
     * @return void
     */
    public function indexAction()
    {
    }
    public function viewResultAction()
    {
        if ($this->request->hasPost("submit")) {
            $name = $this->request->get("name");
            $client = new Client([
                'base_uri' => 'http://api.weatherapi.com'
            ]);
            $key = "0bab7dd1bacc418689b143833220304";
            $response = $client->request('GET', "/v1/search.json?key=$key&q=$name");

            $this->view->data = json_decode($response->getBody(), true);
        }
    }

    /**
     * viewDetailAction function
     *
     * Lists the details of a single selected book
     * 
     * @return void
     */
    public function viewDetailAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";
        $response = $client->request('GET', "/v1/current.json?key=$key&q=$url&aqi=no");

        $this->view->data = json_decode($response->getBody(), true);

    }
    public function airqualityAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";
        $response = $client->request('GET', "/v1/current.json?key=$key&q=$url&aqi=yes");

        $this->view->data = json_decode($response->getBody(), true);

    }
    public function forecastAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";
        $response = $client->request('GET', "/v1/forecast.json?key=$key&q=$url&aqi=no");

        $res=json_decode($response->getBody(), true);
        $this->view->data = $res;
        $h= date("H", strtotime($res["location"]["localtime"]));
        $this->view->hour = $h;
    }
    public function timezoneAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";
        $response = $client->request('GET', "/v1/forecast.json?key=$key&q=$url&aqi=no");

        $res=json_decode($response->getBody(), true);
        $this->view->data = $res;
    }
    public function astronomyAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";
        $response = $client->request('GET', "/v1/astronomy.json?key=$key&q=$url&aqi=no");

        $res=json_decode($response->getBody(), true);
        $this->view->data = $res;
    }
    public function historyAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";
        $date= date('d.m.Y', strtotime("-1 days"));
        $previous_date= date('d.m.Y', strtotime("-5 days"));

        $response = $client->request('GET', "/v1/history.json?key=$key&q=$url&aqi=no&dt=$previous_date&end_dt=$date");

        $res=json_decode($response->getBody(), true);
        $this->view->data = $res;
    }
    public function sportsAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";

        $response = $client->request('GET', "/v1/sports.json?key=$key&q=$url&aqi=no&");

        $res=json_decode($response->getBody(), true);
        $this->view->data = $res;
    }
    public function alertAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";
        $response = $client->request('GET', "/v1/forecast.json?key=$key&q=$url&alerts=yes");

        $res=json_decode($response->getBody(), true);
        $this->view->data = $res["alerts"];
    }
    public function currentWeatherAction()
    {
        $url = $this->request->get("url");
  
        $client = new Client([
            'base_uri' => 'http://api.weatherapi.com'
        ]);
        $key = "0bab7dd1bacc418689b143833220304";
        $response = $client->request('GET', "/v1/current.json?key=$key&q=$url&aqi=no");

        $this->view->data = json_decode($response->getBody(), true);

    }

}
