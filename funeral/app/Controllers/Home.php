<?php

namespace App\Controllers;

use App\Models\FuneralFacilityModel;

class Home extends BaseController
{
    public function index(): string
    {
        $facilityModel = new FuneralFacilityModel();

        $regions = $facilityModel
            ->select('city, COUNT(*) as total')
            ->where('city IS NOT NULL', null, false)
            ->where('city !=', '')
            ->groupBy('city')
            ->orderBy('total', 'DESC')
            ->findAll(10);

        $latestFacilities = $facilityModel
            ->select('id, facility_name, city, county')
            ->orderBy('id', 'DESC')
            ->findAll(6);

        $data = [
            'regions' => $regions,
            'latestFacilities' => $latestFacilities,
            'seoTitle' => '전국 장례식장 정보, 위치, 비용 비교 | F.easehub',
            'seoDescription' => '지역별 장례식장 정보와 주요 비용 항목을 검색하고 비교해보세요.',
            'seoKeywords' => '장례식장, 장례시설, 장례비용, 장례식장 위치, 빈소 비용',
            'canonicalUrl' => site_url('/'),
        ];

        return view('welcome_message', $data);
    }
}
