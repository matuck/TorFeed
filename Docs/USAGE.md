Usage
-----

```
use matuck/TorFeed/TorFeed;

$feed = new TorFeed('name of the site', 'url for the rss feed', 'name of the handler to use');

$feed->getItems();
```

$feed->getItems() returns an array matuck/TorFeed/Items
