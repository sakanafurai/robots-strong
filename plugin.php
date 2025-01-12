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

    $html .= '<h4 class="mt-3">Settings</h3>';
    $html .= '<div>';
    $html .= '<label>Mode</label>';
    $html .= '<select name="robotsMode">';
    $html .= '<option value="strong" ' . ($this->getValue('robotsMode') === 'strong' ? 'selected' : '') . '>'. $L->get('strong') .'</option>';
    $html .= '<option value="strongest" ' . ($this->getValue('robotsMode') === 'strongest' ? 'selected' : '') . '>'. $L->get('strongest') .'</option>';
    '>Google Fonts</option>';
    $html .= '<span class="tip">'. $L->get('tip') .'</span>';
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

    $additionalMetaTag = '<meta name="robots" content="noindex, nofollow, noarchive, noimageindex, noimageai, noai">
    <meta name="bingbot" content="noarchive">
    <meta name="msnbot" content="noarchive">
    <meta name="pinterest" content="nopin">'.PHP_EOL;

    echo $metaTag;

    if ($this->getValue('robotsMode') == 'strong') {
      echo $metaTag2;
    } elseif ($this->getValue('robotsMode') == 'strongest') {
      echo $additionalMetaTag;
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

      $additionalRobotsTxt = <<<EOF
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

      User-agent: ICC-Crawler
      Disallow: /
      EOF;

      echo $robotsTxt;
      if ($this->getValue('robotsMode') == 'strongest') {
        echo $additionalRobotsTxt;
      }
      if ($this->getValue('userRobotsTxt')) {
        echo $userRobotsTxt;
      }
      exit(0);
    }
  }

}
