Usage
-----

```
use matuck/TorFeed/TorFeed;

$handlers = array(
    'HandlerName' => "\\namespace\\to\\handler\\class"
);
$feed = new TorFeed($handlers);

$feed->getItems('name of the site', 'url for the rss feed', 'name of the handler to use');
```

$feed->getItems() returns an array matuck/TorFeed/Items
