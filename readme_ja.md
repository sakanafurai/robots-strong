# Robots (強力)

[ダウンロード](https://github.com/sakanafurai/robots-strong/releases/download/1.4.0/robots-strong.zip)

## 概要
Bludit CMS用のさらに強力なロボット対策プラグインです。

ホームやカテゴリー一覧を含むすべてのページにメタタグを追加します。
同時に```robots.txt```を追加してロボットからのアクセスをブロックします。


**このプラグインはすべてのロボットおよびクローラーのアクセスをブロックしたり、すべての検索エンジンへのインデックスおよびデータ収集を防げるわけではありません。**
**自己責任のもとでご使用ください。**

## モード

### 強力モード（デフォルト）
検索エンジンへのインデックス（追加）を防ぐための対策です。

下記の内容をheadに追加します。
```
<meta name="GOOGLEBOT" content="NOINDEX, NOFOLLOW, NOARCHIVE, NOIMAGEINDEX">
<meta name="ROBOTS" content="NOARCHIVE, NOINDEX, NOFOLLOW, NOIMAGEINDEX">
<meta name="robots" content="noindex, nofollow, noarchive, noimageindex">
```
```robots.txt```には以下の内容を追加します。
```
User-agent: *
Disallow: /
```

### 超強力モード
検索エンジンやAIクローラーに対して強力に保護します。**超強力**モードでは、robots.txtにサービス名ごとに明示的にルールを追加します。また、一部サービスのロボット向けの対策用メタタグをheadに追加します。

headに下記の内容を追加します。
```
<meta name="GOOGLEBOT" content="NOINDEX, NOFOLLOW, NOARCHIVE, NOIMAGEINDEX">
<meta name="ROBOTS" content="NOARCHIVE, NOINDEX, NOFOLLOW, NOIMAGEINDEX">
<meta name="robots" content="noindex, nofollow, noarchive, noimageindex, noimageai, noai">
<meta name="bingbot" content="noarchive">
<meta name="msnbot" content="noarchive">
<meta name="pinterest" content="nopin">
```

ロボットのアクセスを許可しないルールをrobots.txtに追加します。
現在、149のボットがルールに登録されています。

## ライセンス
MIT

## クレジット
* [Robots](https://github.com/bludit/bludit/tree/v3.0/bl-plugins/robots)<br>
BluditデフォルトのRobotsプラグイン
* [個人サイトをAIに学習されるのを拒否しよう | 古の夢の住人](https://blog.yume-saku.site/ai-learning/) (***JA***)
* [2023年1月更新！アクセス拒否するbot一覧！（.htaccess）](https://parudou5.com/webseisaku/113/) (***JA***)
* [検索避けについて](https://con.jp/seo/borocchi/noseo.html) (***JA***)<br>
対策用メタタグおよびrobots.txtの内容の参考にしました。
