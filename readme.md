# Robots (strong)

[Download](https://github.com/sakanafurai/robots-strong/releases/download/1.4.0/robots-strong.zip)

## About
Stronger plugin against robots for Bludit CMS.

Adds metatags to site head of all pages, including home page and category lists.
And also adds ```robots.txt``` that blocks access from bots. 

**THIS PLUGIN CAN BLOCK NOT ALL CRAWLERS OR ROBOTS ACCESS, INDEXING, OR DATA SCRAPING.**
**USE THIS PLUGIN AT OWN LISK.**

## Modes

### Strong mode (default)
Avoid search engine indexing.

Adds these metatags to site head 
```
<meta name="GOOGLEBOT" content="NOINDEX, NOFOLLOW, NOARCHIVE, NOIMAGEINDEX">
<meta name="ROBOTS" content="NOARCHIVE, NOINDEX, NOFOLLOW, NOIMAGEINDEX">
<meta name="robots" content="noindex, nofollow, noarchive, noimageindex">
```
Adds these content to ```robots.txt```.
```
User-agent: *
Disallow: /
```

### Strongest mode
Hard protection against search engines and AI crawlers. In **strongest** mode, uses explicitly defined robots.txt rules and service-specific metatags.

Metatags to add:
```
<meta name="GOOGLEBOT" content="NOINDEX, NOFOLLOW, NOARCHIVE, NOIMAGEINDEX">
<meta name="ROBOTS" content="NOARCHIVE, NOINDEX, NOFOLLOW, NOIMAGEINDEX">
<meta name="robots" content="noindex, nofollow, noarchive, noimageindex, noimageai, noai">
<meta name="bingbot" content="noarchive">
<meta name="msnbot" content="noarchive">
<meta name="pinterest" content="nopin">
```

Adds rules to robots.txt that disallows access bots.
This plugin contains 149 rules.

## License
MIT

## Credit
* [Robots](https://github.com/bludit/bludit/tree/v3.0/bl-plugins/robots)<br>
Bludit default Robots plugin
* [個人サイトをAIに学習されるのを拒否しよう | 古の夢の住人](https://blog.yume-saku.site/ai-learning/) (***JA***)
* [2023年1月更新！アクセス拒否するbot一覧！（.htaccess）](https://parudou5.com/webseisaku/113/) (***JA***)
* [検索避けについて](https://con.jp/seo/borocchi/noseo.html) (***JA***)<br>
Metatags and robots.txt rules source
