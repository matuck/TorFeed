Usage
-----

```
use matuck/TorFeed/TorFeed;

$feed = new TorFeed($name, $url, $itemXpath, $itemtitleXpath, $itemtorrenturlXpath, $itemmagnetXpath);
/* examples
$feed = new TorFeed('somesite', 'http://www.example.com/feed', 'channel/item', 'title', 'link', 'magnet');
$feed = new TorFeed('somesite', 'http://www.example.com/feed', 'channel/item', 'title', 'link', NULL);
$feed = new TorFeed('somesite', 'http://www.example.com/feed', 'channel/item', 'title', 'link');
$feed = new TorFeed('somesite', 'http://www.example.com/feed', 'channel/item', 'title', NULL, 'magnet');
*/
$items = $feed->getItems();
```

$feed->getItems() returns an array matuck/TorFeed/Item
