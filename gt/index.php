<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "musik");

// Ambil daftar produk dari database
$query = "SELECT * FROM barang";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website Jual Beli</title>
</head>
<body>
    <h1>Produk Tersedia</h1>
    <table>
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th></th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Tambahkan ke Keranjang">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>