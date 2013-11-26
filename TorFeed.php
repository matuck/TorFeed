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

use matuck\TorFeed\Item;

/**
 * TorFeed
 *
 * @author Mitch Tuck<matuck@matuck.com>
 */
class TorFeed
{
  protected $name;
  protected $url;
  protected $xml;
  protected $items;
  protected $itemXpath;
  protected $itemtitleXpath;  //should be relative to itemXpath
  protected $itemtorrenturlXpath;  //should be relative to itemXpath
  protected $itemmagnetXpath;  //should be relative to itemXpath

  /**
   * Constructor
   * 
   * @param type $handlers
   */
  public function __construct($name, $url, $itemXpath, $itemtitleXpath, $itemtorrenturlXpath = NULL, $itemmagnetXpath = NULL)
  {
    $this->name = $name;
    $this->url = $url;
    $this->itemXpath = $itemXpath;
    $this->itemtitleXpath = $itemtitleXpath;
    $this->itemtorrenturlXpath = $itemtorrenturlXpath;
    $this->itemmagnetXpath = $itemmagnetXpath;

    $xml = file_get_contents($url);
    $decompress = gzdecode($xml);
    if($decompress !== FALSE)
    {
        $xml = $decompress;
    }
    $this->xml = simplexml_load_string($xml);
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
   * @return SimpleXMLElement The xml in SimpleXMLElement format.
   */
  public function getXml()
  {
    return $this->xml;
  }
    
  /**
   * @return string The xpath used to get items.
   */
  public function getItemXpath()
  {
    return $this->itemXpath;
  }
  
  /**
   * @return string The relative xpath used to get title.
   */
  public function getItemtitleXpath()
  {
    return $this->itemtitleXpath;
  }
  
  /**
   * @return string The relative xpath used to get torrent url.
   */
  public function getItemtorrenturlXpath()
  {
    return $this->itemtorrenturlXpath;
  }
  
  /**
   * @return string The relative xpath used to get magnet link.
   */
  public function getItemmagnetXpath()
  {
    return $this->itemmagnetXpath;
  }
  
  /**
   * Get Items from a feed.
   * 
   * @return array Returns an array of Items
   */
  public function getItems()
  {
    $namespaces = $this->xml->getDocNamespaces();
    foreach($namespaces as $namespace => $url)
    {
      $this->xml->registerXPathNamespace($namespace, $url);
    }

    foreach ($this->xml->xpath($this->itemXpath) as $item)
    {
      $this->items[] = new Item
      (
        $this->itemtitleXpath ? (string) $item->xpath($this->itemtitleXpath)[0] : NULL,
        $this->itemtorrenturlXpath ? (string) $item->xpath($this->itemtorrenturlXpath)[0] : NULL,
        $this->itemmagnetXpath ? (string) $item->xpath($this->itemmagnetXpath)[0] : NULL
      );
    }

    return $this->items;
  }
}
