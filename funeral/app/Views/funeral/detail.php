<style>
  body { background: #f5f5f5; font-family: 'Noto Sans KR', sans-serif; color: #333; margin:0; padding:0; }
  a { color:#0078ff; text-decoration:none; }
  .container{ max-width:800px; margin:2rem auto; padding:0 1rem; }
  .content-title{ font-size:2rem; margin-bottom:.5rem; border-bottom:2px solid #0078ff; padding-bottom:.3rem; }
  .breadcrumb{ font-size:.9rem; color:#555; margin-bottom:1.5rem; }
  .section{ background:#fff; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.1); margin-bottom:1.5rem; padding:1.5rem; }
  .section h2{ font-size:1.2rem; margin-bottom:1rem; color:#0078ff; border-left:4px solid #0078ff; padding-left:.5rem; }

  ul.detail-list { list-style:none; margin:0; padding:0; }
  ul.detail-list li { display:flex; justify-content:space-between; padding:.75rem 0; border-bottom:1px solid #eee; }
  ul.detail-list li:last-child { border-bottom:none; }
  ul.detail-list li strong { font-weight:600; color:#333; }
  ul.detail-list li div.value { color:#555; text-align:right; }

  /* 관련 비용 리스트 스타일 */
  ul.cost-list { list-style:none; margin:0; padding:0; }
  ul.cost-list li { padding:.75rem 0; border-bottom:1px solid #eee; }
  ul.cost-list li:last-child { border-bottom:none; }
  ul.cost-list li > div { margin-bottom: 4px; }
  ul.cost-list li .item-category { font-weight: 700; color: #0078ff; }
  ul.cost-list li .item-name { font-weight: 600; font-size: 1rem; color: #333; }
  ul.cost-list li .item-detail { font-size: 0.9rem; color: #666; margin-bottom: 0.3rem; }
  ul.cost-list li .item-price { font-weight: 700; color: #1b5e20; }

  /* 블로그, 이미지 리스트 스타일 유지 (기존과 동일) */
  .blog-list, .image-list {
    display: grid;
    gap: 1.2rem;
  }
  .blog-list {
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  }
  .image-list {
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
  }
  .blog-item, .image-item {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    padding: 1rem;
    color: #333;
    text-decoration: none;
  }
  .blog-item:hover, .image-item:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }
  .blog-item > div.title {
    font-weight: 600;
    font-size: 1rem;
    color: #1b5e20;
    margin-bottom: .5rem;
  }
  .blog-item > div.desc {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: .5rem;
  }
  .blog-item > div.meta {
    font-size: 0.8rem;
    color: #999;
  }
  .image-item img {
    width: 100%;
    display: block;
    border-radius: 8px 8px 0 0;
    object-fit: cover;
    height: 140px;
  }
  .image-item div.caption {
    padding: 0.5rem;
    font-size: 0.85rem;
    color: #444;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  p.back-link {
    margin-top: 2rem;
    font-size: 1rem;
  }
  #map {
    width: 100%;
    height: 300px;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    margin-top: 1rem;
  }
</style>

<?php include APPPATH . 'Views/includes/header.php'; ?>

<div class="container">
  <h1 class="content-title"><?= esc($facility['facility_name']) ?> 상세정보</h1>

  <!-- 기본정보 섹션 -->
  <div class="section">
    <h2>기본정보</h2>
    <ul class="detail-list">
      <li><strong>도시 (city):</strong> <div class="value"><?= esc($facility['city']) ?></div></li>
      <li><strong>군/구 (county):</strong> <div class="value"><?= esc($facility['county']) ?></div></li>
      <li><strong>주소:</strong> <div class="value"><?= esc($facility['address']) ?></div></li>
      <li><strong>전화번호:</strong> <div class="value"><?= esc($facility['phone_number']) ?></div></li>
      <li><strong>주차 가능 대수:</strong> <div class="value"><?= esc($facility['parking_capacity']) ?></div></li>
      <li><strong>식당:</strong> <div class="value"><?= esc($facility['restaurant']) ?></div></li>
      <li><strong>매점:</strong> <div class="value"><?= esc($facility['convenience_store']) ?></div></li>
      <li><strong>주차장:</strong> <div class="value"><?= esc($facility['parking_lot']) ?></div></li>
      <li><strong>유족 대기실:</strong> <div class="value"><?= esc($facility['family_waiting_room']) ?></div></li>
      <li><strong>장애인 편의시설:</strong> <div class="value"><?= esc($facility['disabled_facilities']) ?></div></li>
      <li><strong>운영 형태:</strong> <div class="value"><?= esc($facility['operation_type']) ?></div></li>
      <li><strong>총 매장 능력:</strong> <div class="value"><?= esc($facility['total_burial_capacity']) ?></div></li>
      <li><strong>시설 종류:</strong> <div class="value"><?= esc($facility['facility_type']) ?></div></li>
    </ul>
  </div>

  <!-- 관련 비용 섹션 -->
  <div class="section">
    <h2>관련 비용</h2>
    <?php if (empty($items)): ?>
      <p>관련 비용이 없습니다.</p>
    <?php else: ?>
      <ul class="cost-list">
        <?php foreach ($items as $item): ?>
          <li>
            <div class="item-category"><?= esc($item['item_category']) ?></div>
            <div class="item-name"><?= esc($item['item_name']) ?> (<?= esc($item['item_type']) ?>)</div>
            <div class="item-detail"><?= esc($item['item_detail']) ?></div>
            <div class="item-price"><?= number_format($item['price']) ?> 원</div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>

  <!-- 블로그 검색 -->
  <?php if (!empty($blog['items'])): ?>
    <div class="section">
      <h2>블로그 검색</h2>
      <div class="blog-list">
        <?php foreach ($blog['items'] as $item): ?>
          <a href="<?= esc($item['link']) ?>" target="_blank" class="blog-item">
            <div class="title"><?= strip_tags($item['title']) ?></div>
            <div class="desc"><?= strip_tags($item['description']) ?></div>
            <div class="meta"><?= esc($item['bloggername']) ?> · <?= date('Y.m.d', strtotime($item['postdate'])) ?></div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

  <!-- 이미지 검색 -->
  <?php if (!empty($images['items'])): ?>
    <div class="section">
      <h2>이미지 검색</h2>
      <div class="image-list">
        <?php foreach ($images['items'] as $img): ?>
          <a href="<?= esc($img['link']) ?>" target="_blank" class="image-item">
            <img src="<?= esc($img['thumbnail']) ?>" alt="<?= esc($img['title']) ?>" />
            <div class="caption"><?= esc(mb_strimwidth(strip_tags($img['title']), 0, 40, '...')) ?></div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

  <p class="back-link"><a href="<?= site_url('funeral') ?>">← 목록으로</a></p>
</div>

<?php include APPPATH . 'Views/includes/footer.php'; ?>
