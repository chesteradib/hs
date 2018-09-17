{if $product.show_price}
  <div class="product-prices">
    {block name='product_price'}
      <div
        class="product-price h5"
        itemprop="offers"
        itemscope
        itemtype="https://schema.org/Offer"
      >
        <link itemprop="availability" href="{$product.seo_availability}"/>
        <meta itemprop="priceCurrency" content="{$currency.iso_code}">

        <div class="current-price">
          <span itemprop="price" content="{$product.price_amount}">{$product.price}</span>
        </div>
        <div class="tax-shipping-delivery-label">
          {if $configuration.display_taxes_label}
              {$product.labels.tax_long}
          {/if}
        </div>
      </div>
    {/block}
  </div>
{/if}
