<?php

class robotsStrong extends Plugin {

  public function siteHead()
  {
   return
  '<meta name="GOOGLEBOT" content="NOINDEX,NOFOLLOW,NOARCHIVE">
  <meta name="ROBOTS" content="NOARCHIVE,NOINDEX,NOFOLLOW">
  <meta name="robots" content="noindex,nofollow,noarchive">'.PHP_EOL;
  }

}
