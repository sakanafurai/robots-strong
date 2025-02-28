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
      user-agent: Adsbot
      Disallow: /

      user-agent: AhrefsBot
      Disallow: /

      User-agent: AI2Bot
      Disallow: /

      user-agent: Amazonbot
      Disallow: /

      User-agent: amazon-kendra
      Disallow: /

      user-agent: Applebot
      Disallow: /

      User-agent: Applebot-Extended
      Disallow: /

      user-agent: AwarioBot
      Disallow: /

      user-agent: archive.org_bot
      Disallow: /

      user-agent: Baidu
      Disallow: /

      user-agent: Baiduspider
      Disallow: /

      user-agent: Barkrowler
      Disallow: /

      user-agent: bidswitchbot
      Disallow: /

      User-agent: bingbot
      Disallow: /

      user-agent: BLEXBot
      Disallow: /

      user-agent: Botify
      Disallow: /

      user-agent: BUbiNG
      Disallow: /

      User-agent: Bytespider
      Disallow: /

      User-agent: CCBot
      Disallow: /

      User-agent: ChatGPT-User
      Disallow: /

      user-agent: Cincraw
      Disallow: /

      User-agent: ClaudeBot
      Disallow: /

      user-agent: coccocbot
      Disallow: /

      user-agent: CognitiveSEO
      Disallow: /

      user-agent: CognitiveSEO Site Explorer
      Disallow: /

      User-agent: cohere-ai
      Disallow: /

      user-agent: ContentKing
      Disallow: /

      user-agent: contxbot
      Disallow: /

      user-agent: Cotoyogi
      Disallow: /

      user-agent: CriteoBot
      Disallow: /

      user-agent: Cyotek WebCopy
      Disallow: /

      user-agent: DataForSeoBot
      Disallow: /

      user-agent: Daum
      Disallow: /

      user-agent: DeepCrawl
      Disallow: /

      user-agent: Dexi.io
      Disallow: /

      User-agent: Diffbot
      Disallow: /

      user-agent: Domains Project
      Disallow: /

      user-agent: DotBot
      Disallow: /

      user-agent: dotbot
      Disallow: /

      user-agent: DuckDuckBot
      Disallow: /

      user-agent: DuckDuckGo
      Disallow: /

      user-agent: Exabot
      Disallow: /

      user-agent: Facebook Crawler
      Disallow: /

      user-agent: facebookexternalhit
      Disallow: /

      user-agent: Feedly
      Disallow: /

      user-agent: FemtosearchBot
      Disallow: /

      user-agent: Getleft
      Disallow: /

      user-agent: Gigabot
      Disallow: /

      User-agent: Google-Extended
      Disallow: /

      user-agent: Google-InspectionTool
      Disallow: /

      User-agent: GoogleOther
      Disallow: /

      User-agent: GoogleOther-Image
      Disallow: /

      User-agent: GoogleOther-Video
      Disallow: /

      User-agent: GPTBot
      Disallow: /

      user-agent: GrapeshotCrawler
      Disallow: /

      user-agent: Helium Scraper
      Disallow: /

      user-agent: HTTrack
      Disallow: /

      user-agent: ia_archiver
      Disallow: /

      user-agent: ias-sg
      Disallow: /

      user-agent: ICC-Crawler
      Disallow: /

      Mozilla/5.0 (compatible; ImagesiftBot; +imagesift.com)
      User-Agent: ImagesiftBot
      Disallow: /

      user-agent: Import.io
      Disallow: /

      user-agent: integralads
      Disallow: /

      user-agent: jet-bot
      Disallow: /

      user-agent: JetOctopus
      Disallow: /

      user-agent: Linespider
      Disallow: /

      user-agent: Linguee
      Disallow: /

      user-agent: Linguee Bot
      Disallow: /

      user-agent: linkdexbot
      Disallow: /

      user-agent: linkfluence
      Disallow: /

      user-agent: ltx71
      Disallow: /

      user-agent: Lumar
      Disallow: /

      user-agent: Mail.RU_Bot
      Disallow: /

      user-agent: Majestic
      Disallow: /

      user-agent: ManifoldCF
      Disallow: /

      user-agent: Mappy
      Disallow: /

      user-agent: MegaIndex
      Disallow: /

      user-agent: MegaIndex.ru
      Disallow: /

      User-agent: meta-externalagent
      Disallow: /

      User-agent: meta-externalfetcher
      Disallow: /

      user-agent: MicroAdBot
      Disallow: /

      user-agent: MJ12bot
      Disallow: /

      User-agent: msnbot
      Disallow: /

      user-agent: Neevabot
      Disallow: /

      user-agent: netEstate NE Crawler
      Disallow: /

      user-agent: Netpeak Spider
      Disallow: /

      User-agent: OAI-SearchBot
      Disallow: /

      user-agent: Octoparse
      Disallow: /

      user-agent: OnCrawl
      Disallow: /

      user-agent: Outwit Hub
      Disallow: /

      user-agent: ParseHub
      Disallow: /

      User-agent: PerplexityBot
      Disallow: /

      user-agent: petalbot
      Disallow: /

      user-agent: Pinterestbot
      Disallow: /

      user-agent: Pockey
      Disallow: /

      user-agent: proximic
      Disallow: /

      user-agent: psbot
      Disallow: /

      user-agent: Quantcastbot
      Disallow: /

      user-agent: Rogerbot
      Disallow: /

      user-agent: SemrushBot
      Disallow: /

      user-agent: Scrapy
      Disallow: /

      user-agent: Screaming Frog
      Disallow: /

      user-agent: Screaming Frog SEO Spider
      Disallow: /

      user-agent: SeekporBot
      Disallow: /

      user-agent: SeznamBot
      Disallow: /


      user-agent: SEOkicks
      Disallow: /

      user-agent: Sequentum
      Disallow: /

      user-agent: SerendeputyBot
      Disallow: /

      user-agent: serpstatbot
      Disallow: /

      user-agent: SeznamBot
      Disallow: /

      user-agent: Sitebulb Crawler
      Disallow: /

      user-agent: Slurp
      Disallow: /

      user-agent: SMTBot
      Disallow: /

      user-agent: sogou spider
      Disallow: /

      user-agent: Sogou head spider
      Disallow: /

      user-agent: Sogou Orion spider
      Disallow: /

      user-agent: Sogou Pic Spider
      Disallow: /

      user-agent: Sogou-Test-Spider
      Disallow: /

      user-agent: Sogou web spider
      Disallow: /

      user-agent: Sonic
      Disallow: /

      user-agent: spbot
      Disallow: /

      user-agent: special_archiver
      Disallow: /

      user-agent: spider
      Disallow: /

      user-agent: Steeler
      Disallow: /

      user-agent: Superfeedr
      Disallow: /

      user-agent: Superfeedr bot
      Disallow: /

      user-agent: Swiftbot
      Disallow: /

      user-agent: trendictionbot
      Disallow: /

      user-agent: TurnitinBot
      Disallow: /

      user-agent: TweetmemeBot
      Disallow: /

      user-agent: Twitterbot
      Disallow: /

      user-agent: UptimeRobot
      Disallow: /

      user-agent: VelenPublicWebCrawler
      Disallow: /

      user-agent: Visual Scraper
      Disallow: /

      user-agent: WebHarvy
      Disallow: /

      user-agent: Webhose.io
      Disallow: /

      user-agent: WooRank
      Disallow: /

      user-agent: Wotbox
      Disallow: /

      user-agent: Yahoo Slurp
      Disallow: /

      user-agent: YaK
      Disallow: /

      user-agent: YandexBot
      Disallow: /

      user-agent: Yeti
      Disallow: /

      user-agent: Yetibot
      Disallow: /

      user-agent: YoudaoBot
      Disallow: /

      user-agent: Y!J
      Disallow: /

      user-agent: ZoominfoBot
      Disallow: /

      user-agent: Zyte
      Disallow: /

      user-agent: 360Spider
      Disallow: /

      user-agent: 80legs
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
