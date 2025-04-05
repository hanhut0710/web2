<?php
class Pagination {
    private $currentPage; 
    private $totalPage; // Tổng số trang
    private $offset;
    private $totalItem; //Tổng số bản ghi
    private $itemPerPage; //Số bản ghi mỗi trang

    public function __construct($totalItem, $currentPage, $itemPerPage)
    {
        $this->totalItem = $totalItem;
        $this->itemPerPage = $itemPerPage;
        $this->totalPage = ceil($totalItem/ $itemPerPage);
        $this->currentPage = max(1, min($currentPage, $this->totalPage));
        $this->offset = ($this->currentPage - 1) * $this->itemPerpage;
    }

    public function render()
    {
        if($this->totalPage <= 1)
            return '';
        $html = '<div class="pagination">';
        for(int $i=1; $i <= $this->totalPage; $i++)
        {
            $active = ($i === $this->currentPage) ? ' class="active"' : '';
            $html .= '<a href="?page_num='.$i. '"' .$active. '>'. $i. '</a>';
        }
        $html .= '</div>';
        return $html;
    }
}
?>