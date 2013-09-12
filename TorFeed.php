<?php
/**
 * This file is part of the TorFeed package.
 *
 * (c) Mitch Tuck <matuck@matuck.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace matuck\TorFeed;

use matuck\TorFeed\Items;

/**
 * TorFeed
 * Processes torrent feeds with the help of handlers.
 *
 * @author Mitch Tuck<matuck@matuck.com>
 */
class TorFeed
{
    protected $name;
    protected $url;
    protected $xml;
    protected $handler;
    protected $items;
    protected $handlers;
    
    /**
     * Constructor
     * 
     * @param type $handlers
     */
    public function __construct($handlers = array())
    {
        $this->handlers = $handlers;
    }
    
    /**
     * @return string The name of the feed that was processed.
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return string The url for the feed that was processed.
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * @return string The name of the handler that was used to process the feed.
     */
    public function getHandler()
    {
        return $this->handler;
    }
    
    /**
     * @return SimpleXMLElement The xml in SimpleXMLElement format.
     */
    public function getXml()
    {
        return $this->xml;
    }
    
    /**
     * Add a handler that was declared at construction.
     * @param string $name Name of the handler to use.
     * @param string $class Namespace of the class to use.
     */
    public function addHandler(string $name, string $class)
    {
        $this->handlers[$name] = $class;
    }
    
    /**
     * Add multiple handlers that were not delcared at construction.
     * @param array $handlers An associative array with the name of the handler as the key, and the namespace of the class as the value.
     */
    public function addHandlers(array $handlers)
    {
        $this->handlers = array_merge($this->handlers, $handlers);
    }
    
    /**
     * @return array Returns an array of all the handlers in no particular order.
     */
    public function getHandlers()
    {
        return array_keys($this->handlers);
    }
    
    /**
     * Get Items from a feed.
     * @param string $name Name of the site for the feed.
     * @param type $url URL for the feed.
     * @param type $handler The handler to use to process the feed.
     * @return array Returns an array of Items
     */
    public function getItems($name, $url, $handler = 'Standard')
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
        $handle = new $this->handlers[$handler]($this->xml, $this->items);
        return $this->items;
    }
}