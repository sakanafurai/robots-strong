<?php

class robotsStrong extends Plugin {

  public function init()
  {
    $this->dbFields = array(
      'robotsMode' => 'strong',
      'userRobotsTxt' => ''
    );
  }

  public function form()
  {
    global $L;

    $html .= '<div>';
    $html .= '<label>'. $L->get('mode') .'</label>';
    $html .= '<select name="robotsMode">';
    $html .= '<option value="strong" ' . ($this->getValue('robotsMode') === 'strong' ? 'selected' : '') . '>'. $L->get('strong') .'</option>';
    $html .= '<option value="strongest" ' . ($this->getValue('robotsMode') === 'strongest' ? 'selected' : '') . '>'. $L->get('strongest') .'</option>';
    $html .= '</select>';
    $html .= '</div>';

    $html .= '<div>';
    $html .= '<label>'. $L->get('user-defined-rules') .'</label>';
    $html .= '<textarea name="userRobotsTxt">'.$this->getValue('userRobotsTxt').'</textarea>';
    $html .= '</div>';

    return $html;
  }

  public function siteHead()
  {
    $metaTag = '<meta name="GOOGLEBOT" content="NOINDEX, NOFOLLOW, NOARCHIVE, NOIMAGEINDEX">
    <meta name="ROBOTS" content="NOARCHIVE, NOINDEX, NOFOLLOW, NOIMAGEINDEX">'.PHP_EOL;
    $metaTag2 = '<meta name="robots" content="noindex, nofollow, noarchive, noimageindex">'.PHP_EOL;

    $appendMetaTag = '<meta name="robots" content="noindex, nofollow, noarchive, noimageindex, noimageai, noai">
    <meta name="bingbot" content="noarchive">
    <meta name="msnbot" content="noarchive">
    <meta name="pinterest" content="nopin">'.PHP_EOL;

    echo $metaTag;

    if ($this->getValue('robotsMode') == 'strong') {
      echo $metaTag2;
    } elseif ($this->getValue('robotsMode') == 'strongest') {
      echo $appendMetaTag;
    }
  }


  public function beforeAll()
  {
    $webhook = 'robots.txt';
    if ($this->webhook($webhook)) {
      header('Content-type: text/plain');
      // Include link to sitemap in robots.txt if the plugin is enabled
      if (pluginActivated('pluginSitemap')) {
        echo 'Sitemap: '.DOMAIN_BASE.'sitemap.xml'.PHP_EOL;
      }

      $robotsTxt = <<<EOF
      User-agent: *
      Disallow: /


      EOF;

      $appendRobotsTxt = <<<EOF
      user-agent: AhrefsBot
      Disallow: /

      user-agent: Barkrowler
      Disallow: /

      user-agent: bidswitchbot
      Disallow: /

      User-agent: bingbot
      Disallow: /

      user-agent: BLEXBot
      Disallow: /

      user-agent: Cincraw
      Disallow: /

      user-agent: contxbot
      Disallow: /

      user-agent: CriteoBot
      Disallow: /

      user-agent: DataForSeoBot
      Disallow: /

      user-agent: DotBot
      Disallow: /

      user-agent: GrapeshotCrawler
      Disallow: /

      user-agent: ICC-Crawler
      Disallow: /

      user-agent: integralads
      Disallow: /

      user-agent: jet-bot
      Disallow: /

      user-agent: Linespider
      Disallow: /

      user-agent: Linguee
      Disallow: /

      user-agent: linkfluence
      Disallow: /

      user-agent: ltx71
      Disallow: /

      user-agent: MicroAdBot
      Disallow: /

      user-agent: Mappy
      Disallow: /

      user-agent: MegaIndex
      Disallow: /

      user-agent: MJ12bot
      Disallow: /

      User-agent: msnbot
      Disallow: /

      user-agent: proximic
      Disallow: /

      user-agent: SemrushBot
      Disallow: /

      user-agent: SeznamBot
      Disallow: /

      user-agent: SMTBot
      Disallow: /

      user-agent: trendictionbot
      Disallow: /

      user-agent: Quantcastbot
      Disallow: /

      User-agent: GPTBot
      Disallow: /

      User-agent: ChatGPT-User
      Disallow: /

      User-agent: Google-Extended
      Disallow: /

      User-agent: GoogleOther
      Disallow: /

      User-agent: GoogleOther-Image
      Disallow: /

      User-agent: GoogleOther-Video
      Disallow: /

      User-agent: CCBot
      Disallow: /

      User-agent: ClaudeBot
      Disallow: /

      User-agent: PerplexityBot
      Disallow: /

      User-agent: Applebot-Extended
      Disallow: /

      User-agent: OAI-SearchBot
      Disallow: /

      User-agent: amazon-kendra
      Disallow: /

      Mozilla/5.0 (compatible; ImagesiftBot; +imagesift.com)
      User-Agent: ImagesiftBot
      Disallow: /

      User-agent: Diffbot
      Disallow: /

      User-agent: meta-externalagent
      Disallow: /

      User-agent: meta-externalfetcher
      Disallow: /

      User-agent: cohere-ai
      Disallow: /

      User-agent: AI2Bot
      Disallow: /

      User-agent: Bytespider
      Disallow: /

      EOF;

      $userRobotsTxt = $this->getValue('userRobotsTxt');

      echo $robotsTxt;
      if ($this->getValue('robotsMode') == 'strongest') {
        echo $appendRobotsTxt;
      }
      if ($this->getValue('userRobotsTxt')) {
        echo $userRobotsTxt;
      }
      exit(0);
    }
  }

}
