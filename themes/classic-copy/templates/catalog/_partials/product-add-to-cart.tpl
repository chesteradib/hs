<div class="product-add-to-cart">
  {if !$configuration.is_catalog}
    {block name='product_quantity'}
      <div class="product-quantity clearfix">
        <div class="qty" style="display: none">
          <input
            type="text"
            name="qty"
            id="quantity_wanted"
            value="1"
            class="input-group"
            min="1"
          >
        </div>

        <div class="add">
          <button
            class="btn btn-primary add-to-cart"
            data-button-action="add-to-cart"
            type="submit"
            {if !$product.add_to_cart_url}
              disabled
            {/if}
          >
            <i class="material-icons shopping-cart">&#xE547;</i>
            {l s='Add to cart' d='Shop.Theme.Actions'}
          </button>
        </div>
      </div>
    {/block}

    {block name='product_availability'}
      <span id="product-availability">
        {if $product.show_availability}
          {if $product.availability == 'available'}
            <i class="material-icons rtl-no-flip product-available">&#xE5CA;</i>
            {l s='available' d='Shop.Theme.Global'}
          {else}
            <i class="material-icons product-unavailable">&#xE14B;</i>
              {l s='unavailable' d='Shop.Theme.Global'}
          {/if}
        {/if}
      </span>
    {/block}

  {/if}
</div>
