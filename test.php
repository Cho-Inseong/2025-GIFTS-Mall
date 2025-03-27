<!-- 컴포저 -->
<?php
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$inputFileName = 'C:/xampp/2025-GIFTS-Mall/files/aaa.xlsx';
$spreadsheet = IOFactory::load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();
$maxRow = $worksheet->getHighestRow();

$products = [];

for ($row = 1; $row <= $maxRow; $row += 7) {
    if (($row + 6) > $maxRow) {
        break;
    }

    $productName = trim((string) $worksheet->getCell('E' . ($row + 1))->getValue());
    $description = trim((string) $worksheet->getCell('E' . ($row + 2))->getValue());
    $price = trim((string) $worksheet->getCell('E' . ($row + 3))->getValue());
    $delivery = trim((string) $worksheet->getCell('E' . ($row + 4))->getValue());
    $discount = trim((string) $worksheet->getCell('E' . ($row + 5))->getValue());
    $point = trim((string) $worksheet->getCell('E' . ($row + 6))->getValue());


    $products[] = [
        'name' => $productName,
        'description' => $pdescription,
        'price' => $price,
        'delivery' => $delivery,
        'discount' => $discount,
        'point' => $point,

    ];
};

header('Content-Type: application/json; charset=utf-8');
echo json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

?>

<?php
try {
    $stmt = $pdo->prepare("SELECT * FROM goods ORDER BY goods_popular DESC, goods_idx ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("데이터 조회 오류: " . $e->getMessage());
}

$categories = ["건강식품", "디지털", "팬시", "향수", "헤어케어"];
?>
<div>



    <!-- 카테고리 버튼 -->
    <div class="d-flex justify-content-center w-100" id="category_btn">
        <?php foreach ($categories as $category): ?>
            <button class="btn btn-primary mx-3" onclick="showCategory('<?= $category ?>')"><?= $category ?></button>
        <?php endforeach; ?>
    </div>



    <!-- 인기 상품 (goods_popular = '인기') -->
    <div class="popular">
        <?php
        $popularItem = null;
        foreach ($products as $product) {
            if (trim($product['goods_popular']) === "인기") {
                $popularItem = $product;
                break;
            }
        }

        if ($popularItem): ?>
            <img src="../<?= htmlspecialchars($popularItem['goods_img']) ?>" alt="">
            <div class="p-box">
                <p><?= htmlspecialchars($popularItem['goods_title']) ?></p>
                <p><?= number_format($popularItem['goods_price']) ?>원</p>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success mr-2">구매하기</button>
                    <button class="btn btn-primary">장바구니담기</button>
                </div>
            </div>
        <?php endif; ?>
    </div>




    <!-- 카테고리별 상품 (인기 상품 제외) -->
    <div id="detail_boxes">
        <?php
        $categoryProducts = [];
        foreach ($products as $product) {
            if ($product['goods_popular'] !== "인기") {
                $categoryProducts[$product['goods_category']][] = $product;
            }
        }

        foreach ($categoryProducts as $category => $items): ?>
            <div class="category-group" id="category_<?= $category ?>" style="display: none;">
                <?php foreach (array_chunk($items, 4) as $rowItems): ?>
                    <div class="w-100 mt-5 d-flex justify-content-between">
                        <?php foreach ($rowItems as $item): ?>
                            <div class="box">
                                <img src="<?= htmlspecialchars($item['goods_img']) ?>" alt="">
                                <p class="text-center mt-2"><?= htmlspecialchars($item['goods_title']) ?></p>
                                <p class="text-center"><?= number_format($item['goods_price']) ?>원</p>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success mr-2">구매하기</button>
                                    <button class="btn btn-primary">장바구니담기</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function showCategory(category) {
        document.querySelectorAll(".category-group").forEach(el => el.style.display = "none");
        document.getElementById("category_" + category).style.display = "block";
    }
</script>


<?php
if ($reservations) {
    foreach ($reservations as $reservation) {
        $divinnertext = "";
        $divinnertext .= "<tr class='" . $reservation['res_idx'] . "'>";
        $divinnertext .= "<td>" . $reservation['res_league'] . "</td>";
        $divinnertext .= "<td>" . $reservation['res_date'] . "</td>";
        $divinnertext .= "<td>" . $reservation['res_time'] . "</td>";
        $divinnertext .= "<td>" . number_format($reservation['min_people']) . "명</td>";
        $divinnertext .= "<td>" . number_format($reservation['fee']) . "원</td>";
        if ($reservation['res_av'] == "승인완료") {
            if ($reservation['res_buyav'] == "결제완료") {
                $divinnertext .= "<td>결제완료</td>";
            }
            if ($reservation['res_buyav'] == "결제승인전") {
                $divinnertext .= "<td>결제승인전</td>";
            } else if ($reservation['res_buyav'] == "") {
                $divinnertext .= "<td><button type='button' class='btn btn-primary' onclick='buyokay(this)'>걸제요청</button></td>";
            }
        } else {
            $divinnertext .= "<td>예약신청</td>";
        }

        $divinnertext .= "</tr>";
        echo $divinnertext;
    }
}

?>

<!-- c모듈 전체상품 그거 -->
<div class='w-100 mt-5 d-flex justify-content-between' id='detail_boxes'>
    <div class='box' id="">
        <img src='../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/A-Module/images/건강식품/1.PNG' alt=''>
        <p class='text-center mt-2'>이뮨 멀티비타민&미네랄</p>
        <p class='text-center '>65,000</p>
        <div class='d-flex justify-content-center'>
            <button class='btn btn-success mr-2'>구매하기</button>
            <button class='btn btn-primary'>장바구니담기</button>
        </div>
    </div>
</div>
</div>


<!-- 인기 -->
<img src="../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/A-Module/images/건강식품/1.PNG" alt="">
<div class="p-box">
    <p>이뮨 멀티비타민&미네랄</p>
    <p>65,000</p>
    <div class="d-flex justify-content-center">
        <button class="btn btn-success mr-2">구매하기</button>
        <button class="btn btn-primary">장바구니담기</button>
    </div>
</div>
</div>

<!-- 장바구니 -->
<tr class='sc_tb_detail'>
    <td class='sc_tb_title_br'><img class='sc_img' src='../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/A-Module/images/건강식품/1.PNG' alt='1.png' title='1.png'></td>
    <td class='sc_tb_title_br'>이뮨 멀티비타민&미네랄<br>국내 판매 1위 멀티비타민 이뮨 14일분에 이중제형 + 남/녀 맞춤설계 포뮬러를 적용한 신제품</td>
    <td class='sc_tb_title_br'><input type='number' oninput="total_price()"></td>
    <td class='sc_tb_title_br'>65,000원</td>
    <td>65,000원</td>
</tr>