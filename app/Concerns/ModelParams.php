<?php

namespace App\Concerns;

/**
 * This trait should be used when requiering model params.
 * The class using this MUST have a 'params' property following the convention
 * adopted here - which follows the 'storage/logs.txt' file.
 */
trait ModelParams
{
    protected function consumerParams()
    {
	return [
	    'id' => $this->params{'authenticated_entity'}{'consumer_id'}{'uuid'}
	];
    }

    protected function serviceParams()
    {
	$params = $this->params{'service'};

	return [
	    'connect_timeout' => $params{'connect_timeout'},
       	    'host' => $params{'host'},
       	    'id' => $params{'id'},
       	    'name' => $params{'name'},
       	    'path' => $params{'path'},
       	    'port' => $params{'port'},
       	    'protocol' => $params{'protocol'},
       	    'read_timeout' => $params{'read_timeout'},
       	    'retries' => $params{'retries'},
       	    'write_timeout' => $params{'write_timeout'}
	];
    }

    protected function routeParams()
    {
	$params = $this->params{'route'};

	return [
	    'id' => $params{'id'},
	    'hosts' => $params{'hosts'}, 
	    'preserve_host' => $params{'preserve_host'},	
	    'regex_priority' => $params{'regex_priority'},
    	    'paths' => implode(',', $params{'paths'}),  	
    	    'protocols' => implode(',', $params{'protocols'}),
    	    'methods' => implode(',', $params{'methods'}),
    	    'service_id' => $params{'service'}{'id'},
	    'strip_path' => $params{'strip_path'}
	];
    }
   
    protected function requestParams()
    {
	$params = $this->params{'request'};

	return [
	    'method' => $params{'method'},
	    'uri' => $params{'uri'},
	    'url' => $params{'url'},
	    'size' => $params{'size'},
	    'querystring' => implode(',', $params{'querystring'}),
	    'headers' => json_encode($params{'headers'}),
	    'consumer_request_id' => $this->consumerRequest->id,
	    'route_id' => $this->route->id

	];
    }

    protected function responseParams()
    {
	$params = $this->params{'response'};

	return [
	    'status' => $params{'status'},
	    'size' => $params{'size'},
	    'headers' => json_encode($params{'headers'}),
	    'request_id' => $this->request->id
	];
    }

    protected function consumerRequestParams()
    {
	return [
	    'upstream_uri' => $this->params{'upstream_uri'},
	    'latencies' => json_encode($this->params{'latencies'}),
	    'client_ip' => $this->params{'client_ip'},
	    'started_at' => $this->params{'started_at'},
	    'consumer_id' => $this->consumer->id
	];
    }
}
