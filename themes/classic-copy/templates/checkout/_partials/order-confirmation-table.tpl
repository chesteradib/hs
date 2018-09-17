<div id="order-items" class="col-md-12">

  {block name='order_items_table_head'}
    <h3 class="card-title h3">{l s='Order items' d='Shop.Theme.Checkout'}</h3>
  {/block}

  <div class="order-confirmation-table">

    {block name='order_confirmation_table'}
      {foreach from=$products item=product}
        <div class="order-line row">
          <div class="col-sm-2 col-xs-3">
            <span class="image">
              <img src="{$product.cover.medium.url}" />
            </span>
          </div>
          <div class="col-sm-4 col-xs-9 details">
            {if $add_product_link}<a href="{$product.url}" target="_blank">{/if}
              <span>{$product.name}</span>
            {if $add_product_link}</a>{/if}
          </div>
          <div class="col-sm-6 col-xs-12 qty">
            <div class="row">
              <div class="col-xs-5 text-xs-right bold">{$product.total}</div>
            </div>
          </div>
        </div>
      {/foreach}

      <hr>

      <table>
        {foreach $subtotals as $subtotal}
          {if $subtotal.type !== 'tax'}
            <tr>
              <td>{$subtotal.label}</td>
              <td>{$subtotal.value}</td>
            </tr>
          {/if}
        {/foreach}
        {if $subtotals.tax.label !== null}
          <tr class="sub">
            <td>{$subtotals.tax.label}</td>
            <td>{$subtotals.tax.value}</td>
          </tr>
        {/if}
        <tr class="font-weight-bold">
          <td><span class="text-uppercase">{$totals.total.label}</span> {$labels.tax_short}</td>
          <td>{$totals.total.value}</td>
        </tr>
      </table>
    {/block}

  </div>
</div>
