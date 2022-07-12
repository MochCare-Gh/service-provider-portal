<input type="button" ng-click="addNewDetail()" value="add new Product / Service details">
<table class='table table-striped responsive-utilities jambo_table'>
    <thead>
    <th></th>
    <th>Quantity</th>
    <th>Product/Service</th>
    <th>Description</th>
    <th>Subtotal</th>
</thead>
<tbody>
    <tr ng-repeat='ItemDetail in InvoicesItem.details'>
        <td><input type="button" ng-click="RemoveDetail($index)" value="x"/></td>
        <td><input type='text' name='ItemDetail[<% $index %>][quantity]' ng-model='ItemDetail.quantity'/></td>
        <td><input type='text' name='ItemDetail[<% $index %>][product]' ng-model='ItemDetail.product'/></td>
        <td><input type='text' name='ItemDetail[<% $index %>][description]' ng-model='ItemDetail.description'/></td>
        <td><input type='text' name='ItemDetail[<% $index %>][subtotal]' ng-model='ItemDetail.subtotal'/></td>
    </tr>
</tbody>
</table>