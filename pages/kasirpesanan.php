<div class="card-body  pt-0 pb-2">
  <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">NO</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Nama</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">ID Produk</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Harga Jual</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Jumlah Order</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Total</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($dataproduk as $row) :  ?>
          <tr>
            <td class="text-center">
              <div class="d-flex flex-column justify-content-center">
                <h5 class="mb-0 text-sm"><?= $i; ?></h5>
              </div>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold"><?= $row["namaproduk"] ?></span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold"><?= $row["idproduk"] ?></span>
            </td>
            
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold">Rp. <?= $row["hargajual"] ?></span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold"><?= $row["jumlah"] ?></span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold">Rp. <?= $row["total"] ?></span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold"><?php $date =  date_create($row["tanggal"]);
                                                            echo date_format($date, "Y-m-d"); ?></span>
            </td>
          </tr>
      </tbody>
      <?php $i++; ?>
    <?php endforeach; ?>
    </table>
  </div>