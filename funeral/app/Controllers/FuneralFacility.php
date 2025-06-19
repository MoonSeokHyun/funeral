<?php

// app/Controllers/FuneralFacility.php

namespace App\Controllers;

use App\Models\FuneralFacilityModel;
use App\Models\FuneralItemModel;
use App\Models\NaverApiModel;

class FuneralFacility extends BaseController
{
    public function index()
    {
        $facilityModel = new FuneralFacilityModel();

        $search = $this->request->getGet('search');
        $perPage = 12;
        $page = (int) ($this->request->getGet('page') ?? 1);

        if ($search) {
            $facilityModel->like('facility_name', $search)
                         ->orLike('address', $search)
                         ->orLike('city', $search)
                         ->orLike('county', $search)
                         ->orLike('phone_number', $search);
        }

        $data['facilities'] = $facilityModel
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        $data['pager'] = $facilityModel->pager;
        $data['search'] = $search;

        return view('funeral/index', $data);
    }
    public function detail($id)
    {
        $facilityModel = new FuneralFacilityModel();
        $itemModel = new FuneralItemModel();
        $naverModel = new NaverApiModel();
    
        $facility = $facilityModel->find($id);
        if (!$facility) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("해당 시설을 찾을 수 없습니다.");
        }
    
        // facility_name을 기반으로 검색
        $keyword = $facility['facility_name'];
    
        // API 호출
        $blogJson = $naverModel->blog($keyword);
        $imageJson = $naverModel->image($keyword);
    
        // 결과 디코딩
        $blog = $blogJson ? json_decode($blogJson, true) : [];
        $images = $imageJson ? json_decode($imageJson, true) : [];
    
        // 관련 항목
        $items = $itemModel
            ->where('funeral_home_name', $facility['facility_name'])
            ->findAll();
    
        return view('funeral/detail', [
            'facility' => $facility,
            'items' => $items,
            'blog' => $blog,
            'images' => $images,
        ]);
    }
}
