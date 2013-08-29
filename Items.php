<?php
namespace matuck\TorFeed;

class Items
{
    protected $title;
    protected $torrent;
    protected $magnet;
    
    public function __construct($title, $torrent = NULL, $magnet = NULL)
    {
        $this->title = $title;
        $this->torrent = $torrent;
        $this->magnet = $magnet;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
        return $this->title;
    }

    public function getTorrent()
    {
        return $this->torrent;
    }
    
    public function setTorrent($torrent)
    {
        $this->torrent = $torrent;
        return $this->torrent;
    }
    
    public function getMagnet()
    {
        return $this->magnet;
    }
    
    public function setMagnet($matnet)
    {
        $this->magnet = $magnet;
        return $this->magnet;
    }
}