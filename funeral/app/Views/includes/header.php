<?php
helper('url');

$siteName = 'F.easehub';
$defaultTitle = '전국 장례식장 정보, 위치, 비용 비교 | F.easehub';
$defaultDescription = '전국 장례식장 위치, 연락처, 시설, 장례비용 정보를 한 곳에서 검색하고 비교해보세요.';
$defaultKeywords = '장례식장, 장례식장 정보, 장례식장 비용, 장례시설, 장례비용 비교';
$defaultImage = base_url('favicon.ico');

$seoTitle = $seoTitle ?? $defaultTitle;
$seoDescription = $seoDescription ?? $defaultDescription;
$seoKeywords = $seoKeywords ?? $defaultKeywords;
$canonicalUrl = $canonicalUrl ?? current_url();
$seoImage = $seoImage ?? $defaultImage;

if (!isset($jsonLd)) {
    $jsonLd = [
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "name" => $siteName,
        "url" => base_url(),
        "potentialAction" => [
            "@type" => "SearchAction",
            "target" => base_url('funerals?search={search_term_string}'),
            "query-input" => "required name=search_term_string"
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?= esc($seoTitle) ?></title>
  <meta name="description" content="<?= esc($seoDescription) ?>" />
  <meta name="keywords" content="<?= esc($seoKeywords) ?>" />
  <link rel="canonical" href="<?= esc($canonicalUrl) ?>" />

  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= esc($seoTitle) ?>" />
  <meta property="og:description" content="<?= esc($seoDescription) ?>" />
  <meta property="og:url" content="<?= esc($canonicalUrl) ?>" />
  <meta property="og:site_name" content="<?= esc($siteName) ?>" />
  <meta property="og:image" content="<?= esc($seoImage) ?>" />

  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="<?= esc($seoTitle) ?>" />
  <meta name="twitter:description" content="<?= esc($seoDescription) ?>" />
  <meta name="twitter:image" content="<?= esc($seoImage) ?>" />

  <script type="application/ld+json">
  <?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
  </script>

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6686738239613464" crossorigin="anonymous"></script>

  <style>
    :root {
      --bg: #f4f7f7;
      --surface: #ffffff;
      --text: #1e2428;
      --muted: #5d6670;
      --line: #e2e8eb;
      --primary: #0e7f63;
      --primary-dark: #09624d;
      --shadow: 0 8px 22px rgba(9, 34, 36, 0.08);
      --radius: 14px;
      --max: 1140px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Noto Sans KR", "Apple SD Gothic Neo", Arial, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.6;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .site-wrap {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .site-header {
      background: var(--surface);
      border-bottom: 1px solid var(--line);
      position: sticky;
      top: 0;
      z-index: 50;
    }

    .header-inner {
      max-width: var(--max);
      margin: 0 auto;
      padding: 14px 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
    }

    .logo-link {
      font-size: 20px;
      font-weight: 800;
      color: var(--primary);
      letter-spacing: -0.2px;
    }

    .header-nav {
      display: flex;
      align-items: center;
      gap: 14px;
      flex-wrap: wrap;
      font-size: 14px;
      color: var(--muted);
    }

    .header-nav a:hover {
      color: var(--primary);
    }

    .search-wrap {
      max-width: var(--max);
      margin: 0 auto;
      padding: 12px 18px 16px;
    }

    .search-form {
      display: flex;
      gap: 10px;
      background: var(--surface);
      border: 1px solid var(--line);
      border-radius: 999px;
      padding: 8px 8px 8px 14px;
      box-shadow: 0 2px 8px rgba(9, 34, 36, 0.04);
    }

    .search-form input {
      flex: 1;
      border: 0;
      outline: 0;
      background: transparent;
      color: var(--text);
      font-size: 15px;
      min-width: 0;
    }

    .search-form button {
      border: 0;
      background: var(--primary);
      color: #fff;
      border-radius: 999px;
      font-size: 14px;
      font-weight: 700;
      padding: 10px 16px;
      cursor: pointer;
    }

    .search-form button:hover {
      background: var(--primary-dark);
    }

    .container {
      width: 100%;
      max-width: var(--max);
      margin: 0 auto;
      padding: 0 18px;
    }

    main {
      flex: 1;
      padding-bottom: 48px;
    }

    .section-block {
      background: var(--surface);
      border: 1px solid var(--line);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 24px;
      margin-top: 20px;
    }

    .adsbygoogle {
      display: block;
      margin: 18px auto;
      min-height: 100px;
    }

    @media (max-width: 780px) {
      .header-inner {
        align-items: flex-start;
        flex-direction: column;
      }

      .logo-link {
        font-size: 18px;
      }

      .header-nav {
        font-size: 13px;
      }

      .search-form button {
        padding: 10px 12px;
        font-size: 13px;
      }
    }
  </style>
</head>
<body>
<div class="site-wrap">
  <header class="site-header">
    <div class="header-inner">
      <a class="logo-link" href="<?= site_url('/') ?>">F.easehub</a>
      <nav class="header-nav" aria-label="상단 메뉴">
        <a href="<?= site_url('/') ?>">홈</a>
        <a href="<?= site_url('funerals') ?>">장례식장 목록</a>
        <a href="<?= site_url('sitemap.xml') ?>">사이트맵</a>
      </nav>
    </div>
    <div class="search-wrap">
      <form class="search-form" action="<?= site_url('funerals') ?>" method="get" role="search">
        <label for="searchInput" class="sr-only" style="position:absolute;left:-9999px;">장례식장 검색</label>
        <input
          type="search"
          name="search"
          id="searchInput"
          placeholder="장례식장명, 주소, 지역, 전화번호 검색"
          value="<?= esc($search ?? '') ?>"
        />
        <button type="submit">검색</button>
      </form>
    </div>
  </header>
