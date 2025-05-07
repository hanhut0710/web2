<?php
class Pagination {
    private $currentPage; 
    private $totalPage; // Tổng số trang
    private $totalItem; //Tổng số bản ghi
    private $itemPerPage; //Số bản ghi mỗi trang
    private $extraParams; //Danh cho loc order

    public function __construct($totalItem, $currentPage, $itemPerPage) 
    {
        $this->totalItem = $totalItem;
        $this->itemPerPage = $itemPerPage;
        $this->totalPage = ceil($totalItem / $itemPerPage);
        $this->currentPage = max(1, min($currentPage, $this->totalPage));
        $this -> extraParams =[];
    }

    public function setExtraParams ($params){
        $this->extraParams = array_filter($params , function($value){
            return $value !== null && $value !== '';
        });
    }


    public function getOffset()
    {
       return ($this->currentPage - 1) * $this->itemPerPage;
    }

    public function renderProduct()
    {
        if ($this->totalPage <= 1)
        return '';

        $categoryParam = isset($_GET['category_id']) && $_GET['category_id'] !== '' ? '&category_id=' . intval($_GET['category_id']) : '';
        $searchParam = isset($_GET['search']) && $_GET['search'] !== '' ? '&search=' . urlencode($_GET['search']) : '';

        $html = '<div class="page-nav">
                <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) {
            $url = '?page=product' . $categoryParam . $searchParam . '&page_num=' . $i;
            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }
        $html .= '</ul></div>';
        return $html;
    }

    // public function renderProductDetails()
    // {
    //     if ($this->totalPage <= 1)
    //         return '';
    
    //     $productParam = isset($_GET['product_id']) && $_GET['product_id'] !== '' ? 'product_id=' . intval($_GET['product_id']) : '';
    
    //     $html = '<div class="page-nav">
    //                 <ul class="page-nav-list">';
    //     for ($i = 1; $i <= $this->totalPage; $i++) {
    //         $url = '?page=productdetails';
    //         if ($productParam)
    //             $url .= '&' . $productParam;
    //         $url .= '&page_num=' . $i;
    
    //         $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
    //         $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
    //     }
    //     $html .= '</ul></div>';
    //     return $html;
    // }

    public function renderProductDetails()
    {
        if ($this->totalPage <= 1)
            return '';

        $productParam = isset($_GET['product_id']) && $_GET['product_id'] !== '' ? '&product_id=' . intval($_GET['product_id']) : '';
        $searchParam = isset($_GET['search']) && $_GET['search'] !== '' ? '&search=' . urlencode($_GET['search']) : '';
        $maxPagesToShow = 5; // Số trang số tối đa hiển thị
        $halfPages = floor($maxPagesToShow / 2);
        $startPage = max(1, $this->currentPage - $halfPages);
        $endPage = min($this->totalPage, $startPage + $maxPagesToShow - 1);

        // Điều chỉnh startPage nếu endPage gần cuối
        if ($endPage - $startPage < $maxPagesToShow - 1) 
        $startPage = max(1, $endPage - $maxPagesToShow + 1);
    

        $html = '<div class="page-nav">
                <ul class="page-nav-list">';

        // Nút Trang trước
        if ($this->currentPage > 1) {
            $prevPage = $this->currentPage - 1;
            $url = "?page=productdetails{$productParam}{$searchParam}&page_num={$prevPage}";
            $html .= '<li class="page-nav-item"><a href="' . $url . '">&lt;</a></li>';
        } else {
            $html .= '<li class="page-nav-item disabled"><span>&lt;</span></li>';
        }

        // Trang đầu
        if ($startPage > 1) {
            $url = "?page=productdetails{$productParam}{$searchParam}&page_num=1";
            $html .= '<li class="page-nav-item"><a href="' . $url . '">1</a></li>';
            if ($startPage > 2) {
            $html .= '<li class="page-nav-item"><span>...</span></li>';
            }
        }

        // Các trang số
        for ($i = $startPage; $i <= $endPage; $i++) {
            $url = "?page=productdetails{$productParam}{$searchParam}&page_num={$i}";
            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }

        // Trang cuối
        if ($endPage < $this->totalPage) {
            if ($endPage < $this->totalPage - 1) {
                $html .= '<li class="page-nav-item"><span>...</span></li>';
            }
            $url = "?page=productdetails{$productParam}{$searchParam}&page_num={$this->totalPage}";
            $html .= '<li class="page-nav-item"><a href="' . $url . '">' . $this->totalPage . '</a></li>';
        }

        // Nút Trang sau
        if ($this->currentPage < $this->totalPage) {
            $nextPage = $this->currentPage + 1;
            $url = "?page=productdetails{$productParam}{$searchParam}&page_num={$nextPage}";
            $html .= '<li class="page-nav-item"><a href="' . $url . '">&gt;</a></li>';
        } else {
            $html .= '<li class="page-nav-item disabled"><span>&gt;</span></li>';
        }

        $html .= '</ul></div>';
     return $html;
    }
    
    public function renderImport($supplierId = '')
    {
        if ($this->totalPage <= 1)
            return '';

        $supplierParam = $supplierId ? '&supplier_id=' . intval($supplierId) : '';
        $searchParam = isset($_GET['search']) && $_GET['search'] !== '' ? '&search=' . urlencode($_GET['search']) : '';

        $html = '<div class="page-nav">
                <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) {
            $url = '?page=import' . $supplierParam . $searchParam . '&page_num=' . $i;
            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }
        $html .= '</ul></div>';
        return $html;
    }
    
    public function renderSupplier()
    {
        if ($this->totalPage <= 1)
            return '';

        $pageParam = isset($_GET['page']) ? 'page=' . $_GET['page'] : '';
        
        $html = '<div class="page-nav">
                    <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) 
        {
            $url = '?';
            if($pageParam)
                $url .= $pageParam . '&';
            $url .= 'page_num=' . $i;
            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }
        $html .= '</ul></div>';
        return $html;
    }

    public function renderStaffPageByRole($role)
    {
        if($this->totalPage <= 1)
            return '';

        $pageParam = isset($_GET['page']) ? 'page=' . $_GET['page'] : '';

        $html = '<div class="page-nav">
                    <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) {
            $url = '?';
            if($pageParam)
                $url .= $pageParam . '&';
            $url .= 'role='. $role . '&page_num='. $i;

            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }
        $html .= '</ul></div>';
        return $html;
    }
    public function renderStaffPageById($id)
    {
        if($this->totalPage <= 1)
            return '';

        $pageParam = isset($_GET['page']) ? 'page=' . $_GET['page'] : '';

        $html = '<div class="page-nav">
                    <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) {
            $url = '?';
            if($pageParam)
                $url .= $pageParam . '&';
            $url .= 'search_id='. $id . '&page_num='. $i;

            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }
        $html .= '</ul></div>';
        return $html;
    }

    public function renderOrderList($startDate, $endDate, $sort) {
        if ($this->totalPage <= 1)
            return '';

        $pageParam = isset($_GET['page']) ? 'page=' . $_GET['page'] : '';

        $html = '<div class="page-nav">
                    <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) {
            $url = '?view=table&sort=' . $sort .'&';
            if($pageParam)
                $url .= $pageParam . '&';
            $url .= 'start-date='. $startDate . '&end-date='. $endDate . '&page_num='. $i;

            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }
        $html .= '</ul></div>';
        return $html;
    }

    public function renderUser()
    {
        if($this->totalPage <= 1)
            return '';

        $pageParam = isset($_GET['page']) ? 'page=' . $_GET['page'] : '';

        $html = '<div class="page-nav">
                    <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) {
            $url = '?';
            if($pageParam)
                $url .= $pageParam . '&';
            $url .= 'page_num='. $i;

            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }
        $html .= '</ul></div>';
        return $html;
    }

    public function renderOrder()
    {
        if($this->totalPage <= 1)
            return '';

        $pageParam = isset($_GET['page']) ? 'page=' . $_GET['page'] : 'page=order';
        $extraParams = http_build_query($this->extraParams);
        $html = '<div class="page-nav">
                    <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) {
            $url = '?' . $pageParam;
            if($extraParams)
                $url .= '&' . $extraParams;
            $url .= '&page_num='. $i;

            $active = ($i == $this->currentPage) ? ' class="page-nav-item active"' : ' class="page-nav-item"';
            $html .= '<li' . $active . '><a href="' . $url . '">' . $i . '</a></li>';
        }
        $html .= '</ul></div>';
        return $html;
    }
}
?>