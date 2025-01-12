<?php

class robotsStrong extends Plugin {

  public function init()
  {
    $this->dbFields = array(
      'robots-mode' => 'strong'
    );
  }

  public function form()
  {
    global $L;

    $html .= '<h4 class="mt-3">Settings</h3>';
    $html .= '<div>';
    $html .= '<label>Mode</label>';
    $html .= '<select name="robots-mode">';
    $html .= '<option value="strong" ' . ($this->getValue('robots-mode') === 'strong' ? 'selected' : '') . '>'. $L->get('strong') .'</option>';
    $html .= '<option value="strongest" ' . ($this->getValue('robots-mode') === 'strongest' ? 'selected' : '') . '>'. $L->get('strongest') .'</option>';
    '>Google Fonts</option>';
    $html .= '<span class="tip">'. $L->get('tip') .'</span>';
    $html .= '</div>';

    return $html;
  }

  public function siteHead()
  {
    $metaTag =   '<meta name="GOOGLEBOT" content="NOINDEX,NOFOLLOW,NOARCHIVE,NOIMAGEINDEX">
    <meta name="ROBOTS" content="NOARCHIVE,NOINDEX,NOFOLLOW,NOIMAGEINDEX">
    <meta name="robots" content="noindex,nofollow,noarchive,noimageindex">'.PHP_EOL;

    $additionalMetaTag = '  <meta name="bingbot" content="noarchive">
    <meta name="msnbot" content="noarchive">
    <meta name="pinterest" content="nopin">
    <meta name="robots" content="noimageai, noai">'.PHP_EOL;

    echo $metaTag;

    if ($this->getValue('robots-mode') == 'strongest') {
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

      $robotstxt = <<<EOF
      User-agent: *
      Disallow: /
      EOF;

      $additionalrobotstxt = <<<EOF
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
      return $additionalrobotstxt;

      echo $this->getValue('robotstxt');
      if ($this->getValue('robots-mode') == 'strongest') {
        echo $this->getValue('additionalrobotstxt');
      }
      exit(0);
    }
  }

}
