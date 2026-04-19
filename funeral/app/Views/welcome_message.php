<?php include APPPATH . 'Views/includes/header.php'; ?>

<main>
  <div class="container">
    <section class="section-block" style="padding: 36px 24px; background: linear-gradient(140deg, #0e7f63, #0a5f4a); color: #fff;">
      <h1 style="font-size: clamp(24px, 3.6vw, 36px); margin-bottom: 10px; line-height: 1.35;">
        전국 장례식장 정보를 한눈에 확인하세요
      </h1>
      <p style="font-size: 15px; opacity: 0.96; max-width: 760px;">
        공공데이터 기반으로 장례식장 위치, 시설, 주요 비용 정보를 제공해 빠르게 비교할 수 있습니다.
      </p>
      <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:18px;">
        <a href="<?= site_url('funerals') ?>" style="background:#fff; color:#0a5f4a; padding:11px 16px; border-radius:999px; font-weight:700;">장례식장 전체 보기</a>
        <a href="<?= site_url('sitemap.xml') ?>" style="border:1px solid rgba(255,255,255,0.45); color:#fff; padding:11px 16px; border-radius:999px; font-weight:700;">사이트맵 보기</a>
      </div>
    </section>

    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6686738239613464"
         data-ad-slot="1204098626"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>

    <section class="section-block">
      <h2 style="font-size:24px; margin-bottom:10px;">지역별 많이 찾는 장례식장</h2>
      <p style="font-size:14px; color:#5d6670; margin-bottom:16px;">클릭하면 해당 지역 키워드로 바로 검색됩니다.</p>
      <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap:10px;">
        <?php if (!empty($regions)): ?>
          <?php foreach ($regions as $region): ?>
            <a href="<?= site_url('funerals') . '?search=' . urlencode($region['city']) ?>" style="display:flex; align-items:center; justify-content:space-between; padding:10px 12px; border:1px solid #e2e8eb; border-radius:10px; background:#fff;">
              <span style="font-weight:700;"><?= esc($region['city']) ?></span>
              <span style="font-size:12px; color:#5d6670;"><?= esc((string) $region['total']) ?>곳</span>
            </a>
          <?php endforeach; ?>
        <?php else: ?>
          <p>표시할 지역 정보가 없습니다.</p>
        <?php endif; ?>
      </div>
    </section>

    <section class="section-block">
      <h2 style="font-size:24px; margin-bottom:10px;">최근 등록된 장례식장</h2>
      <p style="font-size:14px; color:#5d6670; margin-bottom:16px;">최신 등록 시설을 빠르게 확인해보세요.</p>
      <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap:12px;">
        <?php if (!empty($latestFacilities)): ?>
          <?php foreach ($latestFacilities as $facility): ?>
            <a href="<?= site_url('funerals/' . $facility['id']) ?>" style="border:1px solid #e2e8eb; border-radius:12px; background:#fff; padding:14px;">
              <h3 style="font-size:16px; margin-bottom:6px;"><?= esc($facility['facility_name']) ?></h3>
              <p style="font-size:13px; color:#5d6670;"><?= esc($facility['city']) ?> <?= esc($facility['county']) ?></p>
            </a>
          <?php endforeach; ?>
        <?php else: ?>
          <p>등록된 시설이 없습니다.</p>
        <?php endif; ?>
      </div>
    </section>

    <section class="section-block">
      <h2 style="font-size:24px; margin-bottom:16px;">서비스 특징</h2>
      <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap:12px;">
        <article style="border:1px solid #e2e8eb; border-radius:12px; background:#fff; padding:16px;">
          <h3 style="font-size:16px; margin-bottom:8px;">위치 기반 탐색</h3>
          <p style="font-size:14px; color:#5d6670;">시/군/구 단위로 장례식장 정보를 빠르게 찾아볼 수 있습니다.</p>
        </article>
        <article style="border:1px solid #e2e8eb; border-radius:12px; background:#fff; padding:16px;">
          <h3 style="font-size:16px; margin-bottom:8px;">주요 시설 정보</h3>
          <p style="font-size:14px; color:#5d6670;">주차, 유족대기실, 편의시설 등 실제 이용에 필요한 정보를 제공합니다.</p>
        </article>
        <article style="border:1px solid #e2e8eb; border-radius:12px; background:#fff; padding:16px;">
          <h3 style="font-size:16px; margin-bottom:8px;">비용 비교 참고</h3>
          <p style="font-size:14px; color:#5d6670;">장례 용품/항목별 가격 데이터를 통해 합리적인 비교가 가능합니다.</p>
        </article>
      </div>
    </section>
  </div>
</main>

<?php include APPPATH . 'Views/includes/footer.php'; ?>
