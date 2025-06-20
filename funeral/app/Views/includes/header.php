<?php
// PHP: SEO 변수 및 JSON-LD 세팅 (장례시설용, 가격 포함)
if (!empty($facility)) {
    $facilityName = esc($facility['facility_name'] ?? '장례시설명');
    $city = esc($facility['city'] ?? '도시');
    $county = esc($facility['county'] ?? '구/군');
    $address = esc($facility['address'] ?? '');
    $phone = esc($facility['phone'] ?? '전화번호');
    $operationStatus = esc($facility['operation_status'] ?? '운영 상태');
    $postalCode = esc($facility['postal_code'] ?? '');
    $latitude = esc($facility['latitude'] ?? '');
    $longitude = esc($facility['longitude'] ?? '');
    $priceInfo = esc($facility['price_info'] ?? '가격 정보 없음');

    $seoTitle = "{$facilityName} 위치 최신 가격 정보 | 에듀허브 장례시설 정보";
    $seoDescription = "{$facilityName} 장례식장의 위치, 연락처, 운영 상태, 주소 및 합리적인 가격({$priceInfo}) 정보를 제공합니다.";
    $seoKeywords = "{$facilityName}, 장례식장, {$city}, {$county}, 가격, 연락처, 운영 상태, 에듀허브";

    // JSON-LD schema for FuneralHome
    $jsonLd = [
        "@context" => "https://schema.org",
        "@type" => "FuneralHome",
        "name" => $facilityName,
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => $address,
            "addressLocality" => "{$city} {$county}",
            "postalCode" => $postalCode,
            "addressCountry" => "KR"
        ],
        "telephone" => $phone,
        "geo" => [
            "@type" => "GeoCoordinates",
            "latitude" => $latitude,
            "longitude" => $longitude
        ],
        "openingHours" => $operationStatus === '운영' ? "Mo-Su 00:00-24:00" : "휴무",
        "url" => current_url(),
        "priceRange" => $priceInfo
    ];
} else {
    $seoTitle = '장례시설 정보 및 위치, 연락처는 에듀허브에서!';
    $seoDescription = '장례시설 정보 및 위치, 연락처, 운영 상태는 에듀허브에서!';
    $seoKeywords = '장례시설, 위치, 연락처, 운영 상태, 에듀허브';

    $jsonLd = [
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "name" => "에듀허브",
        "url" => base_url()
    ];
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?= $seoTitle ?></title>
  <meta name="description" content="<?= $seoDescription ?>" />
  <meta name="keywords" content="<?= $seoKeywords ?>" />

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= $seoTitle ?>" />
  <meta property="og:description" content="<?= $seoDescription ?>" />
  <meta property="og:url" content="<?= current_url() ?>" />
  <meta property="og:site_name" content="에듀허브" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= $seoTitle ?>" />
  <meta name="twitter:description" content="<?= $seoDescription ?>" />

  <!-- JSON-LD for SEO -->
  <script type="application/ld+json">
  <?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6686738239613464" crossorigin="anonymous"></script>

  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background: white !important;
      color: #333;
    }
    a {
      text-decoration: none;
      color: inherit;
    }
    ul {
      list-style: none;
    }

    /* 상단 내비게이션 */
    .top-nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding: 12px 24px;
      background: #fff;
    }
    .logo {
      font-size: 20px;
      font-weight: bold;
      color: #00b15d;
    }
    .center-nav {
      display: flex;
      align-items: center;
      gap: 24px;
      position: relative;
    }
    .menu-group {
      position: relative;
    }
    .menu-group > a {
      font-size: 14px;
      font-weight: 500;
      color: #333;
      padding: 6px;
      cursor: pointer;
    }
    .menu-group:hover .sub-menu {
      display: block;
    }
    .sub-menu {
      display: none;
      position: absolute;
      top: 30px;
      left: 0;
      background: white;
      border: 1px solid #ccc;
      border-radius: 6px;
      min-width: 160px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      z-index: 999;
    }
    .sub-menu li a {
      display: block;
      padding: 10px 14px;
      font-size: 13px;
      color: #2f7f5f;
      white-space: nowrap;
    }
    .sub-menu li a:hover {
      background-color: #f2fcf6;
    }

    /* 검색창 */
    .search-bar {
      display: flex;
      justify-content: center;
      margin: 20px auto;
      max-width: 720px;
      padding: 0 16px;
    }
    .search-box {
      display: flex;
      align-items: center;
      border: 2px solid #00b15d;
      border-radius: 8px;
      padding: 8px 12px;
      width: 100%;
      background: #fff;
    }
    .search-box input {
      border: none;
      flex: 1;
      padding: 6px 8px;
      font-size: 14px;
      color: #333;
      background: transparent;
    }
    .search-box input::placeholder {
      color: #aaa;
    }
    .search-box .icon {
      margin-right: 8px;
      font-size: 16px;
      color: #00b15d;
    }
  </style>
</head>
<body>
  <!-- 상단 내비게이션 -->
  <div class="top-nav">
    <div class="logo"><a href="/">F.easehub</a></div>
    <ul class="center-nav">
      <li class="menu-group">
        <a href="#" class="dropdown-toggle">장례식장 ▾</a>
        <ul class="sub-menu">
          <li><a href="/funerals">💇 장례식장 정보</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <!-- 검색창 -->
  <div class="search-bar">
    <form action="/funerals" method="get" style="width: 100%;">
      <div class="search-box">
        <span class="icon">🔍</span>
        <input
          type="text"
          name="search"
          id="searchInput"
          placeholder="장례식장명, 주소, 전화번호 등 검색"
          value="<?= esc($search ?? '') ?>"
        />
      </div>
      <button type="submit" style="display: none;">Search</button>
    </form>
  </div>

  <!-- 여기에 컨텐츠 영역 추가 -->

</body>
</html>
