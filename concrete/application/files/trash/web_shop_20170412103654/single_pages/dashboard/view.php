<table>

    <tr>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Price</th>
        <th>Operation</th>
    </tr>

    <?php /*foreach($products as $product): ?>

        <tr>
            <td><?= $product['product_name']; ?></td>
            <td><?= $product['product_description']; ?></td>
            <td><?= $product['product_price']; ?></td>
            <td>
                <a href="/index.php/dashboard/shop/addpage/<?= $product['product_id']; ?>">Edit product</a><br>
                <a href="<?= $c->getCollectionLink() ?>/delete/<?= $product['product_id']; ?>">Delete product</a>

            </td>
        </tr>

    <?php endforeach;*/ ?>

</table>

<a href="/index.php/dashboard/shop/addpage">Add a product</a>





<style>
    table {
        width:100%;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;
    }
    table#t01 tr:nth-child(even) {
        background-color: #eee;
    }
    table#t01 tr:nth-child(odd) {
        background-color:#fff;
    }
    table#t01 th {
        background-color: black;
        color: white;
    }
</style>