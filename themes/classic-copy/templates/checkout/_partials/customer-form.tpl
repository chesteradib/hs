{extends "customer/_partials/customer-form.tpl"}

{block "form_field"}
  {if $guest_allowed and ($field.name === 'newsletter' or $field.name === 'password')}
  {else}
    {$smarty.block.parent}
  {/if}
{/block}

{block "form_buttons"}
    <button
      class="continue btn btn-primary float-xs-right"
      name="continue"
      data-link-action="register-new-customer"
      type="submit"
      value="1"
    >
        {l s='Continue' d='Shop.Theme.Actions'}
    </button>
{/block}
