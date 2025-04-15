<?php
class Pagination {
    private $currentPage; 
    private $totalPage; // Tổng số trang
    private $totalItem; //Tổng số bản ghi
    private $itemPerPage; //Số bản ghi mỗi trang

    public function __construct($totalItem, $currentPage, $itemPerPage) 
    {
        $this->totalItem = $totalItem;
        $this->itemPerPage = $itemPerPage;
        $this->totalPage = ceil($totalItem / $itemPerPage);
        $this->currentPage = max(1, min($currentPage, $this->totalPage));
    }

    public function getOffset()
    {
       return ($this->currentPage - 1) * $this->itemPerPage;
    }

    public function renderProduct()
    {
        if ($this->totalPage <= 1)
            return '';

        $categoryParam = isset($_GET['category_id']) && $_GET['category_id'] !== '' ? 'category_id=' . intval($_GET['category_id']) : '';

        $html = '<div class="page-nav">
                    <ul class="page-nav-list">';
        for ($i = 1; $i <= $this->totalPage; $i++) {
            $url = '?page=product';
            if ($categoryParam)
                $url .= '&' . $categoryParam;
            $url .= '&page_num=' . $i;

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
}
?>