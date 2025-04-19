    <?php   
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("./connect.php");

    $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 6;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 'all';
    $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : 'all';

    $offset = ($page - 1) * $pageSize;

    // Nếu category_id là "all", lấy sản phẩm từ category_id từ 1 đến 6
    if ($category_id == 'all') {
        $sql = "SELECT id, name, price, img_src FROM products WHERE category_id BETWEEN 1 AND 6 LIMIT $pageSize OFFSET $offset";
    } else {
        $sql = "SELECT id, name, price, img_src FROM products WHERE category_id = $category_id LIMIT $pageSize OFFSET $offset";
    }

    if($brand_id != 'all') {
        $sql = "SELECT id, name, price, img_src FROM products WHERE brand_id = $brand_id LIMIT $pageSize OFFSET $offset";
    }


    $result = mysqli_query($con, $sql);
    $data = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    // Lấy tổng số sản phẩm theo category_id
    if ($category_id == 'all') {
        $sql2 = "SELECT COUNT(*) as total FROM products WHERE category_id BETWEEN 1 AND 6";
    } else {
        $sql2 = "SELECT COUNT(*) as total FROM products WHERE category_id = $category_id";
    }

    if($brand_id != 'all') {
        $sql2 ="SELECT COUNT(*) as total FROM products WHERE brand_id = $brand_id";
    }

    $result2 = mysqli_query($con, $sql2);
    $totalProduct = mysqli_fetch_assoc($result2)['total'];

    $response = [
        'data' => $data,
        'totalProduct' => $totalProduct
    ];

    header('Content-Type: application/json');
    echo json_encode($response);

    mysqli_close($con);
    ?>
