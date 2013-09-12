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

/**
 * Items
 * Feed entries in a predictalble format.
 *
 * @author Mitch Tuck<matuck@matuck.com>
 */
class Items
{
    protected $title;
    protected $torrent;
    protected $magnet;
    
    /**
     * Constructor
     * @param string $title The title or name of the torrent.
     * @param string $torrent Link to the torrent file or NULL
     * @param type $magnet Link to the magnet or NULL
     */
    public function __construct($title, $torrent = NULL, $magnet = NULL)
    {
        $this->title = $title;
        $this->torrent = $torrent;
        $this->magnet = $magnet;
    }
    
    /**
     * @return string The title or name of the torrent.
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Change the title or name.
     * @param string $title The title or name of the torrent.
     * @return string The title or name of the torrent.
     */
    protected function setTitle($title)
    {
        $this->title = $title;
        return $this->title;
    }

    /**
     * @return string The link to the torrent file or NULL.
     */
    public function getTorrent()
    {
        return $this->torrent;
    }
    
    /**
     * Change the torrent link.
     * @param string $torrent The link to the torrent file.
     * @return string The link to the torrent file or NULL.
     */
    protected function setTorrent($torrent = NULL)
    {
        $this->torrent = $torrent;
        return $this->torrent;
    }
    
    /**
     * @return string The magnet link of the torrent or null.
     */
    public function getMagnet()
    {
        return $this->magnet;
    }
    
    /**
     * Change the magnet link.
     * @param string $magnet The magnet link to the torrent.
     * @return string The magnet link of the torrent or null.
     */
    protected function setMagnet($magnet)
    {
        $this->magnet = $magnet;
        return $this->magnet;
    }
}