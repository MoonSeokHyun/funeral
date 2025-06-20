<?php

namespace App\Controllers;

use App\Models\FuneralFacilityModel;
use CodeIgniter\Controller;

class SitemapController extends Controller
{
    protected $perPage = 10000;

    // sitemap index 생성
    public function index()
    {
        helper('url');

        $xml  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $xml .= "<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

        $facilityModel = new FuneralFacilityModel();
        $total = $facilityModel->countAll();
        $pages = (int) ceil($total / $this->perPage);

        for ($i = 1; $i <= $pages; $i++) {
            $loc = base_url("sitemap/generate/funeral/{$i}");
            $xml .= "  <sitemap>\n";
            $xml .= "    <loc>{$loc}</loc>\n";
            $xml .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
            $xml .= "  </sitemap>\n";
        }

        $xml .= "</sitemapindex>";

        return $this->response
                    ->setHeader('Content-Type', 'application/xml; charset=utf-8')
                    ->setBody($xml);
    }

    // 장례시설 sitemap 분할 페이지
    public function generate($type = 'funeral', $pageNumber = 1)
    {
        if ($type !== 'funeral') {
            return $this->response
                        ->setStatusCode(404)
                        ->setBody('Invalid sitemap type.');
        }

        helper('url');

        $model = new FuneralFacilityModel();
        $offset = ($pageNumber - 1) * $this->perPage;

        $facilities = $model
                        ->orderBy('id', 'ASC')
                        ->findAll($this->perPage, $offset);

        $xml  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

        foreach ($facilities as $facility) {
            $url = base_url("funerals/{$facility['id']}");

            // lastmod: created_at 또는 updated_at 필드 사용, 없으면 오늘 날짜
            $lastmod = !empty($facility['updated_at'] ?? $facility['created_at'] ?? null)
                ? date('Y-m-d', strtotime($facility['updated_at'] ?? $facility['created_at']))
                : date('Y-m-d');

            $xml .= "  <url>\n";
            $xml .= "    <loc>{$url}</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.7</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= "</urlset>";

        return $this->response
                    ->setHeader('Content-Type', 'application/xml; charset=utf-8')
                    ->setBody($xml);
    }
}
