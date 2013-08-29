<?php
namespace matuck\TorFeed;

class TorFeed
{
    protected $name;
    protected $url;
    protected $handler;
    protected $xml;
    protected $items;
    
    public function __construct($name, $url, $handler = 'Standard')
    {
        $this->name = $name;
        $this->url = $url;
        $this->handler = $handler;
        $xml = file_get_contents($url);
        $decompress = gzdecode($xml);
        if($decompress !== FALSE)
        {
            $xml = $decompress;
        }
        $this->xml = simplexml_load_string($xml);
        //var_dump($this->feed->channel->item);
        /*$array = array();
        foreach($this->feed->xpath('channel/item') as $node)
        {
            $array[] = new Items((string) $node->title[0], (string) $node->link[0], NULL);
        }
        var_dump($array);*/
    }
    public function getName()
    {
        return $this->name;
    }
    public function getUrl()
    {
        return $this->url;
    }
    public function getHandler()
    {
        return $this->handler;
    }
    public function setHandler($handler)
    {
        $this->handler = $handler;
    }
    public function getXml()
    {
        return $this->xml;
    }
    public function getItems()
    {
        $handler = '\\matuck\\TorFeed\\Handler\\'.$this->handler.'TorFeedHandler';
        $handler = new $handler($this->xml, $this->items);
        return $this->items;
    }
}