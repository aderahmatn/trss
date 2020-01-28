<table class="table table-bordered col-12">
  <tbody>
    <tr>
      <th scope="row">Position</th>
      <td>:</td>
      <td><?=strtoupper($planning->PositionName)?></td>
    </tr>
    <tr>
      <th scope="row">Line</th>
      <td>:</td>
      <td><?=strtoupper($planning->LineName)?></td>
    </tr>
    <tr>
      <th scope="row">IDPart</th>
      <td>:</td>
      <td><?=$planning->PartName ?></td>
    </tr>
    <tr>
      <th scope="row">Process</th>
      <td>:</td>
      <td><?=strtoupper($planning->ProcessName)?></td>
    </tr>
    <tr>
      <th scope="row">Quantity</th>
      <td>:</td>
      <td><?=$planning->Qty ?></td>
    </tr>
    <tr>
      <th scope="row">Stock</th>
      <td>:</td>
      <td><span class="badge badge-danger">145</span></td>
    </tr>
  </tbody>
</table>