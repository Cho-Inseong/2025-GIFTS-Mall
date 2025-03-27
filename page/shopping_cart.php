<main>
    <div id="container_ap">
        <table id="sc_tb">
            <tr class="sc_tb_title">
                <td>이미지</td>
                <td>상품명</td>
                <td>수량 조절</td>
                <td>단가</td>
                <td>총액</td>
            </tr>
            <?php include('./api/shopping_cart_add_api.php')?>
            <?php
            if ($cart_products) {
                foreach ($cart_products as $cart) {
                    echo "<tr class='sc_tb_detail' id='".$cart['goods_idx']."'>";
                    echo "<td class='sc_tb_title_br'><img class='sc_img' src='".$cart['goods_img']."' title='1.png'></td>";
                    echo "<td class='sc_tb_title_br'>".$cart['goods_title']."</td>";
                    echo "<td class='sc_tb_title_br'><input class='goods_stock' type='number' value='".$cart['spc_stock']."' oninput='total_price(this)'></td>";
                    echo "<td class='sc_tb_title_br goods_price' id='".$cart['goods_price']."'>".number_format($cart['goods_price'])."원</td>";
                    echo "<td class='total_price'></td>";
                    echo "</tr>";
                }
            }
            ?>
           
        </table>
        <div id="sc_btn_group">
            <h1 class="total_total_price">총금액:</h1>
            <button>구해하기</button>
        </div>
    </div>
</main>